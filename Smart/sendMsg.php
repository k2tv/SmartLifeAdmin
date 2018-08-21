<?php
    require '../api/conn.php';

    $bid = @$_POST['bid'] ? $_POST['bid'] : '';
    $uid = @$_POST['uid'] ? $_POST['uid'] : '';
    $msg = @$_POST["msg"] ? $_POST["msg"] : '';

        if(!empty($msg)){
            //此处并未实质上回复消息
            $rs = mysql_query("UPDATE backmsg SET flag = 1 WHERE Bid = $bid");
            if(mysql_affected_rows() <= 0){

                header("location:form2.php?bid=".$bid."&uid=".$uid."&status=2");
            }else{
                header("location:form2.php?bid=".$bid."&uid=".$uid."&status=1");
            }
        }else{
            header("location:form2.php?bid=".$bid."&uid=".$uid."&status=3");
        }

        mysql_free_result($rs);

        mysql_close();

?>