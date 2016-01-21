<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/1/15 0015
 * Time: 下午 4:29
 */
class  SqlHelper
{
    public $conn;
    public $dbname = "empmanage";
    public $username="root";
    public $password="090324";
    public $host="localhost";

    public function __construct()
    {
        $this->conn =mysqli_connect($this->host, $this->username, $this->password, $this->dbname);

        if (mysqli_connect_error()) {
            die("连接失败！".mysqli_connect_error());
            exit();
        }
    }

    public function execute_dql($sql)
    {
        $res = mysqli_query($this->conn, $sql);
        return $res;

    }

    public  function execute_dql2($sql){
        $arr = array();
        $res = mysqli_query($this->conn,$sql) or die(mysqli_error($this->conn));
        while($row = mysqli_fetch_assoc($res)){
            $arr[] =$row;
        }
        mysqli_free_result($res);
        return $arr;
    }

    /**
     * @param $sql1 ="select * from where tablename limit ...."
     * @param $sql2 ="select count(id) from tableName"
     * @param $fenyePage
     */
    public function exectue_dql_fenye($sql1,$sql2,$fenyePage){
        $res = mysqli_query($this->conn,$sql1);
        $arr = array();
        while($row = mysqli_fetch_assoc($res)){
            $arr[] = $row;
        }
        mysqli_free_result($res);

        $res =mysqli_query($this->conn,$sql2);
        if($row = mysqli_fetch_row($res)){
            $fenyePage->pageCount = ceil(($row[0])/$fenyePage->pageSize);
            $fenyePage->rowCount = row[0];
        }
        mysqli_free_result($res);
        $navigate= "";

        if($fenyePage->pageNow>1){
            $prePage=$fenyePage->pageNow-1;
            $navigate="<a href='empList.php?pageNow=$prePage'>&nbsp;上一页&nbsp;</a>";
        }
        if($fenyePage->pageNow<$fenyePage->pageCount){
            $nextPage=$fenyePage->pageNow+1;
            $navigate.="<a href='empList.php?pageNow=$nextPage'>&nbsp;下一页&nbsp;</a>";
        }



        $fenyePage->res_array = $arr;
        $fenyePage->navigate = $navigate;


    }

    public  function  execute_dml($sql){
        $b = mysqli_query($this->conn,$sql);
        if(!$b){
            return 0;
        } else{
            if(mysqli_affected_rows($this->conn)>0){
                return 1;
            } else{
                return2;
            }
        }

    }
    public  function  close_conn(){
        if(!empty($this->conn)){
           mysqli_close($this->conn);
        }
    }
}