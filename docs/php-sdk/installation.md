# Qiniu SDK for PHP 安装指南

Qiniu SDK for PHP 支持以下几种安装方式。推荐的安装方式为使用 **Composer** 。

## 使用 Composer 安装

**[Composer](http://getcomposer.org/)** 是一个简单易用的 PHP 依赖管理工具。你可以在自己的项目中声明所依赖的外部工具库，Composer 会帮你安装这些依赖的库文件。

使用 Composer 安装 Qiniu SDK 的步骤非常简单：

1. 安装 Composer :

	```
	curl -sS https://getcomposer.org/installer | php
	```

1. 使用 Composer 获取 Qiniu SDK :

	```
	php composer.phar require qiniu/php-sdk
	```

1. 在代码中添加对 autoload 的依赖：

	```
	<?php
	require 'vendor/autoload.php';
	```

如果需要更详细的关于 Composer 的使用说明，你可以访问 Composer 的官方网站[http://getcomposer.org/](http://getcomposer.org/)，或对应的中文网站 [http://www.phpcomposer.com/](http://www.phpcomposer.com/)。

## 手动下载

因为有些网络环境下通过 Composer 获取 Qiniu SDK 的速度较慢，开发者也可以直接下载我们准备好的符合 Composer 规范的 vendor 压缩包并在本地解压。解压后的内容和使用 Composer 方式获取到的内容完全一致，之后的使用方式也一致。

压缩包下载地址：[http://devtools.qiniu.io/vendor.tar.gz](http://devtools.qiniu.io/vendor.tar.gz)

## 直接使用源代码包

直接下载源代码压缩包并解压是另一种 SDK 的安装方法。不过因为有版本更新的维护问题，这种安装方法并不推荐，仅作为万一 Composer 安装有问题的情况下作为一种选择。

源代码包下载地址：[https://github.com/qiniu/php-sdk/releases](https://github.com/qiniu/php-sdk/releases) 
