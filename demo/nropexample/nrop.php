<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <head>  
  <title>上传文件</title>  
    <body>  
      <?php   

        require 'vendor/autoload.php';

        use Qiniu\Auth;
        use Qiniu\Http\Client;
        use Qiniu\Http\Error;
        use Qiniu\Http\Response;
        use Qiniu\Storage\UploadManager;

        if($_FILES['userfile']['error'] > 0) { 

          echo '错误：';  

          switch ($_FILES['userfile']['error']) { 
              case 1 : echo '文件尺寸超过限制大小。'; break;  
              case 2 : echo '文件尺寸超过了HTML表单的最大值。'; break;  
              case 3 : echo '文件不完整。'; break;  
              case 4 : echo '没有选择要上传的文件。'; break;  
          }
          exit;  
        }  

        if($_FILES['userfile']['type'] != 'image/jpeg') {  
          echo '本示例只支持JPEG格式的图片文件。请返回并选择一个本地的JPEG文件。';  
          exit;  
        }

        $auth = new Auth($_POST['ak'], $_POST['sk']);
        $token = $auth->uploadToken($_POST['bucket'], null, 3600, null);
        $uploadManager = new UploadManager();

        list($ret, $err) = $uploadManager->putFile($token, null, $_FILES['userfile']['tmp_name']);

        if ($err != null) {
          echo "上传失败。错误消息：".$err->message();
          exit;
        }

        echo '<h1>图片鉴别</h1>';

        $imgSrc = $_POST['domain'].'/'.$ret['key'];
        $ret = Client::get($imgSrc.'?nrop');

        if (!$ret->ok()) {
            echo '鉴别失败。额外信息：'.$ret.'<br>';
            exit;
        }

        $json = $ret->json();

        $boolarray = Array(false => 'false', true => 'true');

        echo '<table border=\"2\"><tr><th>字段</th><th>值</th><th>含义</th></tr>';
        echo '<tr><td>图片</td><td>'.$json['fileList'][0]['name'].'</td><td><img src="'.$imgSrc.'" alt="上传图片" width=400px/></td></tr>';
        echo '<tr><td>message</td><td>'.$json['message'].'</td><td>对应code的描述信息。</td></tr>';
        echo '<tr><td>code</td><td>'.$json['code'].'</td><td>处理状态：<br>0：调用成功; <br>1：授权失败； <br>2：模型ID错误； <br>3：没有上传文件； <br>4：API版本号错误； <br>5：API版本已弃用； <br>6：secretId 错误； <br>7：任务Id错误，您的secretId不能调用该任务； <br>8：secretId状态异常； <br>9：尚未上传证书； <br>100：服务器错误； <br>101：未知错误</td></tr>';
        echo '<tr><td>timestamp</td><td>'.$json['timestamp'].'</td><td>时间戳。'.gmdate("Y-m-d H:i:s", $json['timestamp']).'</td></tr>';
        echo '<tr><td>label</td><td>'.$json['fileList'][0]['label'].'</td><td>介于0-2间的整数，表示该图像被机器判定为哪个分类，分别对应： <br>0：色情； <br>1：性感； <br>2：正常；</td></tr>';
        echo '<tr><td>rate</td><td>'.$json['fileList'][0]['rate'].'</td><td>介于0-1间的浮点数，表示该图像被识别为某个分类的概率值，概率越高、机器越肯定；您可以根据您的需求确定需要人工复审的界限。</td></tr>';
        echo '<tr><td>review</td><td>'.$boolarray[$json['fileList'][0]['review']].'</td><td>是否需要人工复审该图片，鉴黄服务是否对结果确定(true：不确定，false：确定)</td></tr>';
        echo '</table>';
      ?>
    </body>  
  </head>  
</html> 
