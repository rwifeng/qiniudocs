<?php /* Smarty version 3.1.24, created on 2015-07-15 08:43:35
         compiled from "./templates/file_mgr.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:115392497355a5acb71ec0e9_36051841%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f305826b28e7a48333a7e11d2bca7d9d8b2ea6a4' => 
    array (
      0 => './templates/file_mgr.tpl',
      1 => 1436921013,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '115392497355a5acb71ec0e9_36051841',
  'variables' => 
  array (
    'files' => 0,
    'file' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55a5acb7216954_44411205',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55a5acb7216954_44411205')) {
function content_55a5acb7216954_44411205 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '115392497355a5acb71ec0e9_36051841';
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Signin</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="text-left col-md-12 wrapper">
            <h1 class="text-left col-md-12 ">
            七牛 - 文件管理
            </h1>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td>Uid</td>
                    <td>File Name</td>
                    <td>File Key</td>
                    <td>Description</td>
                    <td>Create Time</td>
                </tr>
            </thead>
            <?php
$_from = $_smarty_tpl->tpl_vars['files']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['file'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['file']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['file']->value) {
$_smarty_tpl->tpl_vars['file']->_loop = true;
$foreach_file_Sav = $_smarty_tpl->tpl_vars['file'];
?>
            <tr>
                <td><a href="<?php echo $_smarty_tpl->tpl_vars['file']->value[$_smarty_tpl->getVariable('smarty')->value['section']['uid']['index']];?>
"><?php echo $_smarty_tpl->tpl_vars['file']->value["uid"];?>
</a></td>
                <td><?php echo $_smarty_tpl->tpl_vars['file']->value["fname"];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['file']->value["fkey"];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['file']->value["description"];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['file']->value["createTime"];?>
</td>
            </tr>
            <?php
$_smarty_tpl->tpl_vars['file'] = $foreach_file_Sav;
}
?>
        </table>
    </div>
</body>

</html>
<?php }
}
?>