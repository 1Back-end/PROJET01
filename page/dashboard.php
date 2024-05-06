
<?php include_once("../include/menu.php");?>
<link rel="stylesheet" href="../style.css">
<?php
// Inclure le fichier contenant la fonction
include_once 'fonction.php';
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
<!-- Inclure le lien vers Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-iEUCYXZQBrGKEj6Xj9YWDqTinQFPw7Dx6dIDMnF+NPJbCjZZScsik3XR1nNJvVKRtkiIqgcbnepvI9gypYNE1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="style.css">
    <!-- Autres balises head -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">




<?php
// Vérifier si l'utilisateur est administrateur
if ($IsSuperAdmin) {
?>
<div class="main-container mt-3">
<div class="col-md-12">
    <h5>Tableau de bord</h5>
</div>
<div class="col-md-12 col-sm-12 col-xl-12 mt-3">
  <div class="row">

  <!-- Carte d'information sur le total de clients -->
  <div class="col-lg-4 col-md-12 col-sm-12 mb-30">
    <div class="card-box pd-20 height-80-p">
        <div class="text-center">
            <?php $nombre_interesses_valides = countValidatedInterests($connexion); ?>
            <h6 class="mb-3 text-uppercase font-12 h6">Total Clients</h6>
            <div class="d-flex justify-content-between align-items-center">
            <div class="mr-auto">
                    <div class="logo">
                    <span class="icon-pending">
                        <i class="fa fa-users fa-2x"></i>
                    </span>
                    </div>
                </div>
                <div class="ml-auto">
                    <h6 class="mr-2" style="font-size: 16px;"><?php echo $nombre_interesses_valides; ?></h6>
                </div>
                
            </div>
        </div>
    </div>
</div>


<!-- Fin de la carte d'information -->

<div class="col-lg-4 col-md-12 col-sm-12 mb-30">
    <div class="card-box pd-20 height-80-p">
        <div class="text-center">
            <?php $total_pro = getTotalProprietaires($connexion); ?>
            <h6 class="mb-3 text-uppercase font-12 h6">Total Propriétaires</h6> <!-- Titre centré avec police agrandie -->
            <div class="d-flex justify-content-between align-items-center">
            <div class="mr-auto"> <!-- Icône à droite -->
                   <div class="logo">
                   <span class="icon-pending">
                        <i class="fa fa-users fa-2x"></i>
                    </span>
                   </div>
                </div>
                 <!-- Div pour le nombre et l'icône, avec écart -->
                <div class="ml-auto"> <!-- Nombre à gauche -->
                    <h6 class="mr-2" style="font-size: 16px;"><?php echo $total_pro; ?></h6>
                </div>
                
            </div>
        </div>
    </div>
</div>




<div class="col-lg-4 col-md-12 col-sm-12 mb-30">
    <div class="card-box pd-20 height-80-p">
        <div class="text-center">
            <?php $total_agents_immobiliers = getTotalAgentsImmobiliers($connexion);?>
            <h6 class="mb-3 text-uppercase font-12 h6">Total Agents Immobiliers</h6> <!-- Titre centré avec police agrandie -->
            <div class="d-flex justify-content-between align-items-center"> <!-- Div pour le nombre et l'icône, avec écart -->
                <div class="mr-auto"> <!-- Icône à gauche -->
                   <div class="logo">
                   <span class="icon-pending">
                        <i class="fa fa-users fa-2x"></i>
                    </span>
                   </div>
                </div>
                <div class="ml-auto"> <!-- Nombre à droite -->
                <h6 class="mr-2" style="font-size: 16px;"><?php echo $total_agents_immobiliers; ?></h6>

                </div>
            </div>
        </div>
    </div>
</div>


<div class="col-lg-4 col-md-12 col-sm-12 mb-30">
    <div class="card-box pd-20 height-80-p">
        <div class="text-center">
        <?php $total_admins = getTotalAdmins($connexion);?>
            <h6 class="mb-3 h6 text-uppercase font-12">Total Admins</h6>
            <div class="d-flex justify-content-between align-items-center">
            <div class="mr-auto logo">
                    <div class="logo">
                    <span class="icon-pending">
                        <i class="fa fa-users fa-2x"></i>
                    </span>
                    </div>
                </div>
                <div class="ml-auto">
                    <h6 class="mr-2" style="font-size: 16px;"><?php echo $total_admins; ?></h6>
                </div>
                
            </div>
        </div>
    </div>
</div>



<!-- Carte pour le total de Duplex -->
<div class="col-lg-4 col-md-12 col-sm-12 mb-30">
    <div class="card-box pd-20 height-80-p">
        <div class="progress-box text-center">
            <?php $total_duplex = getTotalDuplexAcceptes($connexion); ?>
            <h6 class="text-center text-uppercase font-12 padding-top-10 h6">Total Duplex</h6> <!-- Titre du total de Duplex -->
            <div class="d-flex justify-content-between align-items-center">
            <div class="mr-auto"> <!-- Icône à droite -->
                  <div class="logo">
                  <span class="icon-pending">
                        <i class="fas fa-bed fa-2x"></i>
                    </span>
                  </div>
                </div>
                 <!-- Div pour le nombre et l'icône, avec écart -->
                <div class="ml-auto"> <!-- Nombre à gauche -->
                <h6 class="mr-2" style="font-size: 16px;"><?php echo $total_duplex; ?></h6><!-- Nombre de Duplex -->
                </div>
                
            </div>
        </div>
    </div>
</div>


<!-- Carte pour le total d'Appartements -->
<div class="col-lg-4 col-md-12 col-sm-12 mb-30">
    <div class="card-box pd-20 height-80-p">
        <div class="progress-box text-center">
            <?php $total_appartement = getTotalAppartementAcceptes($connexion); ?>
            <h6 class="text-center text-uppercase font-12 padding-top-10 h6">Total Appartements</h6> <!-- Titre du total d'Appartements -->
            <div class="d-flex justify-content-between align-items-center">
            <div class="mr-auto"> <!-- Icône à droite -->
                    <div class="logo">
                    <span class="icon-pending">
                        <i class="fas fa-bed fa-2x"></i>
                    </span>
                    </div>
                </div>
                 <!-- Div pour le nombre et l'icône, avec écart -->
                <div class="ml-auto"> <!-- Nombre à gauche -->
                    <h6 class="mb-0" style="font-size: 16px;"><?php echo $total_appartement; ?></h6> <!-- Nombre d'Appartements en tant que h6 -->
                </div>
               
            </div>
        </div>
    </div>
</div>


<!-- Carte pour le total de Studios -->
<div class="col-lg-4 col-md-12 col-sm-12 mb-30">
    <div class="card-box pd-20 height-80-p">
        <div class="progress-box text-center">
            <?php $total_studios = getTotalStudiosAcceptes($connexion); ?>
            <h6 class="text-center text-uppercase font-12 padding-top-10 h6">Total Studios</h6> <!-- Titre du total de Studios -->
            <div class="d-flex justify-content-between align-items-center">
            <div class="mr-auto"> <!-- Icône à droite -->
                    <div class="logo">
                    <span class="icon-pending text-center">
                        <i class="fas fa-bed fa-2x"></i>
                    </span>
                    </div>
                </div>
            <!-- Div pour le nombre et l'icône, avec écart -->
                <div class="ml-auto"> <!-- Nombre à gauche -->
                    <h6 class="mb-0" style="font-size: 16px;"><?php echo $total_studios; ?></h6> <!-- Nombre de Studios en tant que h6 -->
                </div>
                
            </div>
        </div>
    </div>
</div>

<!-- Carte pour le total de Chambres -->
<div class="col-lg-4 col-md-12 col-sm-12 mb-30">
    <div class="card-box pd-20 height-80-p">
        <div class="progress-box text-center">
            <?php $total_chambres = getTotalChambresAcceptees($connexion); ?>
            <h6 class="text-center text-uppercase font-12 padding-top-10 h6">Total Chambres</h6> <!-- Titre du total de Chambres -->
            <div class="d-flex justify-content-between align-items-center">
            <div class="mr-auto"> <!-- Icône à droite -->
                   <div class="logo">
                   <span class="icon-pending">
                        <i class="fas fa-bed fa-2x"></i>
                    </span>
                   </div>
                </div>
            <!-- Div pour le nombre et l'icône, avec écart -->
                <div class="ml-auto" > <!-- Nombre à gauche -->
                    <h6 class="mb-0" style="font-size: 16px;"><?php echo $total_chambres; ?></h6> <!-- Nombre de Chambres en tant que h6 -->
                </div>
               
            </div>
        </div>
    </div>
</div>

<!-- Carte pour le total de Chambres -->
<div class="col-lg-4 col-md-12 col-sm-12 mb-30">
    <div class="card-box pd-20 height-80-p">
        <div class="progress-box text-center">
            <?php $total_reservation = getTotalReservation($connexion); ?>
            <h6 class="text-center text-uppercase font-12 padding-top-10 h6">Total Réservation</h6> <!-- Titre du total de Chambres -->
            <div class="d-flex justify-content-between align-items-center">
            <div class="mr-auto"> <!-- Icône à droite -->
                   <div class="logo">
                   <span class="icon-pending">
                        <i class="far fa-calendar-plus fa-2x"></i>
                    </span>
                   </div>
                </div>
            <!-- Div pour le nombre et l'icône, avec écart -->
                <div class="ml-auto" > <!-- Nombre à gauche -->
                    <h6 class="mb-0" style="font-size: 16px;"><?php echo $total_reservation; ?></h6> <!-- Nombre de Chambres en tant que h6 -->
                </div>
               
            </div>
        </div>
    </div>
</div>



<!-- Carte pour le total de Chambres -->
<div class="col-lg-4 col-md-12 col-sm-12 mb-30">
    <div class="card-box pd-20 height-80-p">
        <div class="progress-box text-center">
            <?php $nombre_reservations_en_attente = countPendingReservations($connexion);?>
            <h6 class="text-center text-uppercase font-12 padding-top-10 h6">Reservation En cours</h6> <!-- Titre du total de Chambres -->
            <div class="d-flex justify-content-between align-items-center">
            <div class="mr-auto"> <!-- Icône à droite -->
                   <div class="logo">
                   <span class="icon-pending">
                        <i class="fa fa-spinner fa-spin fa-2x"></i>
                    </span>
                   </div>
                </div>
            <!-- Div pour le nombre et l'icône, avec écart -->
                <div class="ml-auto" > <!-- Nombre à gauche -->
                    <h6 class="mb-0" style="font-size: 16px;"><?php echo $nombre_reservations_en_attente; ?></h6> <!-- Nombre de Chambres en tant que h6 -->
                </div>
               
            </div>
        </div>
    </div>
</div>



<!-- Carte pour le total de Chambres -->
<div class="col-lg-4 col-md-12 col-sm-12 mb-30">
    <div class="card-box pd-20 height-80-p">
        <div class="progress-box text-center">
            <?php $nombre_reservations_annulees = countCancelledReservations($connexion); ?>
            <h6 class="text-center text-uppercase font-12 padding-top-10 h6">Reservation Annulée</h6> <!-- Titre du total de Chambres -->
            <div class="d-flex justify-content-between align-items-center">
            <div class="mr-auto"> <!-- Icône à droite -->
                   <div class="logo">
                   <span class="icon-pending">
                        <i class="fas fa-times-circle fa-2x"></i>
                    </span>
                   </div>
                </div>
            <!-- Div pour le nombre et l'icône, avec écart -->
                <div class="ml-auto" > <!-- Nombre à gauche -->
                    <h6 class="mb-0" style="font-size: 16px;"><?php echo $nombre_reservations_annulees; ?></h6> 
                    <!-- Nombre de Chambres en tant que h6 -->
                </div>
               
            </div>
        </div>
    </div>
</div

<!-- Carte pour le total de Chambres -->
<div class="col-lg-4 col-md-12 col-sm-12 mb-30">
    <div class="card-box pd-20 height-80-p">
        <div class="progress-box text-center">
            <?php $nombre_reservations_validees = countValidatedReservations($connexion); ?>
            <h6 class="text-center text-uppercase font-12 padding-top-10 h6">Reservation Validée</h6> <!-- Titre du total de Chambres -->
            <div class="d-flex justify-content-between align-items-center">
            <div class="mr-auto"> <!-- Icône à droite -->
                   <div class="logo">
                   <span class="icon-pending">
                        <i class="fas fa-check-circle fa-2x"></i>
                    </span>
                   </div>
                </div>
            <!-- Div pour le nombre et l'icône, avec écart -->
                <div class="ml-auto" > <!-- Nombre à gauche -->
                    <h6 class="mb-0" style="font-size: 16px;"><?php echo $nombre_reservations_validees; ?></h6> 
                    <!-- Nombre de Chambres en tant que h6 -->
                </div>
               
            </div>
        </div>
    </div>
</div



	</div>
    </div>
</div>
</div>

<style>
    .fa-2x {
  font-size: 18px;
}
</style>

<?php
} else {
    // Si l'utilisateur n'est pas administrateur, redirigez-le vers une page d'erreur
    header("Location:error.php");
    exit(); // Assure que le script s'arrête après la redirection
}
?>