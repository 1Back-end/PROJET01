<?php
include_once("../include/menu.php"); 
include_once("../database/db.php");

$identifiant = $_SESSION['id'];

// Vérifier si l'utilisateur est connecté et s'il est soit un agent immobilier soit un propriétaire
if (!isset($_SESSION['id']) || (!$IsAgentImmobilier && !$IsProprietaire)) {
    // Rediriger vers la page d'erreur
    header("Location: error.php");
    exit();
}

// Pagination
$itemsPerPage = 5;
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $itemsPerPage;

// Requête SQL pour récupérer les produits publiés par l'utilisateur connecté avec les informations de région, ville et quartier
$sql = "SELECT p.*, r.nom AS region_nom, v.nom AS ville_nom, q.nom AS quartier_nom 
        FROM produits p
        LEFT JOIN regions r ON p.region = r.id
        LEFT JOIN villes v ON p.ville = v.id
        LEFT JOIN quartiers q ON p.quartier = q.id
        WHERE p.proprietaire_id = :proprietaire_id 
        LIMIT :itemsPerPage OFFSET :offset";

// Préparer la requête SQL avec la clause WHERE et la pagination
$stmt = $connexion->prepare($sql);
$stmt->bindValue(':proprietaire_id', $identifiant, PDO::PARAM_INT);
$stmt->bindValue(':itemsPerPage', $itemsPerPage, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Récupérer le nombre total de produits pour la pagination
$totalProducts = $connexion->query("SELECT COUNT(*) AS total FROM produits WHERE proprietaire_id = $identifiant")->fetch()['total'];
$totalPages = ceil($totalProducts / $itemsPerPage);
?>

<link rel="stylesheet" href="../style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<div class="main-container">
    <div class="col-md-12 col-sm-12">
        <div class="card-box p-3 mb-3 d-flex justify-content-between align-items-center">
            <div class="mr-auto">
                <h5 class="text-uppercase">MES PRODUITS</h5>
            </div>
            <div class="ml-auto">
                <a href="../produit/ajouter.php" class="btn btn-dark btn-add btn-sm mt-2 mt-sm-0 order-sm-2"><i class="bi bi-plus-circle mr-2"></i>AJOUTER</a>
            </div>
        </div>
    </div>

    <?php // Vérifier s'il existe des produits à afficher
    if (empty($result)) {
        echo "<div class='col-md-12 col-sm-12'><div class='alert alert-success text-center' role='alert'>Vous n'avez aucune publication.</div></div>";
    } else {
    ?>
    <div class="col-md-12 col-sm-12">
        <div class="pd-20 card-box mb-3 w-100">
            <div class="table-responsive">
                <table class="table table-bordered text-center table-striped table-hover">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">Region</th>
                            <th scope="col">Ville</th>
                            <th scope="col">Departement</th>
                            <th scope="col">Quartier</th>
                            <th scope="col">Prix</th>
                            <th scope="col">Type Logement</th>
                            <th scope="col">Statut</th>
                            <th colspan="3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($result as $row): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['region_nom']); ?></td>
                            <td><?php echo htmlspecialchars($row['ville_nom']); ?></td>
                            <td><?php echo htmlspecialchars($row['departement']); ?></td>
                            <td><?php echo htmlspecialchars($row['quartier_nom']); ?></td>
                            <td><?php echo htmlspecialchars($row['prix']); ?> ( FCFA )</td>
                            <td><?php echo htmlspecialchars($row['type_logement']); ?></td>
                            <td>
                                <?php 
                                // Afficher le statut avec une classe CSS correspondante
                                $statusClass = '';
                                switch ($row['statut']) {
                                    case 'Accepté':
                                        $statusClass = 'btn-success';
                                        break;
                                    case 'Rejeté':
                                        $statusClass = 'btn-danger';
                                        break;
                                    case 'En attente':
                                        $statusClass = 'btn-warning text-white';
                                        break;
                                    default:
                                        $statusClass = 'btn-primary';
                                        break;
                                }
                                ?>
                                <button class="btn btn-xs btn-sm <?php echo $statusClass; ?>"><?php echo htmlspecialchars($row['statut']); ?></button>
                            </td>
                            <td>
                                <!-- Actions -->
                                <div class="d-flex justify-content-center align-item-center">
                                    <?php if ($row['statut'] == 'Accepté' || $row['statut'] == 'Rejeté'): ?>
                                        <a class="mx-2 btn btn-info btn-xs disabled" href='../produit/modifier.php?id=<?php echo $row['id']; ?>'>Modifier</a>
                                    <?php else: ?>
                                        <a class="mx-2 btn btn-info btn-xs" href='../produit/modifier.php?id=<?php echo $row['id']; ?>'>Modifier</a>
                                    <?php endif; ?>
                                    <?php
                                    // Récupérer le nombre de commentaires pour ce produit
                                    $id_produit = $row['id'];
                                    $sql_commentaires = "SELECT COUNT(*) AS total_commentaires FROM commentaire WHERE ID_PRODUIT = :id_produit";
                                    $stmt_commentaires = $connexion->prepare($sql_commentaires);
                                    $stmt_commentaires->execute([':id_produit' => $id_produit]);
                                    $total_commentaires = $stmt_commentaires->fetchColumn();

                                    if ($total_commentaires > 0) {
                                        echo "<a class='btn btn-info btn-xs' href='mes_commentaires.php?id=$id_produit'>Détails</a>";
                                    }
                                    ?>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

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
    <?php } ?>

</div>

<script>
    // Cacher le message de succès après 5 secondes
    setTimeout(function() {
        document.getElementById('successMessage').style.display = 'none';
    }, 5000); // 5 secondes en millisecondes

    // Cacher le message d'erreur après 5 secondes
    setTimeout(function() {
        document.getElementById('errorMessage').style.display = 'none';
    }, 5000); // 5 secondes en millisecondes
</script>
