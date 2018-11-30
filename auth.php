<?php include("head.php");
include("db_connect.php");
if (isset($_POST["login"]) && isset($_POST["password"])){
    $q = "SELECT * FROM User WHERE login = '".$_POST['login']."' AND password = '".$_POST['password']."' LIMIT 1";
    $query = $conn->query($q) or die($conn->error);
    if ($query->num_rows > 0){
        $row = $query->fetch_assoc();
        if ($row['role'] === 'cashier'){
            header("Location: cashier_panel.php");
        }
    } else echo "Not such user";
}

?> 
    <div class="header">
        <div class="title" style="vertical-align: middle;">
            <a href="#">
            <span class="logo fas fa-shopping-cart"></span>
            <span style="display: inline-block; margin-left: -3px; color: white; font-size: 20px; ">My Market</span>
            </a>
        </div>
        <div class="userinfo">
            <a href="#">
            <span style="display: inline-block; margin-top: 20px; font-size: 15px; color: white; margin: 20px 15%;"><span>Authirization</span>
            </a>
        </div>
    </div>
<body class="auth_page">
<div class="auth_window">
    <div class="auth_title">Authorization</div>
    <form action="auth.php" method="post">
        <table class="auth-table">
            <tr>
                <td>Login</td>
                <td style="width: 130px"><input class="auth_input" type="text" name="login" style="width: 100%"></td>
            </tr>
            <tr>
                <td style="width: 130px">Password</td>
                <td><input type="password" class="auth_input" name="password" style="width: 100%"></td>
            </tr>
            <tr>
                <td></td>
                <td> <input class="auth_btn" type="submit" value="Log In"> </td>
            </tr>
        </table>
    </form>
</div>
</body>