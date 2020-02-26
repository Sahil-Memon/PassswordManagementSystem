<?php

ini_set('display_error',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

$server = "localhost";
$user = "admin";
$pwd ="root";
$db = "pms";
session_start();

$conn =mysqli_connect($server,$user,$pwd,$db) or die("Connection Failed");

?>