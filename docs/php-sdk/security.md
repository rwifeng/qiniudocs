# 安全机制
互联网中，安全是必须要谨慎考虑的问题。 在使用七牛的过程中我们分为 `上传` 和 `下载` 两个方面来说下安全方面需要注意的地方。

## 上传
你看下我们的[文档](http://developer.qiniu.com/docs/v6/api/reference/up/)，不管是[直接上传](http://developer.qiniu.com/docs/v6/api/overview/up/form-upload.html) 还是[分片上传](http://developer.qiniu.com/docs/v6/api/overview/up/chunked-upload.html)都需要一个 `token` 字段， 表明不是谁都可以向你的空间随便上传文件的。

这个上传token是通过你的 "access key" 和 "secret key" 来生成的, 一定有效期有效的上传凭证。你可以通过这个token进行上传回调的设置， 上传后的异步转码，上传文件大小的限制， 上传文件类型的限制等等，具体可以参考[上传策略](http://developer.qiniu.com/docs/v6/api/reference/security/put-policy.html)。



## 下载
公开资源下载非常简单，以HTTP GET方式访问资源URL即可。资源URL的构成如下：

```
http://<domain>/<key>
```
其中`<domain>`是你上传文件所在空间所绑定的域名。开发者可以在开[发者平台](https://portal.qiniu.com/) - `空间设置` - `域名设置` 查看该空间绑定的所有域名。
`<key>`是你上传到空间的文件名。

但这样只要别人知道了该外链地址就可以进行访问或者盗链， 为了防止你的流量被盗刷你可以做两个方面的工作：`设置防盗链` 和 `空间设为私有空间`。

### 设置防盗链：
防盗链的机制就是通过Referer来判断这个访问是不是正常的访问，进而阻止或允许该访问。

```
这里的 Referer 指的是HTTP头部的一个字段。
也称为HTTP来源地址（HTTP Referer），用来表示从哪儿链接到目前的网页，采用的格式是URL。
换句话说，借着 HTTP Referer 头部网页可以检查访客从哪里而来，这也常被用来对付伪造的跨网站请求。
```
资料来源：[http://zh.wikipedia.org/wiki/HTTP参照位址](http://zh.wikipedia.org/wiki/HTTP参照位址)

你可以在我们的[管理后台]()中的`空间设置` ->`基本设置` -> `设置防盗链` 来进行防盗链的设置。

### 空间设为私有
你可以在我们的[管理后台](https://portal.qiniu.com/)中的`空间设置` ->`高级设置` -> `访问控制` 来将空间改为私有空间。
这样你就必须对公有链接签名后才能访问， 签名后外链的形式大概是：

```
http://<domain>/<key>?e=<deadline>&token=<downloadToken>
```

* 参数`e`表示URL的过期时间，采用UNIX Epoch时间戳格式，单位为秒。超时的访问将返回401错误。
* 参数`token`携带下载凭证。下载凭证是对资源访问的授权，不带下载凭证或下载凭证不合法都会导致401错误，表示验证失败。关于下载凭证的生成，请参见[下载凭证](http://developer.qiniu.com/docs/v6/api/reference/security/download-token.html)。

以下是生成私有下载链接的php代码：

```php
<?php
require_once 'vendor/autoload.php';
use Qiniu\Auth;

$accessKey = 'access key';
$secretKey = 'secret key';
$auth = new Auth($accessKey, $secretKey);

$url = 'http://qiniuphotos.qiniudn.com/gogopher.jpg';
echo $auth->privateDownloadUrl($url);

```
