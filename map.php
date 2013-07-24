<!DOCTYPE html>
<html>
	<head>
		<title>Simple Map</title>
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no" >
		<meta charset="utf-8" >
		<style>
			html, body, #map-canvas {
				margin: 0;
				padding: 0;
				height: 100%;
			}	
		</style>
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
		<script src="/assets/js/mapAPI.js" ></script>
	</head>
  
	<body>
		<div id="map-canvas"></div>
		<script>
			//
			$("#man-canvas").load(initialize());
			function addPointToMap(){
				newPoint(0,120.424,23.71,'Hello');
				newPoint(1,120.448,23.71,"test");
				showMarker();
			}
		</script>
	</body>
</html>