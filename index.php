<!DOCTYPE html >
<?php
require("db_stuff/phpsqlajax_dbinfo.php");
?>

<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/responsive_style.css" media="screen" />
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
        zoom: 10.5, styles: [
  {
    "featureType": "poi",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "poi.government",
    "stylers": [
      {
        "visibility": "on"
      }
    ]
  },
  {
    "featureType": "poi.medical",
    "stylers": [
      {
        "visibility": "on"
      }
    ]
  },
  {
    "featureType": "poi.school",
    "stylers": [
      {
        "visibility": "on"
      }
    ]
  }
]
    });



            







<?php 
//displaying those that are not expired
if (mysqli_num_rows($result2) > 0) {
    while($row = mysqli_fetch_array($result2)) { 
        echo "var InfoWindowContent" . $row["registration_number"] . " = '<div class=". '"info-window"'. "><h4><strong>" . $row["establishment_name"] . "</strong></h4><p><strong>Expiry Date:</strong> " . $row["expiry_date"] . "</p><p><strong>Last Inspection:</strong> ";
        echo $row["last_inspection_date"] . '</p><p><a href="establishment_profile.php?registration_number=' . $row["registration_number"] . '">view more</a>' . "</p>';"; 
        echo "var infowindow" . $row["registration_number"] . " = new google.maps.InfoWindow({content: InfoWindowContent" . $row["registration_number"] . " });";

        echo "var estMarker" . $row["registration_number"];
        echo " = new google.maps.Marker({ position: {lat: "; 
        echo $row["establishment_location_lat"] . ", lng:" . $row["establishment_location_lon"] . "},";
        echo "animation: google.maps.Animation.DROP, map: map, ";
        echo "label: '" . substr($row["establishment_category"], 0, 1) . "', title: '" . $row["establishment_name"];
        echo "', icon: {url:'images/icons/good.png', scaledSize: new google.maps.Size(50, 50), origin: new google.maps.Point(0, 0), anchorPoint: new google.maps.Point(" . $row["establishment_location_lat"] . ", " . $row["establishment_location_lon"] . ")";
        echo "}});";
        echo "estMarker" . $row["registration_number"] . ".addListener('click', function() {infowindow" . $row["registration_number"] . ".open(map, estMarker" . $row["registration_number"] . " )});";
    }
}


//displaying those that are expired
if (mysqli_num_rows($result3) > 0) {
    while($row = mysqli_fetch_array($result3)) {  
        echo "var InfoWindowContent" . $row["registration_number"] . " = '<div class=". '"info-window"'. "><h4><strong>" . $row["establishment_name"] . "</strong></h4><p><strong>Expiry Date:</strong> " . $row["expiry_date"] . "</p><p><strong>Last Inspection:</strong> ";
        echo $row["last_inspection_date"] . '</p><p><a href="establishment_profile.php?registration_number=' . $row["registration_number"] . '">view more</a>' . "</p>';"; 
        echo "var infowindow" . $row["registration_number"] . " = new google.maps.InfoWindow({content: InfoWindowContent" . $row["registration_number"] . " });";

        echo "var estMarker" . $row["registration_number"];
        echo " = new google.maps.Marker({ position: {lat: "; 
        echo $row["establishment_location_lat"] . ", lng:" . $row["establishment_location_lon"] . "},";
        echo "animation: google.maps.Animation.DROP, map: map, ";
        echo "label: '" . substr($row["establishment_category"], 0, 1) . "', title: '" . $row["establishment_name"];
        echo "', icon: {url:'images/icons/expired.png', scaledSize: new google.maps.Size(50, 50), origin: new google.maps.Point(0, 0), anchorPoint: new google.maps.Point(" . $row["establishment_location_lat"] . ", " . $row["establishment_location_lon"] . ")";
        echo "}});";
        echo "estMarker" . $row["registration_number"] . ".addListener('click', function() {infowindow" . $row["registration_number"] . ".open(map, estMarker" . $row["registration_number"] . " )});";
    }
}

//displaying those that will expire within 30 days
if (mysqli_num_rows($result4) > 0) {
    while($row = mysqli_fetch_array($result4)) {  
        echo "var InfoWindowContent" . $row["registration_number"] . " = '<div class=". '"info-window"'. "><h4><strong>" . $row["establishment_name"] . "</strong></h4><p><strong>Expiry Date:</strong> " . $row["expiry_date"] . "</p><p><strong>Last Inspection:</strong> ";
        echo $row["last_inspection_date"] . '</p><p><a href="establishment_profile.php?registration_number=' . $row["registration_number"] . '">view more</a>' . "</p>';"; 
        echo "var infowindow" . $row["registration_number"] . " = new google.maps.InfoWindow({content: InfoWindowContent" . $row["registration_number"] . " });";

        echo "var estMarker" . $row["registration_number"];
        echo " = new google.maps.Marker({ position: {lat: "; 
        echo $row["establishment_location_lat"] . ", lng:" . $row["establishment_location_lon"] . "},";
        echo "animation: google.maps.Animation.DROP, map: map, ";
        echo "label: '" . substr($row["establishment_category"], 0, 1) . "', title: '" . $row["establishment_name"];
        echo "', icon: {url:'images/icons/soon.png', scaledSize: new google.maps.Size(50, 50), origin: new google.maps.Point(0, 0), anchorPoint: new google.maps.Point(" . $row["establishment_location_lat"] . ", " . $row["establishment_location_lon"] . ")";
        echo "}});";
        echo "estMarker" . $row["registration_number"] . ".addListener('click', function() {infowindow" . $row["registration_number"] . ".open(map, estMarker" . $row["registration_number"] . " )});";
    }
}
?>



};
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
        <img src="images/logo.png" alt="Food Safety Manager
        ">
    </div>

    <div id="search_box">
        <input type="text" name="search-box">
    </div>

    <div id="db_results">
        <h1>SUMMARY</h1>
        <div id="results-to-show">
          <!-- 
            All this will be filled in Dynamically, both from Database and User Privileges (in Database) and other Stuff Associated with the user login start HERE:
          -->
          <div class="est_name">
            <!-- this is a summary of the current login, shows features and all stuff associated with it -->
            <h3>Hello: Kamron Bennett</h3>
            <p><strong>Health District: </strong>Falmouth</p>
            <p><strong>Parish: </strong>Trelawny</p>
            <p class="space_para">&nbsp;</p>
            <p class="view_more"><a href="#">user profile</a></p>
            <p class="space_para">&nbsp;</p>
         </div>
         <div class="est_name">
            <!-- Sort of pretty up the stuff below to work with functions and variables, remove them to the included file to just display the information -->
            <h2>Overal Status</h2>
            <p><strong>Total Number of Establishments: </strong><?php echo mysqli_num_rows($result); ?></p>
            <p><strong>Total Number Certified: </strong><?php echo mysqli_num_rows($result2) + mysqli_num_rows($result4); ?></p>
            <p><strong>Total Number Expired: </strong><?php echo mysqli_num_rows($result3); ?></p>
            <p><strong>Total Number Expiring Soon: </strong><?php echo mysqli_num_rows($result4); ?></p>
            <p><strong>Percent Satisfactory: </strong>
                <?php 
                    $percentage = round(((mysqli_num_rows($result2) + mysqli_num_rows($result4))/mysqli_num_rows($result)) * 100, 0);
                    /*working out the percentage and rounding to two decimal places will fix to work with variables and functions in the future*/ 

                    echo $percentage;
                    echo '<div id="percent_box_base"><div id="percent_sat" style="width: ' . $percentage . '%; background: '; 
                    if ($percentage >= 80) {
                        echo "#00AF11";
                    }
                    elseif (($percentage > 66) && ($percentage < 80)) {
                        echo "#FFD046";
                    }
                    else {
                        echo "#FF3B3B";
                    }


                    echo '"><p>'; 
                    echo round($percentage, 0) . '% Satisfactory</p></div></div>';
                ?>
            </p>
            <h2>Monthly Activity</h2>
            <p><strong>Inspections this Reporting Period: </strong>35</p> <!--Get this from the database as the number of inspections will be entered there-->
            <p><strong>Certifications this Reporting Period: </strong>15</p> <!--Get this from the database too as the certification dates will be entered there-->
            <p class="space_para">&nbsp;</p>
            <p class="view_more"><a href="#">more details</a></p>
            <p class="space_para">&nbsp;</p>
          </div>      
</div>
<?php
//close the MySQL Session because we are done with it
mysqli_close($db_conn);
?>
</body>
</html>