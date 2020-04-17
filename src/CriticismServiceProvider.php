<?php

namespace PalTakacs\Criticism;

use Illuminate\Support\ServiceProvider;

class CriticismServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            if (! class_exists('CreateCommentTables')) {
                $timestamp = date('Y_m_d_His', time());
                $this->publishes([
                    __DIR__.'/../database/migrations/create_comment_tables.php.stub' => database_path('migrations/'.$timestamp.'_create_comment_tables.php'),
                ], 'migrations');
            }

            $this->publishes([
                __DIR__.'/../config/criticism.php' => config_path('criticism.php'),
            ], 'config');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
    }
}
