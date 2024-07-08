<?php include_once("database/db.php"); ?>

<?php
 // Requête SQL pour compter le nombre total de produits de type 'Chambre Moderne' et 'Appartement Moderne'
 $requete = "SELECT 
 SUM(CASE WHEN type_logement = 'Chambre Moderne' THEN 1 ELSE 0 END) AS total_chambres_moderne,
 SUM(CASE WHEN type_logement = 'Appartement Moderne' THEN 1 ELSE 0 END) AS total_appartements_moderne,
 SUM(CASE WHEN type_logement = 'Studio Moderne' THEN 1 ELSE 0 END) AS total_studios_moderne,
 SUM(CASE WHEN type_logement = 'Duplex' THEN 1 ELSE 0 END) AS total_duplex,
 SUM(CASE WHEN type_logement = 'Maison' THEN 1 ELSE 0 END) AS total_Maison,
 SUM(CASE WHEN type_logement = 'Immeuble' THEN 1 ELSE 0 END) AS total_Immeuble,
 SUM(CASE WHEN type_logement = 'Villa' THEN 1 ELSE 0 END) AS total_Villa,
 SUM(CASE WHEN type_logement = 'Terrain' THEN 1 ELSE 0 END) AS total_terrain
FROM produits";
// Prépare la requête
$statement = $connexion->prepare($requete);

// Exécute la requête
$statement->execute();

// Récupère le résultat
$resultat = $statement->fetch(PDO::FETCH_ASSOC);
?>


<?php
// Requête SQL pour récupérer tous les types de logement uniques
$sql = "SELECT DISTINCT type_logement FROM produits";

// Exécutez la requête
$result = $connexion->query($sql);

// Initialise un tableau pour stocker les types de logement
$types_logement = array();

// Vérifiez si la requête a réussi
if ($result) {
    // Boucle sur les résultats pour récupérer les types de logement
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $types_logement[] = $row['type_logement'];
    }
} else {
    echo "Erreur de requête : " . $connexion->errorInfo()[2];
}
?>

<?php
// Requête SQL pour récupérer toutes les villes uniques
$sql = "SELECT DISTINCT ville FROM produits";

// Exécutez la requête
$result = $connexion->query($sql);

// Initialise un tableau pour stocker les villes
$villes = array();

// Vérifiez si la requête a réussi
if ($result) {
    // Boucle sur les résultats pour récupérer les villes
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $villes[] = $row['ville'];
    }
} else {
    echo "Erreur de requête : " . $connexion->errorInfo()[2];
}
?>

<?php
// Requête SQL pour récupérer toutes les villes uniques
$sql = "SELECT DISTINCT quartier FROM produits";

// Exécutez la requête
$result = $connexion->query($sql);

// Initialise un tableau pour stocker les villes
$quartiers = array();

// Vérifiez si la requête a réussi
if ($result) {
    // Boucle sur les résultats pour récupérer les villes
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $quartiers[] = $row['quartier'];
    }
} else {
    echo "Erreur de requête : " . $connexion->errorInfo()[2];
}
?>










<?php
// Requête SQL pour récupérer toutes les régions uniques
$sql = "SELECT DISTINCT region FROM produits";

// Exécutez la requête
$result = $connexion->query($sql);

// Initialise un tableau pour stocker les régions
$regions = array();

// Vérifiez si la requête a réussi
if ($result) {
    // Boucle sur les résultats pour récupérer les régions
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $regions[] = $row['region'];
    }
} else {
    echo "Erreur de requête : " . $connexion->errorInfo()[2];
}
?>

<?php
// Requête SQL pour récupérer toutes les régions uniques
$sql = "SELECT DISTINCT departement FROM produits";

// Exécutez la requête
$result = $connexion->query($sql);

// Initialise un tableau pour stocker les régions
$departements = array();

// Vérifiez si la requête a réussi
if ($result) {
    // Boucle sur les résultats pour récupérer les régions
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $departements[] = $row['departement'];
    }
} else {
    echo "Erreur de requête : " . $connexion->errorInfo()[2];
}
?>

<?php
// Requête SQL pour récupérer toutes les régions uniques
$sql = "SELECT DISTINCT arrondissement FROM produits";

// Exécutez la requête
$result = $connexion->query($sql);

// Initialise un tableau pour stocker les régions
$arrondissements = array();

// Vérifiez si la requête a réussi
if ($result) {
    // Boucle sur les résultats pour récupérer les régions
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $arrondissements[] = $row['arrondissement'];
    }
} else {
    echo "Erreur de requête : " . $connexion->errorInfo()[2];
}
?>

<?php

   
    // Requête pour compter le nombre total de clients
    $requete_clients = $connexion->prepare("SELECT COUNT(*) AS total_clients FROM utilisateurs WHERE ROLE = 0");
    $requete_clients->execute();
    $resultat_clients = $requete_clients->fetch(PDO::FETCH_ASSOC);
    
    // Requête pour compter le nombre total d'agents immobiliers
    $requete_agents = $connexion->prepare("SELECT COUNT(*) AS total_agents FROM utilisateurs WHERE ROLE = 2");
    $requete_agents->execute();
    $resultat_agents = $requete_agents->fetch(PDO::FETCH_ASSOC);
    
    // Requête pour compter le nombre total de propriétaires
    $requete_proprietaires = $connexion->prepare("SELECT COUNT(*) AS total_proprietaires FROM utilisateurs WHERE ROLE = 1");
    $requete_proprietaires->execute();
    $resultat_proprietaires = $requete_proprietaires->fetch(PDO::FETCH_ASSOC);
    
    // Afficher les résultats
?>
<?php

try {
    // Requête SQL pour compter le nombre total d'intéressés
    $sql = "SELECT COUNT(*) AS total_interesses FROM reservation";

    // Préparation de la requête
    $stmt = $connexion->prepare($sql);

    // Exécution de la requête
    $stmt->execute();

    // Récupération du résultat
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Affichage du nombre total d'intéressés
    if ($result) {
         $result['total_interesses'];
    } else {
        echo "Aucun résultat trouvé.";
    }
} catch(PDOException $e) {
    // Gestion des erreurs de connexion à la base de données
    echo "Erreur de connexion : " . $e->getMessage();
}
?>
