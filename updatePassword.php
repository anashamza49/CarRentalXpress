<?php
$password = "";
$errPassword = "";
$nouveauPassword = "";
$errConfirNouveauPassword = "";
$errGeneral = "";
session_start();
if (!isset($_SESSION["admin"])) {
    header("location:login.php");
    exit(); 
}

if (isset($_POST["password"])) {
    $password = $_POST["password"];
    $nouveauPassword = $_POST["NouveauPassword"];
    $confirNouveauPassword = $_POST["ConfirNouveauPassword"];

    if ($nouveauPassword == $confirNouveauPassword) {
        require("db.php");
      
        $login = $_SESSION["login"];
        $nouveauPassword = md5($nouveauPassword);
        $query = "UPDATE user1 SET password = '$nouveauPassword' WHERE id = $login";
        $conn->exec($query);
    } 
    else {
        $errPassword = "Le mot de passe est incorrect";
    }
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
<div class="wrapper">
    <div class="form-box login">
        <h2>Modier le mot de passe</h2>
        <form action="#" method="post">
            <div class="input-box">
                <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                <input type="password" name="password" required>
                <p><?=$errPassword?></p>
                <label>mot de passe</label>
            </div>
            <div class="input-box">
                <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                <input type="password" name="NouveauPassword" required>
                <p><?=$errConfirNouveauPassword?></p>
                <label>Nouveau mot de passe</label>
            </div>
            <div class="input-box">
                <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                <input type="password" name="ConfirNouveauPassword" required>
                <p><?=$errConfirNouveauPassword?></p>
                <label>Confirmer nouveau mot de passe</label>
            </div>
            <button type="submit" class="btn">Modifier</button>
            <p><?=$errGeneral?></p>
        </form>
    </div>
</div>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
