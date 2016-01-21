<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/1/18 0018
 * Time: 下午 4:38
 */
require_once "SqlHelper.class.php";
class EmpService{
    function  getPageCount($pageSize){
        $sql = "select count(id) from emp";
        $sqlhelper = new SqlHelper();
        $res = $sqlhelper->execute_dql($sql);
        if($row = mysqli_fetch_row($res)){
            $pageCount = ceil($row[0]/$pageSize);
        }
        mysqli_free_result($res);
        $sqlhelper->close_conn();

        return $pageCount;
    }
    function getEmpListByPage($pageNow,$pageSize){
        $strNum = ($pageNow-1)*$pageSize;

        $sql =  "select * from emp limit $strNum,$pageSize";
        $sqlHelper = new SqlHelper();
        $re = $sqlHelper->execute_dql($sql);

//        $sqlHelper->close_conn();
        return $re;


    }

    /**
     * @param $fenyePage
     */
    function getFenyePage($fenyePage){
        $sqlhelper = new SqlHelper();
        $sql1 = "select * from emp limit ".($fenyePage->pageNow-1)*$fenyePage->pageSize.",".$fenyePage->pageSize;
        $sql2 = "select count(id) from emp";
        $sqlhelper->exectue_dql_fenye($sql1,$sql2,$fenyePage);

    }
}