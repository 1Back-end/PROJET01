<?php

include_once("../database/db.php");

// Nombre d'éléments par page
$elements_par_page = 3;

// Récupération du numéro de page actuel à partir de l'URL
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Calcul de l'offset pour la requête SQL
$offset = ($page - 1) * $elements_par_page;

// Requête SQL pour récupérer les utilisateurs avec un rôle d'agent immobilier et un statut "Présent"
$sql = "SELECT * FROM utilisateurs WHERE ROLE = 2 AND STATUT = 'Present' LIMIT :limit OFFSET :offset";
$stmt = $connexion->prepare($sql);
$stmt->bindParam(':limit', $elements_par_page, PDO::PARAM_INT);
$stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$utilisateurs = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Compter le nombre total d'agents immobiliers
$stmt_count = $connexion->prepare("SELECT COUNT(*) FROM utilisateurs WHERE ROLE = 2 AND STATUT = 'Present'");
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
        Aucun agent immobilier trouvé.
    </div>
    </div>
    <?php else : ?>
    <div class="col-md-12 col-sm-12">
        <div class="card-box mb-30 py-2">
            <h4 class="text-center text-uppercase">LISTE DES AGENTS IMMOBILIERS</h4>
        </div>
    </div>

    <div class="col-md-12 col-sm-12">
        <div class="pd-20 card-box mb-3 w-100">
            <div class="table-responsive">
                <table class="table table-bordered table-striped text-center table-striped table-hover">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">Avatar</th>
                            <th scope="col">Nom</th>
                           
                            <th scope="col">Telephone</th>
                            <th scope="col">Ville</th>
                            <th scope="col">Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($utilisateurs as $utilisateur) : ?>
                            <tr>
                                <td><img src="../image_utilisateurs/<?php echo $utilisateur['PHOTO']; ?>" alt="Avatar" width="40" height="40" class="rounded-circle" style='border-radius: 50%;object-fit: cover; aspect-ratio: 1/1;'></td>
                                <td><?php echo $utilisateur['NOM']; ?></td>
                                <td><?php echo $utilisateur['TELEPHONE']; ?></td>
                                <td><?php echo $utilisateur['VILLE']; ?></td>
                                <td>
                                    <?php if ($utilisateur['STATUS'] === 'Actif') : ?>
                                        <span class="btn btn-success btn-xs btn-sm"><?php echo $utilisateur['STATUS']; ?></span>
                                    <?php elseif ($utilisateur['STATUS'] === 'Inactif') : ?>
                                        <span class="btn btn-danger btn-xs btn-sm"><?php echo $utilisateur['STATUS']; ?></span>
                                    <?php else : ?>
                                        <span><?php echo $utilisateur['STATUS']; ?></span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                <div class="d-flex justify-content-center justify-content-md-center">
                                    <a  class="mx-2 btn-info btn-sm btn-xs btn-info" href="../utilisateurs/details_utilisateurs.php?id=<?php echo $utilisateur['ID']; ?>">Details</a>
                                    <a class="mx-2 btn-info btn-sm btn-xs btn-danger" href="../utilisateurs/supprimer_utilisateurs.php?id=<?php echo $utilisateur['ID']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet cette entrée ?');">
                                       Supprimé
                                    </a>
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
