<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>

<h1>管理员登录系统</h1>
<form action="loginProcess.php" method="post">
    <table>
        <tr>
            <td>用户ID</td>
            <td><input type="text" name="id" value=""/> </td>
        </tr>
        <tr>
            <td>密&nbsp;码</td>
            <td><input type="password" name="password" value=""/> </td>
        </tr>
        <tr>
            <td><input type="submit"  value="提交"/> </td>
            <td><input type="reset" value="重新添写"/></td>
        </tr>
    </table>
</form>
<?php
    if(!empty($_GET['errno'])){
        $errno = $_GET['errno'];
        if($errno ==1){
            echo "<font color='red' size='3'>用户名或密码错误！！</font>";
        }
    }


?>
</html>