<?php

// this file contains database configuration with mqsql

define('DB_SERVER','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','login');
// connecting to database
$conn=mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);
// CHECK CONNECTION
if($conn==false)
{
    die('Eroor occured');
}

?>