<?php

/**
 * Created by PhpStorm.
 * User: Mead
 * Date: 2019/4/15
 * Time: 10:00 PM
 */

namespace ZhMead\GogsWebhook;

use Illuminate\Support\Facades\Facade;

class GogsWebhook extends Facade
{
    public static function routes()
    {
        self::$app->make('router')->post('/gogs-webhook', [
            'uses' => '\ZhMead\GogsWebhook\Controllers\WebHookController@handle',
            'as' => 'gogs.webhook',
        ]);
    }
}