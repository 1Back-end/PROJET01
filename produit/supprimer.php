<?php
// Connexion à la base de données
include_once("../database/db.php");

// Déclaration du message de succès
$message = "La suppression a été effectuée avec succès !";

// Vérifier si l'ID du produit est défini dans l'URL
if (isset($_GET['id'])) {
    // Récupérer l'ID du produit depuis l'URL
    $id_produit = $_GET['id'];

    // Vérifier si le produit existe dans la base de données
    $stmt = $connexion->prepare("SELECT * FROM produits WHERE ID = ?");
    $stmt->execute([$id_produit]);
    $produit = $stmt->fetch();

    // Vérifier si le produit existe et s'il n'est pas déjà supprimé
    if ($produit && $produit['DELETED_AT'] == null) {
        // Marquer le produit comme supprimé en mettant à jour le champ DELETED_AT
        $stmt = $connexion->prepare("UPDATE produits SET DELETED_AT = NOW(), STATUS = 'Supprimé' WHERE ID = ?");
        $stmt->execute([$id_produit]);

        // Redirection vers la page produit.php avec un message de succès
        header("Location: produit.php?success=1&message=" . urlencode($message));
        exit();
    } else {
        // Redirection vers la page produit.php avec un message d'erreur si le produit n'existe pas ou s'il est déjà supprimé
        header("Location: produit.php?error=1&message=Le produit n'existe pas ou a déjà été supprimé");
        exit();
    }
}

// Requête SQL pour récupérer les produits dont le statut est "Présent"
$stmt = $connexion->prepare("SELECT * FROM produits WHERE STATUT = 'Present'");
$stmt->execute();
$produits_present = $stmt->fetchAll();

?>
