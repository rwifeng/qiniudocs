<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <head>  
  <title>上传文件</title>  
    <body>  
      <?php   

        require 'vendor/autoload.php';

        use Qiniu\Auth;
        use Qiniu\Storage\UploadManager;

        echo '<h1>准备上传</h1>';

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

        echo '待上传文件: '.$_FILES['userfile']['name'].' (tmp_name: '.$_FILES['userfile']['tmp_name'].')<br>';

        echo '<h1>上传结果</h1>';

        $auth = new Auth($_POST['ak'], $_POST['sk']);
        $token = $auth->uploadToken($_POST['bucket'], null, 3600, null);
        $uploadManager = new UploadManager();

        list($ret, $err) = $uploadManager->putFile($token, null, $_FILES['userfile']['tmp_name']);

        if ($err != null) {
          echo "上传失败。错误消息：".$err->message();
          exit;
        }

        echo '上传成功。<br><br>';
        echo 'Bucket: '.$_POST['bucket'].'<br>';
        echo 'Domain: '.$_POST['domain'].'<br>';
        echo 'Key: '.$ret['key'].'<br>';

        $imgSrc = $_POST['domain'].'/'.$ret['key'];

        echo '<img src="'.$imgSrc.'" alt="上传图片" width=640px/>';
      ?>

    </body>  
  </head>  
</html> 
