<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Use the geocoder without a map</title>
<meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
<link href="https://api.mapbox.com/mapbox-gl-js/v2.3.0/mapbox-gl.css" rel="stylesheet">
<script src="https://api.mapbox.com/mapbox-gl-js/v2.3.0/mapbox-gl.js"></script>
<style>
body { margin: 0; padding: 0; }
#map { position: absolute; top: 0; bottom: 0; width: 100%; }
</style>
</head>
<body>
<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.min.js"></script>
<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.css" type="text/css">
<!-- Promise polyfill script required to use Mapbox GL Geocoder in IE 11 -->
<script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.min.js"></script>

<style>
    #geocoder {
        z-index: 1;
        margin: 20px;
    }
    .mapboxgl-ctrl-geocoder {
        min-width: 100%;
    }
</style>

<div id="geocoder"></div>
<pre id="result"></pre>

<script>
	mapboxgl.accessToken = 'pk.eyJ1IjoiaGFtZWR0ZWMiLCJhIjoiY2txNngzeG50MDBsaTJ3cXh3ejMyNGNhMyJ9.aPO5MSxLDBLn44jnZY3jng';
    var geocoder = new MapboxGeocoder({
        accessToken: mapboxgl.accessToken,
  
    });

    geocoder.addTo('#geocoder');

    // Get the geocoder results container.
    var results = document.getElementById('result');

    // Add geocoder result to container.
    geocoder.on('result', function (e) {
        results.innerText = JSON.stringify(e.result, null, 2);
    });

    // Clear results container when search is cleared.
    geocoder.on('clear', function () {
        results.innerText = '';
    });
</script>

</body>
</html>