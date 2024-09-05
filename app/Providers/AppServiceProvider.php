<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

use function PHPUnit\Framework\isNull;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::directive('formatTanggal', function ($expression) {
            return "<?php echo (!is_null($expression) || !empty($expression)) ? \Carbon\Carbon::parse($expression)->format('d-m-Y') : '-'; ?>";
        });

        Blade::directive('formatTanggalDefault', function ($expression) {
            return "<?php echo is_null($expression) || empty($expression) ? '-' : \Carbon\Carbon::parse($expression)->format('Y-m-d'); ?>";
        });
    }
}
