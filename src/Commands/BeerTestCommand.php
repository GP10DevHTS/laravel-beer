<?php

namespace Gp10devhts\LaravelBeer\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class BeerTestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'beer:test {--passthru : Pass all remaining options to the artisan test command}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Runs the application tests, with a beer-themed warm-up.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->line("🍺 Preparing a fresh brew of tests...");
        $this->line("Let's hope everything is to your taste!");

        $asciiArt = "
    .~~~~.
    i'~~~~'i
    |SECTION|___
    |SECTION|___|
    |SECTION|___|
    |SECTION|___|
    |SECTION|___|
    |SECTION|___|
    '._____.'";

        $this->line("<fg=yellow>" . $asciiArt . "</>");
        $this->info("Running tests now. May your tests be green like a field of hops!");
        
        // Collect all arguments and options passed to beer:test
        $arguments = $this->input->getArguments();
        $options = $this->input->getOptions();
        
        // Remove 'command' argument and passthru option as they are for beer:test itself
        unset($arguments['command']);
        // Passthru option is not needed for the actual test command
        unset($options['passthru']);


        // Prepare options for Artisan::call. It expects options in a specific format.
        // E.g. --coverage becomes 'coverage' => true
        $testOptions = [];
        foreach ($options as $key => $value) {
            if ($value === true) { // For options like --coverage
                $testOptions['--' . $key] = true;
            } elseif ($value !== false && $value !== null) { // For options with values
                 $testOptions['--' . $key] = $value;
            }
        }
        
        // If there are arguments (like specific test files), they are usually passed directly
        // For 'test' command, arguments are typically file paths.
        // We need to check how 'artisan test' handles these.
        // For simplicity, this example focuses on options.
        // If specific file paths are needed, they would be part of $arguments
        // and might need specific formatting for Artisan::call.

        // Pass through arguments and options to 'php artisan test'
        // The passthru option allows users to use any of php artisan test's own options
        if ($this->option('passthru') && method_exists($this->input, 'getRawTokens')) {
            // A more direct passthrough if available and needed, complex to implement robustly here.
            // For now, we'll rely on parsing known options.
            // The raw tokens could be passed to a new Process instance if extreme fidelity is needed.
        }
        
        // For 'test' command, remaining arguments after command name are test file paths.
        // We need to filter out the command name itself from $arguments if present.
        $testArguments = array_values(array_filter($arguments, function($key) {
            return $key !== 'command';
        }, ARRAY_FILTER_USE_KEY));


        // Reconstruct arguments for 'test' command if any (e.g. specific test files)
        // This part can be tricky as `artisan test` might take specific argument names
        // or just a list of paths. For now, assume direct passthrough of remaining args.
        $artisanCallArgs = [];
        if(!empty($testArguments[0])) { // Assuming first arg after command is the path/filter
            // This is a simplified way; `artisan test` might have named arguments.
            // For robust passthrough, one might need to inspect `artisan test` signature.
            $artisanCallArgs['--filter'] = $testArguments[0]; // Example, if test takes a filter.
                                                          // Or it could be 'path' => $testArguments[0]
        }


        // Merge options into the arguments array for Artisan::call
        $artisanCallArgs = array_merge($artisanCallArgs, $testOptions);
        
        // Execute the test command
        $exitCode = Artisan::call('test', $artisanCallArgs, $this->output);

        if ($exitCode === 0) {
            $this->info("✅ Cheers! All tests passed. Your code is brewery-fresh!");
        } else {
            $this->error("🍻 Uh oh! Some tests failed. Time to debug - maybe grab another cold one.");
        }

        return $exitCode;
    }
}
