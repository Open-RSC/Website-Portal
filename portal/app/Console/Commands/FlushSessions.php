<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

#[Signature('session:flush')]
#[Description('Flush all user sessions')]
class FlushSessions extends Command
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
     *
     * @return mixed
     */
    public function handle(): void
    {
        $driver = config('session.driver');
        $method_name = 'clean'.ucfirst($driver);
        if (method_exists($this, $method_name)) {
            try {
                $this->$method_name();
                $this->info('Session data cleaned at '.Carbon::now()->format('Y-m-d h:iA'));
            } catch (\Exception $e) {
                $this->error($e->getMessage());
            }
        } else {
            $this->error("Sorry, I don't know how to clean the sessions of the driver '{$driver}'.");
        }
    }

    protected function cleanFile()
    {
        $directory = config('session.files');
        $ignoreFiles = ['.gitignore', '.', '..'];

        $files = scandir($directory);

        foreach ($files as $file) {
            if (! in_array($file, $ignoreFiles)) {
                unlink($directory.'/'.$file);
            }
        }
        $this->info('Successfully cleaned file-based sessions at '.Carbon::now()->format('Y-m-d h:iA'));
    }

    protected function cleanDatabase()
    {
        $table = config('session.table');
        DB::table($table)->truncate();
        $this->info('Successfully cleaned database-based sessions at '.Carbon::now()->format('Y-m-d h:iA'));
    }
}
