<?php 
 session_start();
$login = "";
$password = "";
$errLogin = "";
$errPassword = "";
$errGeneral = "";
if(isset($_POST["login"]))
{
    $login = $_POST["login"];
    $password = $_POST["password"];
    if(empty($login))
    {
        $errLogin = "login obligatoire";
    }
    if(empty($password))
    {
        $errPassword = "mot de passe obligatoire";
    }
    if($errLogin =="" && $errPassword == "")
    {
        require("db.php");
        $password =md5($password);
        $query = "SELECT * FROM user1 where login = '$login' and password = '$password'";
        $data = $conn->query($query); 
        $data = $data->fetchAll(PDO::FETCH_ASSOC);
    }
    
    if(count($data) > 0)
    {
       
        $_SESSION["admin"] = true;
        $_SESSION["login"] = true;   
        header("location:listeUser.php");
          
    }
    else
    {
        $errGeneral = "login ou mot de passe incorrect";
    }   
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
            <h2>Login</h2>
            <form action="#" method="post">
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input type="text" name="login" required>
                    <p><?=$errLogin?></p>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" name="password" required>
                    <p><?=$errPassword?></p>
                    <label>mot de passe</label>
                </div>
                <button type="submit" class="btn">Login</button>
                <p><?=$errGeneral?></p>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>