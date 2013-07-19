//=========	User set Point
function setTMark(event){
	var tMark = new google.maps.Marker({
		map:map,
		position:event.latLng,
		icon:url='assets/img/marker.png'
	});
	google.maps.event.addListener(tMark,'dblclick', function(){
	tMark.setVisible(false);
	});
}
$("head").append("<script src='assets/js/toSQL.js'></script>");