//===Load Point from database
var session = new Array();
var infowindow = new google.maps.InfoWindow();

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