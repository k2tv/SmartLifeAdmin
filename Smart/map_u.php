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
require_once '../api/conn.php';

echo "<script type=\"text/javascript\">
                // 百度地图API功能
                
                var map = new BMap.Map(\"allmap\", {enableMapClick:false});
                var point = new BMap.Point(108.7501,37.6392);
                map.centerAndZoom(point, 5);
                //map.addControl(new BMap.MapTypeControl());   //添加地图类型控件
                map.setCurrentCity(\"西安\");          // 设置地图显示的城市 此项是必须设置的
                map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
                map.setMapStyle({style:'grayscale'}); 
                 
                /*var marker = new BMap.Marker(point);  // 创建标注
                map.addOverlay(marker);              // 将标注添加到地图中
                marker.addEventListener(\"click\",getAttr);
                function getAttr(){
		        var p = marker.getPosition();       //获取marker的位置
		        alert(\"家庭的位置是\" + p.lng + \",\" + p.lat);  
	            }*/
                
                var cr = new BMap.CopyrightControl({anchor: BMAP_ANCHOR_TOP_LEFT});   //设置版权控件位置
	            map.addControl(cr); //添加版权控件
	            var bs = map.getBounds();   //返回地图可视区域
	            cr.addCopyright({id: 1, content: \"<font size:10px>SmartLife智能控制</font>\", bounds: bs});   
	             
	            // 编写自定义函数,创建标注
                function addMarker(point){
                  var marker = new BMap.Marker(point);
                  map.addOverlay(marker);
                  marker.addEventListener(\"click\",getAttr);
                  function getAttr(){
                        var p = marker.getPosition();       //获取marker的位置
                        //var info_t = \"用户ID:\"+id+\"<br>\"+\"用户昵称:\"+name+\"<br>\"+\"位置:\"+ p.lng + \",\" + p.lat;
                        alert(\"用户位置：\" + p.lng + \",\" + p.lat);      
                        //alert(info_t);
                        }
                }
                // 随机向地图添加25个标注
                var bounds = map.getBounds();
                var sw = bounds.getSouthWest();
                var ne = bounds.getNorthEast();
                var lngSpan = Math.abs(sw.lng - ne.lng);
                var latSpan = Math.abs(ne.lat - sw.lat);
                /*for (var i = 0; i < 25; i ++) {
                    var point = new BMap.Point(sw.lng + lngSpan * (Math.random() * 0.7), ne.lat - latSpan * (Math.random() * 0.7));
                    addMarker(point);
                }*/
               function addMap(lng,lat) {
                     var point = new BMap.Point(lng , lat );
                     addMarker(point);
               }
            </script>";

            $rs = mysql_query("SELECT U_lon,U_lat FROM user");
            //输出
            while($row=mysql_fetch_object($rs)){
                echo "<script type='text/javascript'>addMap(".$row->U_lon.",".$row->U_lat.");</script>";
                //echo "".$row->U_lon.",".$row->U_lat."";
            }
            mysql_free_result($rs);
            mysql_close();

?>
</body>
</html>
