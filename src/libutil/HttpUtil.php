<?php
namespace libutil;

require_once 'index.php';

use GuzzleHttp\Client;


$jar = new \GuzzleHttp\Cookie\CookieJar();

$client = new Client([
    'base_uri' => 'ここにログインURL',
    'timeout' => '3.0',
    'debug' => true,
    'cookies' => $jar
]);

$response = $client->request('POST', 'ここにログインURL', [
    'form_params' => [
        'rm' => 'login',
        'action' => 'execute',
        'form_login' => true,
        'use_cookie' => true,
        'company_id' => 1,
        'redirect_url' => '',
        'use_enterkey_focus' => '',
        'use_default_search' => '',
        'user_code' => ユーザーコード,
        'password' => パスワード,
        'submit' => 'ログイン'
    ]
]);

$response = $client->request('GET', 'ここにアクセスしたいページのURL' );

echo $response->getBody();