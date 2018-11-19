<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script
    src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
    <script defer src="script.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Databases</title>
</head>
<body>
    <?php 
    include("db_connect.php");
    
    $sql = sprintf("SELECT manufacturer FROM Train WHERE 1");
    $result = $conn->query($sql);

    $sql = "SELECT Item.id, Item.name, Item.price from Item  inner join Cheque_Items on Cheque_Items.itemID = Item.id inner join Cheque on Cheque.id = 1 and Cheque.id = Cheque_Items.chequeID";
    $result = $conn->query($sql);
    
    if (!$result) {
        trigger_error('Invalid query: ' . $conn->error);
    }


    if ($result->num_rows > 0) {
        echo "<table><tr><th>ID</th><th>Name</th><th>Price</th></tr>";
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["price"]."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }

    ?>
    
    <form id="formdata" method="post">
        <input placeholder="Name.." type="text" class="name">
        <input placeholder="Consignment.." type="text" class="consign">
        <input placeholder="Price.." type="text" class="price">
        <input type="submit" value="fuck" class="send">
    </form>
    <button id="start" class="start_tr">Start</button>
    <button id="cancel" class="cancel_tr">Rollback</button>
    <button id="apply" class="apply_tr">Commit</button>
</body>
</html>