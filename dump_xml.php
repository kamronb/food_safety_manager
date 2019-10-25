<?php
require("db_stuff/phpsqlajax_dbinfo.php");

$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);

// Opening connection to the MySQL Server
$db_conn = mysqli_connect($db_host, $db_user, $db_pass);
if (!$db_conn) {
    die('Not Connected :' . mysqli_error());
}


// Setting the Database we using
$db_select = mysqli_select_db($db_conn, $db_name);
if (!$db_select) {
    die('Could not select DB');
}

// Select only the rows in the table we using
$result = mysqli_query($db_conn, $db_query);
if (!$result) {
    die('Invalid query: ' . mysqli_error($db_query));
}
header("Content-type: text/xml");


// Iterate through the rows, adding XML nodes for each
while ($row = @mysqli_fetch_assoc($result)) {
    //Adding XML document node
    $node = $dom -> createElement("marker"); //this is the one that determines the marker on the map
    $newnode = $parnode ->appendChild($node);
    $newnode->setAttribute('id', $row['registration_number']);
    $newnode->setAttribute('name', $row['establishment_name']);
    $newnode->setAttribute('address', $row['establishment_address_street']);
    $newnode->setAttribute('address-town', $row['establishment_address_town']);
    $newnode->setAttribute('category', $row['establishment_category']);
    $newnode->setAttribute('first-name', $row['operator_first_name']);
    $newnode->setAttribute('last-name', $row['operator_last_name']);
    $newnode->setAttribute('expiry-date', $row['expiry_date']);
    $newnode->setAttribute('lat', $row['establishment_location_lat']);
    $newnode->setAttribute('lon', $row['establishment_location_lon']);



    /*
    Need a way to do this for arranging them according to the expiry date or, I could
    take them from the DB according to who is expired. Or Maybe I can do that with the
    Javascript?
    */
}


$info_to_write_to = $dom->saveXML();
$file_to_edit = "/db_stuff/db_dump.xml";

fwrite($file_to_edit, $info_to_write_to);


echo $dom->saveXML();












?>