<?php
    require_once("db.php");
    $query = "SELECT * FROM voiture";
    $data = $conn->query($query);
    $data = $data->fetchAll(PDO::FETCH_ASSOC);
    $errNom = "";
    $errAdress = "";
    $errObjet = "";
    $errMsg = "";
    $errGeneral = "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rent Car</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
         <div class="menu_toggle"> 
            <span></span>
        </div> 

        <div class="logo">
            <p><span>Rent</span>Car</p>
        </div>
        <ul class="menu">
            <li><a href="#home">Acceuil</a></li>
            <li><a href="#cars">Vehicules</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
        <a href="login.php">
            <button class="btnLogin-popup">LOGIN</button>
        </a>
    </header>

    <!-- section Acceuil -->
     
    <section id="home">
        <div class="left">
            <div class="form-box login">
            <h1>Location <span> RentCar</span> l'offre la plus économique!!</h1>
                <span>Vous désirez louer une voiture au Maroc <br> au meilleur prix tout compris ?<br>
            Chez RentCar nous mettons à votre disposition <br> notre expérience pour vous offrir <br>
            une qualité de service exceptionnelle afin que <br> vos déplacement et voyages se passe <br>
            sereinement et en toute sécurité. </span>
            </div>
        </div>
        <div class="right">
            <img src="img1.png">
        </div>
    </section> 
    
    <!-- section vehicule -->

    <section id="cars">
        <h1 class="section_title">Nos Véhicules        </h1>
        <div class="images">
            <ul>
                <li class="car">
                   <div>
                       <img src="car1.png" alt="">
                   </div>
                   <span>TIGUAN</span>
                   <span class="prix">400DH</span>
                   <a href="Reserver.php?id=<?= $data[0]["id"] ?>">RÉSERVER MAINTENANT</a>
                </li>
                <li class="car">
                    <div>
                        <img src="car2.png" alt="">
                    </div>
                    <span>DACIA</span>
                    <span class="prix">250DH</span>
                    <a href="Reserver.php?id=<?= $data[1]["id"] ?>">RÉSERVER MAINTENANT</a>
                 </li>
                 <li class="car">
                    <div>
                        <img src="car3.png" alt="">
                    </div>
                    <span>DACIA</span>
                    <span class="prix">300DH</span>
                    <a href="Reserver.php?id=<?= $data[2]["id"] ?>">RÉSERVER MAINTENANT</a>
                 </li>
                 <li class="car">
                    <div>
                        <img src="car4.png" alt="">
                    </div>
                    <span>FORD FIESTA</span>
                    <span class="prix">200DH</span>
                    <a href="Reserver.php?id=<?= $data[3]["id"] ?>">RÉSERVER MAINTENANT</a>
                 </li>
                 <li class="car">
                    <div>
                        <img src="car5.png" alt="">
                    </div>
                    <span>CLIO 4</span>
                    <span class="prix">200DH</span>
                    <a href="Reserver.php?id=<?= $data[4]["id"] ?>">RÉSERVER MAINTENANT</a>
                 </li>
                 <li class="car">
                    <div>
                        <img src="img1.png" alt="">
                    </div>
                    <span>TIGUAN</span>
                    <span class="prix">400DH</span>
                    <a href="Reserver.php?id=<?= $data[5]["id"] ?>">RÉSERVER MAINTENANT</a>
                 </li>
            </ul>
        </div>
    </section> 

    <!-- section contact --> 

    <section id="contact">
        <h1 class="section_title">contact</h1>
        <div class="localisation_contact_div">
            <div class="localisation">
                <h3>Notre Adresse</h3>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10499.966567606692!2d2.285747998068967!3d48.85836977022069!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e2964e34e2d%3A0x8ddca9ee380ef7e0!2sTour%20Eiffel!5e0!3m2!1sfr!2sfr!4v1644955637071!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>

            <div class="form_contact">
                <h3>Envoyer un message</h3>
                <form action="contact.php" method="post">
                    <input type="text" name="Nom" placeholder="Nom">
                    <p><?=$errNom?></p>
                    <input type="email" name="AdresseMail" placeholder="Adresse e-mail">
                    <p><?=$errAdress?></p>
                    <input type="text" name="Objet" placeholder="Objet">
                    <p><?=$errObjet?></p>
                    <textarea name="Message" cols="30" rows="10" placeholder="Message"></textarea>
                    <p><?=$errMsg?></p>
                    <input type="submit" value="Envoyer">
                    <p><?=$errGeneral?></p>
                </form>
            </div>

        </div>
    </section> 

 
   
    <!-- <script>
         
        //menu responsive code JS

        var menu_toggle = document.querySelector('.menu_toggle');
        var menu = document.querySelector('.menu');
        var menu_toggle_span = document.querySelector('.menu_toggle span');
        menu_toggle.onclick = function(){
            menu_toggle.classList.toggle('active');
            menu_toggle_span.classList.toggle('active');
            menu.classList.toggle('responsive') ;
        }

    </script>  -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>