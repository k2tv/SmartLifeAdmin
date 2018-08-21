<?php
require_once '../api/conn.php';

//判断数据
        /*$getId = @$_POST['getId'] ? $_POST['getId'] :'';
        $getType = @$_POST['getType'] ? $_POST['getType']:'' ;
        $D_fid = @$_POST['D_fid'] ? $_POST['D_fid'] :'';*/

        $Ddata= @$_POST['getData'] ? $_POST['getData'] :'';
        $strarr = explode("-",$Ddata);

        $getId = $strarr[0];
        $getType = $strarr[1];
        $D_fid = $strarr[2];

//修改数据
        $name = @$_POST['name'] ? $_POST['name'] : '';
        $data = @$_POST['data'] ? $_POST['data'] : '';
        $fid = @$_POST['fid'] ? $_POST['fid'] : '';
        $status = null;
if ((!empty($getId))&&(!empty($getType))&&(!empty($D_fid))){

    if(!empty($name)&&!empty($data)&&!empty($fid)){
        $rs = mysql_query("UPDATE device SET Dname = '$name',Ddata = '$data',D_fid='$fid' WHERE getType = '$getType'AND D_fid = $D_fid AND getId = '$getId' ");
    }
    else if(empty($name)&&!empty($data)&&!empty($fid)){
        $rs = mysql_query("UPDATE device SET Ddata = '$data',D_fid='$fid' WHERE getType = '$getType'AND D_fid = $D_fid AND getId = '$getId' ");
    }
    else if(!empty($name)&&empty($data)&&!empty($fid)){
        $rs = mysql_query("UPDATE device SET Dname = '$name',D_fid='$fid' WHERE getType = '$getType'AND D_fid = $D_fid AND getId = '$getId' ");
    }
    else if(!empty($name)&&!empty($data)&&empty($fid)){
        $rs = mysql_query("UPDATE device SET Dname = '$name',Ddata = '$data' WHERE getType = '$getType'AND D_fid = $D_fid AND getId = '$getId' ");
    }
    else if(empty($name)&&empty($data)&&!empty($fid)){
        $rs = mysql_query("UPDATE device SET D_fid='$fid' WHERE getType = '$getType'AND D_fid = $D_fid AND getId = '$getId' ");
    }
    else if(!empty($name)&&empty($data)&&empty($fid)){
        $rs = mysql_query("UPDATE device SET Dname = '$name' WHERE getType = '$getType'AND D_fid = $D_fid AND getId = '$getId' ");
    }
    else if(empty($name)&&!empty($data)&&empty($fid)){
        $rs = mysql_query("UPDATE device SET Ddata = '$data' WHERE getType = '$getType'AND D_fid = $D_fid AND getId = '$getId' ");
    }
    else{
        //header("location:table.php?&status=4");
        $rs = mysql_query("delete From device WHERE  getType = '$getType'AND D_fid = $D_fid AND getId = '$getId'");
        $status = 1;
    }

    if(mysql_affected_rows() <= 0){
       header("location:table.php?&status=2");
       // echo $getId."--".$getType."--".$D_fid."==".$Ddata;

    }else{
        header("location:table.php?status=1".$status);
    }

}else{
   header("location:table.php?status=2");
   //echo $getId."--".$getType."--".$D_fid."==".$strarr[1];
}
mysql_free_result($rs);
mysql_close();
?>