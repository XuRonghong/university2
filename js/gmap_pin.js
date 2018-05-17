// JavaScript Document
      var map;
function initialize() {	
	
	test1();	
//	test2();
	   
	/*for (var i = 0; i < 5; i++) {
	
	 //設定地圖標記提示框中的html內容
		var contentString = "<div id='div-pin'><div>標題</div><div><img src=''></img></div></div>";
	
		var location = new google.maps.LatLng(23.363882+i,131.044922);
	//	var location = new google.maps.LatLng(loc[0]+i, loc[1]);
		var marker = new google.maps.Marker({
			position: location,
			map: map
		});
		var j = i + 1;
		marker.setTitle(j.toString());
		attachSecretMessage(marker, i, contentString);
	}*/
}

google.maps.event.addDomListener(window, 'load', initialize);


function test1(){
	
	var lat=$('#lat').text();
	var lng=$('#lng').text();
	

	var mapOptions = {
		 zoom: 14,
		 center: new google.maps.LatLng( $('#lat').text() , $('#lng').text() ),
		 mapTypeId: google.maps.MapTypeId.ROADMAP
	 }
 
 	map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
		
	
	var ti=$('.h4_title').text();
		
		var contentString = "<div id='div-pin'><div>" + ti + "</div><div><img src=''></img></div></div>";
				
		var location = new google.maps.LatLng( lat , lng );
					
		var marker = new google.maps.Marker({
			position: location,
			map: map
		});
				//var j = i + 1;
				//marker.setTitle(j.toString());
			
		marker.setTitle( $('.h4_title').text().toString() );
		
	
	// The five markers show a secret message when clicked
// but that message is not within the marker's instance data.
	var infowindow = new google.maps.InfoWindow(
      { //content: message[number],
		content: contentString,
        size: new google.maps.Size(50,50)
      });
 /*  google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map,marker);	
  });	 */			
				//attachSecretMessage(marker, i, contentString);		
}


function test2(){
 /* var mapOptions = {
    zoom: 10,
    center: new google.maps.LatLng(25.018097,121.535234),
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
	  
	  	
	*/
	  //var loc = new array(2);
	   //var address = "<?php echo $row_uni_sing['uLocation']; ?>";
		//var address = "臺北市大安區羅斯福路四段1號";
		//var address = document.getElementById("loc").value;
	  
	  //從google map網站 傳送資料
	 $.ajax({
             type: "post",
             dataType: "json",
             url: "https://maps.googleapis.com/maps/api/geocode/json?address=" + $("span#loc").text() + "&sensor=false&language=zh-tw",
             success: function (data)
             {
                 if (data.status == "OK")
                 {
					 //var loc = new Array(data.results[0].geometry.location.lat, data.results[0].geometry.location.lng);
					 
					// return data.results[0].geometry.location;

					 
                     var mapOptions = {
                         zoom: 14,
                         center: new google.maps.LatLng(data.results[0].geometry.location.lat,
                      data.results[0].geometry.location.lng),
                         mapTypeId: google.maps.MapTypeId.ROADMAP
                     }
 
 					map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
                     //var map = new google.maps.Map(document.getElementById("map"), mapOptions);
					 
					 
 var contentString = "<div id='div-pin'><div>"+ $('.h4_title').text()+ "</div><div><img src=''></img</div></div>";

//    var location = new google.maps.LatLng(data.results[0].geometry.location.lat,data.results[0].geometry.location.lng);
	var location = new google.maps.LatLng(data.results[0].geometry.location.lat,
                      data.results[0].geometry.location.lng);
    var marker = new google.maps.Marker({
        position: location,
        map: map
    });
   // var j = i + 1;
    marker.setTitle( $('.h4_title').text().toString() );
	
	
	
	// The five markers show a secret message when clicked
// but that message is not within the marker's instance data.
	var infowindow = new google.maps.InfoWindow(
      { //content: message[number],
		content: contentString,
        size: new google.maps.Size(50,50)
      });
  google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map,marker);
	});
  
	
//    attachSecretMessage(marker, i, contentString);
	
                 }
                 else
                 {
                     alert("沒有地圖資料");
                 }
             },
             error: function ()
             {
                 alert("資料錯誤");
             }
         });	
}


// The five markers show a secret message when clicked
// but that message is not within the marker's instance data.
/*function attachSecretMessage(marker, number, pin) {
//  var message = ["This","is","the","secret","message"];
  var infowindow = new google.maps.InfoWindow(
      { //content: message[number],
		content: pin,
        size: new google.maps.Size(50,50)
      });
  google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map,marker);
  });
}*/


	 /*

function GetAddressMarker(address){
	if (address.value.length >= 1)
     {

         
	 return;
	 
	 geocoder = new google.maps.Geocoder();
		geocoder.geocode(
		 {
		  'address':address
		 },function (results,status) 
		 {
		 if(status==google.maps.GeocoderStatus.OK) 
		 {
			//console.log(results[0].geometry.location);
			LatLng = results[0].geometry.location;
			map.setCenter(LatLng);  //將地圖中心定位到查詢結果
			marker.setPosition(LatLng); //將標記點定位到查詢結果
			marker.setTitle(address); //重新設定標記點的title
			$("#SearchLatLng").html("【您輸入的地址位置】緯度：" + LatLng.lat() + "經度：" + LatLng.lng());

			alert(LatLng+"-"+lng);
			lat=LatLng.lat();
		lng=LatLng.lng();
		 }
		 }
		); 
	
	
	 
	  }
     else
     {
         alert("請輸入正確地址");
         document.getElementById('#address').focus()
     }
}
*/