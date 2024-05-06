<?php
include_once("../include/menu.php");
include_once("../database/db.php");
?>

<link rel="stylesheet" href="style.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">

<div class="main-container">
    <?php
        // Vérifier si l'utilisateur est connecté et s'il est soit un agent immobilier soit un propriétaire
        if (!isset($_SESSION['id']) || (!$IsAgentImmobilier && !$IsProprietaire)) {
            // Rediriger vers la page d'erreur
            header("Location: error.php");
            exit();
        }


    // Récupérer l'ID de l'utilisateur connecté
    $identifiant = $_SESSION['id'];

    // Si l'ID du produit n'est pas défini en tant que paramètre GET, afficher les commentaires par défaut
    if (!isset($_GET['id'])) {
        // Requête SQL pour récupérer tous les commentaires de l'utilisateur
        $sql_all = "SELECT * FROM commentaire WHERE ID_PRODUIT IN (SELECT id FROM produits WHERE proprietaire_id = :proprietaire_id)";
        $stmt_all = $connexion->prepare($sql_all);
        $stmt_all->execute([':proprietaire_id' => $identifiant]);

        // Vérifier s'il y a des commentaires
        if ($stmt_all->rowCount() > 0) {
            echo '<div class="col-md-6 col-sm-12">
                    <div class="card-box mb-3 py-3">
                        <h4 class="text-center">COMMENTAIRES</h4>
                    </div>
                </div>';
            $commentaire_count = 0;

            // Boucle à travers les résultats et afficher les commentaires dans des card-box
            while ($row_all = $stmt_all->fetch(PDO::FETCH_ASSOC)) {
                $commentaire_count++;
                // Récupérer la date d'ajout du produit correspondant à l'ID
                $sql_produit_all = "SELECT date_ajout FROM produits WHERE id = :id_produit";
                $stmt_produit_all = $connexion->prepare($sql_produit_all);
                $stmt_produit_all->execute([':id_produit' => $row_all['ID_PRODUIT']]);
                $row_produit_all = $stmt_produit_all->fetch(PDO::FETCH_ASSOC);
    ?>
                <div class="col-md-6 mb-3 col-sm-12">
                    <div class="card-box mb-5">
                        <div class="card-body">
                            <p class="card-text text-justify">
                            Commentaire N° <?php echo $commentaire_count; ?> :  <?php echo $row_all['COMMENTAIRE']; ?>
                            </p>
                            <p class="card-text">
                                Date Publication : <span class="text-success"><?php echo date('d-m-Y H:i:s', strtotime($row_produit_all['date_ajout'])); ?></span>
                            </p>
                            <p class="card-text">
                                Date Rejet : <span class="text-danger"><?php echo date('d-m-Y H:i:s', strtotime($row_all['DATE_AJOUT'])); ?></span>
                            </p>
                        </div>
                    </div>
                </div>
    <?php
            }
        } else {
            // Aucun commentaire trouvé pour tous les produits de l'utilisateur, afficher un message d'alerte Bootstrap
            echo '<div class="alert alert-info text-center" role="alert">
                      Vous n\'avez aucun commentaire.
                  </div>';
        }
    }

    // Si l'ID du produit est défini en tant que paramètre GET, afficher les commentaires pour ce produit
    if (isset($_GET['id'])) {
        $id_produit = $_GET['id'];

        // Requête SQL pour récupérer les commentaires de l'utilisateur sur ce produit spécifique
        $sql = "SELECT * FROM commentaire WHERE ID_PRODUIT = :id_produit AND ID_PRODUIT IN (SELECT id FROM produits WHERE proprietaire_id = :proprietaire_id)";
        $stmt = $connexion->prepare($sql);
        $stmt->execute([':id_produit' => $id_produit, ':proprietaire_id' => $identifiant]);

        // Vérifier s'il y a des commentaires pour ce produit
        if ($stmt->rowCount() > 0) {
            echo '<div class="col-md-6 col-sm-12">
                    <div class="card-box mb-3 py-3">
                        <h4 class="text-center">COMMENTAIRES DU PRODUIT</h4>
                    </div>
                </div>';
            $commentaire_count = 0;
            // Boucle à travers les résultats et afficher les commentaires dans des card-box
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $commentaire_count++;
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
                            Commentaire N°<?php echo $commentaire_count; ?>: <?php echo $row['COMMENTAIRE']; ?>
                            </p>
                            <p class="card-text">
                                Date Publication : <span class="text-success"><?php echo date('d/m/Y H:i:s', strtotime($row_produit['date_ajout'])); ?></span>
                            </p>
                            <p class="card-text">
                                Date Rejet : <span class="text-danger"><?php echo date('d/m/Y H:i:s', strtotime($row['DATE_AJOUT'])); ?></span>
                            </p>
                        </div>
                    </div>
                </div>
    <?php
            }
        } else {
            // Aucun commentaire trouvé pour ce produit, afficher un message d'alerte Bootstrap
            echo '<div class="alert alert-info text-center" role="alert">
                      Vous n\'avez aucun commentaire pour ce produit.
                  </div>';
        }
    }
    ?>
</div>
