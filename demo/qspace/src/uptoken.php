<?php
require_once __DIR__.'/../vendor/autoload.php';
require_once 'db.php';

use Qiniu\Auth;

session_start();
$uid = $_SESSION['uid'];
if(!isset($uid))
{
   header('location: login.php');
   return;
}

header('Access-Control-Allow-Origin:*');
$bucket = 'devtest';
$accessKey = 'eSnBeEIyUqGGtidOTmsgQCwE23gjUDNJlsI6_mz9';
$secretKey = 'd4eyXtO4JF_XaLkpNAWHnzygOcBbkx_Ywlhi8sKr';
$auth = new Auth($accessKey, $secretKey);

$upToken = $auth->uploadToken($bucket);

echo $upToken;
