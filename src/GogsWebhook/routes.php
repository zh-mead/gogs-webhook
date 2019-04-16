<?php

Route::post('/gogs-webhook', '\ZhMead\GogsWebhook\Controllers\WebHookController@handle');