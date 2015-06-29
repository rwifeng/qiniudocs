<?php

$id = $_GET['id'];
$url = "http://api.qiniu.com/status/get/prefop?id=$id";

$resp = file_get_contents($url);

error_log($resp);

header("Access-Control-Allow-Origin:*");
echo $resp;

