<?php
require_once __DIR__.'/vendor/autoload.php';
require_once 'config.php';
require_once 'db.php';



$stmt = $DB->prepare('select * from videos where parentId = 0 limit 10');
$stmt->execute();

while($file = $stmt->fetch()) 
{
    qlog($file);
}





$smarty = new Smarty();
$smarty->assign('domain', Config::DOMAIN);
$smarty->assign('uptokenUrl', Config::UPTOKEN_URL);


$smarty->display('index.tpl');

function qlog($e)
{
    error_log(print_r($e, true));
}