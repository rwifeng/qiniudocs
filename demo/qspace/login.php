<?php
require_once 'db.php';

session_start();

if(!isset($_POST['uname']) && !isset($_POST['pwd']))
{
	http_response_code(401);
	$resp = array('status' => 'failed', 'msg' => 'please input username & password!');
	echo json_encode($resp);
	return;
}

$uname = $_POST['uname'];
$_pwd = $_POST['pwd'];

$salt = 'Qiniu' . $uname;
$pwd = crypt($_pwd, $salt);

$stmt = $DB->prepare('select * from users where uname = :name');
$stmt->execute(array('name' => $uname));

$user = $stmt->fetch();

if ($user['password'] !== $pwd)
{
	http_response_code(401);
	$resp = array('status' => 'failed', 'msg' => 'incorrect username or password!');
	echo json_encode($resp);
	return;
}

$_SESSION['uid'] = $user['uid'];
$_SESSION['uname'] = $uname;

$resp = array('status' => 'ok', 'uname' => $uname);
echo json_encode($resp);