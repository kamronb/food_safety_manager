<html >
<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>Using MySQL and PHP with Google Maps</title>
    <style>
        #map {
            height: 100%;
            border: 1px solid black;
        }
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<html
<body>
<div id="map"></div>
<script>
    function initMap() {
        var trelawny = {
            lat: 18.460976, lng: -77.650000
        };

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 12,
            center: trelawny
        });
    };
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAM3mvBn2TXTjOkWonZ6jaGxu6vFXoz-Xc&callback=initMap">
</script>
</body>
</html>