	<div id="header">
		<h2>DATA.GOV.TW</h2>
		<h2>政府資料開放平台(大專院校位置Beta版)</h2>
		<div id="search">
			<form id="f_search" action="<?php echo $_SERVER['PHP_SELF'];?>" method="GET">
				<input type="hidden" name="c" value="uni">
				<input type="hidden" name="a" value="search">
				<input id="btn_search1" type="text" name="p" value="">
				<!--a id="btn_search" href="">搜尋</a-->
				<input id="btn_search2" type="submit" value="搜尋">
			</form>
		</div>
	</div>

<div id="topNav">
	<ul>
	<li><a href="./index.php">首頁</a></li>
	<li><a href="<?php echo $_SERVER['PHP_SELF'].'?c=uni&a=total_list';?>">台灣全國大專院校</a></li>
	<li><a href="<?php echo $_SERVER['PHP_SELF'].'?c=uni&a=classfly';?>">分類找尋</a></li>
	<li><a href="<?php echo $_SERVER['PHP_SELF'].'?c=uni&a=jq_gmap';?>">大專院校地圖</a></li>
	<li><a href="">&nbsp;</a></li>
	<li><a href="<?php echo $_SERVER['PHP_SELF'].'?c=uni&a=aboutme';?>">關於我們</a></li>
	</ul>
</div>