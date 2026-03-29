<?php

namespace App\Console\Commands;

use App\Services\Stats\StatsService;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

#[Signature('stats:generate-csv {db}')]
#[Description('Generate stats csv')]
class GenerateStatsCsv extends Command
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
        $statsService = new StatsService($db);
        $statsService->execute();
        if ($statsService->makeCsv()) {
            $this->info("Successfully generated stats CSV for $db at ".Carbon::now()->format('Y-m-d_h:i A'));

            return true;
        }
        $this->error("Failed to generate stats CSV for $db at ".Carbon::now()->format('Y-m-d_h:i A'));

        return false;
    }
}
