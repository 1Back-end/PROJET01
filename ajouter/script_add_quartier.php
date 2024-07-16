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
        $nomquartier = $_POST['nom'];
        $Ville = $_POST['ville_id'];
        
        // Préparation de la requête d'insertion avec des paramètres nommés
        $requete = $bdd->prepare("INSERT INTO quartiers (nom, ville_id) VALUES (:nom, :ville_id)");
        
        // Liaison des paramètres nommés avec les valeurs des variables
        $requete->bindParam(':nom', $nomquartier);
        $requete->bindParam(':ville_id', $Ville);
        
        // Exécution de la requête
        $requete->execute();
        
        // Message de succès
        $successMessage =  "Quartier a été enregistré avec succès.";
    }
} catch(PDOException $e) {
    // En cas d'erreur de connexion ou de requête
    $errorMessage = "Erreur : ";
}
?>