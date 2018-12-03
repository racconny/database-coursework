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
    <div class="update_item">
        <div class="block-title"><span style="display: inline-block; margin-right: 4px;" class="fas fa-edit"></span>Edit existing item</div>
        <div class="search_partition"> <input class="avg-input barcode-query" type="number" placeholder="Search by barcode .." type="submit" class="search-btn"> <button class="btn-search bc"> <span class="fas fa-search"></span> </button> </div>
        <table class="update_table">
        <tr>
                <td>New title: </td>
                <td> <input pattern=".{2,}" required title="2 characters minimum" class="small-input newtitle" type="text" name="newtitle"> </td>
            </tr>
            <tr>
                <td>New manufacturer: </td>
                <td> <input pattern=".{3,}" required title="3 characters minimum" class="small-input newmanufacturer" type="text" name="newmanufacturer"> </td>
            </tr>
            <tr>
                <td>New price: </td>
                <td> <input class="small-input newprice" type="number" name="newprice" step="0.01"> </td>
            </tr>
            <tr>
                <td>New category: </td>
                <td> <input class="small-input newcategory" type="text" name="newcategory"> </td>
            </tr>
            <tr>
                <td></td>
                <td> <button class="submit_btn update-btn" value="Update">Update</button> </td>
            </tr>
        </table>
    </div>
    <div class="footer">
        <div class="about">
            <p><span class="ico-tiny fas fa-shopping-cart"></span>Supermarket Management System</p>
            <p><span class="ico-tiny fas fa-user"></span>By Kreminskiy Vitaliy - 2018</p>
            <p><span class="ico-tiny fas fa-file-alt"></span>For Database Coursework</p>
        </div>
    </div>
</body>