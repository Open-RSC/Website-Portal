<?php

namespace App\Console\Commands;

use App\Models\InviteCode;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

#[Signature('invite:generate {count=5 : The number of invite codes to generate}')]
#[Description('Generates multiple invite codes.')]
class GenerateInviteCodes extends Command
{
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
