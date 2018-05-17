// JavaScript Document
$(function() {
	
	/* $("#f_search").submit(function(){
		if($("#btn_search2").value()==""){
			$("#f_search").attr("action","");
		}
	});*/

    $( "#menu" ).menu(); 		//頁面最左邊的菜單欄，目前無作用
	
	
	/*$.ajax({
				 url: 'jq.php',
				 cache: false,
				 dataType: 'html',
					 type:'GET',
				 data:  "datatable=user"+
							  "&uid="+$(this).siblings('#uid').val(), 
				 error: function(xhr) {
				   alert('您好');
				 },
				 success: function(response) {
						   $('div#map-canvas').html(response);
				 }
	});*/
	
	
	//消除連結虛線框
	$("a").focus( function(){
		$(this).blur();
	});
	
	$(".classflymenu ul").show();
	$(".classflymenu li a").click(function(){
		var _this=$(this);
		if(_this.next("ul").length>0){
			if(_this.next().is(":visible")){
				//隱藏子選單並替換符號
				_this.html(_this.html().replace("▼","►")).next().hide();
			}else{
				//開啟子選單並替換符號
				_this.html(_this.html().replace("►","▼")).next().show();
			}
			//關閉連結
			return false;
		}
	});
	
	
});
