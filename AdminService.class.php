<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/1/15 0015
 * Time: 下午 4:32
 */
require_once "SqlHelper.class.php";
class AdminService{
    public function checkAdmin($id,$password){
        $sql = "select password,name from admin where id=$id";
        $sqlhelper = new SqlHelper();
        $res = $sqlhelper->execute_dql($sql);
        if($row=mysqli_fetch_assoc($res)){
            if(md5($password)==$row['password']){
                return true;
            }
        }
        mysqli_free_result($res);
        $sqlhelper->close_conn();
        return false;
    }
}