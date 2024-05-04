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
$sql = "SELECT * FROM produits WHERE proprietaire_id = :proprietaire_id AND STATUS = 'Occupé' LIMIT :itemsPerPage OFFSET :offset";

// Préparer la requête SQL avec la clause WHERE et la pagination
$stmt = $connexion->prepare($sql);
$stmt->bindValue(':proprietaire_id', $identifiant, PDO::PARAM_INT);
$stmt->bindValue(':itemsPerPage', $itemsPerPage, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Récupérer le nombre total de produits pour la pagination
$totalProducts = $connexion->query("SELECT COUNT(*) AS total FROM produits WHERE proprietaire_id = $identifiant AND STATUS = 'Occupé'")->fetch()['total'];
$totalPages = ceil($totalProducts / $itemsPerPage);
?>


<link rel="stylesheet" href="../style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<div class="main-container">
<div class="col-md-12 col-sm-12 ">
  
  <div class="card-box p-3 mb-3 text-center lign-items-center">
 
   <h5 class="text-uppercase">MES PRODUITS LOUES</h5>
   
 
</div>
</div>

   
    <?php // Vérifier s'il existe des produits à afficher
    if (empty($result)) {
        echo "<div class='col-md-12 col-sm-12'><div class='alert alert-success text-center' role='alert'>Vous n'avez aucun produit loué.</div></div>";
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
                            <th scope="col">Statut</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($result as $row): ?>
                            <tr>
                                <td><?php echo $row['region']; ?></td>
                                <td><?php echo $row['ville']; ?></td>
                                <td><?php echo $row['departement']; ?></td>
                                <td><?php echo $row['quartier']; ?></td>
                                <td><?php echo $row['prix']; ?>XAF</td>
                                <td><a class="btn btn-add btn-sm btn-info btn-xs" href="#"><?php echo $row['status']; ?></a></td>


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
