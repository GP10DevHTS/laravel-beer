<?php

namespace Gp10devhts\LaravelBeer\Commands;

use Illuminate\Console\Command;

class CheersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'beer:cheers {name?}'; // Optional name argument

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends a cheers message, optionally personalized.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->argument('name');
        $beerEmoji = "🍻"; // Beer emoji

        if ($name) {
            $this->info("{$beerEmoji} Cheers, " . ucfirst($name) . "! May your code flow as smoothly as a well-poured pint.");
        } else {
            $this->info("{$beerEmoji} Cheers, mate! Wishing you bug-free coding sessions.");
        }

        return Command::SUCCESS;
    }
}
