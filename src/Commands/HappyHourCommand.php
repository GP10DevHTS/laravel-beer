<?php

namespace Gp10devhts\LaravelBeer\Commands;

use Illuminate\Console\Command;

class HappyHourCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'beer:happy-hour';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Announces happy hour or displays a fun related message.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $messages = [
            "It's Beer O'Clock Somewhere! 🍻 Why not take a short break?",
            "Time for a virtual pint! You've earned it. Cheers!",
            "Happy Hour is the best hour! Hope you're having a great coding day!",
            "Ding ding ding! 🔔 Happy Hour has officially begun (in our hearts)!",
            "Don't worry, be hoppy! It's always happy hour for a developer with a plan."
        ];
        
        $asciiArt = "
  oO0OoO0OoO0Oo.
 .O0o.o0.oO0o.O0o.
.o0O.''.'.''.'O0o.
oO0o.'.''.''.'oO0o
O0o.'.''.''.'.o0Oo
o0O'.''.''.''.O0_o
.\`---------------\`¹.
 \ `-------------\` /
  \  ###########  /
   \ ########### /
    \ _________ /
     \`---------¹";

        if (rand(0, 1) == 0) { // Randomly pick between a message or art
            $this->info($messages[array_rand($messages)]);
        } else {
            $this->line("<fg=yellow>" . $asciiArt . "</>");
            $this->info("Ah, the sweet sight of a cold one. Happy Coding Hour!");
        }
        
        return Command::SUCCESS;
    }
}
