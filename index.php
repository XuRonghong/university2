<?php
	
	header("Content-Type:text/html;charset=utf-8");
	
	$c = @$_GET['c'];
	if(!empty($c)){
	
		include "./controllers/".$c."Controller.php";
		
		$className=$c."Controller";
		$controller= new $className();


		//$a=0; $p=0; $key=0;
		$a = @$_GET['a'] ;
		$p = @$_GET['p'] ;
		
		$controller->$a($p,@$key );
	}
	else{
		include "./models/dbModel.php";
		$uni = new dbModel;
		$sql = "SELECT * FROM `message` ORDER BY message.mTime DESC LIMIT 0,10 ";		
		$result = $uni->select_query($sql);
		
		include "./views/uni/indexView.php";		
	}
	
?>

