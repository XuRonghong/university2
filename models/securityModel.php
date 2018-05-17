<?php

class securityModel{
		
	public function sql_injection($str=""){
			$str = strip_tags($str);		//除去html標籤	
			$str = stripslashes($str);		//對特殊號加上'/'
			$str = trim($str);				//除去空格

		return $str;		//二維陣列
	}	
	
}
?>
