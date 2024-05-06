<?php

namespace Cswiley\StyleGuide;

use Illuminate\Support\ServiceProvider;

class StyleGuideServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/styleguide.php');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadHelpers();
        //
        $this->app->singleton(StyleGuide::class, function () {
            return new StyleGuide();
        });

        $this->registerController();
        $this->registerViews();
        $this->registerConfigs();
        $this->registerPublish();


    }

    private function loadHelpers()
    {
        foreach (glob(__DIR__ . '/Helpers/*.php') as $filename) {
            require_once $filename;
        }
    }

    public function registerConfigs()
    {
        $this->mergeConfigFrom(
            dirname(__DIR__) . '/publishable/config/styleguide.php', 'styleguide'
        );
    }

    private function registerController()
    {
        $this->app->make('Cswiley\StyleGuide\StyleGuideController');
    }

    private function registerViews()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'styleguide');
    }

    private function registerPublish()
    {
        $publishablePath = dirname(__DIR__) . '/publishable';
        $resourcePath = dirname(__DIR__) . "/resources/";

        $publishable = [
           'assets' => [
               "{$publishablePath}/assets" => public_path(config('styleguide.assets_path'))
           ],
           'config' => [
               "{$publishablePath}/config/styleguide.php" => config_path('styleguide.php'),
           ],
           'views' => [
              "{$resourcePath}/views"  => resource_path('views/vendor/styleguide'),
           ]
        ];

        foreach ($publishable as $label => $val) {
            $this->publishes($val, $label);
        }
    }


}
