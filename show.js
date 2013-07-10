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
  newPoint(0);
  showMarker();
}

var session = new Array();

function newPoint(num){
	session[num] = {
		marker: new google.maps.Marker({
				map:map,
				position:new google.maps.LatLng(23.7162184,120.4242401),
				icon:url='Icons/a.png'
				}),
		content:'<h2>This is Home</h2>'
	}
}

function showMarker(){		
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
