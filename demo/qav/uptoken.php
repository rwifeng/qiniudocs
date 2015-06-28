<?php
require_once __DIR__.'/vendor/autoload.php';
require_once 'config.php';

use Qiniu\Auth;

header('Access-Control-Allow-Origin:*');
$bucket = Config::BUCKET_NAME;
$auth = new Auth(Config::AK, Config::SK);

$upToken = $auth->uploadToken($bucket);

echo json_encode(array('uptoken' => $upToken));
