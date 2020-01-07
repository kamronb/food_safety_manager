<!DOCTYPE html >
<?php
require("db_stuff/phpsqlajax_dbinfo.php");
?>

<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/responsive_style.css" media="screen" />
    <title>Food Safety Manager Version Alpha 0.0.2</title>
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
        zoom: 10.5, styles: <?php include("db_stuff/standard_map.php"); ?>
    }
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
            <h2>Establishment Details</h2>
            <p><strong>Establishment Name: </strong><?php //use PHP to fill these areas ?></p>
            <p><strong>Operator Name: </strong><?php //use PHP to fill these areas ?></p>
            <p><strong>Certification Status: </strong><?php //use PHP to fill these areas ?></p>
            <p><strong>Expiry Date: </strong><?php //use PHP to fill these areas ?></p>
            <p><strong>Last Inspection Date: </strong></p>
            <p>&nbsp;</p>
            <h2>Status Information</h2>
            <p><strong>Last Inspection: </strong></p> 
            <p><strong>Status Last Inspection: </strong></p> 
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