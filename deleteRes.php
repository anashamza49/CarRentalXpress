<?php
session_start();
if(!isset($_SESSION["admin"]))
{
    header("location:login.php");
}
$id = $_GET["id"];
echo $id;
require("db.php");

$query = "DELETE FROM reservation WHERE id=:id";
$data = $conn->prepare($query);
$data->bindParam(':id', $id);
$data->execute();

if ($data) {
    header("location: listeUser.php");
    exit();
}
?>
