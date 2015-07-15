<?php /* Smarty version 3.1.24, created on 2015-07-15 08:25:31
         compiled from "./templates/login.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:150963592055a5a87b8f5947_03882437%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5ede19cb33faaf45fb4e1c17adb1aec828648bdd' => 
    array (
      0 => './templates/login.tpl',
      1 => 1436919929,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '150963592055a5a87b8f5947_03882437',
  'variables' => 
  array (
    'error' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55a5a87b916728_75373853',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55a5a87b916728_75373853')) {
function content_55a5a87b916728_75373853 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '150963592055a5a87b8f5947_03882437';
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
    <link href="/demo/qspace/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/demo/qspace/assets/css/signin.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <form class="form-signin" method="post" action="/demo/qspace/index.php">
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