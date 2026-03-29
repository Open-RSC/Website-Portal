<?php

namespace App\Console\Commands;

use App\Services\Stats\StatsService;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('stats:generate {db}')]
#[Description('Generate stats')]
class GenerateStats extends Command
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

        return true;
    }
}
