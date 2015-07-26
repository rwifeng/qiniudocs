#七牛云存储PHP SDK

本SDK为PHP开发者提供了操作七牛云存储服务功能的能力。

关于本SDK的概述。

##功能列表

* 可通过[Composer](http://www.phpcomposer.com)安装，或者自行下载对应的zip包
* 支持以表单方式和断点续传方式上传文件
* 提供对管理内容进行改名、删除等管理操作
* 可以设置在上传后自动执行后续的数据处理操作

## 快速上手

1. **注册七牛帐号和获取密钥** 
  
  在使用SDK之前，你必须先[注册一个七牛帐号](https://portal.qiniu.com/signup)，并[登录控制台获取一对有效的AccessKey和SecretKey](https://portal.qiniu.com/setting/key)。请详细阅读[安全建议建议](security.html)以进一步了解如何正确使用和管理密钥。

1. **环境兼容性要求** 

  本SDK要求你的环境安装了**PHP 5.3.3+**运行环境，且应带cURL扩展。安装**cURL 7.16.3+**。
  
1. **安装SDK** 
 
  使用[Composer](https://getcomposer.org)是最为推荐的安装方式。[SDK 安装指南](installation.html)中有关于安装SDK的详细说明。

1. **使用SDK** 
 
  建议阅读[快速开发指南](quick-start.html)以了解本SDK的基本使用方法，并结合相应的样例工程和[API参考手册](api)以获取所有功能的详细使用方法。

##快速示例

###上传一个文件到七牛云存储

```php
  <?php
    require 'vendor/autoload.php';

    use Qiniu\Auth;
    use Qiniu\Storage\UploadManager;
    
    // 设置信息
    $APP_ACCESS_KEY = '<Access Key>';
    $APP_SECRET_KEY = '<Secret Key>';
    
    $bucket = '<Bucket Name>';
    $file = '<File Path>';

    $auth = new Auth($APP_ACCESS_KEY, $APP_SECRET_KEY);
    $token = $auth->uploadToken($bucket);
    $uploadManager = new UploadManager();

    list($ret, $err) = $uploadManager->putFile($token, null, $file);

    if ($err != null) {
      echo "上传失败。错误消息：".$err->message();
    } else {
      echo "上传成功。Key：".$ret["key"];
    }
  
```

###更多示例

* 小文件上传 （[源代码](https://github.com/rwifeng/qiniudocs/tree/master/demo/simpleuploader) - [在线演示](../../demo/simpleuploader)）
* 图片处理 （[源代码](https://github.com/rwifeng/qiniudocs/tree/master/demo/imageclipper) - [在线演示](../../demo/qimage/index.html)）
* 一个完整的移动应用 （[源代码](https://github.com/simon-liubin/android-demo) - [移动端 Android 安装包](http://rwxf.qiniudn.com/android-demo.apk) - [管理页面](../../demo/qspace)） 
* 视频处理和转码 （[源代码](https://github.com/rwifeng/qiniudocs/tree/master/demo/qav) - [在线演示](../../demo/qav/index.php)）

##开发文档

* [快速开发指南](php-sdk/quick-start.html) - 此文档介绍了使用本SDK所需要的基本概念和API
* [安全管理建议](php-sdk/security.html) - 为保证用户信息的安全，请务必认真阅读本文档
* [API参考手册](php-sdk/api/index.html) - 本SDK所提供的所有API的详细使用说明

##相关资源

* [技术论坛](http://segmentfault.com/qiniu) - 在这里你可以和其他开发者愉快的讨论如何更好的使用七牛云服务
* [提交工单](https://support.qiniu.com/tickets/create) - 如果你的问题不适合在论坛讨论或得不到回答，你可以提交一个工单，技术支持人员会尽快回复
* [博客](http://blog.qiniu.com) - 这里会持续发布市场活动和技术分享文章
* [微信公众号]() - 及时得到七牛的所有新闻更新
* [微博](http://weibo.com/qiniutek)
* [常见问题FAQ]()
