<?php

namespace App\Console\Commands;

use App\Services\RareItemMonitor\RareItemMonitorService;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

#[Signature('monitor:rare-items {db}')]
#[Description('Monitor rare items for duplication anomalies by comparing the previous day\'s snapshot against today\'s')]
class MonitorRareItemsCommand extends Command
{
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $db = $this->argument('db');
        $service = new RareItemMonitorService($db);
        $result = $service->run();

        if ($result === null) {
            $this->warn("[$db] No data available to compare. Ensure the daily stats job has run for at least two consecutive days.");

            return 0;
        }

        if (empty($result['flags'])) {
            $this->info("[$db] No anomalies detected on ".Carbon::today()->toDateString());

            return 0;
        }

        $this->error("[$db] RARE ITEM RED FLAG(S) detected on ".Carbon::today()->toDateString().':');
        foreach ($result['flags'] as $flag) {
            $item = $result['items'][$flag];
            $this->error(sprintf(
                '  - %s: %s (prev: %s, +%s)',
                $flag,
                number_format($item['current']),
                number_format($item['previous']),
                number_format($item['delta'])
            ));
        }

        $this->error("[$db] Thresholds — ".$this->formatThresholds($result));

        $this->sendDiscordAlert($result);

        return 0;
    }

    /**
     * Build the threshold summary line, showing the base value and multiplier for any
     * threshold that this world scales.
     */
    private function formatThresholds(array $result): string
    {
        return 'Gold: '.$this->formatThreshold($result['gold_threshold'], $result['gold_threshold_base'], $result['gold_multiplier'])
            .', Rare: '.$this->formatThreshold($result['rare_threshold'], $result['rare_threshold_base'], $result['rare_multiplier'])
            .', Ultra-Rare: '.$this->formatThreshold($result['ultra_rare_threshold'], $result['ultra_rare_threshold_base'], $result['ultra_rare_multiplier']);
    }

    private function formatThreshold(int $threshold, int $base, float $multiplier): string
    {
        if ($multiplier == 1.0) {
            return number_format($threshold);
        }

        return number_format($threshold).' (base: '.number_format($base).' × '.rtrim(rtrim(number_format($multiplier, 2, '.', ''), '0'), '.').'x)';
    }

    private function sendDiscordAlert(array $result): void
    {
        $webhookUrl = config('openrsc.rare_item_monitor_discord_webhook_url');

        if (! $webhookUrl) {
            return;
        }

        $db = ucwords($result['db']);
        $content = "**Rare Item Alert - {$db}**\n";
        $content .= "**Comparing:** `{$result['yesterday_snapshot']}` -> `{$result['today_snapshot']}`\n\n";
        $content .= "**Red Flags:**\n";

        foreach ($result['flags'] as $flag) {
            $item = $result['items'][$flag];
            $current = number_format($item['current']);
            $prev = number_format($item['previous']);
            $delta = number_format($item['delta']);
            $content .= "**{$flag}**: {$current} (prev: {$prev}, +{$delta})\n";
        }

        $content .= "\n**Thresholds:** ".$this->formatThresholds($result);

        try {
            \Http::post($webhookUrl, ['content' => $content]);
        } catch (\Exception $e) {
            \Log::warning("[$result[db]] Failed to send rare item monitor Discord alert: ".$e->getMessage());
        }
    }
}
