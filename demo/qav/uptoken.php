<?php
require_once __DIR__.'/vendor/autoload.php';
require_once 'config.php';

use Qiniu\Auth;

header('Access-Control-Allow-Origin:*');
$bucket = Config::BUCKET_NAME;
$auth = new Auth(Config::AK, Config::SK);

//notify url
$policy = array(
    'persistentOps' => 'avthumb/m3u8',
    'persistentNotifyUrl' => 'http://172.30.251.210:8080/cb.php',
);

$upToken = $auth->uploadToken($bucket, null, 3600, $policy);

echo json_encode(array('uptoken' => $upToken));
