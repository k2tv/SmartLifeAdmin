/*------------------------------------------------------
    Author : www.webthemez.com
    License: Commons Attribution 3.0
    http://creativecommons.org/licenses/by/3.0/
---------------------------------------------------------  */

(function ($) {
    "use strict";
    var mainApp = {

        initFunction: function () {
            /*MENU 
            ------------------------------------*/
            $('#main-menu').metisMenu();
			
            $(window).bind("load resize", function () {
                if ($(this).width() < 768) {
                    $('div.sidebar-collapse').addClass('collapse')
                } else {
                    $('div.sidebar-collapse').removeClass('collapse')
                }
            });

            /* MORRIS BAR CHART
			-----------------------------------------*/
           // 定义一个函数，用来读取特定的cookie值。

            function getCookie(cookie_name)
            {
                var allcookies = document.cookie;
                var cookie_pos = allcookies.indexOf(cookie_name);   //索引的长度
                // 如果找到了索引，就代表cookie存在，
                // 反之，就说明不存在。
                if (cookie_pos != -1)
                {
                // 把cookie_pos放在值的开始，只要给值加1即可。
                    cookie_pos += cookie_name.length + 1;      //这里我自己试过，容易出问题，所以请大家参考的时候自己好好研究一下。。。
                    var cookie_end = allcookies.indexOf(";", cookie_pos);
                    if (cookie_end == -1)
                    {
                        cookie_end = allcookies.length;
                    }
                 var value = unescape(allcookies.substring(cookie_pos, cookie_end)); //这里就可以得到你想要的cookie的值了。。。
                }
                return value;
            }
            // 调用函数
            var val_in = getCookie("val_in");
            var val_out = getCookie("val_out");
            Morris.Bar({
                element: 'morris-bar-chart',
                data: [{
                    y: '流量统计',
                    a:  parseInt(val_out/1024/1024),  //以M为单位显示
                    b:  parseInt(val_in/1024/1024)
                }],
                xkey: 'y',
                ykeys: ['a', 'b'],
                labels: ['出站流量', '入站流量'],
                barColors: ['#A6A6A6','#F09B22', '#A8E9DC'],
                hideHover: 'auto',
                resize: true
            });


            /* MORRIS DONUT CHART
			----------------------------------------*/
            Morris.Donut({
                element: 'morris-donut-chart',
                data: [{
                    label: "PC",
                    value: 33
                }, {
                    label: "IOS",
                    value: 28
                }, {
                    label: "Android",
                    value: 49
                }],
				   colors: ['#A6A6A6','#F09B22', '#A8E9DC'],
                resize: true
            });

            /* MORRIS AREA CHART
			----------------------------------------*/

            Morris.Area({
                element: 'morris-area-chart',
                data: [{
                    period: '2014 Q1',
                    android: 2666,
                    pc: null,
                    ios: 2647
                }, {
                    period: '2014 Q2',
                    android: 2778,
                    pc: 2294,
                    ios: 2441
                }, {
                    period: '2014 Q3',
                    android: 4912,
                    pc: 1969,
                    ios: 2501
                }, {
                    period: '2014 Q4',
                    android: 3767,
                    pc: 3597,
                    ios: 5689
                }, {
                    period: '2015 Q1',
                    android: 6810,
                    pc: 1914,
                    ios: 2293
                }, {
                    period: '2015 Q2',
                    android: 5670,
                    pc: 4293,
                    ios: 1881
                }, {
                    period: '2015 Q3',
                    android: 4820,
                    pc: 3795,
                    ios: 1588
                }, {
                    period: '2015 Q4',
                    android: 15073,
                    pc: 5967,
                    ios: 5175
                }, {
                    period: '2016 Q1',
                    android: 10687,
                    pc: 4460,
                    ios: 2028
                }, {
                    period: '2016 Q2',
                    android: 8432,
                    pc: 5713,
                    ios: 1791
                }],
                xkey: 'period',
                ykeys: ['android', 'pc', 'ios'],
                labels: ['android', 'pc', 'ios'],
                pointSize: 2,
                hideHover: 'auto',
				  pointFillColors:['#ffffff'],
				  pointStrokeColors: ['black'],
				  lineColors:['#A6A6A6','#F09B22'],
                resize: true
            });

            /* MORRIS LINE CHART
			----------------------------------------*/
            //获取API调用次数的JSON值
            //二维数组声明  有点弱智
            var jsonData = new Array();
            jsonData[0] = new Array();
            jsonData[1] = new Array();
            jsonData[2] = new Array();
            jsonData[3] = new Array();
            jsonData[4] = new Array();
            jsonData[5] = new Array();
            jsonData[6] = new Array();
            //不能异步执行
            $.ajaxSettings.async = false;
            $.getJSON('getApiNum.php',function(data){
                $.each(data,function(i,n){
                    jsonData[i][1] = n["a"];
                    jsonData[i][0] = n["y"];
                });

            });

            Morris.Line({
                element: 'morris-line-chart',
                data: [
                    { y: jsonData[0][0], a: jsonData[0][1]},
                    { y: jsonData[1][0], a: jsonData[1][1]},
                    { y: jsonData[2][0], a: jsonData[2][1]},
                    { y: jsonData[3][0], a: jsonData[3][1]},
					{ y: jsonData[4][0], a: jsonData[4][1]},
					{ y: jsonData[5][0], a: jsonData[5][1]},
					{ y: jsonData[6][0], a: jsonData[6][1]},
				],

      xkey: 'y',
      ykeys: ['a'],
      labels: ['调用次数'],
      fillOpacity: 0.6,
      hideHover: 'auto',
      behaveLikeLine: true,
      resize: true,
      pointFillColors:['#ffffff'],
      pointStrokeColors: ['black'],
      lineColors:['gray','#F09B22']
	  
            });
           
        
            $('.bar-chart').cssCharts({type:"bar"});
            $('.donut-chart').cssCharts({type:"donut"}).trigger('show-donut-chart');
            $('.line-chart').cssCharts({type:"line"});

            $('.pie-thychart').cssCharts({type:"pie"});
       
	 
        },

        initialization: function () {
            mainApp.initFunction();

        }

    }
    // Initializing ///

    $(document).ready(function () {
        mainApp.initFunction(); 
		$("#sideNav").click(function(){
			if($(this).hasClass('closed')){
				$('.navbar-side').animate({left: '0px'});
				$(this).removeClass('closed');
				$('#page-wrapper').animate({'margin-left' : '260px'});
				
			}
			else{
			    $(this).addClass('closed');
				$('.navbar-side').animate({left: '-260px'});
				$('#page-wrapper').animate({'margin-left' : '0px'}); 
			}
		});
    });

}(jQuery));
