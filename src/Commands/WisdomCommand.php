<?php

namespace Gp10devhts\LaravelBeer\Commands;

use Illuminate\Console\Command;

class WisdomCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'beer:wisdom';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Shares a piece of beer-related wisdom or coding philosophy.';

    /**
     * Beer-related wisdom and quotes.
     *
     * @var array
     */
    protected $wisdomQuotes = [
        "A bug in the code is like a warm beer. Unpleasant, but eventually, you'll deal with it.",
        "Code without tests is like a beer without a head. Something's missing.",
        "The best debugger ever made is a rubber duck... and maybe a cold beer. 🍺",
        "To err is human, to deploy to production on a Friday is... also human, but less advisable. Have a beer first.",
        "In beer We Trust. All others must provide data.",
        "Programming is 1% inspiration and 99% trying to remember where you left your beer.",
        "May your code be clean, your commits frequent, and your beer always cold."
    ];

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $randomIndex = array_rand($this->wisdomQuotes);
        $this->line("🍺 <fg=yellow>Beer Wisdom:</> " . $this->wisdomQuotes[$randomIndex]);
        return Command::SUCCESS;
    }
}
