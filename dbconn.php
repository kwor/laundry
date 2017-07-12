<?php
$mysql_server_name='mysql'; 
$mysql_username='root'; 
$mysql_password=''; 
$mysql_database='kdb2'; 
$dbconn=mysqli_connect($mysql_server_name, $mysql_username, $mysql_password, $mysql_database) or die('数据库连接失败，错误信息：'.mysqli_error());
mysqli_query($dbconn,'SET NAMES UTF8') or die('字符集设置出错'.mysqli_error());
?>