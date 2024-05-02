<?php
include_once("../include/menu.php");
include_once("../database/db.php");

// Nombre d'éléments par page
$elements_par_page = 5;

// Récupération du numéro de page actuel à partir de l'URL
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Calcul de l'offset pour la requête SQL
$offset = ($page - 1) * $elements_par_page;

// Requête SQL pour récupérer les réservations avec pagination et tri alphabétique
$sql = "SELECT id, interesse, email, telephone,date_reservation FROM reservation ORDER BY id ASC LIMIT :limit OFFSET :offset";
$stmt = $connexion->prepare($sql);
$stmt->bindParam(':limit', $elements_par_page, PDO::PARAM_INT);
$stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Compter le nombre total de réservations
$stmt_count = $connexion->prepare("SELECT COUNT(*) FROM reservation");
$stmt_count->execute();
$total_reservations = $stmt_count->fetchColumn();

// Calcul du nombre total de pages
$total_pages = ceil($total_reservations / $elements_par_page);
?>


<div class="main-container pb-5">
    <?php if ($total_reservations == 0) : ?>
    <div class="col-md-12 col-sm-12">
    <div class="alert text-center alert-info" role="alert">
        Aucune réservation trouvée.
    </div>
    </div>
    <?php else : ?>
    <div class="col-md-12 col-sm-12">
        <div class="card-box mb-30 py-2">
            <h4 class="text-center">LISTE DES INTÉRESSÉS</h4>
        </div>
    </div>

    <div class="col-md-12 col-sm-12">
        <div class="pd-20 card-box mb-3 w-100">
            <div class="table-responsive">
                <table class="table table-bordered table-striped text-center table-striped table-hover">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Interessé</th>
                            <th scope="col">Email</th>
                            <th scope="col">Contact</th>
                            <th scope="col">Date Intéressé</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($reservations as $reservation) : ?>
                            <tr>
                                <td><?php echo $reservation['id'] !== null ? $reservation['id'] : 'Null'; ?></td>
                                <td><?php echo $reservation['interesse'] !== null ? $reservation['interesse'] : 'Null'; ?></td>
                                <td><?php echo $reservation['email'] !== null ? $reservation['email'] : 'Null'; ?></td>
                                <td><?php echo $reservation['telephone'] !== null ? $reservation['telephone'] : 'Null'; ?></td>
                                <td><?php echo $reservation['date_reservation'] !== null ? $reservation['date_reservation'] : 'Null'; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Affichage de la pagination -->
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                    <li class="page-item <?php if ($page == $i) echo 'active'; ?>">
                        <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                <?php endfor; ?>
            </ul>
        </nav>
    </div>
    <?php endif; ?>
</div>

