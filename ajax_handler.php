<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("db_connect.php");

if (isset($_POST["name"])){
$name = $_POST['name'];
$consignment = $_POST['consignment'];
$price = $_POST['price'];

$q = "INSERT INTO Item (name, consignmentID, price) VALUES('$name','$consignment','$price')";

$query = $conn->query($q);

if($query) echo "Processed successfuly";
else echo "Something went wrong";

}

if (isset($_POST["transaction"])){
    if ($_POST["transaction"] == "start") $query = $conn->query("START TRANSACTION");
    else if ($_POST["transaction"] == "apply") $query = $conn->query("COMMIT");
    else $query = $conn->query("ROLLBACK");

    if ($query){
        echo "Transaction ".$_POST["transaction"];
    } else {
        echo "Something went wrong";
    }
}

if (isset($_POST["action"])){
    if ($_POST["action"] === "getProduct"){
        $q = "SELECT barcode, title, price, manufacturer FROM Product WHERE barcode = ".$_POST['barcode']." LIMIT 1";
        $query = $conn->query($q);

        if($query) 1;
        else echo "Something went wrong";
        
        if (mysqli_num_rows($query) > 0){
            echo json_encode(mysqli_fetch_assoc($query));
        }
        else {
            echo json_encode("0 results");
        }
    }
}

?>