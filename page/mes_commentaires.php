<?php
include_once("../include/menu.php");
include_once("../database/db.php");
?>

<link rel="stylesheet" href="style.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">

<div class="main-container">
    <div class="col-md-6 col-sm-12">
        <div class="card-box mb-3 py-3">
            <h4 class="text-center">COMMENTAIRE</h4>
        </div>
    </div>
        <?php
        // Vérifier si l'utilisateur est connecté
        if (!isset($_SESSION['id'])) {
            // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
            header("Location: ../login/login.php");
            exit();
        }

        // Récupérer l'ID de l'utilisateur connecté
        $identifiant = $_SESSION['id'];

        // Vérifier si l'ID du produit est défini en méthode GET
        if (isset($_GET['id'])) {
            $id_produit = $_GET['id'];

            // Requête SQL pour récupérer les commentaires de l'utilisateur sur ce produit spécifique
            $sql = "SELECT * FROM commentaire WHERE ID_PRODUIT = :id_produit AND ID_PRODUIT IN (SELECT id FROM produits WHERE proprietaire_id = :proprietaire_id)";
            $stmt = $connexion->prepare($sql);
            $stmt->execute([':id_produit' => $id_produit, ':proprietaire_id' => $identifiant]);

            // Boucle à travers les résultats et afficher les commentaires dans des card-box
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                // Récupérer la date d'ajout du produit correspondant à l'ID
                $sql_produit = "SELECT date_ajout FROM produits WHERE id = :id_produit";
                $stmt_produit = $connexion->prepare($sql_produit);
                $stmt_produit->execute([':id_produit' => $id_produit]);
                $row_produit = $stmt_produit->fetch(PDO::FETCH_ASSOC);
        ?>
                <div class="col-md-6 mb-3 col-sm-12">
                    <div class="card-box mb-5">
                        <div class="card-body">
                            <p class="card-text text-justify">
                             <!-- Icône du commentaire -->
                                <?php echo $row['COMMENTAIRE']; ?>
                            </p>
                            <p class="card-text">
                            Date Publication : <span class="text-success"><?php echo date('d-m-Y H:i:s', strtotime($row_produit['date_ajout'])); ?></span> <!-- Date d'ajout du produit en rouge -->
                            </p>
                            <p class="card-text">
                               Date Rejet : <span class="text-danger"><?php echo date('d-m-Y H:i:s', strtotime($row['DATE_AJOUT'])); ?></span> <!-- Date d'ajout du commentaire en noir -->
                            </p>
                        </div>
                    </div>
                </div>
        <?php
            }
        } else {
            echo "ID du produit non spécifié.";
        }
        ?>
    </div>
</div>
