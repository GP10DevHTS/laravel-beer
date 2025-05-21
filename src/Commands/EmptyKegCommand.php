<?php

namespace Gp10devhts\LaravelBeer\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class EmptyKegCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'beer:empty-keg';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clears application caches (like emptying old kegs).';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info("🛢️ Time to empty the old kegs and make way for fresh brews!");
        
        $this->line("Running <fg=cyan>php artisan view:clear</>...");
        Artisan::call('view:clear');
        $this->info(Artisan::output());

        $this->line("Running <fg=cyan>php artisan cache:clear</>...");
        Artisan::call('cache:clear');
        $this->info(Artisan::output());

        $this->info("✔️ All clear! The kegs are empty and ready for a fresh batch of code.");
        
        return Command::SUCCESS;
    }
}
