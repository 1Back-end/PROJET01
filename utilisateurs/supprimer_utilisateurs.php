<?php
// Connexion à la base de données
include_once("../database/db.php");

// Vérifier si un utilisateur doit être marqué comme supprimé
if (isset($_GET['id'])) {
    $id_utilisateur = $_GET['id'];

    $stmt_delete = $connexion->prepare("UPDATE utilisateurs SET DELETED_AT = NOW(), STATUT = 'Supprimé' WHERE ID = ?");
    if ($stmt_delete->execute([$id_utilisateur])) {
        // Alerte JavaScript pour informer que l'utilisateur a été supprimé avec succès
        echo "<script>alert('Utilisateur supprimé avec succès'); window.history.go(-1);</script>";
    } else {
        // Alerte JavaScript pour informer qu'il y a eu une erreur lors de la suppression de l'utilisateur
        echo "<script>alert('Erreur lors de la suppression de l\'utilisateur'); window.history.go(-1);</script>";
    }
} else {
    // Redirection vers la page proprietaire.php avec un message d'erreur
    echo "<script>alert('Impossible de supprimer cet utilisateur'); window.history.go(-1);</script>";
}

// Récupérer la liste des utilisateurs avec un rôle égal à 2 (propriétaires)
$stmt = $connexion->prepare("SELECT * FROM utilisateurs WHERE STATUT = 'Present'");
$stmt->execute();
$utilisateurs = $stmt->fetchAll();
?>
