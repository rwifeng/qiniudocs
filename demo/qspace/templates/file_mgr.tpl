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
                    <td>OP</td>
                </tr>
            </thead>
            {foreach from=$files item=file}
            <tr>
                <td><a href="{$file[uid]}">{$file["uid"]}</a></td>
                <td>{$file["fname"]}</td>
                <td>{$file["fkey"]}</td>
                <td>{$file["description"]}</td>
                <td>{$file["createTime"]}</td>
                <td><a href="{$file[id]}">{$file["id"]}</a></td>
            </tr>
            {/foreach}
        </table>
    </div>
</body>

</html>
