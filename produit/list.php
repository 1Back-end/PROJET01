<?php
// list.php
if (isset($_GET['departement'])) {
    $regionId = $_GET['filter'];
    // Récupérer les villes en fonction de l'ID de la région
    $villes = getVillesByRegion($regionId); // Remplacez cette fonction par votre logique
    echo json_encode($villes);
} elseif (isset($_GET['quartier'])) {
    $villeId = $_GET['filter'];
    // Récupérer les quartiers en fonction de l'ID de la ville
    $quartiers = getQuartiersByVille($villeId); // Remplacez cette fonction par votre logique
    echo json_encode($quartiers);
}

function getVillesByRegion($regionId) {
    // Exemple de données, à remplacer par une requête à la base de données
    return [
        ['id' => 1, 'nom' => 'Ville 1'],
        ['id' => 2, 'nom' => 'Ville 2'],
        ['id' => 3, 'nom' => 'Ville 3']
    ];
}

function getQuartiersByVille($villeId) {
    // Exemple de données, à remplacer par une requête à la base de données
    return [
        ['id' => 1, 'nom' => 'Quartier 1'],
        ['id' => 2, 'nom' => 'Quartier 2'],
        ['id' => 3, 'nom' => 'Quartier 3']
    ];
}
?>
