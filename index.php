<!DOCTYPE html>
<html>
  <head>
    <title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      html, body, #map-canvas {
        margin: 0;
        padding: 0;
        height: 100%;
      }
    </style>
	 <link href="/maps/documentation/javascript/examples/default.css" rel="stylesheet">
     <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
	 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js">
</script>
<script src="my_jquery_functions.js"></script>
    <script>
var geocoder;
var map;
function initialize() {
  geocoder = new google.maps.Geocoder();
  var latlng = new google.maps.LatLng( 23.7162184,120.4242401);
  var mapOptions = {
    zoom: 11,
    center: latlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }
  
  map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
  showMarker();
	
}


function showMarker(){
	var markArray = new Array();
	var markerA = new google.maps.Marker({
		map: map,	
		position: new google.maps.LatLng(23.6762184,120.3442401)
		});

	var markerB = new google.maps.Marker({
		map: map,
		position: new google.maps.LatLng(23.6962184,120.3742401)	
		});
		
    var markerC = new google.maps.Marker({
        position:  new google.maps.LatLng(23.7862184,120.542401),
        map: map
    });
	
	var markerD = new google.maps.Marker({
        position:  new google.maps.LatLng(23.6262184,120.462401),
        map: map
    });
	
	var markerE = new google.maps.Marker({
        position: new google.maps.LatLng(23.7162184,120.4201156),
        map: map
    });
	
	markArray[0]=markerA;
	markArray[1]=markerB;
	markArray[2]=markerC;
	markArray[3]=markerD;
	markArray[4]=markerE;

	
	for(var i in markArray){
		google.maps.event.addListener(markArray[i], 'mouseover', function(event) {
			infowindow.setContent(event.latLng.lat()+" , "+event.latLng.lng());
			for(var j in markArray){
				if(event.latLng.equals(markArray[j].getPosition())){
					i=j;
					infowindow.open(map,markArray[i]);
				}
			}
		});
		google.maps.event.addListener(markArray[i], 'mouseout', function(event) {
		infowindow.close();
		});
	}
	
	
	var contentString = '';
    var infowindow = new google.maps.InfoWindow();
}


function codeAddress() {
  var address = document.getElementById('address').value;
  geocoder.geocode( { 'address': address}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
      map.setCenter(results[0].geometry.location);
	  var lastMark;
      var mark = new google.maps.Marker({
          map: map,
          position: results[0].geometry.location
      });
    } else {
      alert('Geocode was not successful for the following reason: ' + status);
    }
  });

}

  
google.maps.event.addDomListener(window, 'load', initialize);

    </script>
</head>
  
  <body>
	<div id="panel">
      <input id="address" type="textbox" value="">
      <input type="button" value="Geocode" onclick="codeAddress()"> 	  
    </div>
	
    <div id="map-canvas"></div>
  </body>
</html>