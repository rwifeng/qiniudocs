#Qiniu SDK for PHP 开发指南

该指南专注于 Qiniu SDK for PHP 的基本使用方法。完成本文档阅读后，您将可以在应用中使用该 SDK。

如果在此之前您对七牛的产品尚无了解，建议在阅读本文档之前先阅读新手指南的这几部分：[关键概念](http://developer.qiniu.com/docs/v6/api/overview/concepts.html)、[编程模型](http://developer.qiniu.com/docs/v6/api/overview/programming-model.html)、[安全机制](http://developer.qiniu.com/docs/v6/api/overview/security.html)。该文档假设您已[安装 SDK ](installation.html)，且已[注册一个七牛帐号](https://portal.qiniu.com/signup)，并已在管理平台上[获取一对Access Key和Secret Key](https://portal.qiniu.com/setting/key)。

## Hello, World!

在了解了基本概念和编程模型后，我们现在以最短的篇幅将第一个云存储服务的示例程序跑起来。该示例只有一个最简单的目标：将一个本地小文件上传到指定的存储空间中。

### 提交页面

我们先写一个简单的 HTML 表单来供用户输入存储空间信息并选择一个本地文件。在点击提交按钮后，浏览器会发送一个 HTTP 请求到指定的 upload.php 页面来执行文件上传动作。

```html
<form action="upload.php" method="post" enctype="multipart/form-data" name="form1" id="form1">  
  <input type="hidden" name="MAX_FILE_SIZE" value="4000000"> 
  <table border="2">
      <tr><td>AcessKey:</td> <td><input name="ak" type="text" /></td></tr>
      <tr><td>SecretKey:</td><td><input name="sk" type="text" /></td></tr>
      <tr><td>空间:</td><td><input name="bucket" type="text" value="qiniudemo" /></td></tr>
      <tr><td>空间对应域名:</td><td><input name="domain" type="text" /></td></tr>
      <tr><td>文件（小于4MB）:</td><td><input name="userfile" type="file" /></td></tr>
      <tr><td></td><td align="center"><br><input type="submit" value="上传" /></td></tr>
  </table>
</form> 
```

### 上传动作

在 upload.php 接收到提交的表单后，就要按表单中的内容进行文件的上传工作了。完成这个工作需要两步动作：获取上传授权、上传文件。这两个动作涉及到 SDK 中提供的两个类：[`Qiniu\Auth`](api/class-Qiniu.Auth.html) 和 [`Qiniu\Storage\UploadManager`](api/class-Qiniu.Storage.UploadManager.html)。

关键代码如下所示：

```php
$auth = new Auth($_POST['ak'], $_POST['sk']);
$token = $auth->uploadToken($_POST['bucket'], null, 3600, null);
$uploadManager = new UploadManager();

list($ret, $err) = $uploadManager->putFile($token, null, $_FILES['userfile']['tmp_name']);

if ($err != null) {
    echo "上传失败。错误消息：".$err->message();
    exit;
}
```
可以看出，以上代码主要做了以下几步工作：

1. 从 PHP 的环境变量`$_POST`中提取 AccessKey 及 SecretKey 以用于初始化`Auth`对象；
1. 并使用该`Auth`对象的`uploadToken`方法来生成一个有效的上传授权`$token`;
1. 将上传授权`$token`作为参数调用`UploadManager`的`putFile`方法，完成文件上传动作；

到这里为止，第一个示例就可以运行起来了。您可以查看该示例的[在线演示](../../demo/simpleuploader)。您也可以直接获取和查看该示例的[源代码]()。

### 小结

这个示例仅用于演示如何使用 PHP SDK 快速运行第一个云存储服务的程序。我们也有在客户端可以直接上传文件的方式，相比本示例更高效和实用，因此请大家仅将本示例作为学习 PHP SDK 的一个步骤，而不是在产品环境中应用。关于如何在浏览器直接上传文件到云存储服务的详情请见：[表单上传](http://developer.qiniu.com/docs/v6/api/overview/up/form-upload.html)。

本文档接下来我们会介绍更接近于显示场景的一个示例。

## 一个完整的移动应用

在本章我们将详细介绍如何使用 PHP SDK 与其他端配合构建一个类似于微信朋友圈的移动应用。

在这个移动应用里终端用户可以进行以下操作：

1. 使用预设的帐号密码登录（不支持注册新帐号）；
1. 查看自己和朋友分享的照片以及描述（不支持评论）；
1. 上传一张新图片，并添加一段描述；

（TODO: 此处应有一张demo的移动端效果截图）

### 总体架构

对于此类应用，我们推荐的总体架构如下图所示：

![arch-with-callback](http://developer.qiniu.com/docs/v6/api/overview/up/response/img/upload-with-callback.png "架构图")

对于此架构有以下关键要点：

1. AK/SK 只能在业务服务器端使用。如果将 AK 和 SK 同时保存或者传输到移动端会有严重的信息泄露风险；
1. AK/SK 是企业帐号信息，业务服务器需要有自己的帐号数据库，对应到每一个终端用户的帐号信息；
1. 由于不同的业务都需要存放一些跟文件相关的描述信息，且图片又属于不同的终端用户，因此需要维护文件管理表，以管理文件的描述信息和所有者关系。

基于以上这些关键要点，我们来设计和实现我们的 PHP 版本的业务服务器。

### 接口设计

我们来简单的设计我们的业务服务器接口。

#### 帐号验证

```json
POST: auth.php
Content-Type: application/json
{
    username: <username>
    password: <password>
}
```

#### 获取文件列表

```json
POST: listfiles.php
// TODO
```

#### 获取上传授权

因为移动端并不知道 AK/SK 信息，客户端在需要上传文件时都需要向业务服务器发起一个获取上传授权的请求。

```json
POST: token.php
// TODO
```

#### 回调
	
移动端会直接上传文件到云存储服务，因此业务服务器不需要提供上传接口，但是需要提供一个供云存储服务在接收到文件后的回调接口。回调接口的响应内容会由云存储服务返回给移动端。

```json
POST: callback.php
// TODO
```

#### 数据表

业务服务需要一个业务数据库的支撑以管理提到的帐号信息和文件信息。在本示例中我们选用 MySQL 来搭建业务数据库。

1. 帐号表

	| 字段名 | 字段类型 | 字段说明 |
	| --------- | ------------ | ------------ |
	| id	| int | 唯一标识。 |
	| uid | int | 唯一用户标识。 |
	| uname | char(128) | 用户名，格式为邮箱如 admin@example.com 。 |
	| password | char(128) | 加密后的密码。 |	
	| status | int | 1: active; 0: disabled。 |

1. 文件信息表

	| 字段名 | 字段类型 | 字段说明 |
	| --------- | ------------ | ------------ |
	| id	| int | 唯一标识。 |
	| uid | int | 用户唯一标识。 |
	| fname | char(512) | 文件的显示名 |
	| key | char(512) | 文件对应到云存储服务中的唯一标识。 |
	| createTime | time | 上传时间。 |
	| description | char(2048) | 文件的描述内容 |

相应的 SQL 语句如下：

```sql
// TODO: 输入创建数据库和数据表的语句
SELECT xxx
```

### 服务实现

接下来我们一步步的实现以上定义的接口。这些实现主要考虑流程的完整性，因此在安全性上没有做充分的考量，请不要直接使用于产品环境中。

#### 配置文件

我们需要在一个地方存放全局的设置。本示例中我们直接用一个 config.php 文件包含若干全局变量的方式来解决这个问题。

```php
<?php
// config.php
// 全局设置
ACESS_KEY = 'xxxxxxxxxx';
SECRET_KEY = 'xxxxxxxxxx';
BUCKET = 'xxxx';
?>
```

#### 帐号验证

帐号验证的逻辑非常简单，就是将请求中包含的用户信息与数据库表中的信息进行比对，因此不需要涉及 SDK 的功能。

```php
<?php

$username = $_POST['username'];
$password = $_POST['password'];

// TODO: Impl.
$ret = checkAuth($username, $password);

?>
```

#### 获取文件列表

同帐号验证功能，获取文件列表也只是查询数据库，因此不多做解释。

```php
<?php
// files.php

$uid = $_POST['uid'];

// TODO: Impl.
$ret = getFiles($uid);

?>
```

#### 获取上传授权

客户端在需要上传文件时都需要先向业务服务器发起一个获取上传授权的请求。 SDK 中的 [`Qiniu\Auth`](api/class-Qiniu.Auth.html) 类提供了 `uploadToken($bucket, ...)` 方法，可以非常便利的生成对应的上传授权。

```php
<?php
// TODO: uptoken的调用.
?>
```

#### 回调

在收到回调时，通常表示一个文件已经成功上传。回调会包含该文件所对应的描述信息。因此业务服务器在收到回调后，需要将相应的文件信息写入到文件信息表中。

```php
<?php
// TODO: Impl.
?>
```

### 服务测试

在开发和部署完成后，我们可以使用一些通用的测试工具来确认这些服务都已经可以正常工作。推荐的工具为 [Paw]() 。

### 服务监控

为了确认服务的正常运行，我们还实现了一个简单的监控页面以查看所有上传的图片。该页面假设用户名为`admin`的管理员才有权访问。

前端页面使用 [Bootstrap]() 的缩略图控件实现，并使用 [Smarty]() 模板技术来循环生成最终页面：

```html
{section name="" loop=$files}
<a class="">
</a>
{/section}
```

### 移动端实现

本示例包含一个 Android 客户端的实现。因为本文档的重心是结合例子讲解 PHP SDK 的使用，因此这里就不详细讲解如何实现 Android 客户端了。您可以下载和安装移动客户端的[安装包]()，或查看移动客户端的[源代码]()。

### 小结

您可以在 Android 手机或者模拟器上安装和运行本示例的移动端应用，上传一张图片，并查看图片列表和描述。这个示例的重点在于讲解一个推荐的产品架构，以及各个子系统是如何协同工作。

接下来我们会再围绕几个更多的示例遍历七牛云所提供的其他强大的功能。接下来的示例都不会再像这个示例一样提供一个完整的移动互联网产品架构，而是把重点放在功能介绍上。您可以举一反三，快速的在本章介绍的示例上进行修改和加强，就可以快速开发出各种有趣的移动互联网应用。

## 图片处理

图片内容是几乎所有互联网应用都需要管理的数据类型。我们的服务提供了比较强大的数据处理功能。本章我们讲围绕一个功能相对完备的示例来讲解图片处理的主要用法，并顺便介绍 PHP SDK 的资源管理功能。

这个示例需要用户提供一对 AK/SK，并指定目标存储空间，然后会列出该存储空间中的图片内容。用户可以点选不同的图片以显示大图和查看大图信息。用户还可以选择图片处理模式，输入相应的处理参数，然后可以查看处理的结果。

下面我们分步来实现这个示例。前端实现使用了 [Bootstrap]() 和 [Smarty]() 。

### 列出文件

点击右上角的菜单项后，会弹出一个模态窗口让用户输入 AK/SK 等必要的访问信息。之后会列出目标存储空间里的至多10张 JPG 格式的图片。以下是获取图片列表的实现代码：

```php
$auth = new Auth($ak, $sk);
$bm = new BucketManager($auth);

list($items, $marker, $err) = $bm->listFiles($bucket); // 尝试列举空间中的文件

if ($err != null) {
	//echo "列举文件失败：(".$err->code().") ".$err->message();
} else {
	foreach ($items as $item) { // 过滤出最多10张jpg图片用于展示。
		if ($item['mimeType'] == 'image/jpeg') {
			$pics[] = $item;
			if (count($pics) >= 10) { 
				break;
			}
		}
	}
}

$smarty->assign('pics', $pics); // 设置为 Smarty 参数
$smarty->display('index.tpl'); // 开始生成显示页面
```

生成展示用列表的关键代码片段如下所示：

```html
<div class="list-group">
        {section name="fn" loop=$pics}  
        <a href="index.php?sn={$pics[fn]['key']}" class="list-group-item{if {$sn} == {$pics[fn]['key']}} active{/if}">
            <div class="thumbnail">
                <img src="http://{$domain}/{$pics[fn]['key']}?imageView2/1/w/200/h/100" alt="{$pics[fn]['key']}"/>
                <div class="caption">
                    <p>{$pics[fn]['key']}</p>
                </div>
            </div>
        </a>
        {/section}
 </div>
```

### 图片信息和编辑

图片编辑的过程非常简单，就是以表单方式获取编辑参数，然后将该参数作为图片的参数即可，不需要用到 SDK 的功能。如下所示：

```html
{if count($pics) > 0}
    <img src="http://{$domain}/{$sn}{if isset($mode)}?imageView2/{$mode}{if isset($width)}/w/{$width}{/if}{if isset($height)}/h/{$height}{/if}{/if}" alt="{$sn}"/>
{/if}
```

其中的变量比如`$domain`、`$mode`都是在 PHP 代码中以类似于如下的语句设置：

```php
$smarty->assign('domain', $domain);
```

完整的实现请参见本示例的源代码。

### 高级UFOP功能

我们可以对以上已经完成的示例做一些非常小的修改，就可以体验在我们 UFOP 平台提供的强大第三方数据处理服务。在本例中我们就来尝试一下[色情图片识别功能（ NROP）](http://developer.qiniu.com/docs/v6/api/reference/fop/third-party/nrop.html) 。

要使用 NROP 功能，用户需要先在管理平台上的[应用市场](https://portal.qiniu.com/service/market)开启本功能。开启后使用方式与一般的数据处理指令完全一致（比如获取 EXIF 信息的接口），仅需要使用带 nrop 参数的 GET 请求即可，返回的 HTTP 响应内容为一个包含鉴定结果的 JSON 字符串。示例代码如下所示：

```php
$ret = Client::get("http://$domain/$sn?nrop");
if ($ret->ok()) {
    $json = $ret->json();

    $boolarray = Array(false => 'false', true => 'true');

    // 解析 json 字符串，将其中感兴趣的值压到 props 数组中。
    $props['nrop:code(0：调用成功)'] = $json['code'];
    $props['nrop:label(0：色情；1：性感；2：正常)'] = $json['fileList'][0]['label']; // 只包含一个文件
    $props['nrop:rate(概率)'] = $json['fileList'][0]['rate'];
    $props['nrop:review(人工复审?)'] = $boolarray[$json['fileList'][0]['review']];
} else {
	$props['nropfailure'] = $ret->body; 
}
```

我们提供的完整示例已经包含了对 NROP 的调用，您可以体验一下效果。

### 小结

这个示例结束后，相信你已经比较了解我们的平台是如何支持图片内容的编辑，基本上这些动作都只是一个简单的 GET 请求即可完成，甚至都不需要依赖于 SDK。您可以查看本示例的[在线演示](../../demo/imageclipper)，或查看和下载本示例的[完整源代码]()。

## 音视频和流媒体

在介绍完图片的简单管理方法后，我们接下来用一个示例详细讲解七牛云对音视频和流媒体格式的强大支持。该示例的目标为完成以下动作：

1. 支持断点续传的大文件上传，因为视频文件通常比较大，难以用单次 POST 请求完成上传；
1. 支持上传后异步执行的自动转码动作，生成若干不同规格的目标视频，分别适合在手机和电脑上播放；
1. 将文件转换为 HLS 格式存放，以支持边下载边播放的效果；
1. 为视频打上一个图片水印;
1. 统一从每一个视频文件抽取一个固定时间点的画面作为预览图片;
1. 在网页播放器中播放生成的视频文件;

我们选用 [plupload]() 作为我们的上传控件，并使用 [JWPlayer]() 作为我们的网页播放器。其他采用的技术与之前的示例一致，主要是 Bootstrap 和 Smarty 。因为文件为客户端直传，因此我们也需要提供一个回调服务，以便于接收上传和转码这些异步任务的完成事件。为了简单起见，该示例就不再实现一个独立的业务数据库了，直接从目标存储空间获取文件信息。

### 大文件上传

因为大文件上传必须在浏览器端进行，因此我们就不演示如何用 PHP SDK 做断点续上传了。网页端的大文件上传我们可以用定制版本的 plupload 来支持。关键的代码如下所示：

```php
// TODO: 还不太清楚是否用 plupload 就能达成目的了，待确认。。。是不是该祭出我们的 js sdk ？
```

### 上传后自动转码

我们可以通过设置上传策略来通知云存储服务在上传完成后自动发起一个异步的任务。上传策略在调用上传接口时作为参数传入。

```php
// TODO: 代码待确定，反正应该是一段 js 吧调用上传接口，把上传策略作为参数传入。
```

这里的转码过程需要支持转为 HLS 格式，转码前还需要先打上视频水印。因此。。。 （TODO，我还不知道 m3u8 怎么生成的）

### 抽取视频截图

我们可以在收到上传完成事件后发起一个 pfop 请求来触发视频截图的异步操作，并将处理结果保存到另一个存储空间中，以作为这些视频的封面图片。关键代码如下所示：

```php
$headers['Authorization'] = 'QBox '.accessToken;
$headers['Content-Type'] = 'application/x-www-form-urlencoded';

$ret = Client::post("http://api.qiniu.com/pfop/", 
    "bucket=qiniudemo&key=xxx.mp4&vframe=vframe%2fjpg%2foffset%2f7%2fw%2f480%2fh%2f360", 
    headers);
```

因为这是一个异步任务，因此我们还需要在该异步任务完成后将生成的图片存储到目标存储空间中（待确认流程）。实现在 pfop-callback.php 文件中：

```php
// TODO
```

### 视频浏览与播放

在完成以上工作后，接下来的工作就简单了。我们可以生成一个列表网页，每个列表项都是一张视频截图，点击视频截图会弹出一个播放面板。因为类似的前端代码已经在本文档展示过，这里就不再多展示一次。

### 小结

视频的示例就到这里完成了。您可以直接查看本示例的[在线演示]()，或下载和查看本示例的[完整源代码]()。

需要注意的是， JWPlayer 是一个商业软件。如果您准备在产品中使用该播放器，请查看它的网站以了解详细的购买方式和价格。

另外，对于视频内容，CDN 的选择会是一个影响视频播放是否能够足够流畅的关键因素。我们的[多 CDN 管理平台]()会给列出的可用 CDN 线路标注是否适用于视频加速，请合理选择。

## 更多资源

到这里为止，我们就把七牛所提供的关键功能都浏览了一遍。如果您有一些关于本文档或我们产品的建议和想法，欢迎到我们的[技术社区](http://segmentfault.com/qiniu/)参与讨论。

其他对于 PHP 开发者有用的资源：

* SDK 下载：[https://github.com/qiniu/php-sdk/](https://github.com/qiniu/php-sdk/)
* 示例库：[https://github.com/qiniudemo/](https://github.com/qiniudemo/)
* 第三方示例库：[https://github.com/jemygraw/](https://github.com/jemygraw/)