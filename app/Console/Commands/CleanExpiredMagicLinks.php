<?php
namespace App\Console\Commands;

use App\Models\MagicLink;
use Illuminate\Console\Command;

class CleanExpiredMagicLinks extends Command
{
    protected $signature = 'magiclinks:clean';
    protected $description = 'Delete expired magic links';

    public function handle()
    {
        $deleted = MagicLink::where('expires_at', '<', now())
            ->orWhere('used', true)
            ->delete();

        $this->info("Deleted {$deleted} expired magic links.");
    }
}