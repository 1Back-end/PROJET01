<?php
// Inclure le fichier de connexion à la base de données
include_once("../database/db.php");

// Initialiser le message par défaut
$message = "";

// Vérifier si l'ID de la chambre est passé en paramètre dans l'URL
if(isset($_GET['id'])) {
    // Récupérer l'ID de la chambre depuis l'URL
    $id_chambre = $_GET['id'];

    // Requête SQL pour récupérer le type de location de la chambre
    $sql_type = "SELECT type_logement FROM produits WHERE id = :id";
    $stmt_type = $connexion->prepare($sql_type);
    $stmt_type->execute([':id' => $id_chambre]);
    $type_chambre = $stmt_type->fetchColumn();

    if ($type_chambre) {
        // Requête SQL pour mettre à jour le statut de la chambre à "Accepté"
        $sql = "UPDATE produits SET statut = 'Accepté' WHERE id = :id";
        $stmt = $connexion->prepare($sql);
        // Exécuter la requête en passant l'ID de la chambre en paramètre
        if ($stmt->execute([':id' => $id_chambre])) {
            // Message de succès si la mise à jour a réussi
            $message = "Le statut a été mis à jour avec succès.";
        } else {
            // Message d'erreur si la mise à jour a échoué
            $message = "Erreur : La mise à jour du statut a échoué.";
        }
    } else {
        // Message d'erreur si le type de la chambre n'est pas trouvé
        $message = "Erreur : Type de chambre non trouvé pour l'ID $id_chambre.";
    }

    // Rediriger l'utilisateur vers la page précédente avec le message
    header("Location: produit.php?message=" . urlencode($message));
    exit(); // Arrêter l'exécution du script pour éviter l'affichage du reste de la page
} else {
    // Rediriger l'utilisateur vers une autre page si l'ID de la chambre n'est pas spécifié
    header("Location: produit.php");
    exit(); // Arrêter l'exécution du script pour éviter l'affichage du reste de la page
}
?>
