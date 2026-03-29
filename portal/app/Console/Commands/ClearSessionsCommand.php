<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;

#[Signature('sessions:clear')]
#[Description('Clear login sessions')]
class ClearSessionsCommand extends Command
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
        $files = File::allFiles(storage_path('framework/sessions/'));
        foreach ($files as $file) {
            if ($file->getFilename() !== '.gitignore') {
                File::delete(storage_path('framework/sessions/'.$file->getFilename()));
            }
        }
        $this->info('Successfully cleared file-based sessions at '.Carbon::now()->format('Y-m-d h:iA'));

        return true;
    }
}
