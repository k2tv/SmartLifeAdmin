<?php
require_once '../api/conn.php';

    $id = @$_POST['id'] ? $_POST['id'] : '';
    $name = @$_POST['name'] ? $_POST['name'] : '';
    $cid = @$_POST['cid'] ? $_POST['cid'] : '';
    $tid = @$_POST['tid'] ? $_POST['tid'] : '';
    $status = null;
if (!empty($id)){

    if(!empty($name)&&!empty($cid)&&!empty($tid)){
        $rs = mysql_query("UPDATE family SET Fname = '$name',CreatorId = '$cid',TerminalId='$tid' WHERE Fid = '$id'");
    }
    else if(empty($name)&&!empty($cid)&&!empty($tid)){
        $rs = mysql_query("UPDATE family SET CreatorId = '$cid',TerminalId='$tid' WHERE Fid = '$id'");
    }
    else if(!empty($name)&&empty($cid)&&!empty($tid)){
        $rs = mysql_query("UPDATE family SET Fname = '$name',TerminalId='$tid' WHERE Fid = '$id'");
    }
    else if(!empty($name)&&!empty($cid)&&empty($tid)){
        $rs = mysql_query("UPDATE family SET Fname = '$name',CreatorId = '$cid' WHERE Fid = '$id'");
    }
    else if(empty($name)&&empty($cid)&&!empty($tid)){
        $rs = mysql_query("UPDATE family SET TerminalId='$tid' WHERE Fid = '$id'");
    }
    else if(empty($name)&&!empty($cid)&&empty($tid)){
        $rs = mysql_query("UPDATE family SET CreatorId = '$cid' WHERE Fid = '$id'");
    }
    else if(!empty($name)&&empty($cid)&&empty($tid)){
        $rs = mysql_query("UPDATE family SET Fname = '$name' WHERE Fid = '$id'");
    }else{
        //header("location:table.php?&status=4");
        $rs = mysql_query("delete From family WHERE Fid = '$id'");
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