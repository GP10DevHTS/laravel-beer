# Laravel Beer 🍺

A Laravel package for developers who love **Nile beer** and clean code. Enjoy coding with a cold brew in hand, and let Laravel do the heavy lifting.

Made for **Nugsoft's Start of Year 2025**. 🍻

## Installation:
1. Grab a **Nile beer** 🍻.
2. Install Composer: [Composer Installation](https://getcomposer.org)
3. Run:
    ```bash
    composer require gp10devhts/laravel-beer
    ```

Enjoy your code, enjoy your beer!

## Usage

This package provides a `BeerService` that you can use to get a friendly beer-related message.

### 1. Dependency Injection

You can inject `Gp10devhts\LaravelBeer\BeerService` into your controllers or other classes:

```php
<?php

namespace App\Http\Controllers;

use Gp10devhts\LaravelBeer\BeerService; // Import the service
use Illuminate\Http\Request;

class YourController extends Controller
{
    protected $beerService;

    public function __construct(BeerService $beerService)
    {
        $this->beerService = $beerService;
    }

    public function showBeerMessage(Request $request)
    {
        $message = $this->beerService->getColdNileBeer();
        // Example: return to a view
        return view('your-view', ['beerMessage' => $message]);
        // Or, return as JSON
        // return response()->json(['message' => $message]);
    }
}
```

### 2. Using `app()` or `resolve()` Helpers

You can also resolve the service directly from Laravel's service container:

```php
// Using the app() helper
$beerService = app(Gp10devhts\LaravelBeer\BeerService::class);
$message = $beerService->getColdNileBeer();
// echo $message; // "Here's a cold Nile Beer for you!"

// Or using the resolve() helper
$anotherBeerServiceInstance = resolve(Gp10devhts\LaravelBeer\BeerService::class);
$anotherMessage = $anotherBeerServiceInstance->getColdNileBeer();
// echo $anotherMessage; // "Here's a cold Nile Beer for you!"
```

The `BeerService` is registered as a singleton, so you'll always receive the same instance within a single request lifecycle.

### 3. Using the Artisan Command

This package also comes with a fun Artisan command to serve you a virtual beer message directly in your terminal!

To use it, simply run:

```bash
php artisan beer:serve
```

This will display a random beer-related quote, a fun message, or the classic "Here's a cold Nile Beer for you!" message.
