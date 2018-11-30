<!DOCTYPE html>
<html lang="en">
<?php include("head.php") ?> 
<body>
    <div class="header">
        <div class="title" style="vertical-align: middle;">
            <a href="#">
            <span class="logo fas fa-shopping-cart"></span>
            <span style="display: inline-block; margin-left: -3px; color: white; font-size: 20px; ">My Market</span>
            </a>
        </div>
        <div class="description">
            <a href="#">
            <span style="display: inline-block; margin-top: 20px; font-size: 15px; color: white; margin: 20px 25%;">Cashier panel</span>
            </a>
        </div>
        <div class="userinfo">
            <a href="#">
            <span style="display: inline-block; margin-top: 20px; font-size: 15px; color: white; margin: 20px 15%;"><span style="display: inline-block; margin-right: 4px;" class="fas fa-user"></span>Name Surname</span>
            </a>
        </div>
    </div>
    <div class="input" style="vertical-align: middle">
        <input required type="number" class="barcode" placeholder="Barcode">
        <input required type="number" class="quantity" placeholder="Quantity" value="1">
        <button class="chequeAdd">
            <span class="fas fa-plus"></span>
        </button>
    </div>
    <div class="products">
        <div class="block-title">
            Products List
        </div>
        <div class="table-wrapper">
                <table class="products_table">
                        <tr>
                            <th class="t-bcode">Barcode</th>
                            <th class="t-title">Title</th>
                            <th class="t-manuf">Manufacturer</th>
                            <th class="t-qtty">Quantity</th>
                            <th class="t-price">Price</th>
                        </tr>
                        
                </table>
        </div>
    </div>
    <div class="info">
        <div class="block-title">Cashier info</div>
        <div class="sign">Cash register №</div>
        <div class="val" id="cash_reg">3</div>

        <div class="sign">Cashier </div>
        <div class="val" id="cash_owner">Scorpion Roman</div>

        <div class="sign">Current timestamp </div>
        <div class="val" id="cash_time"></div>

        <div class="sign-big">Total </div>
        <div class="val-big"><span class="total">0</span>𐆔</div>

        <div class="cash-actions">
            <center>
                <button class="btn-cancel tr_control" id="stop">
                    <span class="fas fa-ban" style="margin-right: 3px"></span>Cancel
                </button>
                <button class="btn-apply tr_control" id="apply">
                    <span class="fas fa-check" style="margin-right: 3px"></span>Print a cheque
                </button>
            </center>
        </div>
    </div>
    <div class="footer">
        <div class="about">
            <p><span class="ico-tiny fas fa-shopping-cart"></span>Supermarket Management System</p>
            <p><span class="ico-tiny fas fa-user"></span>By Kreminskiy Vitaliy - 2018</p>
            <p><span class="ico-tiny fas fa-file-alt"></span>For Database Coursework</p>
        </div>
    </div>
    <!-- Additional hidden elements -->
</body>
</html>