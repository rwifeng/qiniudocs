<?php /* Smarty version 3.1.24, created on 2015-06-28 16:56:28
         compiled from "./templates/index.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:146334093558fb6bceadef5_35561985%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9984de98b292ca729c329e71768a6ea35524853a' => 
    array (
      0 => './templates/index.tpl',
      1 => 1435481775,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '146334093558fb6bceadef5_35561985',
  'variables' => 
  array (
    'domain' => 0,
    'uptokenUrl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_558fb6bcee9685_44274494',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_558fb6bcee9685_44274494')) {
function content_558fb6bcee9685_44274494 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '146334093558fb6bceadef5_35561985';
?>
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
      <?php echo '<script'; ?>
 src="js/Respond-1.4.2/respond.min.js"><?php echo '</script'; ?>
>
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
        <input type="hidden" id="domain" value="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
">
        <input type="hidden" id="uptoken_url" value="<?php echo $_smarty_tpl->tpl_vars['uptokenUrl']->value;?>
">
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




<?php echo '<script'; ?>
 type="text/javascript" src="js/jquery-1.9.1.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="bootstrap/js/bootstrap.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="js/plupload/plupload.full.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="js/plupload/i18n/zh_CN.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="/js/qiniu.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="/js/main.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="/js/sewise-player-master/player/sewise.player.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="/js/ui.js"><?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
?>