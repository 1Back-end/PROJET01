<?php
include_once("../include/menu.php"); 
include_once("../database/db.php");
$identifiant = $_SESSION['id'];
if (!isset($_SESSION['id'])) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: ../login/login.php");
    exit();
}
// Pagination
$itemsPerPage = 5;
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $itemsPerPage;

// Requête SQL pour récupérer les produits publiés par l'utilisateur connecté
$sql = "SELECT * FROM produits WHERE  proprietaire_id = :proprietaire_id LIMIT :itemsPerPage OFFSET :offset";

// Préparer la requête SQL avec la clause WHERE et la pagination
$stmt = $connexion->prepare($sql);
$stmt->bindValue(':proprietaire_id', $identifiant, PDO::PARAM_INT);
$stmt->bindValue(':itemsPerPage', $itemsPerPage, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Récupérer le nombre total de produits pour la pagination
$totalProducts = $connexion->query("SELECT COUNT(*) AS total FROM produits WHERE  proprietaire_id = $identifiant")->fetch()['total'];
$totalPages = ceil($totalProducts / $itemsPerPage);
?>


<link rel="stylesheet" href="../style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<div class="main-container">
    <div class="col-md-12 col-xl-12 col-lg-12">
        <div class="card-box p-3 mb-3">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="text-left mt-2">
                        <h5>LISTE DE MES PRODUITS</h5>
                    </div> 
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <a href="../produit/ajouter.php" class="btn btn-add btn-dark"><i class="bi bi-plus-circle-fill"></i> Ajouter</a>
                </div>
            </div>
        </div>
    </div>

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
                            <th scope="col">Statut</th>
                            <th colspan="3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($result as $row): ?>
                            <tr>
                                <td><?php echo $row['region']; ?></td>
                                <td><?php echo $row['ville']; ?></td>
                                <td><?php echo $row['departement']; ?></td>
                                <td><?php echo $row['quartier']; ?></td>
                                <td><?php echo $row['prix']; ?> FRCFA</td>
                                <td>
                                    <?php 
                                    // Vérifier le statut et définir la classe CSS en conséquence
                                    if ($row['statut'] == "Accepté") {
                                        echo '<button class="btn btn-success btn-xs btn-sm">Accepté</button>';
                                    } elseif ($row['statut'] == "Rejeté") {
                                        echo '<button class="btn btn-danger btn-xs btn-sm">Rejeté</button>';
                                    } elseif ($row['statut'] == "En Attente") {
                                        echo '<button class="btn btn-warning text-white btn-xs btn-sm">En Attente</button>';
                                    } else {
                                        echo $row['statut']; // Afficher le statut tel quel s'il ne correspond à aucune des valeurs précédentes
                                    }
                                    ?>
                                </td>
                                <td>
                            <!-- Vérifier s'il existe des commentaires pour ce produit -->
                            <?php
                            $id_produit = $row['id'];
                            $sql_commentaires = "SELECT COUNT(*) AS total_commentaires FROM commentaire WHERE ID_PRODUIT = :id_produit";
                            $stmt_commentaires = $connexion->prepare($sql_commentaires);
                            $stmt_commentaires->execute([':id_produit' => $id_produit]);
                            $total_commentaires = $stmt_commentaires->fetchColumn();

                            // Vérifier s'il y a des commentaires
                            if ($total_commentaires > 0) {
                                // S'il y a des commentaires, afficher le lien
                                ?>
                                <a class="btn btn-info btn-sm btn-xs" href='mes_commentaires.php?id=<?php echo $row['id']; ?>'>Details</a>
                                <?php
                            } else {
                                // S'il n'y a pas de commentaires, désactiver le lien et changer la couleur en primaire
                                ?>
                                <a class="btn btn-info btn-sm btn-xs" href="#" onclick="return false;" disabled>Details</a>
                                <?php
                            }
                            ?>
                        </td>

                                <td>
                                    <a class="btn btn-success btn-sm btn-xs" href='../produit/modifier.php?id=<?php echo $row['id']; ?>'>Modifier</a>
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