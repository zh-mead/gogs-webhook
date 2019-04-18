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
        $path = base_path();

        $signature = $request->header('X-Gogs-Signature', false);
        if (!$signature && !$this->verify_webhook($signature)) {
            exit('tokan is error !');
        }

        $cmd = "cd $path && git pull origin master 2>&1";
        $status = shell_exec($cmd);
        exit($status);
    }

    protected function verify_webhook($hmac_header)
    {
        $token = config('gogs-webhook.webhook.app_secret', false);
        $data = file_get_contents('php://input');
        if (!$token) {
            exit('token is not null!');
        }

        $calculated_hmac = hash_hmac('sha256', $data, $token, false);
        return ((string)$hmac_header === (string)$calculated_hmac);
    }
}