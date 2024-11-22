<?php
session_start();
$server      = 'localhost';
$username    = 'root';
$password    = '';
$db_name     = 'essence_db';


$conn  =  mysqli_connect($server,$username,$password,$db_name);


if (!$conn) {
    echo "not connected with database";
}


 



?>