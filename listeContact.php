<?php
session_start();
require("db.php");
$query = "SELECT * FROM contact";
$data = $conn->query($query);
if ($data && $data->rowCount() > 0) {
    $data = $data->fetchAll();
    for ($i = 0; $i < count($data); $i++) {
        $id = $data[$i]["id"];
        $nom = $data[$i]["nom"];
        $adress = $data[$i]["email"];
        $objet = $data[$i]["objet"];
        $msg = $data[$i]["msg"];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<section id="reservation">
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>AdresseMail</th>
                    <th>Objet</th>
                    <th>Message</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($data)) {
                    for ($i = 0; $i < count($data); $i++) {
                        $id = $data[$i]["id"];
                        $nom = $data[$i]["nom"];
                        $adress = $data[$i]["email"];
                        $objet = $data[$i]["objet"];
                        $msg = $data[$i]["msg"];
                        echo "<tr>";
                        echo "<td>$id</td>";
                        echo "<td>$nom</td>";
                        echo "<td>$adress</td>";
                        echo "<td>$objet</td>";
                        echo "<td>$msg</td>";
                        echo "</tr>";
                    }
                }
                ?> 
            </tbody>
        </table>
    </div>   
</section>
</body>
</html>