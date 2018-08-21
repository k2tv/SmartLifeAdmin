<!DOCTYPE html>
<?php
//接收数据并处理
//
    $fid = @$_GET['fid']?$_GET['fid']:'';
    if(empty($fid)){
        header("location:tab-panel.php");
    }else{

    }
//
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SmartLife后台管理系统</title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
  
    <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>
<body>
<?php
require_once 'chk_login.php';
require_once '../api/conn.php';
?>
<div id="wrapper">
    <nav class="navbar navbar-default top-navbar" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><strong>SmartLife后台管理</strong></a>
        </div>

        <ul class="nav navbar-top-links navbar-right">

            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> 退出</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
    </nav>
    <!--/. NAV TOP  -->
    <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">
                <li>
                    <a  href="index.php"><i class="fa fa-dashboard"></i> 数据统计</a>
                </li>
                <li>
                    <a href="ui-elements.php"><i class="fa fa-desktop"></i> 接口信息</a>
                </li>

                <li>
                    <a class="active-menu" href="tab-panel.php"><i class="fa fa-qrcode"></i> 家庭数据</a>
                </li>

                <li>
                    <a href="table.php"><i class="fa fa-table"></i> 数据库</a>
                </li>
                <li>
                    <a href="form.php"><i class="fa fa-edit"></i> 反馈信息处理</a>
                </li>

                <li>
                    <a href="empty.php"><i class="fa fa-fw fa-file"></i> 用户分布</a>
                </li>
            </ul>

        </div>

    </nav>
    <!-- /. NAV SIDE  -->
    <div id="page-wrapper" >
        <div class="header">
            <h1 class="page-header">
                Smart Life <small>家庭数据</small>
            </h1>
        </div>
        <div id="page-inner">
            <!-- /. ROW  -->
            <div class="row">

                <div class="col-md-6 col-sm-6" style="width: 100%">
                    <div class="panel panel-default">

                        <div class="panel-body" >
                            <ul class="nav nav-pills">
                                <li class="active"><a href="#home-pills" data-toggle="tab">家庭信息</a>
                                </li>
                                <li class=""><a href="#profile-pills" data-toggle="tab">家庭成员</a>
                                </li>
                                <li class=""><a href="#messages-pills" data-toggle="tab">可控设备</a>
                                </li>
                                <li class=""><a href="#settings-pills" data-toggle="tab">智能场景</a>
                                </li>
                                <li class=""><a href="tab-panel.php">其他家庭</a>
                                </li>

                                <!--<div align="left" style="margin-left:40%"><a href="tab-panel.php" >
                                        <button type="reset" class="btn btn-default">选择家庭</button></a>
                                </div>-->
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane fade active in" id="home-pills">

                                    <div style="float:left;">
                                        <?php
                                        //接收数据并处理
                                        //
                                        $rs = mysql_query("SELECT * FROM family WHERE Fid = $fid");
                                        //输出
                                        while($row=mysql_fetch_object($rs)){
                                            echo "<p style='margin-left: 2%'>家庭ID：".$row->Fid."</p>";
                                            echo "<p style='margin-left: 2%'>家庭名称：".$row->Fname."</p>";
                                            echo "<p style='margin-left: 2%'>创建者ID：".$row->CreatorId."</p>";
                                            echo "<p style='margin-left: 2%'>终端设备ID：".$row->TerminalId."</p>";
                                            echo "<p style='margin-left: 2%'>创建时间：".$row->F_time."</p>";
                                        }
                                        mysql_free_result($rs);
                                        //mysql_close();
                                        ?>
                                    </div>
                                    <div style="float:right;">
                                        <?php
                                        //经纬度信息
                                        $rs = mysql_query("SELECT * FROM tempinfo WHERE TI_fid = $fid");
                                        //输出
                                        while($row=mysql_fetch_object($rs)){
                                            echo "<p>位置信息：经度".$row->lon." ;纬度".$row->lat."</p>";
                                            $lon = $row->lon;
                                            $lat = $row->lat;
                                            echo "<iframe id=\"iframepage\" frameborder=\"0\" scrolling=\"no\" marginheight=\"0\" marginwidth=\"0\" onLoad=\"iFrameHeight()\"
                                             style=\"width: 100%;height: 100%\" src=\"map.php?lon=".$lon."&lat=".$lat."\"></iframe>";
                                            /*$path = "'map.php?lon=".$lon."&lat=".$lat."''";
                                            include_once $path;*/

                                        }
                                        mysql_free_result($rs);
                                        //mysql_close();
                                        ?>
                                          <!--<iframe style="height: 100%" src="map.php"></iframe>-->
                                    </div>
                                    </div>

                                <div class="tab-pane fade" id="profile-pills">
                                    <!--    Hover Rows  -->
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th>成员ID</th>
                                                        <th>成员昵称</th>
                                                        <th>注册时间</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $rs = mysql_query("SELECT * FROM user WHERE U_fid = $fid");
                                                    //输出
                                                    $i=0;
                                                    while($row=mysql_fetch_object($rs)){
                                                        echo "<tr class=\"odd gradeA\" '>
                                                              <td>".$row->id."</td>
                                                              <td>".$row->name."</td>
                                                              <td>".$row->U_date."</td></tr>";
                                                        $i++;
                                                        }
                                                    if($i==0){
                                                        echo "<tr class=\"odd gradeA\"'>
                                                               <td>"."暂无成员"."</td>
                                                               <td>"."暂无成员"."</td></tr>";
                                                    }

                                                    mysql_free_result($rs);
                                                    //mysql_close();
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End  Hover Rows  -->
                                </div>
                                <div class="tab-pane fade" id="messages-pills">
                                    <!--    Hover Rows  -->
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th>设备号</th>
                                                        <th>设备名称</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $rs = mysql_query("SELECT * FROM device WHERE D_fid = $fid");

                                                    //输出
                                                    //记录条数
                                                    $i=0;
                                                    while($row=mysql_fetch_object($rs)){
                                                        echo "<tr class=\"odd gradeA\"'>
                                                               <td>".$row->getType."-".$row->getId."</td>
                                                               <td>".$row->Dname."</td></tr>";
                                                        $i++;
                                                    }
                                                    if($i==0){
                                                        echo "<tr class=\"odd gradeA\"'>
                                                               <td>"."暂无设备"."</td>
                                                               <td>"."暂无设备"."</td></tr>";
                                                    }

                                                    mysql_free_result($rs);
                                                    //mysql_close();
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End  Hover Rows  -->
                                </div>
                                <div class="tab-pane fade" id="settings-pills">
                                    <!--<h4>智能场景</h4>-->
                                    <!--    Hover Rows  -->
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th>场景名称</th>
                                                        <th>数据(未处理)</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $rs = mysql_query("SELECT * FROM model WHERE M_fid = $fid");

                                                    //输出
                                                    //记录条数
                                                    $i=0;
                                                    while($row=mysql_fetch_object($rs)){
                                                        echo "<tr class=\"odd gradeA\"'>
                                                               <td>".$row->Mname."</td>
                                                               <td>".$row->Mdata."</td></tr>";
                                                        $i++;
                                                    }
                                                    if($i==0){
                                                        echo "<tr class=\"odd gradeA\"'>
                                                               <td>"."暂无场景"."</td>
                                                               <td>"."暂无场景"."</td></tr>";
                                                    }

                                                    mysql_free_result($rs);
                                                    //mysql_close();
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /. ROW  -->
            <footer><p>Copyright &copy; 2016.Smart Life All rights reserved.</p></footer>
        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
</div>
<!-- /. WRAPPER  -->
<!-- JS Scripts-->
<!-- jQuery Js -->
<script src="assets/js/jquery-1.10.2.js"></script>
<!-- Bootstrap Js -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- Metis Menu Js -->
<script src="assets/js/jquery.metisMenu.js"></script>
<!-- Custom Js -->
<script src="assets/js/custom-scripts.js"></script>
<!-- DATA TABLE SCRIPTS -->
<script src="assets/js/dataTables/jquery.dataTables.js"></script>
<script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
<script>
    $(document).ready(function () {
        $('#Tables-example9').dataTable();
    });
</script>
<!--<iframe>自适应大小</iframe>-->
<script type="text/javascript" language="javascript">
    function iFrameHeight() {
        var ifm= document.getElementById("iframepage");
        var subWeb = document.frames ? document.frames["iframepage"].document : ifm.contentDocument;
        if(ifm != null && subWeb != null) {
            ifm.height = subWeb.body.scrollHeight;
        }
    }
</script>

</body>
</html>
</html>
</html>