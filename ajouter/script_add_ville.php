<?php
// Informations de connexion à la base de données
$serveur = "localhost"; // Adresse du serveur MySQL
$utilisateur = "root"; // Nom d'utilisateur MySQL
$motDePasse = ""; // Mot de passe MySQL
$nomBaseDeDonnees = "immo"; // Nom de la base de données MySQL

try {
    // Connexion à la base de données avec PDO
    $bdd = new PDO("mysql:host=$serveur;dbname=$nomBaseDeDonnees", $utilisateur, $motDePasse);
    
    // Définition du mode d'erreur de PDO sur Exception
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Vérification si le formulaire a été soumis
    if (isset($_POST['enregistrer'])) {
        // Récupération des données du formulaire
        $nomVille = $_POST['nom'];
        $region = $_POST['region_id'];
        
        // Préparation de la requête d'insertion avec des paramètres nommés
        $requete = $bdd->prepare("INSERT INTO villes (nom, region_id) VALUES (:nom, :region_id)");
        
        // Liaison des paramètres nommés avec les valeurs des variables
        $requete->bindParam(':nom', $nomVille);
        $requete->bindParam(':region_id', $region);
        
        // Exécution de la requête
        $requete->execute();
        
        // Message de succès
        $successMessage =  "La ville a été enregistrée avec succès.";
    }
} catch(PDOException $e) {
    // En cas d'erreur de connexion ou de requête
    $errorMessage = "Erreur : ";
}
?>