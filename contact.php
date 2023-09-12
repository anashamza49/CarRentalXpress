<?php
$nom = "";
$adress = "";
$objet = "";
$msg = "";
$errNom = "";
$errAdress = "";
$errObjet = "";
$errMsg = "";
$errGeneral = "";
if( !isset($_POST["nom"]))
{
    $id = $_GET["id"];
    $nom = $_POST["Nom"];
    $adress = $_POST["AdresseMail"];
    $objet = $_POST["Objet"];
    $msg = $_POST["Message"];
    if(empty($nom))
    {
        $errNom = "nom obligatoire";
    }
    if(empty($adress))
    {
        $errAdress = "adress obligatoire";
    }
    if(empty($objet))
    {
        $errObjet = "objet obligatoire";
    }
    if(empty($msg))
    {
        $errMsg = "message obligatoire";
    }
   
        // Préparation de la requête SQL pour éviter les failles d'injection
        include("db.php");
        $query = "INSERT INTO contact VALUES (NULL, '$nom', '$adress', '$objet', '$msg')";
        $conn->exec($query);
        echo "Message avec succée !";
        header("location:listeContact.php");
}

?>