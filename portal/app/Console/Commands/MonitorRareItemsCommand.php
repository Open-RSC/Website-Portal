<?php

namespace App\Console\Commands;

use App\Services\RareItemMonitor\RareItemMonitorService;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class MonitorRareItemsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'monitor:rare-items {db}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Monitor rare items for duplication anomalies by comparing the previous day\'s snapshot against today\'s';

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
        $db      = $this->argument('db');
        $service = new RareItemMonitorService($db);
        $result  = $service->run();

        if ($result === null) {
            $this->warn("[$db] No data available to compare. Ensure the daily stats job has run for at least two consecutive days.");

            return 0;
        }

        if (empty($result['flags'])) {
            $this->info("[$db] No anomalies detected on " . Carbon::today()->toDateString());

            return 0;
        }

        $this->error("[$db] RARE ITEM RED FLAG(S) detected on " . Carbon::today()->toDateString() . ':');
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

        $this->sendDiscordAlert($result);

        return 0;
    }

    private function sendDiscordAlert(array $result): void
    {
        $webhookUrl = config('openrsc.rare_item_monitor_discord_webhook_url');

        if (! $webhookUrl) {
            return;
        }

        $db      = ucwords($result['db']);
        $content = "**Rare Item Alert - {$db}**\n";
        $content .= "**Comparing:** `{$result['yesterday_snapshot']}` -> `{$result['today_snapshot']}`\n\n";
        $content .= "**Red Flags:**\n";

        foreach ($result['flags'] as $flag) {
            $item    = $result['items'][$flag];
            $current = number_format($item['current']);
            $prev    = number_format($item['previous']);
            $delta   = number_format($item['delta']);
            $content .= "**{$flag}**: {$current} (prev: {$prev}, +{$delta})\n";
        }

        try {
            \Http::post($webhookUrl, ['content' => $content]);
        } catch (\Exception $e) {
            \Log::warning("[$result[db]] Failed to send rare item monitor Discord alert: " . $e->getMessage());
        }
    }
}
