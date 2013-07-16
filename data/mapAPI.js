var map;
function initialize() {
  var latlng = new google.maps.LatLng( 23.7162184,120.4242401);
  var mapOptions = {
    zoom: 11,
    center: latlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
	streetViewControl:false,
	zoomControl:false,
	panControl:false
  }
  map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
  google.maps.event.addListenerOnce(map, 'idle', function(){
    addPointToMap();
  });
  MouseLocat();
}

var session = new Array();
var infowindow = new google.maps.InfoWindow();

function MouseLocat(){
	google.maps.event.addListener(map,'click', function mouse(event){
	$("#address").val(event.latLng.lng().toString());
	$("#address2").val(event.latLng.lat().toString());
	load_signin();
	});
}

function newPoint(num,pLng,pLat,pContent,pIcon){
	session[num] = {
		marker: new google.maps.Marker({
				map:map,
				position:new google.maps.LatLng(pLat,pLng),
				icon:url=pIcon
				}),
		content:pContent
	}
}

function showMarker(){		
	var mousemovein = 
	function(event) {
		for(var j in session){
			if(event.latLng.equals(session[j].marker.getPosition())){
				i=j;
				infowindow.setContent(session[i].content);
				infowindow.open(map,session[i].marker);
				break;
			}
		}
	}

	for(var i in session){
		google.maps.event.addListener(session[i].marker,'click', mousemovein);
	}
}

google.maps.event.addDomListener(window, 'load', initialize);

