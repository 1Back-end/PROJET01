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
     <h5 class="text-uppercase">LISTE  PRODUITS</h5>
     </div>
     
            <?php if ($IsProprietaire || $IsAgentImmobilier): ?>
            <div class="ml-auto">
                <a href="ajouter.php" class="btn btn-dark btn-add btn-sm mt-2 mt-sm-0 order-sm-2"><i class="bi bi-plus-circle mr-2"></i>AJOUTER</a>
            </div>
        <?php endif; ?>

    </div>
</div>


    
    <div class="col-md-12 col-sm-12">
        <div class="col-1"></div>
        <div class="card-box p-3 mb-3 bg-body rounded">
            <form method="GET" action="">
                <div class="row g-3">
                    <div class="col-md-2 text-center mb-2">
                        <input type="text" class="form-control" name="search_keyword" placeholder="le code du produit...">
                    </div>

                    <div class="col-md-2 text-center mb-2">
                        <select name="region" class="form-control col-12 font-12 ">
                            <option value="" selected disabled>Les regions</option>
                            <?php foreach ($region as $r): ?>
                                <option value="<?=$r["region"] ?>"><?=$r["region"] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-md-2 text-center mb-2">
                        <select name="departement" class="form-control col-12  font-12">
                            <option value="" selected disabled>Les départements</option>
                            <?php foreach ($departement as $d): ?>
                                <option value="<?=$d["departement"] ?>"><?=$d["departement"] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-md-2 text-center mb-2">
                        <select name="logement" class="form-control col-12 font-12">
                            <option value="" selected disabled>Les logements</option>
                            <?php foreach ($produit as $p): ?>
                                <option value="<?=$p["type_logement"] ?>"><?=$p["type_logement"] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-2 text-center mb-2">
                        <select class="form-control col-12 font-12" name="statut">
                            <option value="" selected disabled>Les statuts </option>
                            <?php foreach ($statut as $s): ?>
                                <option value="<?=$s["statut"] ?>"><?=$s["statut"] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-12 col-md-2 mb-2 text-end">
                        <button type="submit" name="afficher" class="btn btn-add w-100 btn-dark py-2">Afficher</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <div class="col-md-12 col-sm-12">
       
       <?php
       // Afficher un message de succès si le paramètre 'success' est défini à 1
       if (isset($_GET['success']) && $_GET['success'] == 1) {
           echo '<div id="successMessage" class="alert text-center alert-success">' . $_GET['message'] . '</div>';
       }
       
       // Afficher un message d'erreur si le paramètre 'error' est défini à 1
       if (isset($_GET['error']) && $_GET['error'] == 1) {
           echo '<div id="errorMessage" class="alert text-center alert-danger">' . $_GET['message'] . '</div>';
       }
       ?>
        
    </div>

    <div class="col-md-12 col-sm-12">
        <div class="pd-20 card-box mb-3 w-100 font-12">
            <div class="table-responsive">
                <table class="table table-bordered text-justify table-striped table-hover">
                    <thead class="text-center font-12">
                        <tr>
                        <th scope="col">Propriétaire</th>
                            <th scope="col">Type logement</th>
                            <th scope="col">Prix</th>
                            <th scope="col">Publié le</th>
                            <th scope="col" class="text-center">Statut</th>
                            <th colspan="3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($result as $row): ?>
                            <tr>
                               <td class="font-12"><?php echo $row['proprietaire_nom']; ?></td>
                                <td><?php echo $row['type_logement']; ?></td>
                                <td><?php echo $row['prix']; ?> ( FCFA )</td>
                                <td><?php echo date('d/m/Y H:i:s', strtotime($row['date_ajout'])); ?></td>

                                <td>
                                <?php
                               
                                // Vérifier le statut et définir la classe de bouton Bootstrap en conséquence
                                if ($row['statut'] == "Accepté") {
                                    echo '<a href="#" class="text-success">Accepté</a>';
                                } elseif ($row['statut'] == "Rejeté") {
                                    echo '<a href="#" class="text-danger">Rejeté </a>';
                                } elseif ($row['statut'] == "En attente") {
                                    echo '<a href="#" class="text-warning">En attente </a>';
                                } else {
                                    echo '<a href="#">' . $row['statut'] . '</a>'; // Afficher le statut tel quel s'il ne correspond à aucune des valeurs précédentes
                                }
                                ?>
                                

                                </td>
                                <td>
                            <div class="d-flex justify-content-center justify-content-md-center align-items-center">
                            <a  class="mb-2 mx-2 btn btn-info btn-sm btn-add btn-xs" href='details.php?id=<?php echo $row['id']; ?>' class="mx-1 mx-md-2" onclick="return confirm('Êtes-vous sûr de vouloir voir les détails ?');">Details</a>

                        
                            <a class="mb-2 mx-2 btn btn-danger btn-sm btn-add btn-xs" href='supprimer.php?id=<?php echo $row['id']; ?>' class="mx-1 mx-md-2" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette entrée ?')">
                               Supprimé
                            </a>

                            </div>
                        </td>


                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
  
        <!-- Afficher le nombre total d'éléments trouvés -->
        <?php if (isset($_GET['afficher']) && count($result) > 0) : ?>
            <p><?php echo count($result); ?> élément(s) trouvé(s).</p>
        <?php elseif (isset($_GET['afficher'])) : ?>
            <p>Aucun élément trouvé.</p>
        <?php endif; ?>

        <!-- Pagination -->
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                    <li class="page-item <?php if ($page == $i) echo 'active'; ?>">
                        <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                <?php endfor; ?>
            </ul>
        </nav>
    </div>
</div>

