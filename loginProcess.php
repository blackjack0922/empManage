<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/1/14 0014
 * Time: 下午 1:29
 */
header("Content-type: text/html; charset=utf-8");

require_once "AdminService.class.php";
//接收用户的数据
$id = $_POST['id'];
$password = $_POST['password'];

$adminservice = new AdminService();
if($name=($adminservice->checkAdmin($id,$password))){
    header("Location:empMain.php?name=$name");
    exit();
}else{
    header("Location:login.php?errno=1");
    exit();
}


/*
$conn = mysqli_connect("localhost","root","090324","empmanage");
if(!$conn){
    die("连接失败".mysql_error());
}

$sql = "select password,name from admin where id=$id";

$res = mysqli_query($conn,$sql);
if($row=mysqli_fetch_assoc($res)){
    if($row['password']==md5($password)){
        $name = $row['name'];
        header("Location:empMain.php?name=$name");
        exit();
    }
}


mysqli_free_result($res);

mysqli_close($conn);*/


/*if($id=="100" && $password =="123"){
    header("Location:empMain.php");
    exit();
}else{
    header("Location:login.php?errno=1");
}*/