<html>
<head>
    <meta http-equiv="content-type" content="text/html character=utf8" />
</head>
</html>
<?php
header("Content-type: text/html; charset=utf-8");
//用户信息列表
require_once "EmpService.class.php";
require_once "FenyePage.class.php";

$fenyepage = new FenyePage();
$empService = new EmpService();

$fenyepage->pageSize = 6;
$fenyepage->pageNow = 1;


if(!empty($_GET['pageNow'])){
    $fenyepage->pageNow = $_GET['pageNow'];
}
$empService->getFenyePage($fenyepage);
echo "<table border='1' cellspacing='0' cellpadding='0' width='700px'>";
echo "<tr><th>ID</th><th>Name</th><th>Grade</th><th>Email</th><th>Salary</th></tr>";
for($i=0;$i<count($fenyepage->res_array);$i++){
    $row = $fenyepage->res_array[$i];
    echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['grade']}</td><td>{$row['email']}</td><td>{$row['salary']}</td></tr>";
}
echo "<h1>雇员信息列表</h1>";
echo "</table>";

    echo $fenyepage->navigate;
/*//
//if($fenyepage->pageNow>1){
//    $prePage = $fenyepage->pageNow-1;
//    echo "<a href='empList.php?pageNow=$prePage'>上一页</a></a>";
//}
//if($fenyepage->pageNow<$fenyepage->pageCount){
//    $nextPage = $fenyepage->pageNow+1;
//    echo "<a href='empList.php?pageNow=$nextPage'>下一页</a></a>";
//}
//
//$page_whole = 20;
//$start =floor(($pageNow-1)/$page_whole)*$page_whole+1;
//$index = $start;
//if($pageNow>10){
//    echo "<a href='empList.php?pageNow=".($start-1)."'>&nbsp;<<&nbsp;</a>";
//}
//for(;$start<$index+10;$start++){
//    echo "<a href='empList.php?pageNow=$start'>[$start]</a>";
//}
//echo "<a href='empList.php?pageNow=$start'>&nbsp;>>&nbsp;</a>";
//*/

/*for($i=1;$i<=$pageCount;$i++){
    echo "<a href='empList.php?pageNow=$i'>$i</a>&nbsp;";
}*/


