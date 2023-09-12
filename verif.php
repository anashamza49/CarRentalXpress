<?php
// session_start();
// if (!isset($_SESSION["admin"])) {
//     header("location:login.php");
//     exit(); // Ajout pour arrêter l'exécution du code après la redirection
// }



// if (isset($_POST["password"])) {
//     $password = $_POST["password"];
//     $nouveauPassword = $_POST["NouveauPassword"];
//     $confirNouveauPassword = $_POST["ConfirNouveauPassword"];

//     if ($nouveauPassword == $confirNouveauPassword) {
//         require("db.php");
      
//         $login = $_SESSION["login"];
//         $nouveauPassword = md5($nouveauPassword);
//         $query = "UPDATE user1 SET password = '$nouveauPassword' WHERE id = $login";
//         $conn->exec($query);
//     } 
//     else {
//         $errPassword = "Le mot de passe est incorrect";
//     }
//     header("location:login.php");
// }
?>