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
    require_once '../api/conn.php';
    $bid = @$_GET['bid']?$_GET['bid']:'';
    $uid = @$_GET['uid']?$_GET['uid']:'';
    $status = @$_GET['status']?$_GET['status']:'';
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
                    <div class="panel panel-default" style="width: 100%">
                        <div class="panel-body">
                            <div class="row" >
                                <div class="col-lg-6">

                                    <?php
                                    $rs = mysql_query("SELECT * FROM user WHERE id = $uid");
                                    //输出
                                    while($row=mysql_fetch_object($rs)){
                                        $nic = $row->name;
                                    }
                                    $rs = mysql_query("SELECT * FROM backmsg WHERE Bid = $bid");
                                    //输出
                                    while($row=mysql_fetch_object($rs)){
                                        echo "<p><b>反馈编号：</b>".$row->Bid."</p>";
                                        echo "<p><b>反馈人：</b>".$nic."<b> ID：</b>".$uid."</p>";
                                        echo "<p><b>反馈时间：</b>".$row->date."</p>";
                                        echo "<p><b>反馈内容：</b>".$row->msg."</p>";
                                        $connp = $row->contact;
                                        if(!empty($connp)){
                                            echo "<p><b>联系方式：</b>".$connp."</p>";
                                        }

                                    }
                                    mysql_free_result($rs);
                                    mysql_close();
                                    ?>
                                </div>

                                <div class="col-lg-6">
                                    <div  style="margin-top:10%">
                                        <form role="form" action="sendMsg.php" method="post">
                                            <div class="form-group">
                                                <label>回复内容</label>
                                                <textarea class="form-control" rows="3" name="msg"></textarea>
                                                <!--<input type="text" name="msg">-->
                                                <input type="hidden" name="bid" value="<?php echo $bid?>">
                                                <input type="hidden" name="uid" value="<?php echo $uid?>">
                                            </div>
                                            <div align="right">
                                                <button type="submit" class="btn btn-default" >回复</button>
                                                <button type="reset" class="btn btn-default">重置</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
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

<?php
        if(!empty($status)){
            if($status == "2"){
                echo '<script language="JavaScript">;alert("消息处理有误");</script>;';
            }
            if($status == "1"){
                echo '<script language="JavaScript">;alert("消息处理完成,处理新消息?");location.href="form.php";</script>;';
            }
            if($status == "3"){
                echo '<script language="JavaScript">;alert("回复内容不能为空");</script>;';
            }
        }
?>