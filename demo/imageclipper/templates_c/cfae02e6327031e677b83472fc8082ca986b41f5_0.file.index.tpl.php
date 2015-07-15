<?php /* Smarty version 3.1.24, created on 2015-07-01 14:37:23
         compiled from "./templates/index.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:36207941855938aa3a997c9_01668962%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cfae02e6327031e677b83472fc8082ca986b41f5' => 
    array (
      0 => './templates/index.tpl',
      1 => 1435732640,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '36207941855938aa3a997c9_01668962',
  'variables' => 
  array (
    'ak' => 0,
    'sk' => 0,
    'bucket' => 0,
    'domain' => 0,
    'pics' => 0,
    'sn' => 0,
    'mode' => 0,
    'width' => 0,
    'height' => 0,
    'props' => 0,
    'k' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55938aa3af10b2_81910307',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55938aa3af10b2_81910307')) {
function content_55938aa3af10b2_81910307 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '36207941855938aa3a997c9_01668962';
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/demo/imageclipper/css/bootstrap.min.css"/>
    <?php echo '<script'; ?>
 src="/demo/imageclipper/js/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/demo/imageclipper/js/bootstrap.min.js"><?php echo '</script'; ?>
>
    <title>Image Clipper</title>
</head>
<body>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">数据访问信息</h4>
            </div>
            <form action="/demo/imageclipper/index.php?login" method="post" enctype="multipart/form-data" >
                <div class="modal-body">
                    <div class="form-group">
                        <label for="ak">AccessKey</label>
                        <input type="text" class="form-control" id="ak" name="ak" placeholder="Access key" value="<?php echo $_smarty_tpl->tpl_vars['ak']->value;?>
">
                        <span id="helpBlock1" class="help-block">AK/SK可以在<a href="https://portal.qiniu.com/setting/key" target="_blank">密钥管理</a>页面获取。 </span>
                    </div>
                    <div class="form-group">
                        <label for="sk">SecretKey</label>
                        <input type="text" class="form-control" id="sk" name="sk" placeholder="Secret key" value="<?php echo $_smarty_tpl->tpl_vars['sk']->value;?>
">
                    </div>
                    <div class="form-group">
                        <label for="bucket">空间</label>
                        <input type="text" class="form-control" id="bucket" name="bucket" placeholder="空间" value="<?php echo $_smarty_tpl->tpl_vars['bucket']->value;?>
">
                        <span id="helpBlock2" class="help-block">请在<a href="https://portal.qiniu.com/" target="_blank">管理平台</a>确认填写的空间已存在，且已包含若干张jpg格式的图片。 </span>
                    </div>
                    <div class="form-group">
                        <label for="domain">域名</label>
                        <input type="text" class="form-control" id="domain" name="domain" placeholder="域名" value="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
">
                        <span id="helpBlock2" class="help-block">请在<a href="https://portal.qiniu.com/" target="_blank">空间设置</a>中查看域名。 </span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="summit" class="btn btn-primary">提交</button>
                </div>
            </form>
        </div>
    </div>
</div>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">ImageClipper <small>图片处理示例</small></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="http://qiniu.sinaapp.com/docs/php-sdk/quick-start.html" target="_blank">快速开发指南</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">帐号信息<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="https://portal.qiniu.com/setting/key" target="_blank">公钥: <?php echo $_smarty_tpl->tpl_vars['ak']->value;?>
</a> </li>
                        <li><a href="https://portal.qiniu.com/setting/key" target="_blank">私钥: <?php echo $_smarty_tpl->tpl_vars['sk']->value;?>
</a></li>
                        <li><a href="https://portal.qiniu.com/bucket/qiniudemo/resource#1" target="_blank">空间: <?php echo $_smarty_tpl->tpl_vars['bucket']->value;?>
</a></li>
                        <li><a href="https://portal.qiniu.com/setting/key" target="_blank">域名: <?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
</a></li>
                        <li class="divider"></li>
                        <li><a href="#" data-toggle="modal" data-target="#myModal">更换帐号</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->

    </div><!-- /.container-fluid -->
</nav>
<div class="container">
    <div class="row">
        <div class="col-sm-3">

            <!-- <button class="btn btn-primary btn-lg btn-block" type="submit">上传图片</button> -->

            <div class="list-group">

                <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["fn"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["fn"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["fn"]['name'] = "fn";
$_smarty_tpl->tpl_vars['smarty']->value['section']["fn"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['pics']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["fn"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["fn"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["fn"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["fn"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["fn"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["fn"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["fn"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["fn"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["fn"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["fn"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["fn"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["fn"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["fn"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["fn"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["fn"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["fn"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["fn"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["fn"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["fn"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["fn"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["fn"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["fn"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["fn"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["fn"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["fn"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["fn"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["fn"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["fn"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["fn"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["fn"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["fn"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["fn"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["fn"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["fn"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["fn"]['total']);
?>  
                <a href="index.php?sn=<?php echo $_smarty_tpl->tpl_vars['pics']->value[$_smarty_tpl->getVariable('smarty')->value['section']['fn']['index']]['key'];?>
" class="list-group-item<?php ob_start();
echo $_smarty_tpl->tpl_vars['sn']->value;
$_tmp1=ob_get_clean();
ob_start();
echo $_smarty_tpl->tpl_vars['pics']->value[$_smarty_tpl->getVariable('smarty')->value['section']['fn']['index']]['key'];
$_tmp2=ob_get_clean();
if ($_tmp1 == $_tmp2) {?> active<?php }?>">
                    <div class="thumbnail">
                        <img src="http://<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['pics']->value[$_smarty_tpl->getVariable('smarty')->value['section']['fn']['index']]['key'];?>
?imageView2/1/w/200/h/100" alt="<?php echo $_smarty_tpl->tpl_vars['pics']->value[$_smarty_tpl->getVariable('smarty')->value['section']['fn']['index']]['key'];?>
"/>
                        <div class="caption">
                            <p><?php echo $_smarty_tpl->tpl_vars['pics']->value[$_smarty_tpl->getVariable('smarty')->value['section']['fn']['index']]['key'];?>
</p>
                        </div>
                    </div>
                </a>
                <?php endfor; endif; ?>

            </div>
        </div>
        <div class="col-sm-9">
            <div class="thumbnail">
                <div>
                    <h5><?php echo $_smarty_tpl->tpl_vars['pics']->value[0]['key'];?>
</h5>
                </div>
                <hr>
                <form class="form-inline" action="index.php?fop" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <div>
                            <label class="control-label">图片处理模式:</label>

                            <select class="form-control" id="mode" name="mode" datastyle="btn-default">
                                <option role="presentation" role="menuitem" tabindex="-1" value="0" <?php if ($_smarty_tpl->tpl_vars['mode']->value == 0) {?>selected="selected"<?php }?>><a href="#">设定最大长短边缩放</a></li>
                                <option role="presentation" role="menuitem" tabindex="-1" value="1" <?php if ($_smarty_tpl->tpl_vars['mode']->value == 1) {?>selected="selected"<?php }?>><a href="#">设定最小宽高缩放，居中裁剪</a></li>
                                <option role="presentation" role="menuitem" tabindex="-1" value="2" <?php if ($_smarty_tpl->tpl_vars['mode']->value == 2) {?>selected="selected"<?php }?>><a href="#">设定最大宽高缩放</a></li>
                                <option role="presentation" role="menuitem" tabindex="-1" value="3" <?php if ($_smarty_tpl->tpl_vars['mode']->value == 3) {?>selected="selected"<?php }?>><a href="#">设定最小宽高缩放</a></li>
                                <option role="presentation" role="menuitem" tabindex="-1" value="4" <?php if ($_smarty_tpl->tpl_vars['mode']->value == 4) {?>selected="selected"<?php }?>><a href="#">设定最小长短边缩放</a></li>
                                <option role="presentation" role="menuitem" tabindex="-1" value="5" <?php if ($_smarty_tpl->tpl_vars['mode']->value == 5) {?>selected="selected"<?php }?>><a href="#">设定最小长短边缩放，居中裁剪</a></li>
                            </select>

                            <input type="text" class="form-control" id="width" name="width" placeholder="宽度（长边）" value="<?php echo $_smarty_tpl->tpl_vars['width']->value;?>
"/>
                            <input type="text" class="form-control" id="height" name="height" placeholder="高度（短边）"  value="<?php echo $_smarty_tpl->tpl_vars['height']->value;?>
"/>
                            <a href="http://developer.qiniu.com/docs/v6/api/reference/fop/image/imageview2.html" target="_blank">参数说明</a>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">操作图片</button>
                </form>
                <hr>
                <?php if (count($_smarty_tpl->tpl_vars['pics']->value) > 0) {?>
                    <img src="http://<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['sn']->value;
if (isset($_smarty_tpl->tpl_vars['mode']->value)) {?>?imageView2/<?php echo $_smarty_tpl->tpl_vars['mode']->value;
if (isset($_smarty_tpl->tpl_vars['width']->value)) {?>/w/<?php echo $_smarty_tpl->tpl_vars['width']->value;
}
if (isset($_smarty_tpl->tpl_vars['height']->value)) {?>/h/<?php echo $_smarty_tpl->tpl_vars['height']->value;
}
}?>" alt="<?php echo $_smarty_tpl->tpl_vars['sn']->value;?>
"/>
                <?php }?>
                <hr>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <tr><th>属性</th><th>值</th></tr>
                        <?php
$_from = $_smarty_tpl->tpl_vars['props']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['v']->_loop = false;
$_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$foreach_v_Sav = $_smarty_tpl->tpl_vars['v'];
?>  
                        <tr><td><?php echo $_smarty_tpl->tpl_vars['k']->value;?>
</td><td><?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</td></tr>
                        <?php
$_smarty_tpl->tpl_vars['v'] = $foreach_v_Sav;
}
?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html><?php }
}
?>