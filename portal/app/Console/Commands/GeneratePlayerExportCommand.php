<?php

namespace App\Console\Commands;

use App\Http\HiscoresController;
use App\Services\PlayerExports\PlayerExportService;
use Illuminate\Console\Command;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Carbon;
use function App\Helpers\player_is_online;

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
        $trimmed_username = trim(preg_replace('/[-_.]/', ' ', $username));
        if (player_is_online($db, $trimmed_username)) {
            $this->error("Player export for $trimmed_username on $db could not be created because player is online!");
            return false;
        }
        $playerExport = new PlayerExportService($trimmed_username, $db);
        $playerExport->execute();
        try {
            $playerExport->generateFile();
        } catch (FileNotFoundException $e) {
            $this->error("Player export for $trimmed_username on $db could not be created!");
            $this->error($e->getMessage());
            return false;
        }
        $this->info("Player export for $trimmed_username on $db created successfully! You can find it at: storage/app/" . $playerExport->getBasePath() . $playerExport->getExtraPath() . $playerExport->getFileName());
        return true;
    }
}
