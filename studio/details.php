<?php include_once("../include/menu.php");?>
<?php include_once("../database/db.php"); ?>
<link rel="stylesheet" href="style.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">

<div class="main-container">
    <div class="col-md-12 col-sm-12">
        <div class="card-box mb-30 py-3">
            <h4 class="text-center">DETAILS DU STUDIO</h4>
        </div>
    </div>
    <div class="col-md-12 col-sm-12">
   
    <?php
 // Vérifier si l'ID de la chambre est défini dans l'URL
if (isset($_GET['id'])) {
    // Récupérer l'ID de la chambre depuis l'URL
    $id_chambre = $_GET['id'];
    
    // Requête SQL pour récupérer les détails de la chambre spécifique
    $sql = "SELECT * FROM produits WHERE id = :id";
    $stmt = $connexion->prepare($sql);
    $stmt->execute([':id' => $id_chambre]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // Vérifier si la chambre avec l'ID spécifié existe
    if ($row) {
        // Afficher les détails de la chambre
        ?>
        <div class="row">
            <!-- Carte d'informations du produit -->
            <div class="col-md-6 mb-2">
                <div class="card-box mb-30">
                    <div class="card-body">
                        <h5 class="card-title">Informations du produit</h5>
                        <p class="card-text text-justify">Description: <?php echo $row['description']; ?></p>
                        <p class="card-text">Prix: <?php echo $row['prix']; ?> Frcfa</p>
                        <p class="card-text">Région: <?php echo $row['region']; ?></p>
                        <p class="card-text">Departement: <?php echo $row['departement']; ?></p>
                        <p class="card-text">Arrondissement: <?php echo $row['arrondissement']; ?></p>
                        <p class="card-text">Ville: <?php echo $row['ville']; ?></p>
                        <p class="card-text">Quartier: <?php echo $row['quartier']; ?></p>
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
                                <div class="col-md-4 mb-3">
                                    <img src="../uploads/<?php echo $image; ?>" class="img-fluid-custom" >
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    } else {
        echo "Aucune chambre trouvée avec cet ID.";
    }
} else {
    echo "ID de chambre non spécifié.";
}

?>


    </div>