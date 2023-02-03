<?php

namespace App\Console\Commands;

use App\Http\HiscoresController;
use App\Services\Stats\StatsService;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class GenerateStats extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stats:generate {db}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate stats';

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
     * @return bool
     */
    public function handle()
    {
        $db = $this->argument('db');
        $statsService = new StatsService($db);
        $statsService->execute();
        return true;
    }
}
