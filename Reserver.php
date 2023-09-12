<?php
$nom = "";
$email = "";
$num = "";
$datedeb = "";
$datefin = "";
$errDatedeb = "";
$errDatefin = "";
$errNom = "";
$errEmail = "";
$errNum = "";
$errGenerale = "";
$messageSuccée = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $email = $_POST["email"];
    $num = $_POST["num"];
    $datedeb = date_create($_POST["datedeb"]);
    $datefin = date_create($_POST["datefin"]);
    $id = $_GET["id"];

    $datedeb = $datedeb->format('Y-m-d');
    $datefin = $datefin->format('Y-m-d');

    if (empty($nom)) {
        $errNom = "Nom obligatoire";
    }
    if (empty($email)) {
        $errEmail = "Email obligatoire";
    }
    if (empty($num)) {
        $errNum = "Numéro obligatoire";
    }
    if (empty($datedeb)) {
        $errDatedeb = "Date de début obligatoire"; 
    }
    if (empty($datefin)) {
        $errDatefin = "Date de fin obligatoire";
    }

    //pour donner id a la voiture
    require("db.php");
    $query = "SELECT * FROM reservation WHERE idVoiture = $id";
    $data = $conn->query($query);
    $data = $data->fetchAll(PDO::FETCH_ASSOC);

    //pour verifier le voiture deja reserver
    for ($i = 0; $i < count($data); $i++) { 
        if ($datedeb >= $data[$i]["datedeb"] && $datefin <= $data[$i]["datefin"]) {
            $errGenerale = "Voiture déjà réservée pour cette période.";
            break;
        }
    
    }
    if ($errNom == "" && $errEmail == "" && $errNum == "" && $errDatedeb == "" && $errDatefin == "" && $errGenerale == "")
     {
        // Préparation de la requête SQL pour éviter les failles d'injection
        $query = $conn->prepare("INSERT INTO reservation VALUES (NULL, :nom, :email, :num, :datedeb, :datefin , :id)");
        $query->bindParam(":nom", $nom);
        $query->bindParam(":email", $email);
        $query->bindParam(":num", $num);
        $query->bindParam(":datedeb", $datedeb);
        $query->bindParam(":datefin", $datefin);
        $query->bindParam(":id" , $id);

        $query->execute();
        $messageSuccée = "Voiture reservée avec succée !";
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
    <div class="wrapper2">
        <div class="form-box2 login2">
            <h2>Reservation</h2>
            <form action="#" method="post">
                <div class="input-box2">
                    <span class="icon2"><ion-icon name="person"></ion-icon></span>
                    <input type="text" name="nom" pattern="[A-Za-z]{3,50}" value="<?= $nom ?>" required>
                    <p><?=$errNom?></p>
                    <label>Nom</label>
                </div>
                <div class="input-box2">
                    <span class="icon2"><ion-icon name="mail"></ion-icon></span>
                    <input type="email" name="email" value="<?= $email ?>" required>
                    <p><?=$errEmail?></p>
                    <label>Email</label>
                </div>
                <div class="input-box2">
                    <span class="icon2"><ion-icon name="call"></ion-icon></span>
                    <input type="tel" name="num" pattern="[0-9]+" value="<?= $num ?>" required>
                    <p><?=$errNum?></p>
                    <label>Numéro de télephone</label>
                </div>
                <div class="input-box2">
                    <input type="date" name="datedeb" value="<?= $datedeb ?>" required>
                    <p><?=$errDatedeb?></p>
                </div>
                <div class="input-box2">
                    <input type="date" name="datefin" value="<?= $datefin ?>" required>
                    <p><?=$errDatefin?></p>
                </div>    
                <button type="submit" class="btn">Réserver</button> <br>
                <p><?=$errGenerale?></p>
                <p><?=$messageSuccée?></p>
                <a href="index.php">Page Acceuil</a>
            </form>

        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>