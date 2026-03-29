<?php

namespace App\Console\Commands;

use App\Http\HiscoresController;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('toplist:bi-monthly')]
#[Description('OpenRSC hiscore tables')]
class TopList extends Command
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
        $dbs = ['2001scape'];
        foreach ($dbs as $db) {
            HiscoresController::createTopList($db, HiscoresController::getTopListFileName($db));
        }

        $this->info('Successfully generated bi-monthly OpenRSC toplist.');
    }
}
