<?php /* Smarty version 3.1.24, created on 2015-07-08 15:24:55
         compiled from "./templates/file_mgr.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1905712897559cd047d08dc8_92019177%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1acb06419dd890581ca4bd2aadeb4d1a67152653' => 
    array (
      0 => './templates/file_mgr.tpl',
      1 => 1436228105,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1905712897559cd047d08dc8_92019177',
  'variables' => 
  array (
    'files' => 0,
    'file' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_559cd047d5a6b4_82640052',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_559cd047d5a6b4_82640052')) {
function content_559cd047d5a6b4_82640052 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1905712897559cd047d08dc8_92019177';
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
</head>

<body>
    <div class="container">
        <table class="table table-bordered">
            <th>
                <td>Uid</td>
                <td>File Name</td>
                <td>File Key</td>
                <td>Description</td>
                <td>Create Time</td>
            </th>
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
                <td><?php echo $_smarty_tpl->tpl_vars['file']->value["uid"];?>
</td>
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