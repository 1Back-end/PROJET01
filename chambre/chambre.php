<?php include_once("../include/menu.php");?>
<?php include_once("../database/db.php"); ?>
<link rel="stylesheet" href="../style.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<div class="main-container mt-2 pb-5">
    <div class="col-md-12 col-sm-12">
        <div class="card-box mb-5 py-3">
            <h4 class="text-center">LISTE DES CHAMBRES MODERNES</h4>
        </div>
    </div>

    <div class="col-md-12 col-sm-12  p-2">
        <div class="row">
            <?php
            // Pagination
            $itemsPerPage = 6;
            $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
            $offset = ($currentPage - 1) * $itemsPerPage;

            // Requête SQL pour récupérer les produits avec une seule image aléatoire
            $sql = "SELECT *, SUBSTRING_INDEX(photo, ',', 1) AS photo_principale FROM produits WHERE STATUS ='Present' AND type_logement = 'Chambre Moderne' LIMIT $offset, $itemsPerPage";
            $result = $connexion->query($sql);

            // Vérifiez si la requête a réussi
            if ($result) {
                // Boucle sur chaque ligne de résultat
                foreach ($result as $row) {
            ?>
                    <div class="col-md-4 col-sm-12 p-3 col-xxl-12">
                        <div class="card-box mb-10 text-white text-center p-2">
                            <div class="img-area mb-4 ">
                                <img src="../uploads/<?php echo $row['photo_principale']; ?>" class="img-fluid w-100" alt="Image du produit">
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
                            <div class="btn-group  text-center" role="group" aria-label="Options">
                                <a href="details.php?id=<?php echo $row['id']; ?>" class="btn btn-sm  btn-add btn-success text-white mx-2">Voir plus</a>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "Erreur de requête : " . $connexion->errorInfo()[2];
            }
            ?>
        </div>
    </div>

    <!-- Pagination -->
    <div class="col-md-12 col-sm-12 text-center">
        <ul class="pagination justify-content-center">
            <?php
            // Compter le nombre total de produits
            $totalCountSQL = "SELECT COUNT(*) AS total FROM produits WHERE STATUS ='Present' AND type_logement = 'Chambre Moderne' ORDER BY date_ajout ASC";
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
