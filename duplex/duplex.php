<?php 
include_once("../include/menu.php");
include_once("../database/db.php");

// Initialisation de $currentPage à 1 par défaut
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

// Requête SQL pour récupérer les duplex avec une seule image aléatoire et triées par date d'ajout ASC
$itemsPerPage = 6;
$offset = ($currentPage - 1) * $itemsPerPage;
$sql = "SELECT *, SUBSTRING_INDEX(photo, ',', 1) AS photo_principale FROM produits WHERE STATUS ='Present' AND type_logement = 'Duplex' ORDER BY date_ajout ASC LIMIT $offset, $itemsPerPage";
$result = $connexion->query($sql);

// Vérification si la requête a réussi et s'il y a des duplex disponibles
if ($result && $result->rowCount() > 0) {
?>

    <link rel="stylesheet" href="../style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <div class="main-container mt-2 pb-5">
        <div class="col-md-12 col-sm-12">
            <div class="card-box mb-30 py-3">
                <h4 class="text-center">LISTE DES DUPLEX</h4>
            </div>
        </div>

        <div class="col-md-12 col-sm-12 col-lg-12 p-2">
            <div class="row">
                <?php
                // Boucle sur chaque ligne de résultat
                foreach ($result as $row) {
                ?>
                    <div class="col-md-4 col-sm-12 p-3 col-xxl-12">
                        <div class="card-box mb-10 text-white text-center p-2">
                            <div class="img-area mb-4 ">
                                <img src="../uploads/<?php echo $row['photo_principale']; ?>" class="img-card w-100" alt="Image du produit">
                            </div>
                            <div class="text-dark">
                                <?php
                                // Récupération de la description depuis la base de données ou tout autre endroit où elle est stockée
                                $description = $row['description'];

                                // Séparation du texte en lignes
                                $lignes = explode("\n", $description);

                                // Limiter à cinq lignes maximum
                                $descriptionLimitee = implode("\n", array_slice($lignes, 0, 5));

                                // Affichage du texte limité à cinq lignes
                                echo '<p class="line-champ">' . $descriptionLimitee . '</p>';
                                ?>
                            </div>
                            <div class="pb-2" style="position: relative; bottom: 5px;">
                                <a href="../produit/details_produit.php?id=<?php echo $row['id']; ?>" class="btn btn-sm  btn-add btn-success text-white mx-2">Voir plus</a>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>

        <!-- Pagination -->
        <div class="col-md-12 col-sm-12 text-center">
            <ul class="pagination justify-content-center">
                <?php
                // Compter le nombre total de produits
                $totalCountSQL = "SELECT COUNT(*) AS total FROM produits WHERE STATUS ='Present' AND type_logement = 'Duplex'";
                $totalCountResult = $connexion->query($totalCountSQL);
                $totalCountRow = $totalCountResult->fetch(PDO::FETCH_ASSOC);
                $totalCount = $totalCountRow['total'];

                // Calculer le nombre total de pages
                $totalPages = ceil($totalCount / $itemsPerPage);

                // Afficher les liens de pagination
                for ($i = 1; $i <= $totalPages; $i++) {
                    echo '<li class="page-item ' . ($i == $currentPage ? 'active' : '') . '"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                }
                ?>
            </ul>
        </div>
    </div>

<?php
} else {
    // Aucun duplex n'est disponible
    echo '<div class="main-container mt-2 pb-5"><div class="col-md-12 col-sm-12 text-center"><div class="alert alert-warning" role="alert">Aucun duplex n\'est disponible pour le moment.</div></div></div>';
}
?>
