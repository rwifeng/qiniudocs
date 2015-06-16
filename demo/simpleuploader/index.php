<html>
<title>小文件上传示例</title>
<h1>上传一个小文件</h1>
<body>
<form action="upload.php" method="post" enctype="multipart/form-data" name="form1" id="form1">  
  <table>
      <tr>
          <td>AK:</td>
          <td><input name="ak" type="text"/></td>
      </tr>
      <tr>
          <td>SK:</td>
          <td><input name="sk" type="text"/></td>
      </tr>
      <tr>
          <td>文件:</td>
          <td><input name="userfile" type="file" /></td>
      </tr>
  </table>>  
  <input type="submit" value="上传" />  
</form>  

<?php echo $_SERVER['HTTP_USER_AGENT']; ?>

</body>

</html>