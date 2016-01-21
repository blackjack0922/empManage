<html>
<head>
    <meta http-equiv="content-type" content="text/html character=utf8" />
</head>
</html>
<?php
header("Content-type: text/html; charset=utf-8");
//用户信息列表

$link = mysqli_connect("localhost","root","090324","empmanage");
if(!$link){
    die("连接失败".mysqli_error());
}

$pageNow=1;
$pageCount=0;
$pageSize=12;
$rowCount=0;


if(!empty($_GET['pageNow'])){
    $pageNow = $_GET['pageNow'];
}
$sql= "select count(id) from emp";
$countRes = mysqli_query($link,$sql);
if($row = mysqli_fetch_row($countRes)){
    $rowCount = $row[0];
}
$pageCount = ceil($rowCount/$pageSize);
$strNum = ($pageNow-1)*$pageSize;
$sql = "select * from emp limit $strNum,$pageSize";
$res = mysqli_query($link,$sql);

echo "<table border='1' cellspacing='0' cellpadding='0' width='700px'>";
echo "<tr><th>ID</th><th>Name</th><th>Grade</th><th>Email</th><th>Salary</th></tr>";
while($row=mysqli_fetch_assoc($res)){
    echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['grade']}</td><td>{$row['email']}</td><td>{$row['salary']}</td></tr>";
}
echo "</table>";

$page_whole = 20;
$start =floor(($pageNow-1)/$page_whole)*$page_whole+1;
$index = $start;
if($pageNow>10){
    echo "<a href='empList.php?pageNow=".($start-1)."'>&nbsp;<<&nbsp;</a>";
}
for(;$start<$index+10;$start++){
    echo "<a href='empList.php?pageNow=$start'>[$start]</a>";
}
echo "<a href='empList.php?pageNow=$start'>&nbsp;>>&nbsp;</a>";


/*for($i=1;$i<=$pageCount;$i++){
    echo "<a href='empList.php?pageNow=$i'>$i</a>&nbsp;";
}*/


