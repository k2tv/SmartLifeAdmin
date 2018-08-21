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
                        <a class="active-menu" href="ui-elements.php"><i class="fa fa-desktop"></i> 接口信息</a>
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
                           Smart Life <small>接口开发信息</small>
                        </h1>
									
		</div>
            <div id="page-inner">


                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>文件</th>
                                            <th>获取数据示例</th>
                                            <th>状态值信息</th>
                                            <th>功能说明</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>login.php</td>
                                            <td>URL:<a href="/api/login.php?name=昵称或ID&pass=密码" target="_black">/login.php?name=昵称或ID&pass=密码</a></td>
                                            <td>001	数据库链接失败<br/>
                                                101	传入空值<br/>
                                                102 未查询到结果/账号或密码错误<br/>
                                                103 校对成功<br/></td>
                                            <td>登陆功能<br/>
                                                成功则返回用户的昵称和id</td>
                                        </tr>
                                        <tr>
                                            <td>reg.php</td>
                                            <td>URL:<a href="/api/reg.php?name=要注册的昵称&pass=密码" target="_black">/reg.php?name=要注册的昵称&pass=密码</a></td>
                                            <td>201	传入空值<br/>
                                                202 注册失败/账号冲突<br/>
                                                203 注册成功<br/></td>
                                            <td>注册账号<br/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>DeleteUser.php</td>
                                            <td>URL:<a href="/api/DeleteUser.php?name=昵称&pass=密码" target="_black">/DeleteUser.php?name=昵称&pass=密码</a></td>
                                            <td>201	传入空值<br/>
                                                202 删除失败<br/>
                                                203 删除成功<br/></td>
                                            <td>删除账号<br/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>modpass.php</td>
                                            <td>URL:<a href="/api/modpass.php?name=昵称&pass=新密码" target="_black">/modpass.php?name=昵称&pass=新密码</a></td>
                                            <td>301	传入空值<br/>
                                                302 修改出错<br/>
                                                303 修改成功<br/></td>
                                            <td>修改密码<br/>未传入原密码，存在安全问题<br/>
                                        </tr>
                                        <tr>
                                            <td>modnic.php</td>
                                            <td>URL:<a href="/api/modnic.php?name=新昵称&oldname=原昵称" target="_black">/modnic.php?name=新昵称&oldname=原昵称</a></td>
                                            <td>301	传入空值<br/>
                                                302 修改出错<br/>
                                                303 修改成功<br/></td>
                                            <td>修改昵称<br/>
                                        </tr>
                                        <tr>
                                            <td>receive_file.php</td>
                                            <td>URL:/receive_file.php</td>
                                            <td>302 上传失败<br/>
                                                303 上传成功<br/></td>
                                            <td>上传头像<br/>POST方式
                                        </tr>
                                        <tr>
                                            <td>天气接口</td>
                                            <td>URL:<a href="http://wiki.swarma.net/index.php/%E5%BD%A9%E4%BA%91%E5%A4%A9%E6%B0%94API/v2" target="_black">接口文档</a></td>
                                            <td></td>
                                            <td>实时天气查询<br/>天气预报查询（小时级别）
                                        </tr>
                                        <tr>
                                            <td>CGetData.php</td>
                                            <td>URL:<a href="/api/CGetData.php?uid=用户ID&getType=设备类型" target="_black">/CGetData.php?uid=用户ID&getType=设备类型</a></td>
                                            <td>401	传入空值<br/>
                                                402 获取数据失败<br/>
                                                403 获取数据成功<br/></td>
                                            <td>手机APP获取设备的数据<br/>设备类型为空则获取全部数据
                                        </tr>
                                        <tr>
                                            <td>CSetData.php</td>
                                            <td>URL:<a href="/api/CSetData.php?uid=用户ID&getType=传感器类型&getId=传感器ID&newData=新数据&flag=状态改变标志位" target="_black">/CSetData.php?uid=用户ID&getType=传感器类型&getId=传感器ID&newData=新数据&flag=状态改变标志位</a></td>
                                            <td>401	传入空值<br/>
                                                402 数据未更改/更改失败<br/>
                                                403 更新成功<br/></td>
                                            <td>手机APP更新指定设备数据<br/>
                                        </tr>
                                        <tr>
                                            <td>TSetData.php</td>
                                            <td>URL:<a href="/api/TSetData.php?Tid=终端标识ID&getType=传感器类型&getId=传感器ID&newData=新数据&flag=状态改变标志位" target="_black">/TSetData.php?Tid=终端标识ID&getType=传感器类型&getId=传感器ID&newData=新数据&flag=状态改变标志位</a></td>
                                            <td>401	传入空值<br/>
                                                402 数据未更改/更改失败<br/>
                                                403 更新成功<br/></td>
                                            <td>室内终端更新指定设备数据<br/>
                                        </tr>
                                        <tr>
                                            <td>TGetData.php</td>
                                            <td>URL:<a href="/api/TGetData.php?tid=终端设备ID&getType=设备类型" target="_black">/TGetData.php?tid=终端ID&getType=设备类型</a></td>
                                            <td>401	传入空值<br/>
                                                402 获取数据失败<br/>
                                                403 获取数据成功<br/></td>
                                            <td>室内终端获取设备的数据<br/>设备类型为空则获取全部数据
                                        </tr>
                                        <tr>
                                            <td>BakcMsg.php</td>
                                            <td>URL:/BackMsg.php</td>
                                            <td>401	传入空值<br/>
                                                402 反馈失败<br/>
                                                403 反馈成功<br/></td>
                                            <td>反馈建议消息<br/>POST方式
                                        </tr>
                                        <tr>
                                            <td>DeleteDevice.php</td>
                                            <td>URL:<a href="/api/DeleteDevice.php?uidORtid=用户ID或终端设备ID&getId=设备ID&getType=设备类型" target="_black">/DeleteDevice.php?uidORtid=用户ID或终端设备ID&getId=设备ID&getType=设备类型</a></td>
                                            <td>401	传入空值<br/>
                                                402 删除失败<br/>
                                                403 删除成功<br/></td>
                                            <td>家庭创建者或者室内终端删除设备<br/>
                                        </tr>
                                        <tr>
                                            <td>AddDevice.php</td>
                                            <td>URL:<a href="/api/AddDevice.php?uidORtid=用户ID或终端设备ID&getId=设备ID&getType=设备类型&getName=要显示的名称" target="_black">/AddDevice.php?uidORtid=用户ID或终端设备ID&getId=设备ID&getType=设备类型&getName=要显示的名称</a></td>
                                            <td>400	未加入家庭<br/>
                                                401	传入空值<br/>
                                                402 添加失败<br/>
                                                403 添加成功<br/></td>
                                            <td>添加新设备<br/>
                                        </tr>
                                        <tr>
                                            <td>SetInfo.php</td>
                                            <td>URL:<a href="/api/SetInfo.php?tidORuid=用户ID或终端设备ID&setLong=经度&setLat=纬度" target="_black">/SetInfo.php?tidORuid=用户ID或终端设备ID&setLong=经度&setLat=纬度</a></td>
                                            <td>401	传入空值<br/>
                                                402 设置失败<br/>
                                                403 设置成功<br/></td>
                                            <td>设置一些配置信息<br/>
                                        </tr>
                                        <tr>
                                            <td>GetInfo.php</td>
                                            <td>URL:<a href="/api/GetInfo.php?tidORuid=用户ID或终端设备ID" target="_black">/GetInfo.php?tidORuid=用户ID或终端设备ID</a></td>
                                            <td>401	传入空值<br/>
                                                402 获取失败<br/>
                                                403 获取成功<br/></td>
                                            <td>获取一些配置信息<br/>
                                        </tr>
                                        <tr>
                                            <td>ChangeDeviceName.php</td>
                                            <td>URL:<a href="/api/ChangeDeviceName.php?uidORtid=用户ID或终端设备ID&getId=设备ID&getType=设备类型&newName=新名称" target="_black">/ChangeDeviceName.php?uidORtid=用户ID或终端设备ID&getId=设备ID&getType=设备类型&newName=新名称</a></td>
                                            <td>401	传入空值<br/>
                                                402 更改失败<br/>
                                                403 更改成功<br/></td>
                                            <td>更改设备名称<br/>
                                        </tr>
                                        <tr>
                                            <td>JoinFamily.php</td>
                                            <td>URL:<a href="/api/JoinFamily.php?tidORuid=用户ID或终端设备ID&fmlNu=家庭ID" target="_black">/JoinFamily.php?tidORuid=用户ID或终端设备ID&fmlNu=家庭ID</a></td>
                                            <td>401	传入空值<br/>
                                                402 加入失败<br/>
                                                403 加入成功<br/></td>
                                            <td>加入家庭<br/>
                                        </tr>
                                        <tr>
                                            <td>AddFmlNum.php</td>
                                            <td>URL:<a href="/api/AddFmlNum.php?uid=用户ID&fid=家庭ID" target="_black">/AddFmlNum.php?uid=用户ID&fid=家庭ID</a></td>
                                            <td>401	传入空值<br/>
                                                402 加入失败<br/>
                                                403 加入成功<br/></td>
                                            <td>管理员扫码添加成员<br/>
                                        </tr>
                                        <tr>
                                            <td>CGetFamilyNum.php</td>
                                            <td>URL:<a href="/api/CGetFamilyNum.php?uid=用户ID" target="_black">/CGetFamilyNum.php?uid=用户ID</a></td>
                                            <td>401	传入空值<br/>
                                                402 获取数据失败<br/>
                                                403 获取数据成功<br/></td>
                                            <td>APP获取家庭数据
                                        </tr>
                                        <tr>
                                            <td>BKFml.php</td>
                                            <td>URL:<a href="/api/BKFml.php?tidORuid=用户ID" target="_black">/BKFml.php?tidORuid=用户ID</a></td>
                                            <td>401	传入空值<br/>
                                                402 退出失败<br/>
                                                403 退出成功<br/></td>
                                            <td>退出家庭<br/>
                                        </tr>
                                        <tr>
                                            <td>CreateFamily.php</td>
                                            <td>URL:<a href="/api/CreateFamily.php?uid=用户ID&fmlName=家庭名称" target="_black">/CreateFamily.php?uid=用户ID&fmlName=家庭名称</a></td>
                                            <td>401	传入空值<br/>
                                                402 创建失败<br/>
                                                403 创建成功<br/></td>
                                            <td>创建家庭<br/>
                                        <tr>
                                            <td>AgreeFml.php</td>
                                            <td>URL:<a href="/api/AgreeFml.php?tidORuid=申请加入的ID&Fid=要加入家庭ID&agree=是否同意(1否2是)" target="_black">/AgreeFml.php?tidORuid=申请加入的ID&Fid=要加入家庭ID&agree=是否同意(1否2是)</a></td>
                                            <td>401	传入空值<br/>
                                                402 失败<br/>
                                                403 成功<br/></td>
                                            <td>管理员审核加入家庭<br/>
                                        </tr>
                                        </tr>
                                        <tr>
                                            <td>CUdateLoc.php</td>
                                            <td>URL:<a href="/api/CUpdateLoc.php?id=用户ID&setLong=经度&setLat=纬度" target="_black">/CUpdateLoc.php?id=用户ID&setLong=经度&setLat=纬度</a></td>
                                            <td>401	传入空值<br/>
                                                402 失败<br/>
                                                403 成功<br/></td>
                                            <td>客户端更新位置信息<br/>
                                        </tr>
                                        <tr>
                                            <td>GetModel.php</td>
                                            <td>URL:<a href="/api/GetModel.php?uid=用户ID或者tid=终端ID" target="_black">/GetModel.php?uid=用户ID或者tid=终端ID</a></td>
                                            <td>401	传入空值<br/>
                                                402 失败<br/>
                                                403 成功<br/></td>
                                            <td>获取场景及其设置<br/>
                                        </tr>
                                        <tr>
                                            <td>ChangeModel.php</td>
                                            <td>URL:<a href="/api/ChangeModel.php?uid=用户ID或者tid=终端ID&Mid=场景ID" target="_black">/ChangeModel.php?uid=用户ID或者tid=终端ID&Mid=场景ID</a></td>
                                            <td>401	传入空值<br/>
                                                402 失败<br/>
                                                403 成功<br/></td>
                                            <td>更改场景<br/>
                                        </tr>
                                        <tr>
                                            <td>DeleteModel.php</td>
                                            <td>URL:<a href="/api/DeleteModel.php?Mid=场景ID" target="_black">/DeleteModel.php?Mid=场景ID</a></td>
                                            <td>401	传入空值<br/>
                                                402 失败<br/>
                                                403 成功<br/></td>
                                            <td>删除场景<br/>
                                        </tr>
                                        <tr>
                                            <td>AddModel.php</td>
                                            <td>URL:<a href="/api/AddModel.php?uid=用户ID&name=场景名称" target="_black">/AddModel.php?uid=用户ID&name=场景名称</a></td>
                                            <td>401	传入空值<br/>
                                                402 失败<br/>
                                                403 成功<br/></td>
                                            <td>添加场景<br/>
                                        </tr>
                                        <tr>
                                            <td>AddModelThing.php</td>
                                            <td>URL:<a href="/api/AddModelThing.php?Mid=场景ID&Did=设备ID&Thing=事件" target="_black">/AddModelThing.php?Mid=场景ID&Did=设备ID&Thing=事件</a></td>
                                            <td>401	传入空值<br/>
                                                402 失败<br/>
                                                403 成功<br/></td>
                                            <td>添加场景事件<br/>
                                        </tr>
                                        <tr>
                                            <td>DeleteModelThing.php</td>
                                            <td>URL:<a href="/api/DeleteModelThing.php?Mid=场景ID&Did=设备ID" target="_black">/DeleteModelThing.php?Mid=场景ID&Did=设备ID</a></td>
                                            <td>401	传入空值<br/>
                                                402 失败<br/>
                                                403 成功<br/></td>
                                            <td>删除场景事件<br/>
                                        </tr>
                                        <tr>
                                            <td>ChangeModelThing.php</td>
                                            <td>URL:<a href="/api/ChangeModelThing.php?Mid=场景ID&Did=设备ID&Thing=事件" target="_black">/ChangeModelThing.php?Mid=场景ID&Did=设备ID&Thing=事件</a></td>
                                            <td>401	传入空值<br/>
                                                402 失败<br/>
                                                403 成功<br/></td>
                                            <td>更改场景事件<br/>
                                        </tr>
                                        <tr>
                                            <td>GetCtrlDevice.php</td>
                                            <td>URL:<a href="/api/GetCtrlDevice.php?uid=用户ID&Mid=场景ID" target="_black">/GetCtrlDevice.php?uid=用户ID&Mid=场景ID</a></td>
                                            <td>401	传入空值<br/>
                                                402 失败<br/>
                                                403 成功<br/></td>
                                            <td>获取可控制节点<br/>
                                        </tr>
                                        <tr>
                                            <td>DoorBell.php</td>
                                            <td>URL:<a href="/api/DoorBell.php?getType=传感器类型&getId=传感器ID&newData=新数据&flag=状态改变标志位" target="_black">/CSetData.php?getType=传感器类型&getId=传感器ID&newData=新数据&flag=状态改变标志位</a></td>
                                            <td>401	传入空值<br/>
                                                402 数据未更改/更改失败<br/>
                                                403 更新成功<br/></td>
                                            <td>门前监控更改设备数据<br/>
                                        </tr>
                                        <tr>
                                            <td>TJudge.php</td>
                                            <td>URL:<a href="/api/TJudge.php?tid=终端ID" target="_black">/TJudge.php?tid=终端ID</a></td>
                                            <td>401	传入空值<br/>
                                                402 数据未更改/更改失败<br/>
                                                403 更新成功<br/></td>
                                            <td>家庭端查询是否加入家庭<br/>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <p align="right">*通过访问带参的链接返回JSON数据；GET方法获取数据安全性相对较低，后期有时间将改为POST方法。</p>
                               <!-- <a href="addApi.php"> <button class="btn btn-default"">添加新接口</button></a>-->
                            </div>
                        </div>
                        <!--End Advanced Tables -->
                    </div>
                </div>


                <!-- /. ROW  -->
				<footer><p>Copyright &copy; 2016.Smart Life All rights reserved</p></footer>
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

<!--iframe 自适应高度-->
<script type="text/javascript" language="javascript">

    function reinitIframe(){
        var iframe = document.getElementById("iframepage");
        try{
            var bHeight = iframe.contentWindow.document.body.scrollHeight;
            var dHeight = iframe.contentWindow.document.documentElement.scrollHeight;
            var height = Math.max(bHeight, dHeight);
            iframe.height = height;
        }catch (ex){}
    }

    var timer1 = window.setInterval("reinitIframe()", 500); //定时开始

    function reinitIframeEND(){
        var iframe = document.getElementById("iframepage");
        try{
            var bHeight = iframe.contentWindow.document.body.scrollHeight;
            var dHeight = iframe.contentWindow.document.documentElement.scrollHeight;
            var height = Math.max(bHeight, dHeight);
            iframe.height = height;
        }catch (ex){}
// 停止定时
        window.clearInterval(timer1);

    }

</script>
</body>
</html>
<?php
    $status = @$_GET['status']?$_GET['status']:'';
    if(!empty($status)){
        if($status=="11"){
            echo '<script language="JavaScript">;alert("删除成功");</script>;';
        }
        if($status=="2"){
            echo '<script language="JavaScript">;alert("失败");</script>;';
        }
        if($status=="1"){
            echo '<script language="JavaScript">;alert("成功");</script>;';
        }
    }
?>
