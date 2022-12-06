<?php

//for local run

// define("DB_HOST", "localhost");
// define("DB_USER", "root");
// define("DB_PASSWORD", "123456");
// define("DB_NAME", "ecom_store");



//Get Heroku ClearDB connection information
$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"],1);
$active_group = 'default';
$query_builder = TRUE;


define("DB_HOST", $cleardb_server);
define("DB_USER", $cleardb_username);
define("DB_PASSWORD", $cleardb_password);
define("DB_NAME", $cleardb_db);

?>