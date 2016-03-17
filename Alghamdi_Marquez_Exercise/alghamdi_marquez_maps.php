<!DOCTYPE html>
<html>
<head>
	<title>Alghamdi Marquez Google Maps Exercise</title>
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=API_KEY"></script>
	<script type="text/javascript">
		var markerData = [];
		var mallCoordinates = [];
		var map, infoWindow;
		var customIcon = {
			'Restaurant': {
				icon: 'http://maps.google.com/mapfiles/ms/icons/blue-dot.png'
			},

			'Auditorium': {
				icon : 'http://maps.google.com/mapfiles/ms/icons/red-dot.png'
			},

			'Mall': {
				icon : 'http://maps.google.com/mapfiles/ms/icons/purple-dot.png'
			},

			'Inn': {
				icon : 'http://maps.google.com/mapfiles/ms/icons/yellow-dot.png'
			},

			'Bank': {
				icon : 'http://maps.google.com/mapfiles/ms/icons/green-dot.png'
			},

			'Amusement Park': {
				icon : 'http://maps.google.com/mapfiles/ms/icons/ltblue-dot.png'
			},

			'Municipal Hall': {
				icon : 'http://maps.google.com/mapfiles/ms/icons/orange-dot.png'
			},

			'Resort': {
				icon : 'http://maps.google.com/mapfiles/ms/icons/pink-dot.png'
			}
		};

		function initialize() {
			var mapProp = {
				center: new google.maps.LatLng(14.202888, 121.155655),
				zoom: 30,
				mapTypeId: 'roadmap'
			};

			map = new google.maps.Map(document.getElementById("googleMap"), mapProp);

			infoWindow = new google.maps.InfoWindow();
			google.maps.event.addListener(map, 'click', function() {
				infoWindow.close();
			});

			downloadUrl('alghamdi_marquez_maps_genxml.php', function(data) {
				var xml = data.responseXML;
				var markers = xml.documentElement.getElementsByTagName("marker");

				for (var i = 0; i < markers.length; i++) {
					var marker = {};
					marker.name = markers[i].getAttribute("name");
					marker.address = markers[i].getAttribute("address");
					marker.type = markers[i].getAttribute("type");
					marker.point = new google.maps.LatLng(
					  parseFloat(markers[i].getAttribute("lat")),
					  parseFloat(markers[i].getAttribute("lng")));
					if(marker.type === "Mall") mallCoordinates.push(marker.point);
					if(marker.name === "SM City Calamba") displayCircle(marker);
					markerData.push(marker);
				}

				displayMarkers();
				displayMallPath();


			});
		}

		google.maps.event.addDomListener(window, 'load', initialize);

		function displayMallPath() {
			var mallPath = new google.maps.Polyline({
				path: mallCoordinates,
				geodesic: true,
				strokeColor: '#FF0000',
				strokeOpacity: 1.0,
				strokeWeight: 2
			});

			mallPath.setMap(map);
		}

		function displayCircle(marker) {
			var cityCircle = new google.maps.Circle({
				strokeColor: '#FF0000',
				strokeOpacity: 0.6,
				strokeWeight: 5,
				fillColor: '#FF0000',
				fillOpacity: 0.50,
				map: map,
				center: marker.point,
				radius: 250
			});
		}

		function displayMarkers() {
			var bounds = new google.maps.LatLngBounds();
			
			for(var i = 0; i<markerData.length; i++) {
				console.log(markerData[i].name);
				createMarker(markerData[i].point, markerData[i].name, markerData[i].address, markerData[i].type);
				bounds.extend(markerData[i].point);
			}

			map.fitBounds(bounds);
		}

		function createMarker(latlng, name, address, type) {
			var marker = new google.maps.Marker({
				map: map,
				position: latlng,
				icon: customIcon[type].icon,
				title: name
			});


			google.maps.event.addListener(marker, 'click', function() {			  
			  var iwContent = '<div id="iw_container">' +
			        				'<div class="iw_title">' + name + '</div>' +
			     					'<div class="iw_content">' + address + '<br />' + type + '</div>' + 
			     			  '</div>';
			  infoWindow.setContent(iwContent);
			  infoWindow.open(map, marker);
			});
		}

		function downloadUrl(url, callback) {
			var request = window.ActiveXObject ? new ActiveXObject('Microsoft.XMLHTTP') : new XMLHttpRequest;
			request.onreadystatechange = function() {
				if(request.readyState == 4) {
					request.onreadystatechange = doNothing;
					callback(request, request.status);
				}
			};

			request.open('GET', url, true);
			request.send(null);
		}

		function doNothing() {}
	</script>
</head>
<body>
	<div id="googleMap" style="width:1500px; height:1500px;"></div>
</body>
</html>>