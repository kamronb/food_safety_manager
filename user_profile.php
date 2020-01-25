<!DOCTYPE html >
<?php
// this is the page that shows the establishment profile where all the edits to the page can be done
// shows last insoections and so forth all the information associated with the establishment can 
// be edited here. Will have a map with the establishment on it
require("db_stuff/phpsqlajax_dbinfo.php");

 // will use this array to access the establishment info since its only one establishment returned by the query

$todayInt = TimeToDays(strtotime(date("Y-m-d"))); //converting today to an integer
  

?>

<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/responsive_style.css" media="screen" />
    <title><?php echo $shop_info[1]; ?> Establishment Profile</title>
</head>
<body>
<div id ="info_holder">
  


<div class="inspections">   
    <h2>Last Inspections:</h2>
    <p>This will show the inspections the user did in the past reporting period</p>
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
        
         <div class="est_name">
            <!-- Sort of pretty up the stuff below to work with functions and variables, remove them to the included file to just display the information -->
            <h2>User Details</h2>
            <p>Insert relevant info here</p>
            <p>This will show the info require for the reporting period</p>
            <p class="space_para">&nbsp;</p>
          </div>      
</div>










</body>
</html>