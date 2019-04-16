<?php

/**
 * Created by PhpStorm.
 * User: Mead
 * Date: 2019/4/15
 * Time: 9:47 PM
 */

namespace ZhMead\GogsWebhook\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class WebHookController extends Controller
{
    public function handle(Request $request)
    {
        $path = config('gogs-webhook.webhook.path', base_path());
        $token = config('gogs-webhook.webhook.token', false);
        if (!$token) {
            exit('error request');
        }

//        $json = json_decode(file_get_contents('php://input'), true);

//        if (empty($json['token']) || $json['token'] !== $token) {
//            exit('error request');
//        }

        $cmd = "cd $path && git pull 2>&1";
        exit($cmd);
        $status = shell_exec($cmd);
        exit($status);
        print $status;
    }
}