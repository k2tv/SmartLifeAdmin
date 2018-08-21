<?php
require '../api/conn.php';

    $rs = mysql_query("select * FROM api_data");
    $count_end = mysql_num_rows($rs);
    $count_start = $count_end-7;
    $rs = mysql_query("select date_data as y,num_data as a FROM api_data order by id limit $count_start,$count_end");

    if(mysql_affected_rows() <= 0){
        exit;
    }else{
        class Data{
            public $a;
            public $y;
        }

        $data=array();

        while($row=mysql_fetch_object($rs)){
            $s=new Data();
            $s->y = $row->y;
            $s->a = $row->a;
            $data[]=$s;
        }
        //exit(json_encode($data));
        echo json_encode($data);
    }


    mysql_free_result($rs);

    mysql_close();

?>