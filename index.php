<!DOCTYPE html >
<?php
require("db_stuff/phpsqlajax_dbinfo.php");
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

<script>
function initMap() {    
    
    var centerMap = { //where to centre map must change dependent on assigned area of officer
        lat: 18.205253, lng: -77.361282 //will get from the database
    };

    var map = new google.maps.Map(document.getElementById('map'), {
        center: centerMap, //hope to change dependednt on assigned area
        zoom: 10.5, 
        
    });

<?php 
//displaying those that are not expired
if (mysqli_num_rows($result2) > 0) {
    while($row = mysqli_fetch_array($result2)) {
        //putting the code to do the javascript markers here (not expired)
        echo "var goodEstMarker" . $row["registration_number"] . " = new google.maps.Marker({";
        echo "position: {lat: " . $row["establishment_location_lat"] . ", lng: " . $row["establishment_location_lon"] . "},";
        echo "animation: google.maps.Animation.DROP,";
        echo "map: map,";
        echo "label: '" . substr($row["establishment_category"], 0, 1) . "',"; //Show only the first letter of the Category on the map Marker
        echo "title: '". $row["establishment_name"] . "',";
        echo "icon: {url:'images/icons/good.png', scaledSize: new google.maps.Size(50, 50), origin: new google.maps.Point(0, 0), anchorPoint: new google.maps.Point(" . $row["establishment_location_lat"] . "," . $row["establishment_location_lon"] . ")}"; // Selecting and setting the icon into postion when scrolling, icon set to the actual coordinates even while zooming in and out
        echo "});";
    }    
}

//displaying those that are expired
if (mysqli_num_rows($result3) > 0) {
    while($row = mysqli_fetch_array($result3)) {
        //putting the code to do the javascript markers here (expired)
        echo "var expiredEstMarker" . $row["registration_number"] . " = new google.maps.Marker({";
        echo "position: {lat: " . $row["establishment_location_lat"] . ", lng: " . $row["establishment_location_lon"] . "},";
        echo "animation: google.maps.Animation.DROP,";
        echo "map: map,";
        echo "label: '" . substr($row["establishment_category"], 0, 1) . "',"; //Show only the first letter of the Category on the map Marker
        echo "title: '". $row["establishment_name"] . "',";
        echo "icon: {url:'images/icons/expired.png', scaledSize: new google.maps.Size(50, 50), origin: new google.maps.Point(0, 0), anchorPoint: new google.maps.Point(" . $row["establishment_location_lat"] . "," . $row["establishment_location_lon"] . ")}"; // Selecting and setting the icon into postion when scrolling, icon set to the actual coordinates even while zooming in and out
        echo "});";
    }    
}

//displaying those that will expire within 30 days
if (mysqli_num_rows($result4) > 0) {
    while($row = mysqli_fetch_array($result4)) {
        //putting the code to do the javascript markers here
        echo "var expiredEstMarker" . $row["registration_number"] . " = new google.maps.Marker({";
        echo "position: {lat: " . $row["establishment_location_lat"] . ", lng: " . $row["establishment_location_lon"] . "},";
        echo "animation: google.maps.Animation.DROP,";
        echo "map: map,";
        echo "label: '" . substr($row["establishment_category"], 0, 1) . "',"; //Show only the first letter of the Category on the map Marker
        echo "title: '". $row["establishment_name"] . "',";
        echo "icon: {url:'images/icons/soon.png', scaledSize: new google.maps.Size(50, 50), origin: new google.maps.Point(0, 0), anchorPoint: new google.maps.Point(" . $row["establishment_location_lat"] . "," . $row["establishment_location_lon"] . ")}"; // Selecting and setting the icon into postion when scrolling, icon set to the actual coordinates even while zooming in and out
        echo "});";
    }    
}
?>
}
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAM3mvBn2TXTjOkWonZ6jaGxu6vFXoz-Xc&callback=initMap">
</script>




<div id="legend">
    <h4>Legend</h4>
        <div class="picture-holder">
            <img src="images/icons/expired.png" alt="expired">
        </div>
        <div class="paragraph-holder">
            <p>Expired Establishments</p>
        </div>
        <div class="clearthis"></div>

        <div class="picture-holder">
            <img src="images/icons/soon.png" alt="soon expired">
        </div>
        <div class="paragraph-holder">
            <p>Establishments Expiring within 30 Days</p>
        </div>
        <div class="clearthis"></div>

        <div class="picture-holder">
            <img src="images/icons/good.png" alt="good"> 
        </div>
        <div class="paragraph-holder">
            <p>Certified Establishments</p>
        </div>
</div>




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

                // This displays all of the results in the db in the sidebar
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