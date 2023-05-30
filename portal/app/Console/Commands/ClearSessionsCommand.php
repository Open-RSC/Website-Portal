<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;

class ClearSessionsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sessions:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear login sessions';

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
     * @return bool
     */
    public function handle()
    {
        $files = File::allFiles(storage_path('framework/sessions/'));
        foreach ($files as $file) {
            if ($file->getFilename() !== '.gitignore') {
                File::delete(storage_path('framework/sessions/'.$file->getFilename()));
            }
        }
        $this->info('Successfully cleared sessions at '.Carbon::now()->format('Y-m-d h:iA'));

        return true;
    }
}
