<!DOCTYPE html >
<?php
require("db_stuff/phpsqlajax_dbinfo.php");


$today_date = date("Y-m-d"); // Outputs formatted date
$soon_expired = strtotime($today_date)+30;

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

$result = $db_conn->query($db_query);
?>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/style_responsive.css" media="screen" />
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
        <h1>RESULTS</h1>
        <?php

        /*echo "<br> Today Date: " . strtotime($today_date) . "<br>Today Date + 30: " . $soon_expired . "<br><br>";

            $div_number = "div" . 1;
            if ($result -> num_rows > 0) {
                while ($row = $result-> fetch_assoc()) {
                    $todayFromString = strtotime($today_date);
                    $ExpiryFromString = strtotime($row['expiry_date']);

                    echo '<div id=' . $div_number++ . '>' . $row['registration_number'] . ". " .$row['establishment_name'] . " " . $row['expiry_date'] . " ";
                    echo "<br>" . $ExpiryFromString . " ";
                    echo "<strong>Today From String: " . $todayFromString . "</strong><br><br>";


                };
            };
            */
       ?>
    </div>
</div>



<script>
    // maybe I could include this script with a php include, then add the points from php to
    //output JS with a while loop for each point that shows up?

    function initMap() {

/*
########## Putting in a Few Establishments for Show ############
*/
 <?php

    /*if ($result -> num_rows > 0) {
        while ($row = $result-> fetch_assoc()) {
            $EstVarName = $row['operator_first_name'] . $EstVarName = $row['operator_last_name'];
            $EstLat = $row['estblishment_location_lat'];
            $EstLng = $row['estblishment_location_lng'];

            echo "var" . $EstVarName . "= { lat: " . $EstVarLat . " , " . $EstVarLng . "};";
        }
    };
*/
?>

              var good_est = {
                   lat: 18.436991,
                   lng: -77.709167
               };

               var soon_expired_est = {
                   lat: 18.493763,
                   lng: -77.659302
               };

               var bad_est = {
                   lat: 18.440432,
                   lng: -77.714172
               };
         /*
         ###### END ######
         */


        var trelawny = {
            lat: 18.346508, lng: -77.531076
        };

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 12.5,
            center: trelawny
        });

        var image_good =  {
            url: 'images/icons/good.png', // url
            scaledSize: new google.maps.Size(50, 50), // scaled size
            origin: new google.maps.Point(0,0), // origin
            anchor: new google.maps.Point(0, 0) // anchor
        };

        var image_expired_soon =  {
            url: 'images/icons/soon.png', // url
            scaledSize: new google.maps.Size(50, 50), // scaled size
            origin: new google.maps.Point(0,0), // origin
            anchor: new google.maps.Point(0, 0) // anchor
        };

        var image_expired =  {
            url: 'images/icons/expired.png', // url
            scaledSize: new google.maps.Size(50, 50), // scaled size
            origin: new google.maps.Point(0,0), // origin
            anchor: new google.maps.Point(0, 0) // anchor
        };


        // putting down a test marker
        <?php
            /*$VarNumber = "marker" . 1; // to use to make the markers
            $EstName = $row['establishment_name'];
            if ($result -> num_rows > 0) {
                while ($row = $result-> fetch_assoc()) {
                    $EstVarName = $row['operator_first_name'] . $EstVarName = $row['operator_last_name'];
                    $EstLat = $row['establishment_location_lat'];
                    $EstLng = $row['establishment_location_lon'];

                    echo "var " . $VarNumber++ . " = new google.maps.Marker ({ position: " . $EstVarName . ", animation: google.maps.Animation.DROP, map: map, label: " .
                    '"' . $EstName .'", icon: image_good }); '; //progrmatically determine icon according to date
                }
            }; */
        ?>



        var marker = new google.maps.Marker({
            position: soon_expired_est,
            animation: google.maps.Animation.DROP,
            map: map,
            label: "F",
            title: 'Hello World!',
            icon: image_good
        });


        var marker2 = new google.maps.Marker({
            position: good_est,
            animation: google.maps.Animation.DROP,
            map: map,
            label: "F",
            title: 'Hello World!',
            icon: image_expired_soon
        });

        var marker3 = new google.maps.Marker({
            position: bad_est,
            animation: google.maps.Animation.DROP,
            map: map,
            label: "F",
            title: "Hello World! Next Line",
            icon: image_expired
        });



}

  //   http://localhost/food_safety_manager/db_stuff/db_info_guide.json
</script>

    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAM3mvBn2TXTjOkWonZ6jaGxu6vFXoz-Xc&callback=initMap">
</script>

<!--
    this is where I am going to test the display of the stuff in JSON
-->
<?php
//close the MySQL Session because we are done with it
mysqli_close($db_conn);
?>
</body>
</html>