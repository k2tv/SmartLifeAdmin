<?php
require_once '../api/conn.php';

$id = @$_POST['id'] ? $_POST['id'] : '';
$name = @$_POST['name'] ? $_POST['name'] : '';
$fid = @$_POST['fid'] ? $_POST['fid'] : '';;
$status = null;
if (!empty($id)){
    
    if(!empty($name)&&!empty($fid)){
        $rs = mysql_query("UPDATE user SET name = '$name',U_fid = '$fid' WHERE id = '$id'");
    }
    else if(empty($name)&&!empty($fid)){
        $rs = mysql_query("UPDATE user SET U_fid= '$fid' WHERE id = '$id'");
    }
    else if(!empty($name)&&empty($fid)){
        $rs = mysql_query("UPDATE user SET name = '$name' WHERE id = '$id'");
    }
    else if(empty($name)&&empty($fid)){
        $rs = mysql_query("delete From user WHERE id = '$id'");
        $status = 1;
    }


    if(mysql_affected_rows() <= 0){
        header("location:table.php?&status=2");

    }else{
        header("location:table.php?status=1".$status);
    }

}else{
    header("location:table.php?status=2");
}
mysql_free_result($rs);
mysql_close();
?>