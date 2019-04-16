<?php
/**
 * Created by PhpStorm.
 * User: Mead
 * Date: 2019/4/15
 * Time: 9:36 PM
 */

namespace ZhMead\GogsWebhook;

use Illuminate\Support\ServiceProvider;

class GogsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadConfig();
        
        $this->loadRoutesFrom(__DIR__.'/routes.php');
    }

    /**
     * Register config.
     */
    protected function loadConfig()
    {
        $this->publishes([
            __DIR__ . '/../config/gogs-webhook.php' => config_path('gogs-webhook.php'),
        ]);
    }
}