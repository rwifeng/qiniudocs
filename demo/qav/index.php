<?php
require_once __DIR__.'/vendor/autoload.php';
require_once 'config.php';

$smarty = new Smarty();
$smarty->assign('domain', Config::DOMAIN);
$smarty->assign('uptokenUrl', Config::UPTOKEN_URL);


$smarty->display('index.tpl');

