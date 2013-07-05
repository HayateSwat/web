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
 
  var shape = {
 
           coord: [0, 0, 30,30],
           type: 'rect'
 
	};
	var marker = new google.maps.Marker({
		map: map,
		shape: shape,
		position: new google.maps.LatLng(23.6762184,120.3442401)
		});
	
        
  	var shape = {
 
           coord: [0, 0, 30],
           type: 'circle'
 
	};

	var markerb = new google.maps.Marker({
		map: map,
		shape: shape,
		position: new google.maps.LatLng(23.6962184,120.3742401)	
		});
		
	 google.maps.event.addListener(markerb, 'mouseover', function() {
    infowindow.open(map,markerb);
    });
	google.maps.event.addListener(markerb, 'mouseout', function() {
    infowindow.close();
    });
	
	var contentString = '<div id="content">'+
        '<div id="siteNotice">'+
        '</div>'+
        '<h2 id="firstHeading" class="firstHeading">This is</h2>'+
		marker.getPosition()+
        '</div>';

     var infowindow = new google.maps.InfoWindow({
        content: contentString,
		position:marker.getPosition()
    });

    var marker = new google.maps.Marker({
        position: latlng,
        map: map,
        title:"Uluru (Ayers Rock)"
    });

    google.maps.event.addListener(marker, 'mouseover', function() {
    infowindow.open(map,marker);
    });
	google.maps.event.addListener(marker, 'mouseout', function() {
    infowindow.close();
    });
	
}



function codeAddress() {
  var address = document.getElementById('address').value;
  geocoder.geocode( { 'address': address}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
      map.setCenter(results[0].geometry.location);
      var marker = new google.maps.Marker({
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

  
  <body>
    <div id="panel">
      <input id="address" type="textbox" value="">
      <input type="button" value="Geocode" onclick="codeAddress()">
    </div>
    <div id="map-canvas"></div>
  </body>
</html>