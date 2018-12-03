<?php include("head.php");
include("db_connect.php");
if (isset($_POST["login"]) && isset($_POST["password"])){
    $q = "SELECT * FROM User WHERE login = '".$_POST['login']."' AND password = '".$_POST['password']."' LIMIT 1";
    $query = $conn->query($q) or die($conn->error);
    if ($query->num_rows > 0){
        $row = $query->fetch_assoc();
        if ($row['role'] === 'cashier'){
            $id = $row['id'];
            $q = "SELECT * FROM Cashier WHERE user_id = '$id'";
            $query = $conn->query($q); 
            $cashier_info = $query->fetch_assoc();

            session_start();

            $_SESSION['name'] = $row['name'];
            $_SESSION['surname'] = $row['surname'];
            $_SESSION['cashRegister'] = $cashier_info['cashRegister'];

            header("Location: cashier_panel.php");
        } else if ($row['role'] === 'supervisor'){
            session_start();

            $_SESSION['name'] = $row['name'];
            $_SESSION['surname'] = $row['surname'];
            $_SESSION['role'] = $row['role'];

            header("Location: supervisor_panel.php");
        }
    } else echo "Not such user";
}

if (isset($_GET['action'])){
    if ($_GET['action'] === "outlog"){
        session_destroy();
        header("Location: auth.php");
    }
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
<div class="footer">
        <div class="about">
            <p><span class="ico-tiny fas fa-shopping-cart"></span>Supermarket Management System</p>
            <p><span class="ico-tiny fas fa-user"></span>By Kreminskiy Vitaliy - 2018</p>
            <p><span class="ico-tiny fas fa-file-alt"></span>For Database Coursework</p>
        </div>
    </div>
</body>