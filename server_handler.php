<?php

include("db_connect.php");

if (isset($_POST["action"])){
    if ($_POST["action"] === "getProduct"){
        $q = "SELECT id, barcode, title, price, manufacturer FROM Product WHERE barcode = ".$_POST['barcode']." LIMIT 1";
        $query = $conn->query($q) or die($conn->error);
        echo json_encode(mysqli_fetch_assoc($query));
    } else if ($_POST["action"] === "applyPurchase"){
        $products = $_POST["products"];
        $q = "INSERT INTO Cheque (cashierID, totalPrice, timedate) VALUES (123, ".$_POST['sum'].", NOW())";
        $query = $conn->query($q) or die($conn->error);
        $cheque_id = mysqli_insert_id($conn);
        foreach($products as $item){
            $q = "INSERT INTO Cheque_Items (itemID, chequeID, quantity) VALUES (".$item['id'].", ".$cheque_id.", ".$item['quantity'].")";
            $query = $conn->query($q) or die($conn->error);
        }
    }
}

?>