<?php
require("db_stuff/phpsqlajax_dbinfo.php");

// Opening connection to the MySQL Server
$db_conn = mysqli_connect($db_host, $db_user, $db_pass);
if (!$db_conn) {
    die('Not Connected :' . mysqli_error());
};

// Setting the Database we using
$db_select = mysqli_select_db($db_conn, $db_name);
if (!$db_select) {
    die('Could not select DB');
}

// Select only the rows in the table we using
// and fetching the data we want
$result = mysqli_query($db_conn, $db_query);
if (!$result) {
    die('Invalid query: ' . mysqli_error($db_query));
};

// Next, create an array to store the JSON info in
$result_array = array();

while ($row = @mysqli_fetch_assoc($result)) {
    $result_array[] = $row;
}

//going to write this in an external file...
$json_external_file = fopen('db_stuff/db_info.json', 'w');

//writing the info to the file using JSON encode function on the already set array
fwrite($json_external_file, json_encode($result_array));

//close the file because we are done with it
fclose($json_external_file);

//close the MySQL Session because we are done with it
mysqli_close($db_conn);
?>
<html >
<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>Using MySQL and PHP with Google Maps</title>
    <style>
        #map {
            height: 95%;
            width: 99%;
            margin: 0 auto;
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

    var exterJsonRequest = new XMLHttpRequest();
    request.open('GET', 'db_stuff/db_info.json', true);

    request.onload = function () {
        //begin accessing JSON Data
        var data = JSON.parse(this.response);

        for (var i = 0; 1 < data.length; i++) {
            console.log(data[i].registration_number + " " + data[i].establishment_name);
        };
    }
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAM3mvBn2TXTjOkWonZ6jaGxu6vFXoz-Xc&callback=initMap">
</script>
</body>
</html>
