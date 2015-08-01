<html lang="zh">

<head>
    <meta charset="UTF-8">
    <title>七牛 - 视频Demo</title>
    <link href="favicon.ico" rel="shortcut icon">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="js/highlight/highlight.css">
    <link href="js/videojs/dist/video-js/video-js.css" rel="stylesheet">
    <script type="text/javascript" src="js/videojs/dist/video-js/video.js"></script>
    <script type="text/javascript" src="js/videojs-contrib-media-sources/src/videojs-media-sources.js"></script>
    <script type="text/javascript" src="js/videojs.hls.min.js"></script>
    <!--[if lt IE 9]>
      <script src="js/Respond-1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="container">
        <div class="text-left col-md-12 ">
            <h1 class="text-left col-md-12 ">
            七牛云存储 - 视频Demo
            </h1>
            <input type="hidden" id="domain" value="{$domain}">
            <input type="hidden" id="uptoken_url" value="{$uptokenUrl}">
        </div>
        <div class="body">
            <div class="col-md-12">
                <div id="container">
                    <a class="btn btn-default btn-lg " id="pickfiles" href="#">
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
                <table class="table table-striped table-hover text-left" style="margin-top:40px;">
                    <thead>
                        <tr>
                            <th class="col-md-4">Filename</th>
                            <th class="col-md-2">Size</th>
                            <th class="col-md-6">Detail</th>
                        </tr>
                    </thead>
                    <tbody id="fsUploadProgress">
                        <tr style="opacity: 1;" class="progressContainer" id="o_19q7e3s7s1na6ote1u6t165sjpt9">
                            <td class="progressName">1.mp4
                                <div class="Wrapper">
                                    <input data-url="http://devtest.qiniudn.com/1.mp4" class="origin-video btn  btn-primary play-btn" value="播放原视频" type="button">
                                    <input data-url="http://devtest.qiniudn.com/0JmbiheSQfkOB1X6h40wCvDb0YY%3D%2FlolDkdQ10vxTTlQMDruPvj1VzNUi" class="btn btn-info play-btn" value="播放转码后视频" type="button">
                                </div>
                            </td>
                            <td class="progressFileSize">28.8 MB</td>
                            <td>
                                <div class="info">
                                    <div class="">
                                        <div><strong>Link:</strong><a href="http://devtest.qiniudn.com/1.mp4" target="_blank"> http://devtest.qiniudn.com/1.mp4</a></div>
                                        <div class="hash"><strong>Hash:</strong>lolDkdQ10vxTTlQMDruPvj1VzNUi</div>
                                        <div class="process-status"><strong>转码状态:</strong><a href="http://api.qiniu.com/status/get/prefop?id=z0.55a59a867823de5a49cd2e60" target="_blank">处理成功</a></div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal fade body" id="myModal-video" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">视频播放</h4>
                    </div>
                    <div class="modal-body">
                        <div class="modal-body-wrapper text-center">
                            <div id="video-container" style="margin:-20px;border:0px solid #999;">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <span class="pull-left">本示例仅演示了简单的视频处理处理效果，了解更多请点击</span>
                        <a href="http://developer.qiniu.com/docs/v6/sdk/javascript-sdk.html" target="_blank" class="pull-left">七牛JS SDK文档</a>
                        <span class="pull-left">或</span>
                        <a href="http://developer.qiniu.com/docs/v6/api/reference/fop/av/" target="_blank" class="pull-left">七牛官方文档</a>
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
    <script type="text/javascript" src="js/qiniu.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/ui.js"></script>
</body>

</html>
