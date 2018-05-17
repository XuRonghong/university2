<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">    
	<title>新增學校</title>
	<link rel="stylesheet" type="text/css" href="css/layout_edit.css">
	<link rel="stylesheet" type="text/css" href="css/university_single.css">
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />

	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<script src="js/jquery_edit.js" type="text/javascript"></script>

	<!--Google Map API 使用-->
	<script type="text/javascript"  src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
	<script src="js/gmap_pin.js" type="text/javascript"></script>
	<script type="text/javascript" >
		//想游標移動觸發清除text欄位值		
			/*$(function() {
				var defaultText = '';
				$('input[type=text]').focus(function() {
					defaultText = $(this).val();
					$(this).val('');
				});
				 $('input[type=text]').blur(function() {
					$(this).val(defaultText); // NB removed the ' ' marks
					//echo // What are you trying to echo? 
				 });
			 }); */
			/* function clearr() {			 
				 $('input[type=text]').focus(function() {
					defaultText = $(this).val();
					$(this).val('');
				}); 
				$('input[type=text]').val('');
			 }*/
			 
			
	
		//地址轉換成經緯度 -script
            var i;
            var split;
			
            function trans() {
                i = 0;
                $("#lng").val("");
				$("#lat").val("");
                var content = $("#source").val();
                split = content.split("\n");
                delayedLoop();
            }

            function delayedLoop() {
                addressToLatLng(split[i]);
                if (++i == split.length) {
                    return;
                }
                window.setTimeout(delayedLoop, 1500);
            }

            function addressToLatLng(addr) {
                var geocoder = new google.maps.Geocoder();
                geocoder.geocode({
                    "address": addr
                }, function (results, status) {
					/* if ($("#c").attr('checked'))
					{
						addr = addr + "=";
					}
					else {
						addr = "";
					} */
					
                    if (status == google.maps.GeocoderStatus.OK) {
                        //var content = $("#target").val();
                        //$("#target").val(content + addr + results[0].geometry.location.lat() + "," + 
						//results[0].geometry.location.lng() + "\n");
						$("#lng2").val( ''+results[0].geometry.location.lng() );
						$("#lat2").val( ''+results[0].geometry.location.lat() );
                    } else {
                        //var content = $("#target").val();
                        //$("#target").val(content + addr + "查無經緯度" + "\n");						
						$("#lng2").val( ''+0.0000 );
						$("#lat2").val( ''+0.0000 );
                    }
                });
            }
    </script>

</head>
<body>
<div id="wrapper">
	<div id="header">
		<h2>DATA.GOV.TW</h2>
		<h2>政府資料開放平台(測試Beta版)</h2>
		<div id="search">
			<form id="f_search" action="<?php echo $_SERVER['PHP_SELF'];?>" method="GET">
				<input type="hidden" name="c" value="user">
				<input type="hidden" name="a" value="search">
				<input id="btn_search1" type="text" name="p" value="">
				<!--a id="btn_search" href="">搜尋</a-->
				<input id="btn_search2" type="submit" value="搜尋">
			</form>
		</div>
	</div>

	<div id="topNav">
		<ul>
		<li><a href="<?php echo $_SERVER['PHP_SELF'].'?c=user&a=add&p='.$_SESSION['us'];?>">新增學校</a></li>
		<li><a href="<?php echo $_SERVER['PHP_SELF'].'?c=user&a=home&p='.$_SESSION['us'];?>">台灣全國大專院校</a></li>
		<li><a href="<?php echo $_SERVER['PHP_SELF'].'?c=user&a=aboutme&p='.$_SESSION['us'];?>">關於我們</a></li>
		<li><a href="">&nbsp; </a></li>
		<li><a href="">&nbsp; </a></li>
		<li><a href="<?php echo $_SERVER['PHP_SELF'].'?c=user&a=logout';?>">登出</a></li>
		</ul>
	</div>

	<!--左邊的jquery菜單欄，目前無用處-->	
	<div id="mainNav">
	<?php require_once("_mainNav.php"); ?>  
	</div>

	<div id="contain">
	<div id="_top"><strong>‧ </strong> 台灣全國大專院校 &gt;  新增   </div>

	<h4 class="h4_title"><?php echo $row_uni_sing['uName']; ?></h4>
	<div id="main"> 
	<form id="editform" action="<?php echo $_SERVER['PHP_SELF'].'?c=user&a=add&p='.$row_uni_sing['uId'];?>" method="POST">
		<ul id='ul_single'>
			<li><h5>學校名稱：</h5><input class="tex" name="uName" type="text" placeholder="國立臺灣大學"></li>
			<li><h5>學校代碼：</h5><input class="tex" name="uNumber" type="text" placeholder="0003"></li>
			<li><h5>學校網址：</h5><input class="tex" name="uWeb" type="text" placeholder="http://www.ntu.edu.tw"><font size='small' color='red'> 開頭加http://</font></li>
			<li><h5>學校地址：</h5><input class="tex" name="uLocation" type="text" id="source" onblur="trans();" placeholder="臺北市大安區羅斯福路四段1號">
				<br/><input name="uLng" id="lng2" type="number" readonly="readonly" value="121.53385070000002">
				<input name="uLat" id="lat2" type="number" readonly="readonly" value="25.0169587">
			</li>
				<!--<input type="button" value="開始轉換" name="B1" onclick="trans();">-->
			<li><h5>學校電話：</h5><input class="tex" name="uPhone" type="text" placeholder="(02)33663366"></li>
			<li><h5>台灣縣市：</h5>
				<select name="uCounties">				
				  <option value="[17]基隆市">基隆市</option>
				  <option value="[32]臺北市" selected>臺北市</option>
				  <option value="[01]新北市">新北市</option>
				  <option value="[03]桃園縣">桃園縣</option>
				  <option value="[04]新竹縣">新竹縣</option>
				  <option value="[05]苗栗縣">苗栗縣</option>
				  <option value="[06]臺中市">臺中市</option>
				  <option value="[07]彰化縣">彰化縣</option>
				  <option value="[08]南投縣">南投縣</option>
				  <option value="[09]雲林縣">雲林縣</option>
				  <option value="[10]嘉義縣">嘉義縣</option>
				  <option value="[11]臺南縣">臺南縣</option>
				  <option value="[12]高雄市">高雄市</option>
				  <option value="[13]屏東縣">屏東縣</option>
				  <option value="[02]宜蘭縣">宜蘭縣</option>
				  <option value="[15]花蓮縣">花蓮縣</option>
				  <option value="[14]臺東縣">臺東縣</option>
				  <option value="[16]澎湖縣">澎湖縣</option>
				  <option value="[71]金門縣">金門縣</option>
				</select>
			</li>
			<li><h5>學校類型：</h5>
				<input type="radio" name="uType" value="[1]一般" checked>一般
				<input type="radio" name="uType" value="[2]技職">技職
				<input type="radio" name="uType" value="[3]師範">師範
				<input type="radio" name="uType" value="[4]其他">其他
			</li>
		</ul>
		
		<br/>
		<hr/>
		<br/>

		<textarea name="aContent" rows='30' cols='90'>
			無資料
		</textarea>
		
		<br/>
		<input class="btn_editok" type="submit" value="新增">
	  
	</form>  
	</div>

	</div>

	<div id="footer">
	<br/>
	  <p>Copyright © 2013  Xu,Rong-hong  All rights reserved<br/>
	  Best Viewed in Chrome or Firefox or Internet Explorer 9 @1024x768 Resolution or higher. </p>
	</div>

</div>
</body>
</html>
