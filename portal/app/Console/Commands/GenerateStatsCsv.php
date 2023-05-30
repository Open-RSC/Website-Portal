<?php

namespace App\Console\Commands;

use App\Services\Stats\StatsService;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class GenerateStatsCsv extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stats:generate-csv {db}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate stats csv';

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
