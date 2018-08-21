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
        <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
  
    <script type="text/javascript">
        function aNew(bid,uid){
            //实现页面的跳转
            //var fid = 1;
            var path = "form2.php?bid=" + bid +"&uid="+ uid + "";
            window.location.href=path;
        }
    </script>
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
                        <a href="tab-panel.php"><i class="fa fa-qrcode"></i> 家庭数据</a>
                    </li>

                    <li>
                        <a href="table.php"><i class="fa fa-table"></i> 数据库</a>
                    </li>
                    <li>
                        <a class="active-menu" href="form.php"><i class="fa fa-edit"></i> 反馈信息处理</a>
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
                            Smart Life <small>反馈信息处理</small>
                        </h1>
		</div>
		
            <div id="page-inner"> 
              <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                请选择未处理消息
                            </div>
                            <!--    Hover Rows  -->
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th >#</th>
                                                <th>反馈内容</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $rs = mysql_query("SELECT * FROM backmsg WHERE flag = 0");
                                            //输出
                                            while($row=mysql_fetch_object($rs)){
                                                echo "<tr class=\"odd gradeA\" onclick='aNew($row->Bid,$row->B_uid)'>
                                                    <td>".$row->Bid."</td>
                                                    <td>".$row->msg."</td>
                                                    </tr>";
                                            }
                                            mysql_free_result($rs);
                                            mysql_close();
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- End  Hover Rows  -->
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
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
    
   
</body>
</html>
