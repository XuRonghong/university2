
var map;
function initialize() {

	$('#divloc').hide();		//The location data is set hidden

/********************Google Map API - The basic parameter for Map*********************/	
  var mapOptions = {
    zoom: 8,
    center: new google.maps.LatLng(23.763882,121.044922),
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);
	  
	  
/********************Google Map API - The marker dialog have title and image*********************/
	var i=1;	
	while( $('#una'+i).text()!="" ){
		var ti=$('#una'+i).text();
		var ti2= ''; //$('#uloc'+i).text();
		var imgsrc = $('#divimg'+i).text();		//Path for image 
		
		var contentString = "<div id='div-pin'><h4>" + ti + "</h4><div>" + ti2 + "<img id='gmimg' src='"+imgsrc+"'></img></div></div>";
				
		var location = new google.maps.LatLng( $('#lat'+i).text() , $('#lng'+i).text() );
					
				var marker = new google.maps.Marker({
					position: location,
					map: map
				});
				//var j = i + 1;
				//marker.setTitle(j.toString());
				attachSecretMessage(marker, i, contentString);
		i++;
 	}
}

google.maps.event.addDomListener(window, 'load', initialize);		//Loading google map


// The five markers show a secret message when clicked
// but that message is not within the marker's instance data.
function attachSecretMessage(marker, number, pin) {
  var message = ["This","is","the","secret","message"];
  var infowindow = new google.maps.InfoWindow(
      { //content: message[number],
		content: pin,
        size: new google.maps.Size(50,50)
      });
	  	  
	var ctrl=true;		//標記物 click事件
  google.maps.event.addListener(marker, 'click', function() {
    	if(ctrl){
			infowindow.open(map,marker);
			ctrl=false;
		}else{
			infowindow.close(map,marker);
			ctrl=true;
		}
  });
}
