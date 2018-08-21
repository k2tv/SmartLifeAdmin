<?php
//链接数据库
require_once '../api/conn.php';

$t_name = @$_POST['adminName'] ? $_POST['adminName'] : '';
$pass = @$_POST['adminPsd'] ? $_POST['adminPsd'] : '';

if (empty($t_name)||empty($pass)) {

    header("location:login.php");

}else {
    $pass = md5($pass);
    $sql = "select id,aName from admin WHERE aName = '$t_name' and aPass = '$pass'";
    $rs = mysql_query($sql);
    $row = mysql_fetch_array($rs);
    if (!$row or empty($row)) {
        header("location:login.php?status=f");
        exit;
    }

    setcookie("username", $t_name, time()+60*60); //60分钟  一天 24*60*60
    header("location:./");
    mysql_free_result($rs);
    mysql_close();

}
?>