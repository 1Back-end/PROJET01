<?php
include_once("../database/db.php");

// Pagination
$itemsPerPage = 5;
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $itemsPerPage;

// Requête SQL de base pour récupérer tous les produits avec un statut "Présent"
$sql = "SELECT produits.*, utilisateurs.nom AS proprietaire_nom, utilisateurs.prenom AS proprietaire_prenom 
        FROM produits 
        LEFT JOIN utilisateurs ON produits.proprietaire_id = utilisateurs.ID 
        WHERE produits.STATUS = 'Present'";

// Initialisation des valeurs de recherche
$searchConditions = [];
$searchParams = [];

// Vérifier si une recherche est effectuée
if (isset($_GET['afficher'])) {
    // Récupérer les valeurs des champs de recherche
    $search_keyword = isset($_GET['search_keyword']) ? $_GET['search_keyword'] : '';
    $region = isset($_GET['region']) ? $_GET['region'] : '';
    $departement = isset($_GET['departement']) ? $_GET['departement'] : '';
    $logement = isset($_GET['logement']) ? $_GET['logement'] : '';
    $statut = isset($_GET['statut']) ? $_GET['statut'] : '';

    // Construire les conditions de recherche et les paramètres correspondants
    if (!empty($search_keyword)) {
        $searchConditions[] = "produits.code = ?";
        $searchParams[] = $search_keyword;
    }
    if (!empty($region)) {
        $searchConditions[] = "produits.region = ?";
        $searchParams[] = $region;
    }
    if (!empty($departement)) {
        $searchConditions[] = "produits.departement = ?";
        $searchParams[] = $departement;
    }
    if (!empty($logement)) {
        $searchConditions[] = "produits.type_logement = ?";
        $searchParams[] = $logement;
    }
    if (!empty($statut)) {
        $searchConditions[] = "produits.statut = ?";
        $searchParams[] = $statut;
    }

    // Ajouter les conditions de recherche à la requête SQL
    if (!empty($searchConditions)) {
        $sql .= " AND " . implode(" AND ", $searchConditions);
    }
}

// Ajouter l'ordre de tri et la limitation pour la pagination
$sql .= " ORDER BY produits.date_ajout DESC LIMIT $offset, $itemsPerPage";

// Préparer la requête SQL avec les conditions de recherche
$stmt = $connexion->prepare($sql);
// Exécuter la requête SQL avec les paramètres de recherche
$stmt->execute($searchParams);
// Récupérer les résultats de la requête
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Récupérer le nombre total de produits pour la pagination
$totalProducts = $connexion->query("SELECT COUNT(*) AS total FROM produits")->fetch()['total'];
$totalPages = ceil($totalProducts / $itemsPerPage);

// Récupérer les types de logements pour le formulaire de recherche
$sql = "SELECT DISTINCT type_logement FROM produits ORDER BY type_logement ASC";
$produit = $connexion->query($sql)->fetchAll();

// Récupérer les statuts pour le formulaire de recherche
$sql = "SELECT DISTINCT statut FROM produits ORDER BY statut ASC";
$statut = $connexion->query($sql)->fetchAll();

// Récupérer les régions pour le formulaire de recherche
$sql = "SELECT DISTINCT region FROM produits ORDER BY region ASC";
$region = $connexion->query($sql)->fetchAll();

// Récupérer les départements pour le formulaire de recherche
$sql = "SELECT DISTINCT departement FROM produits ORDER BY departement ASC";
$departement = $connexion->query($sql)->fetchAll();
?>

<?php include_once("../include/menu.php"); ?>
<link rel="stylesheet" href="../style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<div class="main-container pb-5">
    <div class="col-md-12 col-sm-12 ">
  
    <div class="card-box p-3 mb-3 d-flex justify-content-between align-items-center">
     <div class="mr-auto">
     <h5 class="text-uppercase">LISTE Administrateurs</h5>
     </div>
       <div class="ml-auto">
       <a href="ajouter.php" class="btn btn-dark btn-add btn-sm mt-2 mt-sm-0 order-sm-2"><i class="bi bi-plus-circle mr-2"></i>AJOUTER</a>
       </div>
    </div>
</div>


    
    
                   
    </div>

       
</div>
