<?php include_once("../include/menu.php");?>
<?php include_once("../database/db.php"); ?>
<link rel="stylesheet" href="../style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
<script>
$(document).ready(function() {
    $('.zoomable-image').magnificPopup({
        type: 'image',
        gallery:{
            enabled:true
        },
        mainClass: 'mfp-with-zoom', // this class is for CSS animation below

        zoom: {
            enabled: true, // By default it's false, so don't forget to enable it

            duration: 300, // duration of the effect, in milliseconds
            easing: 'ease-in-out', // CSS transition easing function

            opener: function(openerElement) {
                return openerElement.is('img') ? openerElement : openerElement.find('img');
            }
        }
    });
});
</script>

<div class="main-container pb-5">
    <div class="col-md-12 col-sm-12">
        <div class="card-box mb-30 py-3">
        <?php
            // Vérifier si l'ID de la chambre est défini dans l'URL
            if (isset($_GET['id'])) {
                // Récupérer l'ID de la chambre depuis l'URL
                $id_produit = $_GET['id'];

                // Requête SQL pour récupérer les détails du produit spécifique et les informations du propriétaire
                $sql = "SELECT p.*, u.nom, u.prenom, u.ville, u.telephone, v.nom AS ville_nom, r.nom AS region_nom, q.nom AS quartier_nom
                        FROM produits p
                        INNER JOIN utilisateurs u ON p.proprietaire_id = u.id
                        LEFT JOIN villes v ON p.ville = v.id
                        LEFT JOIN regions r ON p.region = r.id
                        LEFT JOIN quartiers q ON p.quartier = q.id
                        WHERE p.id = :id";
                $stmt = $connexion->prepare($sql);
                $stmt->execute([':id' => $id_produit]);
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                // Vérifier si le produit avec l'ID spécifié existe
                if ($row) {
            ?>
                    <h4 class="text-center">DETAILS DU PRODUIT N° #<?php echo $row['code']; ?></h4>
            <?php
                } 
            }
            ?>

        </div>
    </div>
    <div class="col-md-12 col-sm-12">
        <?php
        // Vérifier si l'ID du produit est défini dans l'URL
        if (isset($_GET['id'])) {
            // Récupérer l'ID du produit depuis l'URL
            $id_produit = $_GET['id'];

            // Requête SQL pour récupérer les détails du produit spécifique et les informations du propriétaire
            $sql = "SELECT p.*, u.nom, u.prenom, u.ville, u.telephone, v.nom AS ville_nom, r.nom AS region_nom, q.nom AS quartier_nom
                    FROM produits p
                    INNER JOIN utilisateurs u ON p.proprietaire_id = u.id
                    LEFT JOIN villes v ON p.ville = v.id
                    LEFT JOIN regions r ON p.region = r.id
                    LEFT JOIN quartiers q ON p.quartier = q.id
                    WHERE p.id = :id";
            $stmt = $connexion->prepare($sql);
            $stmt->execute([':id' => $id_produit]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // Vérifier si le produit avec l'ID spécifié existe
            if ($row) {
                // Afficher les détails du produit
                ?>
                <div class="row">
                    <!-- Carte d'informations du produit -->
                    <div class="col-md-6 mb-2">
                        <div class="card-box mb-30">
                            <div class="card-body">
                                <h5 class="card-title">Informations du produit</h5>
                                <p class="card-text text-justify"><i class="bi bi-list-ol mr-2 fs-3"></i>Description : <?php echo $row['description']; ?></p>
                                <p class="card-text"><i class="bi bi-list-ol mr-2 fs-3"></i>Statut : <?php echo $row['statut_Louer']; ?></p>
                                <p class="card-text"><i class="bi bi-list-ol mr-2 fs-3"></i>Type Logement : <?php echo $row['type_logement']; ?></p>
                                <p class="card-text"><i class="bi bi-list-ol mr-2 fs-3"></i>Prix : <?php echo $row['prix']; ?> Franc CFA / Mois</p>
                                <p class="card-text"><i class="bi bi-list-ol mr-2 fs-3"></i>Région : <?php echo $row['region_nom']; ?></p>
                                <p class="card-text"><i class="bi bi-list-ol mr-2 fs-3"></i>Département : <?php echo $row['departement']; ?></p>
                                <p class="card-text"><i class="bi bi-list-ol mr-2 fs-3"></i>Arrondissement : <?php echo $row['arrondissement']; ?></p>
                                <p class="card-text"><i class="bi bi-list-ol mr-2 fs-3"></i>Ville : <?php echo $row['ville_nom']; ?></p>
                                <p class="card-text"><i class="bi bi-list-ol mr-2 fs-3"></i>Quartier : <?php echo $row['quartier_nom']; ?></p>
                                <p class="card-text"><i class="bi bi-list-ol mr-2 fs-3"></i>Prix à l'adresse de destination : <?php echo $row['distance']; ?> Franc CFA</p>
                                <p class="card-text"><i class="bi bi-list-ol mr-2 fs-3"></i>Nombre de kilomètres par rapport à la route : <?php echo $row['destination']; ?></p>
                                <!-- Informations du propriétaire -->
                                <p class="card-text"><i class="bi bi-list-ol mr-2 fs-3"></i>Propriétaire : <?php echo $row['prenom'] . ' ' . $row['nom']; ?></p>
                                <p class="card-text"><i class="bi bi-list-ol mr-2 fs-3"></i>Téléphone : <?php echo $row['telephone']; ?></p>
                                <p class="card-text"><i class="bi bi-list-ol mr-2 fs-3"></i>Adresse : <?php echo $row['ville']; ?></p>
                                <!-- Boutons Accepté / Refusé -->
                                <?php
                                // Récupérer le statut du produit
                                $statut = $row['statut'];

                                // Vérifier si le statut n'est ni "accepté" ni "refusé"
                                if ($statut !== 'Accepté' && $statut !== 'Rejeté') {
                                    ?>
                                    <div class="mt-3 text-center">
                                        <a href="page_accepter.php?id=<?php echo $row['id']; ?>" class="btn btn-success text-center btn-xs btn-sm mr-2" onclick="return confirm('Êtes-vous sûr de vouloir accepter ?');">Accepté <i class="bi bi-check"></i></a>

                                        <a href="page_refuser.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-xs text-center btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir refuser ?');">Refusé <i class="bi bi-x-square"></i></a>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                    <!-- Galerie d'images -->
                    <div class="col-md-6 mb-2">
                        <div class="card-box mb-30">
                            <div class="card-body">
                                <h5 class="card-title">Galerie d'images</h5>
                                <?php
                                // Récupérer les noms des fichiers images de la galerie
                                $images = explode(',', $row['photo']);
                                ?>
                                <div class="row">
                                    <?php foreach ($images as $image) : ?>
                                        <div class="col-md-6 mb-3">
                                            <!-- Agrandir les images -->
                                            <a href="../uploads/<?php echo $image; ?>" class="zoomable-image">
                                                <img src="../uploads/<?php echo $image; ?>" class="img-fluid" alt="Image de la galerie">
                                            </a>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            } else {
                echo "Aucun produit trouvé avec cet ID.";
            }
        } else {
            echo "ID du produit non spécifié.";
        }
        ?>
    </div>
</div>
