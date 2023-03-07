<?php

namespace Plugins\SweetAlert;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class SweetAlertServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/views', 'sweet');

        $this->publishes([
            __DIR__ . '/../config/sweet-alert.php' => config_path('sweet-alert.php'),
        ], 'config');

        $this->publishes([
            __DIR__ . '/views' => base_path('resources/views/vendor/sweet'),
        ], 'views');

        $this->registerBladeDirectives();
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/sweet-alert.php',
            'sweet-alert'
        );

        $this->app->bind(
            'Plugins\SweetAlert\SessionStore',
            'Plugins\SweetAlert\LaravelSessionStore'
        );

        $this->app->bind('sweetalert', function () {
            return $this->app->make('Plugins\SweetAlert\SweetAlertNotifier');
        });
    }

    public function registerBladeDirectives()
    {
        Blade::directive('sweetalert_css', function ($version) {
            return "<?php echo sweetalert_css($version); ?>";
        });

        Blade::directive('sweetalert_js', function ($version) {
            return "<?php echo sweetalert_js($version); ?>";
        });

        Blade::directive('jquery', function ($arguments) {
            $version = $arguments;

            if (strpos($arguments, ',')) {
                [$version, $src] = explode(',', $arguments);
            }

            if (isset($src)) {
                return "<?php echo jquery($version, $src); ?>";
            }

            return "<?php echo jquery($version); ?>";
        });
    }

    public function provides()
    {
        return [
            'plugins\SweetAlert\Src\SessionStore',
            'sweetalert',
        ];
    }
}
