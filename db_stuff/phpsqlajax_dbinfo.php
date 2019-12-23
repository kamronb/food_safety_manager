<?php 

//Setting up the Database Connection Stuff
$db_host = "localhost";
$db_user = "root";
$db_pass = "ELALIACH";
$db_name = 'food_safety_inspector';

$db_query = "SELECT * FROM `test_establishments` LIMIT 10";


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

//general query to display all used in right sidebar
$query = "SELECT * FROM `test_establishments`";
$result = $db_conn->query($query);

//stuff for the good establishments
$query_good = "SELECT * FROM `test_establishments` WHERE expiry_date > NOW() + INTERVAL 30 DAY";
$result2 = $db_conn->query($query_good);

//Selecting the expired establishments
$query_expired = "SELECT * FROM `test_establishments` WHERE expiry_date < NOW()";
$result3 = $db_conn->query($query_expired);

//stuff for the establishments that will expire within 30 days
$query_good = "SELECT * FROM `test_establishments` WHERE expiry_date > NOW() AND expiry_date < NOW() + INTERVAL 30 DAY";
$result4 = $db_conn->query($query_good);

?>