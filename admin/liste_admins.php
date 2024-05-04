<?php
// Vérifiez s'il y a un message de succès ou d'erreur dans l'URL
if (isset($_GET['success'])) {
    $success_message = $_GET['success'];
}
if (isset($_GET['error'])) {
    $error_message = $_GET['error'];
}
?>

<?php

include_once("../database/db.php");

// Nombre d'éléments par page
$elements_par_page = 3;

// Récupération du numéro de page actuel à partir de l'URL
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Calcul de l'offset pour la requête SQL
$offset = ($page - 1) * $elements_par_page;

// Requête SQL pour récupérer les utilisateurs avec un rôle d'agent immobilier et un statut "Présent"
$sql = "SELECT * FROM utilisateurs WHERE ROLE = 4 AND STATUT = 'Present' LIMIT :limit OFFSET :offset";
$stmt = $connexion->prepare($sql);
$stmt->bindParam(':limit', $elements_par_page, PDO::PARAM_INT);
$stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$utilisateurs = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Compter le nombre total d'agents immobiliers
$stmt_count = $connexion->prepare("SELECT COUNT(*) FROM utilisateurs WHERE ROLE = 4 AND STATUT = 'Present'");
$stmt_count->execute();
$total_utilisateurs = $stmt_count->fetchColumn();

// Calcul du nombre total de pages
$total_pages = ceil($total_utilisateurs / $elements_par_page);
?>


<?php include_once("../include/menu.php"); ?>

<div class="main-container pb-5">
    <?php if ($total_utilisateurs == 0) : ?>
    <div class="col-md-12  col-sm-12">
    <div class="alert text-center alert-info" role="alert">
        Aucun administrateur trouvé.
    </div>
    </div>
    <?php else : ?>
    <div class="col-md-12 col-sm-12">
    <div class="card-box p-3 mb-3 d-flex justify-content-between align-items-center">
     <div class="mr-auto">
     <h5 class="text-uppercase">LISTE  Administrateurs</h5>
     </div>
       <div class="ml-auto">
       <a href="ajouter.php" class="btn btn-dark btn-add btn-sm mt-2 mt-sm-0 order-sm-2"><i class="bi bi-plus-circle mr-2"></i>AJOUTER</a>
       </div>
    </div>
    </div>
    <div class="col-md-12 col-sm-12">
    <!-- Afficher le message de succès -->
<?php if (isset($success_message)): ?>
    <div id="success_message" class="alert alert-success" role="alert">
        <?= $success_message ?>
    </div>
    <script>
        // Masquer le message de succès après 2 secondes
        setTimeout(function() {
            document.getElementById('success_message').style.display = 'none';
        }, 2000);
    </script>
<?php endif; ?>

<!-- Afficher le message d'erreur -->
<?php if (isset($error_message)): ?>
    <div id="error_message" class="alert alert-danger" role="alert">
        <?= $error_message ?>
    </div>
    <script>
        // Masquer le message d'erreur après 2 secondes
        setTimeout(function() {
            document.getElementById('error_message').style.display = 'none';
        }, 2000);
    </script>
<?php endif; ?>
</div>

    <div class="col-md-12 col-sm-12">
        <div class="pd-20 card-box mb-3 w-100">
            <div class="table-responsive">
                <table class="table table-bordered table-striped text-center table-striped table-hover">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">Avatar</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prenom</th>
                            <th scope="col">Telephone</th>
                            <th scope="col">Statut</th>
                            <th scope="col">Details</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($utilisateurs as $utilisateur) : ?>
                            <tr>
                                <td><img src="../image_utilisateurs/<?php echo $utilisateur['PHOTO']; ?>" alt="Avatar" width="40" height="40" class="rounded-circle" style='border-radius: 50%;object-fit: cover; aspect-ratio: 1/1;'></td>
                                <td><?php echo $utilisateur['NOM']; ?></td>
                                <td><?php echo $utilisateur['PRENOM']; ?></td>
                                <td><?php echo $utilisateur['TELEPHONE']; ?></td>
                                <td>
                                <?php 
                                    $status = $utilisateur['STATUS'];
                                    if ($status == 'Actif') {
                                        echo '<span class="text-success">' . $status . '</span>';
                                    } elseif ($status == 'Inactif') {
                                        echo '<span class="text-danger">' . $status . '</span>';
                                    } else {
                                        echo $status; // Gérer d'autres cas si nécessaire
                                    }
                                ?>
                            </td>

                               <td> <a class="mx-2 btn btn-info btn-sm btn-xs btn-add" href="../admin/details_compte.php?id=<?= $utilisateur['ID'] ?>">Details</a></td>
                         <td>
                        <div class="justify-content-center justify-content-md-center align-items-center">
                            <?php 
                            $status = $utilisateur['STATUS'];
                            if ($status == 'Actif') :
                            ?>
                                <a class="mx-2 btn btn-danger text-white btn-sm btn-xs btn-add" href="../admin/desactiver_compte.php?id=<?= $utilisateur['ID'] ?>" onclick="return confirm('Êtes-vous sûr de vouloir désactiver ce compte ?')">Désactiver</a>
                            <?php elseif ($status == 'Inactif') : ?>
                                <a class="mx-2 btn btn-success btn-sm btn-xs btn-add" href="../admin/activer_compte.php?id=<?= $utilisateur['ID'] ?>" onclick="return confirm('Voulez-vous vraiment activer ce compte ?')">Activer</a>
                            <?php else : ?>
                                <?= $status ?> <!-- Gérer d'autres cas si nécessaire -->
                            <?php endif; ?>
                        </div>
                    </td>


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


</body>
</html>
