<?php
// Paramètres de connexion à la base de données
$serveur = 'localhost'; // ou l'adresse IP de votre serveur MySQL
$utilisateur = 'root'; // votre nom d'utilisateur MySQL
$motdepasse = ''; // votre mot de passe MySQL
$base_de_donnees = 'location_bien'; // le nom de votre base de données

try {
    // Création de la connexion PDO
    $connexion = new PDO("mysql:host=$serveur;dbname=$base_de_donnees", $utilisateur, $motdepasse);
    
    // Configuration des options de PDO pour afficher les erreurs SQL
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Message de réussite si la connexion est établie avec succès
    echo "";
} catch(PDOException $e) {
    // En cas d'erreur de connexion, affichage de l'erreur
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}
?>
