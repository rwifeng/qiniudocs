<?php
require_once 'vendor/autoload.php';
require_once 'db.php';

session_start();

$smarty = new Smarty();

if(!isset($_POST['uname']) && !isset($_POST['pwd']))
{
	// $smarty->assign('error', 'please input username & password!');
	$smarty->display('login.tpl');
	exit;
}

$uname = $_POST['uname'];
$_pwd = $_POST['pwd'];

$salt = 'Qiniu' . $uname;
$pwd = crypt($_pwd, $salt);

$stmt = $DB->prepare('select * from users where uname = :name and password = :pwd and status = 1 and type = 1');
$stmt->execute(array('name' => $uname, 'pwd' => $pwd));


if($stmt->rowCount() == 1)
{ 
	$user = $stmt->fetch();
    session_start(); 
	$_SESSION['uid'] = $user['uid'];
	$_SESSION['uname'] = $uname;
    $_SESSION['logged']   = TRUE; 
    header('Location: file_mgr.php');
    exit;
} else {
	$smarty->assign('error', 'incorrect username or password!');
	$smarty->display('login.tpl');
	exit;
}

