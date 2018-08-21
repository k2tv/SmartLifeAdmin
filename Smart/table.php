<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SmartLife后台管理系统</title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->

    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    
    <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <script type="text/javascript">
        function aNew(flag,id,type,fid){
            //实现页面的跳转
            //var fid = 1;
            var path =null;
            if(flag==1){
                path = "table_f.php?id=" + id ;
            }
            if(flag==2){
                path = "table_u.php?id=" + id ;
            }
            if(flag==3){
                path = "table_d.php?getId=" + id + "&getType="+type + "&Fid="+ fid;
            }

            window.location.href=path;
        }
    </script>
</head>
<body>
<?php
    //检查登陆
    require_once 'chk_login.php';
    //数据库
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
                    <a href="tab-panel.php"><i class="fa fa-qrcode"></i> 家庭数据</a>
                </li>

                <li>
                    <a class="active-menu" href="table.php"><i class="fa fa-table"></i> 数据库</a>
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
                Smart Life <small>数据库主要数据预览</small>
            </h1>
        </div>

        <div id="page-inner">

            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            家庭数据
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th>家庭ID</th>
                                        <th>家庭名称</th>
                                        <th>终端设备ID</th>
                                        <th>创建者ID</th>
                                        <th>创建时间</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                    $rs = mysql_query("SELECT * FROM family");
                                    //输出
                                    while($row=mysql_fetch_object($rs)){
                                        echo "<tr class=\"odd gradeA\" onclick='aNew(1,$row->Fid,null,null)'>
                                                    <td>".$row->Fid."</td>
                                                    <td>".$row->Fname."</td>
                                                    <td>".$row->TerminalId."</td>
                                                    <td>".$row->CreatorId."</td>
                                                    <td>".$row->F_time."</td></tr>";
                                    }
                                    mysql_free_result($rs);
                                    //mysql_close();
                                    ?>

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            用户数据
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example2">
                                    <thead>
                                    <tr>
                                        <th>用户ID</th>
                                        <th>用户昵称</th>
                                        <th>用户所属家庭ID</th>
                                        <th>注册时间</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                    $rs = mysql_query("SELECT * FROM user");
                                    //输出
                                    while($row=mysql_fetch_object($rs)){
                                        echo "<tr class=\"odd gradeA\" onclick='aNew(2,$row->id,null,null)'>
                                                    <td>".$row->id."</td>
                                                    <td>".$row->name."</td>
                                                    <td>".$row->U_fid."</td>
                                                    <td>".$row->U_date."</td></tr>";
                                    }
                                    mysql_free_result($rs);
                                    //mysql_close();
                                    ?>

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            设备数据
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example3">
                                    <thead>
                                    <tr>
                                        <th>设备名称</th>
                                        <th>所属家庭ID</th>
                                        <th>设备类型</th>
                                        <th>设备ID</th>
                                        <th>数据</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                    $rs = mysql_query("SELECT * FROM device");
                                    //输出
                                    while($row=mysql_fetch_object($rs)){
                                        $getId = "\"".$row->getId."\"";
                                        $getType = "\"".$row->getType."\"";
                                        
                                        echo "<tr class=\"odd gradeA\" ' onclick='aNew(3,$getId,$getType,$row->D_fid)'>
                                                    <td>".$row->Dname."</td>
                                                    <td>".$row->D_fid."</td>
                                                    <td>".$row->getType."</td>
                                                    <td>".$row->getId."</td>
                                                    <td>".$row->Ddata."</td></tr>";
                                    }
                                    mysql_free_result($rs);
                                    mysql_close();
                                    ?>

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
            <footer><p>Copyright &copy; 2016.Smart Life rights reserved.</p></footer>
        </div>
    </div>
    <!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
<!-- /. WRAPPER  -->
<!-- JS Scripts-->
<!-- jQuery Js -->
<script src="assets/js/jquery-1.10.2.js"></script>
<!-- Bootstrap Js -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- Metis Menu Js -->
<script src="assets/js/jquery.metisMenu.js"></script>
<!-- DATA TABLE SCRIPTS -->
<script src="assets/js/dataTables/jquery.dataTables.js"></script>
<script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
<script>
    $(document).ready(function () {
        $('#dataTables-example').dataTable();
    });
</script>
<script>
    $(document).ready(function () {
        $('#dataTables-example2').dataTable();
    });
</script>
<script>
    $(document).ready(function () {
        $('#dataTables-example3').dataTable();
    });
</script>
<!-- Custom Js -->
<script src="assets/js/custom-scripts.js"></script>


</body>
</html>
<?php
    $status = @$_GET['status']?$_GET['status']:'';
    if($status=="11"){
        echo '<script language="JavaScript">;alert("删除成功");</script>;';
    }
    if($status=="1"){
        echo '<script language="JavaScript">;alert("更改成功");</script>;';
    }
    if($status=="2"){
        echo '<script language="JavaScript">;alert("数据未更改");</script>;';
    }
?>