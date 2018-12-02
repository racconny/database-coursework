<?php

include("head.php");
include("db_connect.php");
session_start();

if (!empty($_POST['bcode']) and !empty($_POST['title'])){
    $barcode = $_POST['bcode'];
    $title = $_POST['title'];
    $manufacturer = $_POST['manufacturer'];
    $price = $_POST['price'];
    $category = $_POST['category'];

    $q = "INSERT INTO Product (barcode, title, manufacturer, category, price) values ($barcode, '$title', '$manufacturer', '$category', $price)";
    $query = $conn->query($q);

    $_POST = array();
}
?>
<body>
<div class="header">
        <div class="title" style="vertical-align: middle;">
            <a href="auth.php?action=outlog">
            <span class="logo fas fa-shopping-cart"></span>
            <span style="display: inline-block; margin-left: -3px; color: white; font-size: 20px; ">My Market</span>
            </a>
        </div>
        <div class="description">
            <a href="#">
            <span style="display: inline-block; margin-top: 20px; font-size: 15px; color: white; margin: 20px 25%;">Supervisor panel</span>
            </a>
        </div>
        <div class="userinfo">
            <a href="auth.php?action=outlog">
            <span style="display: inline-block; margin-top: 20px; font-size: 15px; color: white; margin: 20px 15%;"><span style="display: inline-block; margin-right: 4px;" class="fas fa-user"></span><?php echo $_SESSION['surname']." ".$_SESSION['name'][0]."."; ?></span>
            </a>
        </div>
    </div>
    <div class="new_item">
        <div class="block-title"><span style="display: inline-block; margin-right: 4px;" class="fas fa-plus"></span>Add new item</div>
        <table class="adding-item">
            <form action="supervisor_panel.php" method="post">
            <tr>
                <td>Barcode: </td>
                <td> <input pattern=".{10,}" required title="10 characters minimum" class="small-input" type="number" name="bcode"> </td>
            </tr>
            <tr>
                <td>Title: </td>
                <td> <input pattern=".{2,}" required title="2 characters minimum" class="small-input" type="text" name="title"> </td>
            </tr>
            <tr>
                <td>Manufacturer: </td>
                <td> <input pattern=".{3,}" required title="3 characters minimum" class="small-input" type="text" name="manufacturer"> </td>
            </tr>
            <tr>
                <td>Price: </td>
                <td> <input class="small-input" type="number" name="price" step="0.01"> </td>
            </tr>
            <tr>
                <td>Category: </td>
                <td> <input class="small-input" type="text" name="category"> </td>
            </tr>
            <tr>
                <td></td>
                <td> <input class="submit_btn" type="submit" value="Add"> </td>
            </tr>
            </form>
        </table>
    </div>
</body>