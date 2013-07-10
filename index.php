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

//var markArray = new Array();
//var contentString = new Array();
var session = new Array();

function showMarker(){			
	session[0]={
		marker: new google.maps.Marker({
				map: map,	
				position: new google.maps.LatLng(23.6762184,120.3442401),
				icon: url='Icons/a.png'
				}),
		content:'<h2>This is Home</h2>'
		};
	
	session[1]={
		marker: new google.maps.Marker({
				map: map,	
				position: new google.maps.LatLng(23.7162184,120.4201156),
				icon: url='Icons/e.png'
				}),
		content:'<h2>This is School</h2>'
		};
	
	session[2]={
		marker: new google.maps.Marker({
				map: map,	
				position: new google.maps.LatLng(23.5762184,120.5142401),
				icon: url='Icons/c.png'
				}),
		content:'<h2>This is Hotel</h2>'
		};
	
	var infowindow = new google.maps.InfoWindow();
	var tempIcon;
	var mousemovein = 
	function(event) {
		for(var j in session){
			if(event.latLng.equals(session[j].marker.getPosition())){
				i=j;
				infowindow.setContent(session[i].content+event.latLng.toString());
				infowindow.open(map,session[i].marker);
				tempIcon = session[i].marker.getIcon();
				break;
			}
		}
	}
	
	for(var i in session){
		google.maps.event.addListener(session[i].marker,'mouseover', mousemovein);
		google.maps.event.addListener(session[i].marker,'mouseout', function() {
		infowindow.close();
		session[i].marker.setIcon(tempIcon);
		});
	}
	
}

google.maps.event.addDomListener(window, 'load', initialize);

    </script>
</head>
  
  <body>
    <div id="map-canvas"></div>
  </body>
</html>