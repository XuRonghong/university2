<?php

class dbModel{
		
	public function select_query($sql=""){		
		if(empty($sql) || trim($sql)==='' )return null;
		
		include 'conn_university_list.php';
		
		
		
		$query_uni_total = $sql;//"SELECT * FROM university";
		$uni_total = @mysqli_query($conn_university_list , $query_uni_total ) ;		
				
		for($i=0;$i< @mysqli_num_rows($uni_total);$i++){
			$resultArray[$i] = mysqli_fetch_array($uni_total);		//陸續存入二維陣列
		}		
		
		@mysqli_free_result($uni_total);
		return @$resultArray;		//二維陣列
	}
	
		
	public function select_getNum($sql=""){		
		include 'conn_university_list.php';
				
		
		$uni_total = @mysqli_query($conn_university_list , $sql ) ;		
		$totalRows_uni_total = @mysqli_num_rows($uni_total);		

		@mysqli_free_result($uni_total);
		return $totalRows_uni_total;
	}
	
	
	public function insert_query($sql=""){
		
		include 'conn_university_list.php';
			
		
		$result = mysqli_query($conn_university_list , $sql ) 	 or mysqli_error();
		
		return  mysqli_insert_id($conn_university_list);
	}
	
	
	public function delete_query($sql=""){
		
		include 'conn_university_list.php';
		
		
		$result = mysqli_query($conn_university_list , $sql )  or mysqli_error();
		
		return $result;
	}
	
	public function update_query($sql=""){
		
		include 'conn_university_list.php';	
		
		$result = mysqli_query($conn_university_list , $sql ) 	 or mysqli_error();
		
		return $result;
	}
}

?>