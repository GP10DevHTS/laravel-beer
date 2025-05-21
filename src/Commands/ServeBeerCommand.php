<?php

namespace Gp10devhts\LaravelBeer\Commands;

use Illuminate\Console\Command;
use Gp10devhts\LaravelBeer\BeerService;

class ServeBeerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'beer:serve';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Serves you a virtual cold Nile Beer!';

    /**
     * The BeerService instance.
     *
     * @var \Gp10devhts\LaravelBeer\BeerService
     */
    protected $beerService;

    /**
     * Create a new command instance.
     *
     * @param  \Gp10devhts\LaravelBeer\BeerService  $beerService
     * @return void
     */
    public function __construct(BeerService $beerService)
    {
        parent::__construct();
        $this->beerService = $beerService;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $funMessages = [
            "Remember, 'beauty is in the eye of the beer-holder.' Cheers!",
            "Why did the hipster burn his tongue? He drank his beer before it was cool.",
            "What does a beer lover say to a friend leaving the bar? 'Don't go! I'm still nursing my beer!'",
            "Beer: The cause of, and solution to, all of life's problems. - Homer Simpson (kind of)",
            "Keep calm and beer on!",
            "A cold beer is waiting for you at the finish line of your coding marathon!",
            $this->beerService->getColdNileBeer() // Include the original message
        ];

        $randomIndex = array_rand($funMessages);
        $this->info($funMessages[$randomIndex]);

        return Command::SUCCESS;
    }
}
