<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>七牛云存储 - JavaScript SDK</title>
    <link href="favicon.ico" rel="shortcut icon">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="js/highlight/highlight.css">

    <!--[if lt IE 9]>
      <script src="js/Respond-1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">
    <div class="text-left col-md-12 wrapper">
        <h1 class="text-left col-md-12 ">
            七牛云存储 - JavaScript SDK
        <!--  
          <a class="btn btn-default view_code" id="show_code">
                查看初始化代码
            </a>
            -->
            <a class="btn btn-default view_github" href="https://github.com/qiniupd/qiniu-js-sdk" target="_blank">
                <img src="http://qtestbucket.qiniudn.com/GitHub-Mark-32px.png">
                View Source on Github
            </a>
        </h1>
        <input type="hidden" id="domain" value="{$domain}">
        <input type="hidden" id="uptoken_url" value="{$uptokenUrl}">
        <ul class="tip col-md-12 text-mute">
            <li>
                <small>
                    JavaScript SDK 基于 Plupload 开发，可以通过 Html5 或 Flash 等模式上传文件至七牛云存储。
                </small>
            </li>
            <li>
                <small>临时上传的空间不定时清空，请勿保存重要文件。</small>
            </li>
            <li>
                <small>Html5模式大于4M文件采用分块上传。</small>
            </li>
            <li>
                <small>上传视频可查看处理效果。</small>
            </li>
        </ul>
    </div>
    <div class="body">
        <div class="col-md-12">
            <div id="container">
                <a class="btn btn-default btn-lg " id="pickfiles" href="#" >
                    <i class="glyphicon glyphicon-plus"></i>
                    <span>选择文件</span>
                </a>
            </div>
        </div>

        <div style="display:none" id="success" class="col-md-12">
            <div class="alert-success">
                队列全部文件处理完毕
            </div>
        </div>
        <div class="col-md-12 ">
            <table class="table table-striped table-hover text-left"   style="margin-top:40px;display:none">
                <thead>
                  <tr>
                    <th class="col-md-4">Filename</th>
                    <th class="col-md-2">Size</th>
                    <th class="col-md-6">Detail</th>
                  </tr>
                </thead>
                <tbody id="fsUploadProgress">

                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade body" id="myModal-video" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">视频播放查看</h4>
          </div>
          <div class="modal-body">
            <div class="modal-body-wrapper text-center">
                <div id="video-container" style="width: 640px; height: 352px; margin:50px; padding: 20px; border:5px solid #999;">
                </div>
            </div>
            <div class="modal-body-footer">
            </div>
          </div>
          <div class="modal-footer">
            <span class="pull-left">本示例仅演示了简单的图片处理效果，了解更多请点击</span>

            <a href="https://github.com/SunLn/qiniu-js-sdk" target="_blank" class="pull-left">本SDK文档</a>
            <span class="pull-left">或</span>

            <a href="http://developer.qiniu.com/docs/v6/api/reference/fop/image/" target="_blank" class="pull-left">七牛官方文档</a>

            <button type="button" class="btn btn-primary" data-dismiss="modal">关闭</button>
          </div>
        </div>
      </div>
    </div>
</div>




<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/plupload/plupload.full.min.js"></script>
<script type="text/javascript" src="js/plupload/i18n/zh_CN.js"></script>
<script type="text/javascript" src="/js/qiniu.js"></script>
<script type="text/javascript" src="/js/main.js"></script>
<script type="text/javascript" src="/js/sewise-player-master/player/sewise.player.min.js"></script>
<script type="text/javascript" src="/js/ui.js"></script>
</body>
</html>
