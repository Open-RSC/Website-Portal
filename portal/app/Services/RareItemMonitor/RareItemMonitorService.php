<?php

namespace App\Services\RareItemMonitor;

use App\Services\Stats\StatsService;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class RareItemMonitorService
{
    // Rare items to monitor: rscstats column => display name
    private const RARE_ITEMS = [
        'cracker'    => 'Christmas Cracker',
        'santahat'   => 'Santa Hat',
        'pumpkin'    => 'Pumpkin',
        'easteregg'  => 'Easter Egg',
        'redphat'    => 'Red Party Hat',
        'yellowphat' => 'Yellow Party Hat',
        'bluephat'   => 'Blue Party Hat',
        'greenphat'  => 'Green Party Hat',
        'pinkphat'   => 'Pink Party Hat',
        'whitephat'  => 'White Party Hat',
        'redmask'    => "Red H'ween Mask",
        'bluemask'   => "Blue H'ween Mask",
        'greenmask'  => "Green H'ween Mask",
        'scythe'     => 'Scythe',
        'dmed'       => 'Dragon Med Helm',
    ];

    // Ultra-rare items with a tighter threshold (default: 10)
    private const ULTRA_RARE_ITEMS = [
        'dsq' => 'Dragon Square Shield',
    ];

    private string $db;
    private int $goldThreshold;
    private int $rareItemThreshold;
    private int $ultraRareItemThreshold;

    private array $goldThresholdMultipliers;

    public function __construct(string $db)
    {
        $this->db = $db;
        $this->goldThreshold = (int) config('openrsc.rare_item_monitor_gold_threshold', 30_000_000);
        $this->rareItemThreshold = (int) config('openrsc.rare_item_monitor_rare_threshold', 50);
        $this->ultraRareItemThreshold = (int) config('openrsc.rare_item_monitor_ultra_rare_threshold', 10);
        $this->goldThresholdMultipliers = ['openpk' => 5, 'uranium' => 5, 'coleslaw' => 25];
        if (array_key_exists($db, $this->goldThresholdMultipliers)) {
            //Some worlds need gold threshold to not cause false positives.
            $this->goldThreshold *= $this->goldThresholdMultipliers[$db];
        }
    }

    /**
     * Run the monitor and return results.
     *
     * Returns null if there is not enough data to compare (e.g. no yesterday snapshot).
     *
     * @return array{db: string, flags: list<string>, items: array, yesterday_snapshot: string, today_snapshot: string}|null
     */
    public function run(): ?array
    {
        $yesterday = $this->getYesterdayStats();
        $today     = $this->getTodayStats();

        if (! $yesterday || ! $today) {
            return null;
        }

        $flags = [];
        $items = [];

        // Gold
        $goldDelta  = (int) $today->sumgold - (int) $yesterday->sumgold;
        $isGoldFlag = $goldDelta >= $this->goldThreshold;
        $items['Gold'] = [
            'current'  => (int) $today->sumgold,
            'previous' => (int) $yesterday->sumgold,
            'delta'    => $goldDelta,
            'flag'     => $isGoldFlag,
        ];
        if ($isGoldFlag) {
            $flags[] = 'Gold';
        }

        // Rare items
        foreach (self::RARE_ITEMS as $column => $name) {
            $delta  = (int) $today->$column - (int) $yesterday->$column;
            $isFlag = $delta >= $this->rareItemThreshold;
            $items[$name] = [
                'current'  => (int) $today->$column,
                'previous' => (int) $yesterday->$column,
                'delta'    => $delta,
                'flag'     => $isFlag,
            ];
            if ($isFlag) {
                $flags[] = $name;
            }
        }

        // Ultra-rare items (tighter threshold)
        foreach (self::ULTRA_RARE_ITEMS as $column => $name) {
            $delta  = (int) $today->$column - (int) $yesterday->$column;
            $isFlag = $delta >= $this->ultraRareItemThreshold;
            $items[$name] = [
                'current'  => (int) $today->$column,
                'previous' => (int) $yesterday->$column,
                'delta'    => $delta,
                'flag'     => $isFlag,
            ];
            if ($isFlag) {
                $flags[] = $name;
            }
        }

        $baseGoldThreshold = (int) config('openrsc.rare_item_monitor_gold_threshold', 30_000_000);
        $goldMultiplier    = $this->goldThresholdMultipliers[$this->db] ?? 1;

        return [
            'db'                      => $this->db,
            'flags'                   => $flags,
            'items'                   => $items,
            'yesterday_snapshot'      => Carbon::yesterday()->toDateString(),
            'today_snapshot'          => Carbon::today()->toDateString(),
            'gold_threshold'          => $this->goldThreshold,
            'gold_threshold_base'     => $baseGoldThreshold,
            'gold_multiplier'         => $goldMultiplier,
            'rare_threshold'          => $this->rareItemThreshold,
            'ultra_rare_threshold'    => $this->ultraRareItemThreshold,
        ];
    }

    private function getYesterdayStats(): ?object
    {
        return DB::table('rscstats')
            ->where('server', $this->db)
            ->whereDate('created_at', Carbon::yesterday())
            ->orderBy('created_at', 'desc')
            ->first();
    }

    private function getTodayStats(): ?object
    {
        // Prefer the already-generated daily snapshot so we avoid redundant heavy queries.
        $today = DB::table('rscstats')
            ->where('server', $this->db)
            ->whereDate('created_at', Carbon::today())
            ->orderBy('created_at', 'desc')
            ->first();

        if ($today) {
            return $today;
        }

        // Fall back to generating live data when no snapshot exists yet for today.
        $statsService = new StatsService($this->db);
        $data = $statsService->generateData($this->db);

        return (object) $data;
    }
}
