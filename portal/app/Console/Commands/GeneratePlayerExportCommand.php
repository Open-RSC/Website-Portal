<?php

namespace App\Console\Commands;

use App\Http\HiscoresController;
use App\Services\PlayerExports\PlayerExportService;
use Illuminate\Console\Command;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Carbon;

class GeneratePlayerExportCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'playerexport:generate {db} {username}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate player export';

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
        $username = $this->argument('username');
        $playerExport = new PlayerExportService($username, $db);
        $playerExport->execute();
        try {
            $playerExport->generateFile();
        } catch (FileNotFoundException $e) {
            $this->error("Player export for $username on $db could not be created!");
            $this->error($e->getMessage());
            return;
        }
        $this->info("Player export for $username on $db created successfully! You can find it at: storage/app/" . $playerExport->getBasePath() . $playerExport->getExtraPath() . $playerExport->getFileName());
        return true;
    }
}
