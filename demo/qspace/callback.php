<?php
require_once 'db.php';

$_body = file_get_contents('php://input');
$body = json_decode($_body, true);

$uid = $body['uid'];
$fname = $body['fname'];
$fkey = $body['fkey'];
$desc = $body['desc'];

$date = new DateTime();
$ctime = $date->getTimestamp();

$stmt = $DB->prepare('INSERT INTO files_info (uid, fname, fkey, createTime, description) VALUES (:uid, :fname, :fkey, :ctime, :desc);');
$ok = $stmt->execute(array('uid' => $uid, 'fname' => $fname, 'fkey' => $fkey, 'ctime' => $ctime, 'desc' => $desc));

header('Content-Type: application/json');
if (!$ok)
{
	$resp = $DB->errorInfo();
	http_response_code(500);
	echo json_encode($resp);
	return;
}

$resp = array('ret' => 'success');
echo json_encode($resp);
