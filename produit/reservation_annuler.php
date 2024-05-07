<?php
// Inclure votre fichier de configuration contenant la connexion à la base de données
require_once "../database/db.php";

// Initialiser les messages à vide
$success = "";
$erreur = "";

try {
    // Vérifier si l'identifiant de la réservation est spécifié dans la requête GET
    if(isset($_GET['id_reservation'])) {
        // Récupérer l'identifiant de la réservation à partir de la requête GET
        $id_reservation = $_GET['id_reservation']; // Adapté selon votre méthode d'obtention de l'identifiant
        
        // Récupérer le produit_id associé à l'id_reservation dans la table reservation
        $stmt = $connexion->prepare("SELECT produit_id FROM reservation WHERE id = :id_reservation");
        $stmt->bindParam(':id_reservation', $id_reservation, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Vérifier si une ligne a été trouvée
        if ($result) {
            $produit_id = $result['produit_id'];
            
            // Mettre à jour le statut du produit dans la table produits
            $sql = "UPDATE produits SET STATUS = 'Present' WHERE id = :produit_id";
            $stmt = $connexion->prepare($sql);
            $stmt->bindParam(':produit_id', $produit_id, PDO::PARAM_INT);
            $stmt->execute();
            
            // Mettre à jour le statut de la réservation dans la table reservation
            $sql_reservation = "UPDATE reservation SET statut = 'validé' WHERE id = :id_reservation";
            $stmt_reservation = $connexion->prepare($sql_reservation);
            $stmt_reservation->bindParam(':id_reservation', $id_reservation, PDO::PARAM_INT);
            $stmt_reservation->execute();
            
            // Afficher un message de succès
            $success = "La réservation a été annulée avec succès";
        } else {
            // Si aucune ligne n'a été trouvée, afficher un message d'erreur
            $erreur = "Erreur lors de l'annulation de la réservation. Veuillez réessayer.";
        }
    } else {
        // Si l'identifiant de la réservation n'est pas spécifié, afficher un message d'erreur
        $erreur = "ID de réservation non spécifié.";
    }
} catch(PDOException $e) {
    // En cas d'erreur, afficher l'erreur
    echo "Erreur : " . $e->getMessage();
}

// Redirection vers la page reservation.php avec les messages
header("Location: reservation.php?success=" . urlencode($success) . "&erreur=" . urlencode($erreur));
exit;
?>
