<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <style type="text/css">
        body, html,#allmap {width: 100%;height:100%;margin:0;}
        /*去除百度地图版权*/
        .anchorBL{
            display:none;
        }
    </style>
    <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=YFQbYF3Y4HDOet8ZKX97T0yOsxcTu4MI"></script>
    <title>地图展示</title>
</head>
<body>
<div id="allmap" ></div>

<?php
        require_once 'chk_login.php';
        $lon = @$_GET['lon'];
        $lat = @$_GET['lat'];
        echo "<script type=\"text/javascript\">
                // 百度地图API功能
                
                var map = new BMap.Map(\"allmap\", {enableMapClick:false});
                var point = new BMap.Point(".$lon.",".$lat.");
                map.centerAndZoom(point, 12);
                //map.addControl(new BMap.MapTypeControl());   //添加地图类型控件
                map.setCurrentCity(\"青岛\");          // 设置地图显示的城市 此项是必须设置的
                map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
                map.setMapStyle({style:'grayscale'}); 
                 
                var marker = new BMap.Marker(point);  // 创建标注
                map.addOverlay(marker);              // 将标注添加到地图中
                /*marker.addEventListener(\"click\",getAttr);
                function getAttr(){
		        var p = marker.getPosition();       //获取marker的位置
		        alert(\"家庭的位置是\" + p.lng + \",\" + p.lat);  
	            }*/
                
                var cr = new BMap.CopyrightControl({anchor: BMAP_ANCHOR_TOP_LEFT});   //设置版权控件位置
	            map.addControl(cr); //添加版权控件
	            var bs = map.getBounds();   //返回地图可视区域
	            cr.addCopyright({id: 1, content: \"<font size:10px>SmartLife智能控制</font>\", bounds: bs});   
            </script>";
?>
</body>
</html>
