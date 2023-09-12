<?php
session_start();
if(!isset($_GET["id"]))
{
    header("location:listUser.php");
}
if(!isset($_SESSION["admin"]))
{
    header("location:login.php");
}
$datedeb = "";
$datefin = "";
$errDatedeb = "";
$errDatefin = "";
if(isset($_GET["id"]))
{
    $id = $_GET["id"];
    if(!is_numeric($id))
    {
        header("location:listeUser.php");  
    }
        require("db.php");

        $query = "SELECT * FROM reservation WHERE id=:id";
        $data = $conn->prepare($query);
        $data->execute(array('id' => $id));
        $data = $data->fetch(PDO::FETCH_ASSOC);
}
if(isset($_POST["datedeb"]))
{
    $datedeb = $_POST["datedeb"];
    $datefin = $_POST["datefin"];
    if(empty($datedeb) && empty($datefin))
    {
        $errDatedeb = "la date obligatoire";
        $errDatefine = "la date obligatoire";
    }
    if ($errDatedeb == "" && $errDatefin == "") {
        require("db.php");
        $query = "UPDATE reservation SET datedeb='$datedeb', datefin='$datefin' WHERE id=$id";
        $conn->exec($query);
        header("location:listeUser.php");
    }    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Changer Reservation</title>
    <link rel="stylesheet" href="style1.css">

</head>
<body>
    <div class="wrapper2">
        <div class="form-box2 login2">
            <h2>Modifier La Reservation</h2>
            <form action="#" method="post">
                <div class="input-box2">
                    <input type="date" name="datedeb" value="<?= $datedeb ?>" required>
                    <p><?=$errDatedeb?></p>
                </div>
                <div class="input-box2">
                    <input type="date" name="datefin" value="<?= $datefin ?>" required>
                    <p><?=$errDatefin?></p>
                </div>    
                <button type="submit" class="btn">Modifier</button> <br>
            </form>
        </div>
    </div>
</body>
</html>

