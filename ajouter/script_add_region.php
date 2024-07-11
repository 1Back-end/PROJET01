
<?php

// Configuration de la connexion à la base de données
$dsn = 'mysql:host=localhost;dbname=immo';
$username = 'root';
$password = '';

// Vérification si le bouton "Enregistrer" a été cliqué
if (isset($_POST['enregistrer'])) {
    try {
        // Connexion à la base de données
        $db = new PDO($dsn, $username, $password);

        // Préparation de la requête SQL
        $sql = "INSERT INTO regions (nom) VALUES (:nom)";
        $stmt = $db->prepare($sql);

        // Récupération des données du formulaire
        $nomRegion = $_POST['nom'];

        // Liaison des paramètres à la requête
        $stmt->bindParam(':nom', $nomRegion);

        // Exécution de la requête
        $stmt->execute();

        // Affichage d'un message de confirmation
        $successMessage = "<p>La région a été enregistrée avec succès.</p>";
    } catch (PDOException $e) {
        // Affichage d'un message d'erreur
        $errorMessage = "Erreur : ";
    }
}

?>