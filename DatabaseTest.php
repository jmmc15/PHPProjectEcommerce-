<?php

// require_once("includes/db.php");

/* print_r(PDO::getAvailableDrivers()); */

$db = new Database();

echo $db->isConnected() ? "DB Connected" : "DB not connected";



// $db->query("SELECT * FROM tbl_post");
/* print_r($db->resultset());
echo $db->rowCount(); */
// var_dump($db->single());
?>

