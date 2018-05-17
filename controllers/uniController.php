
<?php

class uniController{
	
	public function aboutme(){
		include "./models/dbModel.php";
		$uni = new dbModel;
		$sql = "SELECT * FROM `article` WHERE aUid=0 ";		
		$result = $uni->select_query($sql);
		foreach($result as $row){}
		
		include "./views/uni/aboutmeView.php";		
	}
	

	public function total_list($classfly=0){
		
		include "./models/dbModel.php";
		$uni = new dbModel;
		//$sql=0;
		
		switch($classfly){
			case "nu":
				$sql = "SELECT * FROM `university` 
						WHERE university.uName LIKE '%國立%' AND 
							  university.uType NOT LIKE '%技職%' ";
				break;
			case "nt":
				$sql = "SELECT * FROM `university` 
						WHERE university.uName LIKE '%國立%' AND 
							  university.uType LIKE '%技職%' ";
				break;
			case "pu":
				$sql = "SELECT * FROM `university` 
						WHERE university.uName NOT LIKE '%國立%' AND 
							  university.uType NOT LIKE '%技職%' ";
				break;			  
			case "pt":
				$sql = "SELECT * FROM `university` 
						WHERE university.uName NOT LIKE '%國立%' AND 
							  university.uType LIKE '%技職%' ";
				break;		
			default:
				$sql = "SELECT * FROM `university` ";
		}
		
		//$sql = "SELECT * FROM `university` ";
		$row_uni = $uni->select_query($sql);
		if(empty($row_uni))echo 'sorry, your sql no found Data, Please confirm!! ';		//若無回傳結果，顯錯誤訊息
		
		
				
		include "./views/uni/total_listView.php";
			
	}
	
	
	public function classfly($p=0){
		
		include "./views/uni/classflyView.php";
		
	}
	
	
	public function jq_gmap(){
		
		include "./models/dbModel.php";
		$uni = new dbModel;
		
		$sql = "SELECT * FROM `university` ";
		$uni_total_loc = $uni->select_query($sql);
		//echo $totalRows_uni_total_loc = $uni->select_getNum($sql);
		
				
		include "./views/uni/jq_gmapView.php";		
	}
	
	
	public function uni_single($universiteId=-1){
		$universiteId=$_GET['p'];
		
		include "./models/dbModel.php";
		$uni = new dbModel;
		
		
		$sql = "SELECT * FROM `university` LEFT JOIN article ON university.uId=article.aUid 
				WHERE `uId` = ". $universiteId ." ";
		$result = $uni->select_query($sql);
		//echo $universiteId;
		foreach($result as $row_uni_sing){}
				
		include "./views/uni/uni_singleView.php";		
	}
	
	
	public function choosing($classfly=-1){
		$get_area = $classfly;
		
		include "./models/dbModel.php";
		$uni = new dbModel;
				
		$sql = "SELECT * FROM `university` ";
		$result = $uni->select_query($sql);
		
		
		$area=array(
			array("基隆市","新北市","臺北市","桃園縣","桃園市","新竹縣","新竹市","苗栗縣","苗栗市"),
			array("臺中縣","臺中市","彰化縣","南投縣","雲林縣"),
			array("嘉義縣","嘉義市","臺南縣","臺南市","高雄縣","高雄市","屏東縣"),
			array("宜蘭縣","花蓮縣","臺東縣"),
			array("澎湖縣","金門縣","馬祖縣")
		);
		
		
		if($get_area=='north')$i=0;
		else if($get_area=='wast')$i=1;
		else if($get_area=='south')$i=2;
		else if($get_area=='east')$i=3;
		else if($get_area=='other')$i=4;
	
		$k = 0;	
		foreach($result as $key){	
			
			$ok=true;
			for($j=0; $j<count($area[$i]); $j++){	
			    $kk=substr($key['uCounties'],4);
				if( $kk == $area[$i][$j] ){ 
					$ok=false; 
					break;
				}		
			}			
			if($ok)continue;
				
			$row_uni[$k++] = $key;
		}
		//}while($row_uni_national = mysql_fetch_assoc($uni_national));
		
		if(empty($row_uni))$row_uni=null;
		include "./views/uni/total_listView.php";				
	}
	
	
	public function search($key=''){
				
			/*=============為了接收搜尋字串的功能============*/
			if(trim($key)!=''){				
				include "./models/securityModel.php";
				$key = securityModel::sql_injection($key);
				$searchKey = "找尋 `".$key."`</a>  &gt; ";
			}
			else if($key==='')echo "<script> history.go(-1)</script>";
		
		include "./models/dbModel.php";
		$uni = new dbModel;
		
		
		$sql = "SELECT * FROM `university` 
				WHERE university.uNumber LIKE '%".$key."%' OR 
					  university.uName LIKE '%".$key."%' OR 
					  university.uLocation LIKE '%".$key."%'  ";
		$row_uni = $uni->select_query($sql);
				
		
		//if(empty($row_uni))echo 'sorry, your sql no found Data, Please confirm!! ';		//若無回傳結果，顯錯誤訊息		
		if(empty($row_uni))$row_uni=null;
		include "./views/uni/total_listView.php";			
	}
}

?>