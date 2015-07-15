<?php
require_once 'vendor/autoload.php';
require_once 'db.php';

if (!$_SESSION['logged'])
{
	header('login.php');
}

$id = $_POST['id'];
if ($id) 
{
	$stmt = $DB->prepare('delete from files_info where id = :id');
	$stmt->execute(array('id' => $id));
}


$stmt = $DB->prepare('select * from files_info');
$stmt->execute();

$files = $stmt->fetchAll();
// var_dump($files);

$smarty = new Smarty();	
$smarty->assign('files', $files);

$smarty->display('file_mgr.tpl');
