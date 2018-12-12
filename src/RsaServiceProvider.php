<?php 
namespace Radish\Rsa\Larave;

use Illuminate\Support\ServiceProvider;

/**
 * @author Radish
 */
class RsaServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/rsa.php' => config_path('rsa.php'),
        ], 'config');
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/config/rsa.php', 'rsa'
        );
    }
}