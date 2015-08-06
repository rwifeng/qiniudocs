<?php
require_once  'vendor/autoload.php';
header('Access-Control-Allow-Origin:*');

use Qiniu\Auth;

$bucket = 'devtest';
$accessKey = 'Access_Key';
$secretKey = 'Secret_Key';
$auth = new Auth($accessKey, $secretKey);


//$upToken = $auth->uploadToken($bucket);

$policy = array(
    'returnUrl' => 'http://127.0.0.1/demo/simpleuploader/fileinfo.php',
    'returnBody' => '{"fname": $(fname)}',
);
$upToken = $auth->uploadToken($bucket, null, 3600, $policy);

echo $upToken;
