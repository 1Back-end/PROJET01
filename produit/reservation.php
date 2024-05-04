


<?php
include_once("../include/menu.php");
include_once("../database/db.php");

// Nombre d'enregistrements par page
$records_per_page = 5;

// Requête SQL pour compter le nombre total d'enregistrements
$sql_total_records = "SELECT COUNT(*) AS total_records FROM reservation";
$stmt_total_records = $connexion->query($sql_total_records);
$row_total_records = $stmt_total_records->fetch(PDO::FETCH_ASSOC);
$total_records = $row_total_records['total_records'];

// Calcul du nombre total de pages
$total_pages = ceil($total_records / $records_per_page);

// Détermination de la page courante
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

// Calcul du point de départ pour la requête SQL
$offset = ($page - 1) * $records_per_page;

// Requête SQL pour sélectionner les données avec la pagination
$sql = "SELECT 
    r.*, 
    CONCAT(u2.nom) AS proprietaire,
    p.type_logement,
    r.statut,
    r.interesse
    FROM 
    reservation r
    LEFT JOIN produits p ON r.produit_id = p.id
    LEFT JOIN utilisateurs u2 ON p.proprietaire_id = u2.ID
    ORDER BY 
    r.date_reservation DESC
    LIMIT :offset, :records_per_page";

$stmt = $connexion->prepare($sql);
$stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
$stmt->bindParam(':records_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();

?>

<?php include_once("../include/menu.php"); ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="../style.css">

<div class="main-container mt-2 pb-5">

    <?php
    // Vérifier le nombre de réservations
    if ($total_records > 0) {
    ?>
        <div class="col-md-12 col-sm-12">
            <div class="card-box mb-30 py-3">
                <h4 class="text-center">LISTE DES RESERVATIONS</h4>
            </div>
        </div>
        <div class="col-md-12 col-sm-12">
<!-- Dans votre fichier reservation.php -->
<?php
// Vérifier si le paramètre de succès est présent dans l'URL
if (isset($_GET['success'])) {
    // Afficher le message de succès dans une alerte Bootstrap
    echo '<div id="success_message" class="text-center alert alert-success" role="alert">' . $_GET['success'] . '</div>';
} elseif (isset($_GET['erreur'])) {
    // Afficher le message d'erreur dans une alerte Bootstrap
    echo '<div id="error_message" class="text-center alert alert-danger" role="alert">' . $_GET['erreur'] . '</div>';
}
?>
</div>

        <div class="col-md-12 col-sm-12">
            <div class="pd-20 card-box mb-2 w-100">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped text-center table-striped table-hover ">
                        <thead class="text-center">
                            <tr>
                                <th>Intéressé</th>
                                <th>Type Logement</th>
                                <th>Propriétaire</th>
                                <th>Date Réservation</th>
                                <th>Statut</th>
                                <th colspan="2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Affichage des données
                            foreach ($stmt as $row) {
                            ?>
                                <tr>
                                    <td><?php echo $row['interesse']; ?></td>
                                    <td><?php echo $row['type_logement']; ?></td>
                                    <td><?php echo $row['proprietaire']; ?></td>
                                    <td><?php echo date('Y/m/d H:i:s', strtotime($row['date_reservation'])); ?></td>
                                    <!-- Statut avec style conditionnel -->

                                    <?php
                                    if ($row['statut'] == 'en cours') {
                                        echo "<td>";
                                        $statut_class = 'text-warning';
                                        echo "<a href='#' class='$statut_class'>en cours</a>";
                                        echo "</td>";
                                    } elseif ($row['statut'] == 'annulé') {
                                        echo "<td>";
                                        $statut_class = 'text-danger';
                                        echo "<a href='#' class='$statut_class'>annulé</a>";
                                        echo "</td>";
                                    } elseif ($row['statut'] == 'validé') {
                                        echo "<td>";
                                        $statut_class = 'text-success';
                                        echo "<a href='#' class='$statut_class'>validé</a>";
                                        echo "</td>";
                                    } else {
                                        echo "<td>" . $row['statut'] . "</td>";
                                    }
                                    ?>

                                    <td>
                                        <div class="d-flex justify-content-center justify-content-md-center">
                                            <?php $status = $row['statut']; ?>
                                            
                                            <?php if ($status == 'validé'): ?>
                                                <a href="reservation_annuler.php?id_reservation=<?= $row['id']; ?>" class="mx-2 btn btn-sm btn-xs btn-danger" onclick="return confirm('Voulez-vous vraiment annuler cette réservation ?')">
                                                    annuler
                                                </a>
                                            <?php elseif ($status == 'annulé'): ?>
                                                <a href="reservation_valider.php?id_reservation=<?= $row['id']; ?>" class="mx-2 btn btn-sm btn-xs btn-success" onclick="return confirm('Voulez-vous vraiment valider cette réservation ?')">
                                                    valider
                                                </a>
                                            <?php else: ?>
                                                <a href="reservation_annuler.php?id_reservation=<?= $row['id']; ?>" class="mx-2 btn btn-sm btn-xs btn-danger" onclick="return confirm('Voulez-vous vraiment annuler cette réservation ?')">
                                                    annuler
                                                </a>

                                                <a href="reservation_valider.php?id_reservation=<?= $row['id']; ?>" class="mx-2 btn btn-sm btn-xs btn-success" onclick="return confirm('Voulez-vous vraiment valider cette réservation ?')">
                                                    valider
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    </td>


                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <?php
                    // Affichage de la pagination
                    for ($i = 1; $i <= $total_pages; $i++) {
                        $active_class = ($i == $page) ? 'active' : ''; // Vérification de la page active
                        echo "<li class='page-item $active_class'><a class='page-link' href='?page=" . $i . "'>" . $i . "</a></li>";
                    }
                    ?>
                </ul>
            </nav>
        </div>
    <?php
    } else {
        // Afficher un message d'erreur si aucune réservation n'est disponible
        echo "<div class='col-md-12 col-sm-12'><div class='alert alert-danger text-center' role='alert'>Aucune réservation n'est disponible.</div></div>";
    }
    ?>
</div>
<script>
    // Fonction pour masquer les messages après 3 secondes
    setTimeout(function() {
        document.getElementById("success_message").style.display = "none";
        document.getElementById("error_message").style.display = "none";
    }, 2000);
</script>