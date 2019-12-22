<!DOCTYPE html >
<?php
require("db_stuff/phpsqlajax_dbinfo.php");

//converting date to integer for the comparison to put in the colour-changing icons

/*
$today_date = date("Y-m-d"); // Outputs formatted date
$today_to_integer = strtotime($today_date); 
$soon_expire = strtotime($today_date) + 30;
*/

//connect to the database
$db_conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

//check if the connection was successful
if ($db_conn->connect_error) {
    die("Connection failed: " . $db_conn->connect_error);
}

//general query to display all
$query = "SELECT * FROM `test_establishments`";
$result = $db_conn->query($query);

//stuff for the good establishments
$query_good = "SELECT * FROM `test_establishments` WHERE expiry_date > NOW() + INTERVAL 30 DAY";
$result2 = $db_conn->query($query_good);

//stuff for the expired establishments
$query_expired = "SELECT * FROM `test_establishments` WHERE expiry_date < NOW() ";
$result3 = $db_conn->query($query_expired);

//stuff for the soon expired establishments
$query_expired_in_30_days = "SELECT * FROM `test_establishments` WHERE expiry_date > NOW() AND expiry_date < NOW() + INTERVAL 30 DAY ";
$result4 = $db_conn->query($query_expired_in_30_days);
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

<script id="map-stuff">
function initMap() {    
    var centerMap = { //where to centre map must change dependent on assigned area of officer
        lat: 18.205253, lng: -77.361282 //will get from the database
    };

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 10.5,
        center: centerMap //hope to change dependednt on assigned area
    });

    // These are the objects that determine the icon colors for the statuses different establishments
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


<?php
    if (mysqli_num_rows($result2) > 0) {
        while($row = mysqli_fetch_array($result2)) {
            //put the code to do the javascript markers here
            echo "var goodEstMarker" . $row["registration_number"] . " = new google.maps.Marker({";
            echo "position: {lat: " . $row["establishment_location_lat"] . ", lng: " . $row["establishment_location_lon"] . "},";
            echo "animation: google.maps.Animation.DROP,";
            echo "map: map,";
            echo "label: " . $row["registration_number"] . ",";
            echo "title: '". $row["establishment_name"] . "',";
            echo "icon: image_good";

            echo "});";
        }    
    }

    //displaying those that are expired
    if (mysqli_num_rows($result3) > 0) {
        while($row = mysqli_fetch_array($result3)) {
            //put the code to do the javascript markers here
            echo "var expiredEstMarker" . $row["registration_number"] . " = new google.maps.Marker({";
            echo "position: {lat: " . $row["establishment_location_lat"] . ", lng: " . $row["establishment_location_lon"] . "},";
            echo "animation: google.maps.Animation.DROP,";
            echo "map: map,";
            echo "label: " . $row["registration_number"] . ",";
            echo "title: '". $row["establishment_name"] . "',";
            echo "icon: image_expired";

            echo "});";
        }    
    }

    //displaying those that are soon to be expired
    if (mysqli_num_rows($result4) > 0) {
        while($row = mysqli_fetch_array($result4)) {
            //put the code to do the javascript markers here
            echo "var expiredSoonEstMarker" . $row["registration_number"] . " = new google.maps.Marker({";
            echo "position: {lat: " . $row["establishment_location_lat"] . ", lng: " . $row["establishment_location_lon"] . "},";
            echo "animation: google.maps.Animation.DROP,";
            echo "map: map,";
            echo "label: " . $row["registration_number"] . ",";
            echo "title: '". $row["establishment_name"] . "',";
            echo "icon: image_expired_soon";

            echo "});";
        }    
    }



?>       

}





    //   http://localhost/food_safety_manager/db_stuff/db_info_guide.json
</script>

<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAM3mvBn2TXTjOkWonZ6jaGxu6vFXoz-Xc&callback=initMap">
</script>



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
        <div id="results-to-show">



            <?php
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_array($result)) {
                        echo '<div class="est_name">'; // use php to add a coloured background to those expired establishments
                        echo "<h3>" . $row["establishment_name"] . "</h3>";
                        echo "<p><strong>Operator: </strong>" . $row["operator_first_name"] . " " . $row["operator_last_name"] . "</p>";
                        echo "<p><strong>Telephone: </strong>" . $row["telephone_main"] ."</p>";
                        echo "<p><strong>Category: </strong>" . $row["establishment_category"] . "</p>";
                        echo "<p><strong>Expiry Date: </strong>" . $row["expiry_date"] . "</p>";
                        echo '<p class="view_more"><a href="#">view more&gt;&gt;</a></p>';
                        echo '<div class="clearthis"></div>';
                        echo "</div>";
                    }
                }             

            ?>


            
</div>
<?php
//close the MySQL Session because we are done with it
mysqli_close($db_conn);
?>
</body>
</html>