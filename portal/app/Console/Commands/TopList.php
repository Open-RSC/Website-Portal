<?php

namespace App\Console\Commands;

use App\Http\HiscoresController;
use Illuminate\Console\Command;

class TopList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'toplist:bi-monthly';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Runescape hiscore tables';

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
     *
     * @return int
     */
    public function handle()
    {
        $dbs = ["2001scape"];
        foreach ($dbs as $db) {
            HiscoresController::createTopList($db, HiscoresController::getTopListFileName($db));
        }

        $this->info('Successfully generated bi-monthly Runescape toplist.');
    }
}
