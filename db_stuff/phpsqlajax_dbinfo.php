<?php 

//Setting up the Database Connection Stuff
$db_host = "mysql.freehostia.com";
$db_user = "kamben89_food";
$db_pass = "ELALIACH";
$db_name = 'kamben89_food';

$db_query = "SELECT * FROM `test_establishments` LIMIT 10";

// Show all entries less than current date (expired establishments)
$ExpiredDates = "SELECT * FROM `test_establishments` WHERE expiry_date < CURRENT_DATE() LIMIT 20";

//show all entries that will expire within 30 days
$SoonExpired = "SELECT * FROM `test_establishments` WHERE expiry_date BETWEEN CURDATE() AND CURDATE()+ INTERVAL 30 DAY LIMIT 20";

// Showing all the entries with expiry dates beyond 30 days
$NotSoonExpired = "SELECT * FROM `test_establishments`WHERE expiry_date > CURDATE()+ INTERVAL 30 DAY LIMIT 20 ";



?>