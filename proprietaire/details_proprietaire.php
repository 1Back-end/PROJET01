<?php
include_once("../include/menu.php");
include_once("../database/db.php");

// Vérifier si l'ID est présent dans l'URL
if(isset($_GET['id'])) {
    // Récupérer l'ID depuis l'URL
    $utilisateur_id = $_GET['id'];
    // Requête SQL pour sélectionner l'utilisateur avec l'ID spécifié
    $sql = "SELECT * FROM utilisateurs WHERE ID = :id AND STATUT = 'Present' AND ROLE = 1";
    try {
        // Préparation de la requête
        $stmt = $connexion->prepare($sql);
        // Liaison des paramètres
        $stmt->bindParam(':id', $utilisateur_id);
        // Exécution de la requête
        $stmt->execute();
        // Récupération de l'utilisateur
        $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        // En cas d'erreur lors de l'exécution de la requête, afficher l'erreur
        die("Erreur lors de l'exécution de la requête : " . $e->getMessage());
    }
}

?>

<link rel="stylesheet" href="../style.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>

<div class="main-container mt-2">
    <div class="col-md-12 col-sm-12">
        <div class="card-box mb-30 py-3">
            <h4 class="text-center">DETAILS DU PROPRIETAIRE N° <?php echo $utilisateur['TOKEN']; ?></h4>
        </div>
    </div>
    <div class="col-md-12 col-sm-12">
    <div class="row">
    <div class="col-md-3 col-sm-12">
    <div class="card-box mb-30 text-center p-2 py-3 col-sm-12">
        <img src="../image_utilisateurs/<?php echo $utilisateur['PHOTO']; ?>" alt="Photo du client" class="profile-img img-fluid"  style='object-fit: cover; aspect-ratio: 1/1;'>
        <h6 class="mt-2 font-12">Photo de profile</h6>
    </div>
        </div>

        <div class="col-md-9 col-sm-12">
            <div class="card-box mb-30 text-dark py-4 p-3">
            <div class="row">
            <div class="col-md-6 col-sm-12">
                <p class="mb-4"><strong>Nom:</strong> <?php echo $utilisateur['NOM']; ?></p>
                <p class="mb-4"><strong>Email:</strong> <?php echo $utilisateur['EMAIL']; ?></p>
                <p class="mb-4"><strong>Téléphone:</strong> <?php echo $utilisateur['TELEPHONE']; ?></p>
                <p class="mb-4"><strong>Ville:</strong> <?php echo $utilisateur['VILLE']; ?></p>
            </div>
            <div class="col-md-6 col-sm-12">
                <p class="mb-4" ><strong>Quartier:</strong> <?php echo $utilisateur['QUARTIER']; ?></p>
                <?php
                // Déterminer la classe CSS en fonction de la valeur du statut
                $class = ($utilisateur['STATUS'] == 'Actif') ? 'btn btn-info btn-sm btn-xs' : 'btn-danger';
                ?>
                <p class="mb-4"><strong>Statut:</strong> <a disabled href="#" class="btn btn-sm btn-xs <?php echo $class; ?>"><?php echo strtoupper($utilisateur['STATUS']); ?></a></p>
                <p class="mb-4"><strong>Date Création:</strong> <?php echo date('d/m/Y H:i:s', strtotime($utilisateur['DATE_CREATION'])); ?></p>
                <p class="mb-4"><strong>Date Modification:</strong> <?php echo date('d/m/Y H:i:s', strtotime($utilisateur['DATE_MODIFICATION'])); ?></p>
            </div>
        </div>

            </div>
        </div>
    </div>
</div>

