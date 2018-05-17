// JavaScript Document
$(function() {
	
	//$('#tab_total').ready(function(){
    //    var tab = $(this);
	
		//編輯頁面刪除學校，點擊X即可刪除一條資料(ajax)
	$('#tab_total tr td input').click(function(){
		//alert("hello world"+ $(this).siblings('#uid').val());		
			$.ajax({
					url: "index.php?c=user&a=delete&p=university",//+$(this).siblings('#uid').val(),
					cache: false,
					dataType: 'html',
						type: 'POST',
					data: "uname="+$(this).siblings('#uname').val()+
						  "&primary=uId"+
						  "&id="+$(this).siblings('#uid').val(),

					error: function(xhr) {
					  alert('Ajax request 發生錯誤');
					},
					success: function(response) {
							 //alert(response);
							  location.reload();
						   // $('#fragment-1').load("delete_group.php");

						   // $('#fragment-1').load('website.php');
							
						   // $(".add_ajax").load(location.href + " .add_ajax");
					}
			}); 
	});
		
	//});	
		
	
	//$( "#menu" ).menu(); 
	
	/*$.ajax({
				 url: 'jq.php',
				 cache: false,
				 dataType: 'html',
					 type:'GET',
				 data: { },
				 error: function(xhr) {
				   alert('您好');
				 },
				 success: function(response) {
						   $('div#map-canvas').html(response);
				 }
	});*/
	
	
	//分類頁面處理UI
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
