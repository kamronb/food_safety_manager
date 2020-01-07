<!DOCTYPE html >
<?php
// this is the page that shows the establishment profile where all the edits to the page can be done
// shows last insoections and so forth all the information associated with the establishment can 
// be edited here. Will have a map with the establishment on it
require("db_stuff/phpsqlajax_dbinfo.php");
if ( $_GET["registration_number"] == "") {
    echo '<script type="text/javascript">
           window.location = "index.php"
      </script>';
}
$establishment_no = $_GET["registration_number"]; // the number we going to use to search the database
$query_profile_page = "SELECT *  FROM `test_establishments` WHERE `registration_number` = $establishment_no";
$profile_results = $db_conn->query($query_profile_page);


$shop_info = mysqli_fetch_array($profile_results); // will use this array to access the establishment info since its only one establishment returned by the query

$todayInt = TimeToDays(strtotime(date("Y-m-d"))); //converting today to an integer
$EstExpiry = TimeToDays(strtotime($shop_info[13])); // Converting date from DB to integer


   

?>

<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/responsive_style.css" media="screen" />
    <title><?php ?> Profile</title>
</head>
<body>
<div id ="info_holder">
    <div id="map" style="width: 100%; margin: 0 auto; height: 90%; ">
       
    </div>
    <script>
function initMap() {    
    
    var centerMap = { //where to centre map must change dependent on assigned area of officer
        lat: 18.205253, lng: -77.361282 //will get from the database
    };

    var map = new google.maps.Map(document.getElementById('map'), {
        center: centerMap, //hope to change dependednt on assigned area
        zoom: 10.5, styles: <?php include("db_stuff/standard_map.php"); ?>
    



           var marker = new google.maps.Marker({
            animation: google.maps.Animation.DROP,
            map: map,
            <?php echo 'label: "' . substr($shop_info[2], 0, 1) . '"'; ?>,
            title: 'Hello World!',
            <?php echo 'position: {lat: ' . $shop_info[18] . ', lng: ' . $shop_info[19] . '},' ?>
            icon: {
                url: <?php if ($EstExpiry < $todayInt) {
                echo "'images/icons/expired.png'";
            }
            elseif (($EstExpiry > $todayInt) && ($EstExpiry < $todayInt + 30)) {
                echo "'images/icons/soon.png'";
            }
            else {
                echo "'images/icons/good.png'";
            }?>, // url
                scaledSize: new google.maps.Size(70, 70), // scaled size
                origin: new google.maps.Point(0, 0), // origin
                anchorPoint: new google.maps.Point(<?php echo $shop_info[18] . ', ' . $shop_info[19]?>) // anchor
            }
        });

    }
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAM3mvBn2TXTjOkWonZ6jaGxu6vFXoz-Xc&callback=initMap">
</script>


<div class="inspections">   
    <h2>Last Inspections:</h2>
        <div class="inspection_details">
            <h3>Inspection 1</h3>
                <?php 
                    include"establishment_info/Trelawny/Fal/PerthTownJuniorHigh_34.txt"
                ?>
        </div>
        <div class="inspection_details">
            <h3>Inspection 2</h3>
                <?php 
                    include"establishment_info/Trelawny/Fal/PerthTownJuniorHigh_34.txt"
                ?>
        </div>
        <div class="inspection_details">
            <h3>Inspection 3</h3>
                <?php 
                    include"establishment_info/Trelawny/Fal/PerthTownJuniorHigh_34.txt"
                ?>
        </div>
        <div class="inspection_details">
            <h3>Inspection 4</h3>
                <?php 
                    include"establishment_info/Trelawny/Fal/PerthTownJuniorHigh_34.txt"
                ?>
        </div>
        <div class="inspection_details">
            <h3>Inspection 5</h3>
                <?php 
                    include"establishment_info/Trelawny/Fal/PerthTownJuniorHigh_34.txt"
                ?>
        </div>
</div>

    <div class="clearthis"></div>
</div>












<div id="right_div">
    <div class="left_link_nearest">
        <h4><a href="index.php">Home</a></h4>
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
            <p><strong>Establishment Name: </strong><?php echo $shop_info[1]; ?></p>
            <p><strong>Establishment Category: </strong><?php echo $shop_info[2]; ?></p>
            <p><strong>Operator Name: </strong><?php echo $shop_info[6] . " " . $shop_info[7]; ?></p>
            <p><strong>Certification Status: </strong><?php 
            if ($EstExpiry < $todayInt) {
                echo '<span class="expired">Expired</span>';
            }
            elseif (($EstExpiry > $todayInt) && ($EstExpiry < $todayInt + 30)) {
                echo '<span class="expire30">Expires within 30 Days</span>';
            }
            else {
                echo '<span class="cert">Certified</span>';
            }
            ?></p>
            <p><strong>Expiry Date: </strong><?php echo $shop_info[13]; ?></p>
            <p><strong>Last Inspection: </strong><?php echo $shop_info[14]; ?></p> 
            <p><strong>Status Last Inspection: </strong></p> 
            <p>&nbsp;</p>
            <h2>Other Information</h2>
            <p><strong>Address: </strong><?php echo $shop_info[3] . ", " . $shop_info[4]; ?></p>
            <p><strong>Contact Number: </strong><?php echo $shop_info[8]; ?></p> 
            <p><strong>Email Address: </strong><?php echo $shop_info[10]; ?></p>
            <p class="space_para">&nbsp;</p>
            <p class="view_more"><a href="#">update details</a></p>
            <p class="space_para">&nbsp;</p>
          </div>      
</div>










</body>
</html>