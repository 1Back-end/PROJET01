<?php
include_once("../database/db.php");

function getRegions($connexion) {
    try {
        $stmt = $connexion->query("SELECT id, nom FROM regions");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo 'Erreur lors de la récupération des régions : ' . $e->getMessage();
        exit;
    }
}

$regions = getRegions($connexion);



?>
