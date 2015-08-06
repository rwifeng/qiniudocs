<?php
require_once  'vendor/autoload.php';
header('Access-Control-Allow-Origin:*');

use Qiniu\Auth;

$bucket = 'devtest';
$accessKey = 'XI0n2kV1LYwzcxqSZQxJ7bpycxDIAXFGJMWUt_zG';
$secretKey = '9WTmIAiwKQ2Nq6o93mfKd6VQqq56HjjLZonMWLJl';
$auth = new Auth($accessKey, $secretKey);


//$upToken = $auth->uploadToken($bucket);

$policy = array(
    'returnUrl' => 'http://127.0.0.1/demo/simpleuploader/fileinfo.php',
    'returnBody' => '{"fname": $(fname)}',
);
$upToken = $auth->uploadToken($bucket, null, 3600, $policy);

echo $upToken;
