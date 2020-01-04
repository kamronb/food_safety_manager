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
<?php 
    if (mysqli_num_rows($profile_results) > 0) {
    while($row = mysqli_fetch_array($profile_results)) {
        echo "<h2>" . $row["establishment_name"] . "</h2>";
        echo "<h2>Espiry Date: " . $row["expiry_date"] . "</h2>"; //fix date to more readable format
        //echo "<h2>" . $row[""] . "</h2>";
        echo "<h2>Last Inspection: " . $row["last_inspection_date"] . "</h2>";
    }
}
?>
<h1>
<a href="index.php">back</a>
</h1>
</body>
</html>