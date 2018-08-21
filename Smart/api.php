<?php
require '../api/conn.php';

$id = @$_POST['id'] ? $_POST['id'] : '';
$file = @$_POST['file'] ? $_POST['file'] : '';
$url = @$_POST["url"] ? $_POST["url"] : '';
$status = @$_POST['status'] ? $_POST['status'] : '';
$etc = @$_POST['etc'] ? $_POST['etc'] : '';

if(empty($file)&&empty($url)&&empty($status)&&empty($etc)&&!empty($id)){
    $rs = mysql_query("delete From api WHERE id = '$id'");
    header("location:ui-elements.php?&status=11");
}else{
    if(!empty($id)){
        $rs = mysql_query("UPDATE api SET file = '$file',url = '$url',status = '$status',etc = '$etc' WHERE id = '$id'");
    }else{
        $rs = mysql_query("INSERT INTO api (file,url,status,etc) VALUES ('$file','$url','$status', '$etc')");
    }

    if(mysql_affected_rows() <= 0){
        header("location:ui-elements.php?&status=2");
        exit;
    }else{
        header("location:ui-elements.php?&status=1");
    }
}
    mysql_free_result($rs);

    mysql_close();
?>