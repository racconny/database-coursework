<?php

include("db_connect.php");
$response = array();

if(isset($_POST['action'])){
    $action = $_POST['action'];
    $barcode = $_POST['q'];
    if ($action === "search"){
        $q = "SELECT * FROM Product WHERE barcode = '$barcode' LIMIT 1";
        $result = $conn->query($q);
        if ($result->num_rows > 0){
            $response = $result->fetch_assoc();
            $response['status'] = 'ok';
        } else $response['status'] = 'error';
        echo json_encode($response);
    }
}

?>