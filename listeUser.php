<?php
session_start();
require("db.php");
$query = "SELECT * FROM reservation";
$data = $conn->query($query);
if ($data && $data->rowCount() > 0) {
    $data = $data->fetchAll();
    for ($i = 0; $i < count($data); $i++) {
        $nom = $data[$i]["nom"];
        $email = $data[$i]["email"];
        $num = $data[$i]["num"];
        $datedeb = $data[$i]["datedeb"];
        $datefin = $data[$i]["datefin"];
        $id = $data[$i]["id"];
        $idVoiture = $data[$i]["idVoiture"];
        echo"</td></tr>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <!-- menu responsive -->
    <div class="menu_toggle"> 
        <span></span>
    </div> 

    <div class="logo">
        <p><span>Rent</span>Car</p>
    </div>
    <ul class="menu">
        <li><a href="#reservation">Reservation</a></li>
      <li>
        <a href="updatePassword.php">
            <span>Modifier mot de passe</span>
        </a>
      </li>  
        <li>
            <a href="contact.php">
               <span>Contact</span> 
            </a>
        </li>
    </ul>
    <a href="logout.php">
        <button class="btnLogin-popup">LOGOUT</button>
    </a>
</header>
<section id="reservation">
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>idVoiture</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Num</th>
                    <th>Date Début</th>
                    <th>Date Fin</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($data)) {
                    for ($i = 0; $i < count($data); $i++) {
                        $nom = $data[$i]["nom"];
                        $email = $data[$i]["email"];
                        $num = $data[$i]["num"];
                        $datedeb = $data[$i]["datedeb"];
                        $datefin = $data[$i]["datefin"];
                        $id = $data[$i]["id"];
                        $idVoiture = $data[$i]["idVoiture"];
                        echo "<tr>";
                        echo "<td>$id</td>";
                        echo "<td>$idVoiture</td>";
                        echo "<td>$nom</td>";
                        echo "<td>$email</td>";
                        echo "<td>$num</td>";
                        echo "<td>$datedeb</td>";
                        echo "<td>$datefin</td>";
                        echo "<td>";
                        if (isset($_SESSION["admin"])) {
                            echo "<a href='updateRes.php?id=$id'>Modifier</a> | ";
                            echo "<a href='deleteRes.php?id=$id'>Supprimer</a>";
                        }
                        echo "</td>";
                        echo "</tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>   
</section>

<script>
    // menu responsive code JS
    var menu_toggle = document.querySelector('.menu_toggle');
    var menu = document.querySelector('.menu');
    var menu_toggle_span = document.querySelector('.menu_toggle span');
    menu_toggle.onclick = function(){
        menu_toggle.classList.toggle('active');
        menu_toggle_span.classList.toggle('active');
        menu.classList.toggle('responsive');
    }
</script> 
</body>
</html>
