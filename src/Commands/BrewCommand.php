<?php

namespace Gp10devhts\LaravelBeer\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

class BrewCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'beer:brew {className : The name of the class to brew (e.g., Hop)} 
                                      {--l|livewire : Brew a Livewire component as well}
                                      {--f|force : Overwrite existing files}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Brews a new Model, Migration, and optionally a Livewire component with a beer theme.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $className = Str::studly($this->argument('className'));
        $makeForce = $this->option('force') ? ['--force' => true] : [];

        $this->info("🍺 Let's get brewing: <fg=yellow>{$className}</>!");

        // Brew Model
        $this->line("-> Brewing Model: <fg=cyan>App\\Models\\{$className}.php</>");
        Artisan::call('make:model', array_merge(['name' => "App\\Models\\".$className], $makeForce), $this->output);

        // Brew Migration
        $migrationName = 'create_' . Str::snake(Str::plural($className)) . '_table';
        $this->line("-> Crafting Migration: <fg=cyan>{$migrationName}</>");
        Artisan::call('make:migration', array_merge(['name' => $migrationName], $makeForce), $this->output);
        // A small delay to ensure migration timestamp is unique if run in rapid succession (though Artisan handles this well)
        sleep(1);


        // Brew Livewire component if requested
        if ($this->option('livewire')) {
            $livewireComponentPath = $className; // Example: "Admin/HopBatch" or just "HopBatch"
             // Users might pass "Foo/Bar" or just "FooBar". Livewire usually handles paths.
            $this->line("-> Adding a special hoppy touch with Livewire component: <fg=cyan>App\\Http\\Livewire\\" . str_replace('/', '\\', $livewireComponentPath) . ".php</>");
            Artisan::call('make:livewire', array_merge(['name' => $livewireComponentPath], $makeForce), $this->output);
        }

        $this->info("🍻 Brew complete! Your <fg=yellow>{$className}</> resources are ready.");
        $this->line("Don't forget to check your new files and run <fg=cyan>php artisan migrate</> when ready!");
        
        return Command::SUCCESS;
    }
}
