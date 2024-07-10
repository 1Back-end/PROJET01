<?php
include_once("../database/db.php");
// Vérifier si l'ID de la ville est passé en paramètre
if (isset($_GET['ville_id'])) {
    $ville_id = intval($_GET['ville_id']);

    // Récupérer les quartiers pour la ville donnée
    try {
        $stmt = $connexion->prepare('SELECT nom FROM quartiers WHERE ville_id = :ville_id');
        $stmt->execute(['ville_id' => $ville_id]);
        $quartiers = $stmt->fetchAll();

        echo json_encode($quartiers);
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Erreur : ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['error' => 'ID de ville non fourni']);
}
?>
