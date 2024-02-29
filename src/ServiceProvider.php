<?php

declare(strict_types=1);

namespace OptimizeAll;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/optimize-all-command.php', 'optimize-all-command');
    }

    public function boot(): void
    {
        $this->commands([
            OptimizeAllCommand::class,
        ]);

        if ($this->app->runningInConsole()) {
            $this->configurePublishing();
        }
    }

    private function configurePublishing(): void
    {
        // config
        $this->publishes([
            __DIR__.'/../config/optimize-all-command.php' => $this->app->configPath('optimize-all-command.php'),
        ], 'optimize-all-command-config');
    }
}
