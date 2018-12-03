<?php

include("db_connect.php");
$response = array();

if(isset($_POST['action'])){
    $action = $_POST['action'];
    if ($action === "search"){
        $barcode = $_POST['q'];
        $q = "SELECT * FROM Product WHERE barcode = '$barcode' LIMIT 1";
        $result = $conn->query($q);
        if ($result->num_rows > 0){
            $response = $result->fetch_assoc();
            $response['status'] = 'ok';
        } else $response['status'] = 'error';
        echo json_encode($response);
    } else if ($action === "update"){
        $id = $_POST['productid'];
        $title = $_POST['title'];
        $manufacturer = $_POST['manufacturer'];
        $price = $_POST['price'];
        $category = $_POST['category'];
        $q = "UPDATE Product SET title = '$title', manufacturer = '$manufacturer', price = '$price', category = '$category' WHERE id = $id";
        $result = $conn->query($q) or die($conn->error);
    } 
}

?>