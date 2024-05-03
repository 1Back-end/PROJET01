<?php
include_once("../database/db.php");

// Vérifiez si l'ID du compte est fourni dans l'URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $compte_id = $_GET['id'];

    // Mettez à jour le statut du compte à "Inactif"
    $sql = "UPDATE utilisateurs SET STATUS = 'Inactif' WHERE ID = :id";
    $stmt = $connexion->prepare($sql);
    $stmt->bindParam(':id', $compte_id, PDO::PARAM_INT);

    // Exécutez la requête
    if ($stmt->execute()) {
        // Redirection vers la page "liste_admins.php" avec un message de succès
        header("Location: liste_admins.php?success=Le compte a été désactivé avec succès.");
        exit();
    } else {
        // Redirection vers la page "liste_admins.php" avec un message d'erreur
        header("Location: liste_admins.php?error=Une erreur s'est produite lors de la désactivation du compte.");
        exit();
    }
} else {
    // Redirection vers la page "liste_admins.php" avec un message d'erreur si l'ID n'est pas fourni
    header("Location: liste_admins.php?error=L'identifiant du compte est manquant.");
    exit();
}
?>
