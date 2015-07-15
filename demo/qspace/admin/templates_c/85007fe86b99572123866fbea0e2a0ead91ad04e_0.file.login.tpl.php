<?php /* Smarty version 3.1.24, created on 2015-07-15 08:04:50
         compiled from "./templates/login.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:40948070155a5a3a2be5d61_43311550%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '85007fe86b99572123866fbea0e2a0ead91ad04e' => 
    array (
      0 => './templates/login.tpl',
      1 => 1436918689,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '40948070155a5a3a2be5d61_43311550',
  'variables' => 
  array (
    'error' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55a5a3a2c069c7_67463364',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55a5a3a2c069c7_67463364')) {
function content_55a5a3a2c069c7_67463364 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '40948070155a5a3a2be5d61_43311550';
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
    <link href="admin/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="admin/assets/css/signin.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <form class="form-signin" method="post" action="/admin/index.php">
            <?php if ($_smarty_tpl->tpl_vars['error']->value) {?>
            <div class="alert alert-danger" role="alert">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                <span class="sr-only">Error:</span> <?php echo $_smarty_tpl->tpl_vars['error']->value;?>

            </div>
            <?php }?>
            <h2 class="form-signin-heading">Sign In</h2>
            <label for="inputUserName" class="sr-only">User name</label>
            <input type="text" id="inputUserName" class="form-control" placeholder="User name" name="uname" required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="pwd" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        </form>
    </div>
    <!-- /container -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug 
    <?php echo '<script'; ?>
 src="admin/assets/js/ie10-viewport-bug-workaround.js"><?php echo '</script'; ?>
>
    -->
</body>

</html>
<?php }
}
?>