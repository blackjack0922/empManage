<html>
<head>
    <meta http-equiv="content-type" content="text/html character=utf-8" />
</head>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/1/14 0014
 * Time: 下午 1:29
*/
header("Content-type: text/html; charset=utf-8");
echo "欢迎".$_GET['name']."登录成功";
echo "<br/><a href='login.php'>返回登录界面</a> ";

?>
<h1>主界面</h1>
<ul>
    <li><a href="empList.php">管理用户</a> </li>
    <li><a href="#">添加用户</a> </li>
    <li><a href="#">查询用户</a> </li>
    <li><a href="#">退出系统</a> </li>
</ul>


