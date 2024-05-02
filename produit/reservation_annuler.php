<?php
// Inclure votre fichier de configuration contenant la connexion à la base de données
require_once "../database/db.php";

// Initialiser les messages à vide
$success = "";
$erreur = "";

// Vérifier si l'ID de la réservation est passé dans l'URL
if(isset($_GET['id_reservation'])) {
    $id_reservation = $_GET['id_reservation'];

    try {
        // Préparer la requête SQL pour mettre à jour le statut de la réservation
        $sql = "UPDATE reservation SET statut = 'annulé' WHERE id = :id_reservation";

        // Préparer la déclaration SQL
        $stmt = $connexion->prepare($sql);

        // Liaison des paramètres
        $stmt->bindParam(':id_reservation', $id_reservation);

        // Exécuter la requête
        $stmt->execute();

        // Vérifier si la requête a réussi
        if($stmt->rowCount() > 0) {
            // Message de succès
            $success = "La réservation a été annulée avec succès";
        } else {
            // Message d'erreur si aucun enregistrement n'a été mis à jour
            $erreur = "Erreur lors de l'annulation de la réservation. Veuillez réessayer.";
        }
    } catch(PDOException $e) {
        // Gestion des exceptions PDO
        $erreur = "Erreur : " . $e->getMessage();
    }
} else {
    // Message d'erreur si l'ID de réservation n'est pas spécifié dans l'URL
   $erreur = "ID de réservation non spécifié.";
}

// Redirection vers la page reservation.php avec les messages
header("Location: reservation.php?success=" . urlencode($success) . "&erreur=" . urlencode($erreur));
exit;
?>
