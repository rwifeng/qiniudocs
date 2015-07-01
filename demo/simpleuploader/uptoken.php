<?php
require_once  'vendor/autoload.php';
header('Access-Control-Allow-Origin:*');

use Qiniu\Auth;

$bucket = 'devtest';
$accessKey = 'eSnBeEIyUqGGtidOTmsgQCwE23gjUDNJlsI6_mz9';
$secretKey = 'd4eyXtO4JF_XaLkpNAWHnzygOcBbkx_Ywlhi8sKr';
$auth = new Auth($accessKey, $secretKey);


//$upToken = $auth->uploadToken($bucket);

$policy = array(
    'returnUrl' => 'http://127.0.0.1/demo/simpleuploader/fileinfo.php',
    'returnBody' => '{"fname": $(fname)}',
);
$upToken = $auth->uploadToken($bucket, null, 3600, $policy);

echo $upToken;