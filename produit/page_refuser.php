<?php
// Inclure le fichier de connexion à la base de données
include_once("../database/db.php");

// Initialiser le message par défaut
$message = "";

// Vérifier si l'ID de la chambre est passé en paramètre dans l'URL
if(isset($_GET['id'])) {
    // Récupérer l'ID de la chambre depuis l'URL
    $id_chambre = $_GET['id'];

    // Requête SQL pour récupérer l'ID de l'utilisateur associé à la chambre
    $sql_utilisateur = "SELECT type_logement FROM produits WHERE id = :id";
    $stmt_utilisateur = $connexion->prepare($sql_utilisateur);
    $stmt_utilisateur->execute([':id' => $id_chambre]);
    $utilisateur = $stmt_utilisateur->fetch(PDO::FETCH_ASSOC);

    // Si l'utilisateur associé à la chambre est trouvé
    if ($utilisateur) {
        // Requête SQL pour mettre à jour le statut de la chambre à "Rejeté"
        $sql = "UPDATE produits SET statut = 'Rejeté' WHERE id = :id";
        $stmt = $connexion->prepare($sql);
        // Exécuter la requête en passant l'ID de la chambre en paramètre
        if ($stmt->execute([':id' => $id_chambre])) {
            // Message de succès si la mise à jour a réussi
            $message = "Le produit a été rejeté.";

            // Redirection vers la page commentaire.php avec l'ID de la chambre
        } else {
            // Message d'erreur si la mise à jour a échoué
            $message = "Erreur : La mise à jour du statut a échoué.";
        }
    } else {
        // Message d'erreur si l'utilisateur associé à la chambre n'est pas trouvé
        $message = "Erreur : Utilisateur non trouvé pour l'ID $id_chambre.";
    }

    // Rediriger l'utilisateur vers la page précédente avec le message
    header("Location: commentaire.php?id_chambre=" . $id_chambre . "&message=" . urlencode($message));

    exit(); // Arrêter l'exécution du script pour éviter l'affichage du reste de la page
} else {
    // Rediriger l'utilisateur vers une autre page si l'ID de la chambre n'est pas spécifié
    header("Location: commentaire.php");
    exit(); // Arrêter l'exécution du script pour éviter l'affichage du reste de la page
}
?>
