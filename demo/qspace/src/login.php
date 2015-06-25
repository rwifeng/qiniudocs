<?php
require_once 'db.php';

session_start();

$uname = $_POST['uname'];
$_pwd = $_POST['pwd'];

$salt = 'Qiniu' . $uname;
$pwd = crypt($_pwd, $salt);

$stmt = $DB->prepare('select * from users where uname = :name');
$stmt->execute(array('name' => $uname));

$user = $stmt->fetch();

if ($user['password'] !== $pwd) 
{
    echo 'failed';
    die();
}

$_SESSION['uid'] = $user['uid'];

