<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--禁止缓存-->
    <!-- <META HTTP-EQUIV="pragma" CONTENT="no-cache">-->
    <title>SmartLife后台管理系统</title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
   
    <link rel="stylesheet" href="assets/js/Lightweight-Chart/cssCharts.css">

</head>

<body>
<?php

require_once 'chk_login.php';
//链接数据库
require_once '../api/conn.php';
//探针
require_once '../new_tz.php';
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

            <div id="sideNav" href=""><i class="fa fa-caret-right"></i></div>
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
                    <a  class="active-menu" href="index.php"><i class="fa fa-dashboard"></i> 数据统计</a>
                </li>
                <li>
                    <a href="ui-elements.php"><i class="fa fa-desktop"></i> 接口信息</a>
                </li>

                <li>
                    <a href="tab-panel.php"><i class="fa fa-qrcode"></i> 家庭数据</a>
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

    <div id="page-wrapper">
        <div class="header">
            <h1 class="page-header">
                Smart Life <small>信息统计</small>
            </h1>
        </div>
        <div id="page-inner">

            <!-- /. ROW  -->

            <div class="row">
                <div class="col-xs-6 col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-body easypiechart-panel">
                            <h4>服务器内存</h4>
                            <div class="easypiechart" id="easypiechart-red" data-percent="<?php echo $memCachedPercent;?>" ><span class="percent"><?php echo $memCachedPercent;?>%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-body easypiechart-panel">
                            <h4>服务器CPU</h4>
                            <div class="easypiechart" id="easypiechart-orange" data-percent="<?php echo $memRealPercent;?>" ><span class="percent"><?php echo $memRealPercent;?>%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-body easypiechart-panel">
                            <h4>服务器带宽</h4>
                            <div class="easypiechart" id="easypiechart-teal" data-percent="<?php echo $i?>" ><span class="percent"><?php echo $i?>%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-body easypiechart-panel">
                            <h4>服务器硬盘</h4>
                            <div class="easypiechart" id="easypiechart-blue" data-percent="<?php echo $hdPercent;?>" ><span class="percent"><?php echo $hdPercent;?>%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.row-->


            <div class="row">
                <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="panel panel-primary text-center no-boder blue">
                        <a href="tab-panel.php"><div class="panel-left pull-left blue">
                                <i class="fa fa-eye fa-5x"></i>
                            </div>
                            <div class="panel-right">
                                <h3>
                                    <?php
                                    $sql="SELECT COUNT(*) AS count FROM family";
                                    $result=mysql_fetch_array(mysql_query($sql));
                                    $count=$result['count'];
                                    mysql_free_result($result);
                                    echo $count;
                                    ?>
                                </h3>
                                <strong> 家庭数量</strong>
                            </div></a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="panel panel-primary text-center no-boder blue">
                        <a href="table.php"><div class="panel-left pull-left blue">
                                <i class="fa fa-shopping-cart fa-5x"></i>
                            </div>

                            <div class="panel-right">
                                <h3>
                                    <?php
                                    $sql="SELECT COUNT(*) AS count FROM user";
                                    $result=mysql_fetch_array(mysql_query($sql));
                                    $count=$result['count'];
                                    mysql_free_result($result);
                                    echo $count;
                                    ?>
                                </h3>
                                <strong> 用户总数</strong>

                            </div></a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="panel panel-primary text-center no-boder blue">
                        <a href="form.php"><div class="panel-left pull-left blue">
                                <i class="fa fa fa-comments fa-5x"></i>

                            </div>
                            <div class="panel-right">
                                <h3>
                                    <?php
                                    $sql="SELECT COUNT(*) AS count FROM backmsg";
                                    $result=mysql_fetch_array(mysql_query($sql));
                                    $count=$result['count'];
                                    mysql_free_result($result);
                                    echo $count;
                                    ?>
                                </h3>
                                <strong> 反馈信息 </strong>
                            </div></a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="panel panel-primary text-center no-boder blue">
                        <a href="table.php"><div class="panel-left pull-left blue">
                                <i class="fa fa-users fa-5x"></i>
                            </div>
                            <div class="panel-right">
                                <h3>
                                    <?php
                                    $sql="SELECT COUNT(*) AS count FROM device";
                                    $result=mysql_fetch_array(mysql_query($sql));
                                    $count=$result['count'];
                                    mysql_free_result($result);
                                    mysql_close();
                                    echo $count;
                                    ?>
                                </h3>
                                <strong>设备总数</strong>
                            </div></a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-5">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            API调用次数变化趋势
                        </div>
                       <div class="panel-body">
                            <div id="morris-line-chart"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-7">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            服务器流量统计(M)
                        </div>
                        <div class="panel-body">
                            <div id="morris-bar-chart"></div>
                        </div>

                    </div>
                </div>

            </div>



            <div class="row">
                <div class="col-md-9 col-sm-12 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            访问终端统计
                        </div>
                        <div class="panel-body">
                            <div id="morris-area-chart">
                             </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            访问终端占比
                        </div>
                      <div class="panel-body">
                            <div id="morris-donut-chart"></div>

                        </div>
                    </div>
                </div>

            </div>




            <footer><p>Copyright &copy; 2016.Smart Life All rights reserved.</p>


            </footer>
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
<!-- Morris Chart Js -->
<script src="assets/js/morris/raphael-2.1.0.min.js"></script>
<script src="assets/js/morris/morris.js"></script>


<script src="assets/js/easypiechart.js"></script>
<script src="assets/js/easypiechart-data.js"></script>

<script src="assets/js/Lightweight-Chart/jquery.chart.js"></script>

<!-- Custom Js -->
<script src="assets/js/custom-scripts.js"></script>

</body>

</html>

    