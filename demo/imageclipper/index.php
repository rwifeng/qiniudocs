<?php

date_default_timezone_set('China/Shanghai');

require 'vendor/autoload.php';

use Qiniu\Auth;
use Qiniu\Storage\BucketManager;
use Qiniu\Http\Client;

session_start();

$query = $_SERVER["QUERY_STRING"];

if (startsWith($query, 'login')) {

	$_SESSION['ak'] = $_POST['ak'];
	$_SESSION['sk'] = $_POST['sk'];
	$_SESSION['bucket'] = $_POST['bucket'];
	$_SESSION['domain'] = $_POST['domain'];

} else if (startsWith($query, 'fop')) {

	$_SESSION['mode'] = $_POST['mode'];
	$_SESSION['width'] = $_POST['width'];
	$_SESSION['height'] = $_POST['height'];

} else if (startsWith($query, 'sn')) {

	$_SESSION['sn'] = $_GET['sn'];

}

$ak = $_SESSION['ak'];
$sk = $_SESSION['sk'];
$bucket = $_SESSION['bucket'];
$domain = $_SESSION['domain'];

$mode = $_SESSION['mode'];
$width = $_SESSION['width'];
$height = $_SESSION['height'];

$sn = $_SESSION['sn'];

console_log("Access Info: $ak, $sk, $bucket");
console_log("Op Info: $mode, $width, $height");
console_log("Selected File: $sn");

$auth = new Auth($ak, $sk);
$bm = new BucketManager($auth);

list($items, $marker, $err) = $bm->listFiles($bucket); // 尝试列举空间中的文件

if ($err != null) {
	//echo "列举文件失败：(".$err->code().") ".$err->message();
} else {

	// 过滤出若干张jpg图片用于展示。

	foreach ($items as $item) {
		if ($item['mimeType'] == 'image/jpeg') {
			$pics[] = $item;
			if (count($pics) >= 10) {
				break;
			}
		}
	}
}


//var_dump($pics);

$smarty = new Smarty();

// 简单的判断是否运行于SAE环境中,因为SAE中不允许写本地,需要额外处理.
if (defined('SAE_TMP_PATH')) {

	console_log("SAE_TMP_PATH: ".SAE_TMP_PATH);

	$smarty->compile_dir = SAE_TMP_PATH;
	$smarty->cache_dir = SAE_TMP_PATH;
}

//$smarty->testInstall(); exit;

$smarty->assign('ak', $ak);
$smarty->assign('sk', $sk);
$smarty->assign('bucket', $bucket);
$smarty->assign('domain', $domain);

$smarty->assign('pics', $pics);

if (count($pics) > 0) {
	$smarty->assign('sn', $sn);

	// Properties

	$props['key'] = $sn;

	list($ret, $err) = $bm->stat($bucket, $sn);
	if ($err == null) {
		$props['stat:fsize'] = $ret['fsize'];
		$props['stat:hash'] = $ret['hash'];
		$props['stat:mimeType'] = $ret['mimeType'];
		$props['stat:putTime'] = gmdate("Y-m-d H:i:s", $ret['putTime'] / 10000000);
	}

	// NROP

	$ret = Client::get("http://$domain/$sn?nrop");
	if ($ret->ok()) {

        $json = $ret->json();
        $boolarray = Array(false => 'false', true => 'true');

		$props['nrop:code(0：调用成功)'] = $json['code'];
		$props['nrop:label(0：色情；1：性感；2：正常)'] = $json['fileList'][0]['label'];
		$props['nrop:rate(概率)'] = $json['fileList'][0]['rate'];
		$props['nrop:review(人工复审?)'] = $boolarray[$json['fileList'][0]['review']];
	} else {
		$props['nropfailure'] = $ret->body;
	}

	// EXIF

	$ret = Client::get("http://$domain/$sn?exif");
	$props['exif'] = $ret->body;

	$smarty->assign('props', $props);
}

if ($mode != null) {
	$smarty->assign('mode', $mode);

	if ($width != null) {
		$smarty->assign('width', $width);
	}

	if ($height != null) {
		$smarty->assign('height', $height);
	}
}


$smarty->display('index.tpl');

function console_log($data)
{
    if (is_array($data) || is_object($data)) {
        echo("<script>console.log('".json_encode($data)."');</script>");
    } else {
        echo("<script>console.log('".$data."');</script>");
    }
}

function startsWith($haystack, $needle) {
    // search backwards starting from haystack length characters from the end
    return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== FALSE;
}

?>
