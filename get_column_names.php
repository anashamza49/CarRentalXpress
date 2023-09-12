<?php
try {
    include("db.php");
    
    // Exécutez une requête pour obtenir la structure de la table "contact"
    $query = "DESCRIBE contact";
    $stmt = $conn->prepare($query);
    $stmt->execute();

    // Récupérez les résultats de la requête
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Affichez les noms des colonnes de la table "contact"
    echo "Noms des colonnes de la table 'contact':<br>";
    foreach ($results as $row) {
        echo $row['Field'] . "<br>";
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
