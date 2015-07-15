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
            {if $error}
            <div class="alert alert-danger" role="alert">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                <span class="sr-only">Error:</span> {$error}
            </div>
            {/if}
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
    <script src="admin/assets/js/ie10-viewport-bug-workaround.js"></script>
    -->
</body>

</html>
