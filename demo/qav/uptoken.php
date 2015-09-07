<?php
require_once __DIR__.'/vendor/autoload.php';
require_once 'config.php';

use Qiniu\Auth;

header('Access-Control-Allow-Origin:*');
$bucket = Config::BUCKET_NAME;
$auth = new Auth(Config::AK, Config::SK);

//notify url
$wmImg = Qiniu\base64_urlSafeEncode('http://rwxf.qiniudn.com/logo-s.png');
$pfopOps = "avthumb/m3u8/wmImage/$wmImg";
$policy = array(
    'persistentOps' => $pfopOps,
    'persistentNotifyUrl' => 'http://172.30.251.210:8080/cb.php',
    'persistentPipeline' => 'abc',
);

$upToken = $auth->uploadToken($bucket, null, 3600, $policy);

echo json_encode(array('uptoken' => $upToken));
