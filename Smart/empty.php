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
   
</head>
<body>
<?php
require_once 'chk_login.php';
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
                        <a href="form.php"><i class="fa fa-edit"></i> 反馈信息处理</a>
                    </li>

                    <li>
                        <a class="active-menu" href="empty.php"><i class="fa fa-fw fa-file"></i> 用户分布</a>
                    </li>
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
		  <div class="header"> 
                        <h1 class="page-header">
                            Smart Life <small>全国用户分布</small>
                        </h1>
		</div>
            <div class="row">
                <div class="col-lg-12"align="center">
                    <div class="panel panel-default" style="width: 95% ">
                        <iframe id="iframepage" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" onLoad="iFrameHeight()"
                                style="width: 100%;height: 500px" src="map_u.php"></iframe>
                    </div>
                </div>
            </div>
            <div id="page-inner"> 
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
