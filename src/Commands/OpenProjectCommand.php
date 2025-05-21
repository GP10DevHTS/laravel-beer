<?php

namespace Gp10devhts\LaravelBeer\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class OpenProjectCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'beer:open';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Serves the Laravel project (like php artisan serve) with a beer theme.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info("🍺 Tapping a fresh keg and firing up the server...");
        $this->line("Get ready to enjoy your project, served chilled!");
        
        // This will run 'php artisan serve' and display its output directly.
        // The command will continue to run until 'php artisan serve' is stopped (e.g., Ctrl+C).
        return Artisan::call('serve', [], $this->output);
    }
}
