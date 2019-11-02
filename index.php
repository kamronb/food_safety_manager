<!DOCTYPE html >
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
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
    <title>Using MySQL and PHP with Google Maps</title>
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
<div id="map"></div>
<div id="right_div">
    <div class="left_link_nearest">
        <h4>Show Nearest</h4>
    </div>
    <div class="right_link_expired">
        <h4>Show Expired</h4>
    </div>

    <div id="meta_div">
        <h1>Food Safety Inspector</h1>
    </div>

    <div id="search_box">
        <input type="text" name="search-box">
    </div>

    <div id="db_results">
        <h2>RESULTS</h2>
    </div>
</div>





<script>
    // maybe I could include this script with a php include, then add the points from php to 
    //output JS with a while loop for each point that shows up?

    function initMap() {
        var trelawny = {
            lat: 18.346508, lng: -77.531076
        };

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 12.5,
            center: trelawny
        });
    };



 //   http://localhost/food_safety_manager/db_stuff/db_info_guide.json
</script>

    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAM3mvBn2TXTjOkWonZ6jaGxu6vFXoz-Xc&callback=initMap">
</script>

<!--
    this is where I am going to test the display of the stuff in JSON
-->

</body>
</html>