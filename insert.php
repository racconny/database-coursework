<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("db_connect.php");

$name = "V";
$consignment = '23ee';
$amount = 23;
$price = 30;

$q = "INSERT INTO Item (name, consignmentID, amount, price) VALUES('$name','$consignment','$amount','$price')";

$query = $conn->query($q) or die("Something went wrong".$conn->error);

?>