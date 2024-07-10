<?php
include_once("../database/db.php");
// Vérifier si l'ID de la région est passé en paramètre
if (isset($_GET['region_id'])) {
    $region_id = intval($_GET['region_id']);

    // Récupérer les villes pour la région donnée
    try {
        $stmt = $connexion->prepare('SELECT id, nom FROM villes WHERE region_id = :region_id');
        $stmt->execute(['region_id' => $region_id]);
        $villes = $stmt->fetchAll();

        echo json_encode($villes);
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Erreur : ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['error' => 'ID de région non fourni']);
}
?>
