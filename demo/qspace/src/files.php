<?php
require_once 'db.php';

session_start();

$uid = $_SESSION['uid'];
if(!isset($uid))
{
       header('location: login.php');
          return;
}

//$offset = $_POST['start'];
//$count = 10;

$stmt = $DB->prepare('select * from files_info where uid = :uid');
$stmt->execute(array('uid' => $uid));

$files = $stmt->fetchAll();

echo json_encode($files);
