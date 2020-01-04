<?php 

//Setting up the Database Connection Stuff

//Renote Free Mysql Server Host freemysqlhosting.net
// $db_host = "sql10.freemysqlhosting.net:3306";
// $db_user = "sql10317757";
// $db_pass = "FwZkYvuRF2";
// $db_name = "sql10317757";

//Renote Free Mysql Server Host remotemysql.com
// $db_host = "remotemysql.com";
// $db_user = "xK0gfAVByD";
// $db_pass = "eytgn7yeNi";
// $db_name = 'xK0gfAVByD';

//freehostia Server Insfo
$db_host = "mysql.freehostia.com";
$db_user = "kamben89_food";
$db_pass = "ELALIACH1984";
$db_name = "kamben89_food";

// Local Host Server info
// $db_host = "localhost";
// $db_user = "root";
// $db_pass = "ELALIACH";
// $db_name = 'food_safety_inspector';


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
$query = "SELECT * FROM `$db_name`.`test_establishments`";
$result = $db_conn->query($query);

//stuff for the good establishments
$query_good = "SELECT * FROM `$db_name`.`test_establishments` WHERE expiry_date > NOW() + INTERVAL 30 DAY";
$result2 = $db_conn->query($query_good);

//Selecting the expired establishments
$query_expired = "SELECT * FROM `$db_name`.`test_establishments` WHERE expiry_date < NOW()";
$result3 = $db_conn->query($query_expired);

//stuff for the establishments that will expire within 30 days
$query_good = "SELECT * FROM `$db_name`.`test_establishments` WHERE expiry_date > NOW() AND expiry_date < NOW() + INTERVAL 30 DAY";
$result4 = $db_conn->query($query_good);

?>