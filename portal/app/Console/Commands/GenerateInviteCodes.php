<?php

namespace App\Console\Commands;

use App\Models\InviteCode;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class GenerateInviteCodes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'invite:generate {count=5 : The number of invite codes to generate}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates multiple invite codes.';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $count = $this->argument('count');
        $this->info("Generating {$count} invite codes...");

        for ($i = 0; $i < $count; $i++) {
            $inviteCode = Str::uuid()->toString();
            InviteCode::create(['code' => $inviteCode]);
        }

        $this->info("Successfully generated {$count} invite codes.");

        return 0;
    }
}
