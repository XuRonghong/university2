<?php
if(!isset($_SESSION))
	session_start();

				
class userController{	
	
	public function home($p=0){
		if(!isset($_SESSION['us']))echo "<script> history.go(-1)</script>";
		
		include "./models/dbModel.php";
		$uni = new dbModel;
		
		/*	echo $username=$_SESSION['us'];
			echo $password=$_SESSION['pw'];
		 $username = "z1";
		$password = "z1";
		
		include "./models/securityModel.php";
		$security = new securityModel;
		$username=$security->sql_injection($username);		
		$passwo rd=$security->sql_injection($password);*/
		
		
		$sql="SELECT * FROM `university`";
		$row_uni = $uni->select_query($sql);
		
		include "./views/user/edit_listView.php";		
	}	
	
	
	
	public function login($check='no'){	
		ob_start();
		if(isset($_SESSION['us']))header("location: ".$_SERVER['PHP_SELF']."?c=user&a=home&p=".$_SESSION['us']);		
		
		if($check=='bj4' && isset($_POST['username']) ){
		
			include "./models/dbModel.php";
			$uni = new dbModel;
			
			
			include "./models/securityModel.php";
			$security = new securityModel;
			$username=$security->sql_injection($_POST['username']);		
			$password=$security->sql_injection($_POST['password']);
			
			
			$sql="SELECT * FROM user ";
			$userAll = $uni->select_query($sql);		
			foreach($userAll as $key=> $user){
				if($user['uAccount']===$username && $user['uPassword']===$password){
					echo "success!!";
					$_SESSION['us']=$username;
					$_SESSION['pw']=$password;
					
					header("location: ".$_SERVER['PHP_SELF']."?c=user&a=home&p=".$username);					
				}else {					
				}
			}
			//echo $_SERVER['PHP_SELF'];  
			$login_error="<div id='topbar'><a href=''>帳號或密碼錯誤!! ~.~ </a></div>";					
		}		
		
		include "./views/user/loginView.php";
		ob_end_flush();
	}
	
	
	
	public function logout($classfly=0){
		session_destroy();
		header("location: ".$_SERVER['PHP_SELF']);
		//header("location: ".$_SERVER['PHP_SELF']);
	}	
	
	
	
	public function add(){		
		if(!isset($_SESSION['us']))echo "<script> history.go(-1)</script>";
		
		if( isset($_POST['uName'])&&!empty($_POST['uName']) ){
			include "./models/securityModel.php";
			$security = new securityModel;
			$data['name'] = $security->sql_injection($_POST['uName']);	
			$data['number'] = $security->sql_injection($_POST['uNumber']);
			$data['web'] = $security->sql_injection($_POST['uWeb']);
			$data['location'] = $security->sql_injection($_POST['uLocation']);
			$data['lng'] = $security->sql_injection($_POST['uLng']);
			$data['lat'] = $security->sql_injection($_POST['uLat']);
			$data['phone'] = $security->sql_injection($_POST['uPhone']);
			$data['counties'] = $security->sql_injection($_POST['uCounties']);
			$data['type'] = $security->sql_injection($_POST['uType']);
			$data['content'] = $security->sql_injection($_POST['aContent']);
			
			include "./models/dbModel.php";
			$uni = new dbModel;
			
			//echo var_dump($data);
			$sql="INSERT INTO university(uNumber,uName,uCounties,uLocation,uPhone,uWeb,uType,uLat,uLng) 
					VALUES('".$data['unmber']."',
							'".$data['name']."',
							'".$data['counties']."',
							'".$data['location']."',
							'".$data['phone']."',
							'".$data['web']."',
							'".$data['type']."',
							'".$data['lat']."',
							'".$data['lng']."')";
			echo $insertGetId=$uni->insert_query($sql);
			$sql="INSERT INTO article(aContent,aUid) 
					VALUES('".$data['content']."','".$insertGetId."')";
			echo $uni->insert_query($sql);
			$sql="INSERT INTO message(mMessage,mWho) 
					VALUES('新增了一所 {$data['name']} ','系統管理員')";
			echo $uni->insert_query($sql);
			
			echo "<script>history.go(-2)</script>";
		}		
		
		include "./views/user/add_singleView.php";		
		//echo "<script>history.go(-2)</script>";
	}
	
	
	public function delete($p='news'){	
		include "./models/securityModel.php";
		$security = new securityModel;
		
		$datatable=$security->sql_injection($p);	
		$id=0;
		if(!empty($_POST['id'])){		
			$id=$security->sql_injection($_POST['id']);	
		}
		
		include "./models/dbModel.php";
		$uni = new dbModel;
		
		
		$sql="DELETE  FROM ".$datatable." WHERE ".$_POST['primary']."=".$id;
		$uni->delete_query($sql);
		
		//刪除學校，系統紀錄到最新消息
		$sql="INSERT INTO message(mMessage,mWho) 
					VALUES('刪除了 {$_POST['uname']} ','系統管理員')";
		echo $uni->insert_query($sql);
		
		//include "./views/user/loginView.php";		
	}
	
	
	public function edit($universiteId=0,$key=''){			
		if(!isset($_SESSION['us']))echo "<script> history.go(-1)</script>";
		
		include "./models/securityModel.php";
		$security = new securityModel;	
		$data['name'] = $security->sql_injection($_POST['uName']);	
		$data['number'] = $security->sql_injection($_POST['uNumber']);
		$data['web'] = $security->sql_injection($_POST['uWeb']);
		$data['location'] = $security->sql_injection($_POST['uLocation']);
		$data['lng'] = $security->sql_injection($_POST['uLng']);
		$data['lat'] = $security->sql_injection($_POST['uLat']);
		$data['phone'] = $security->sql_injection($_POST['uPhone']);
		$data['counties'] = $security->sql_injection($_POST['uCounties']);
		$data['type'] = $security->sql_injection($_POST['uType']);
		$data['content'] = ($_POST['aContent']);
			$universiteId=$security->sql_injection($universiteId);
		if(empty($data['name'])){
			echo "<script>history.go(-1)</script>";
			echo "<script>alert('名稱空!')</script>";
		}
		else{
		
			include "./models/dbModel.php";
			$uni = new dbModel;
			
			echo $universiteId;
			$sql="UPDATE university SET 
						uNumber = '". $data['number'] ."',
						uName = '". $data['name'] ."',
						uCounties = '". $data['counties'] ."',
						uLocation = '". $data['location'] ."',
						uPhone = '". $data['phone'] ."',
						uWeb = '". $data['web'] ."',
						uType = '". $data['type'] ."',
						uLat = '". $data['lat'] ."',					
						uLng = '". $data['lng'] ."' 
				  WHERE uId = ".$universiteId;
				  //echo $sql;
			echo $uni->update_query($sql);
			$sql="UPDATE article SET 
						aContent = '". $data['content'] ."' 
				  WHERE aUid = ".$universiteId;
				  //echo $sql;
			echo $uni->update_query($sql);
			
			//修改學校，系統紀錄到最新消息
			$sql="INSERT INTO message(mMessage,mWho) 
						VALUES('修改了<b> {$data['name']} </b>的相關資訊','系統管理員')";
			echo $uni->insert_query($sql);
		}
		
		echo "<script>history.go(-2)</script>";
		//include "./views/user/edit_singleView.php";
	}
	
	
	
	public function university($universiteId=-1){
		if(!isset($_SESSION['us']))echo "<script> history.go(-1)</script>";
		
		include "./models/dbModel.php";
		$uni = new dbModel;
		
		$sql = "SELECT * FROM `university` LEFT JOIN `article` ON uId=aUid 
				WHERE `uId` = ". $universiteId ." ";
		$result = $uni->select_query($sql);
		
		//把二維資料拆成一維陣列
		foreach($result as $row_uni_sing){}
		
				
		include "./views/user/edit_singleView.php";
	}

	
	
	public function search($key=''){				
		if(!isset($_SESSION['us']))echo "<script> history.go(-1)</script>";
				
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
		include "./views/user/edit_listView.php";		
	}
	
	
	
	function aboutme(){					
		if(!isset($_SESSION['us']))echo "<script> history.go(-1)</script>";
		
		
		include "./models/dbModel.php";
		$uni = new dbModel;					
		$aboutme = $_POST['aboutme'];	
		if(!empty($aboutme)){
				
			$sql="UPDATE article SET aContent = '". $aboutme ."' WHERE aUid = 0 ";
			echo $uni->update_query($sql);
			
			echo "<script>history.go(-2)</script>";
		}
		
		$sql="SELECT aContent FROM article WHERE aUid = 0 ";
		$result = $uni->select_query($sql);
		foreach($result as $row){}
		
		
		include "./views/user/aboutmeView.php";		
	}
}

?>