<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <style>
            div {
                width:50%;
                margin:100px 25% auto;
            }
        </style>
    </head>
    <body>
        <div>
                <?php 
                    $ret = base64_decode($_GET['upload_ret']);
                    $cbody = json_decode($ret, true);
                    $dn = 'http://77fxsr.com2.z0.glb.qiniucdn.com/';  
                    error_log(print_r($cbody, true));
                    $url = $dn . $cbody['fname'];
                    error_log($url);

                    $stat_ = file_get_contents($url . '?stat');
                    $stat = json_decode($stat_, true);
                    $mtype = $stat['mimeType']; 
                    $isImage = substr($mtype, 0, 6) == 'image/'
                ?>
                <p>上传文件的外链：<a href=<?=$url?>><?=$url?></a></p> 
                <? if($isImage): >
                    <img src=<?=$url?>  height="600px" alt=""></img>
                <? endif;?>
                <p><a href="index.html">返回</a></p> 
        </div> 
    </body>
</html>
