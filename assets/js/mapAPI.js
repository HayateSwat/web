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
	MouseLocat();
  });
}
$('head').append('<script src = "assets/js/loadPoint.js"></script>');