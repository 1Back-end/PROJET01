<!DOCTYPE html>
<html lang="en">
<?php include_once("../fonction.php"); ?>
<?php include_once("../database/db.php"); ?>
<head>
    <meta charset="utf-8">
    <title>IMMO INVESTMENT SCI</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="shortcut icon" href="../package/img/logo.png" type="image/x-icon">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/country-flag-icons/css/country-flag-icons.min.css">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-iEUCYXZQBrGKEj6Xj9YWDqTinQFPw7Dx6dIDMnF+NPJbCjZZScsik3XR1nNJvVKRtkiIqgcbnepvI9gypYNE1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
     <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Libraries Stylesheet -->
    <link href="../package/lib/animate/animate.min.css" rel="stylesheet">
    <link href="../package/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="../package/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../package/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-dark" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


       <!-- Navbar Start -->
       <div class="container-fluid nav-bar bg-transparent">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
                <a href="../index.php" class="navbar-brand d-flex align-items-center text-center">
                    <div class="icon p-2 me-2">
                        <img class="img-fluid" src="../package/img/logo.png" alt="Icon" style="width: 30px; height: 30px;">
                    </div>
                    <h6 class="m-0 text-primary ">IMMO <span class="text-dark">INVESTMENT </span> SCI</h6>
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="../index.php" class="nav-item nav-link active">Acceuil</a>
                        <a href="apropos.php" class="nav-item nav-link">À propos</a>
                       
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Propriétés</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="duplex.php" class="dropdown-item">Duplex</a>
                                <a href="appartements.php" class="dropdown-item">Appartements Moderne</a>
                                <a href="studios.php" class="dropdown-item">Studios Moderne</a>
                                <a href="chambres.php" class="dropdown-item">Chambres Moderne</a>
                            </div>
                        </div>
                        
                        <a href="contact.php" class="nav-item nav-link">Contact</a>
                    </div>
                   <!-- Pour les petits écrans -->
                   <div class="d-block d-lg-none">
                        <a href="../login/login.php" class="btn btn-dark text-white border-0 btn-sm">Se connecter</a>
                        <span class="mx-2"></span>
                        <a href="../utilisateurs/creation_compte.php" class="btn btn-success btn-sm text-white px-3">Inscription</a>
                    </div>
                     <br><br>
                    <!-- Pour les grands écrans -->
                    <div class="d-none d-lg-block">
                        <a href="../login/login.php" class="btn btn-dark text-white border-0">Se connecter</a>
                        <span class="mx-2"></span>
                        <a href="../utilisateurs/creation_compte.php" class="btn btn-success text-white px-3">Inscription</a>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Navbar End -->

                

        <!-- Header Start -->
        <div class="container-fluid header bg-white p-0">
            <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                <div class="col-md-6 p-5 mt-lg-5">
                    <h4 class="display-5 animated fadeIn mt-5">Details du Logement</h4> 
                        <nav aria-label="breadcrumb animated fadeIn">
                        <ol class="breadcrumb text-uppercase">
                            <li class="breadcrumb-item"><a href="../index.php">Acceuil</a></li>
                            <li class="breadcrumb-item text-body active" aria-current="page">Détails</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 animated fadeIn">
                    <img class="img-entete" src="../package/img/baniere1.jpg" alt="">
                </div>
            </div>
        </div>
        <!-- Header End -->


        <?php
// Vérifier si l'ID de la chambre est défini dans l'URL
if (isset($_GET['id'])) {
    // Récupérer l'ID de la chambre depuis l'URL
    $id_chambre = $_GET['id'];

    // Inclure votre fichier de configuration de connexion à la base de données
    // Assurez-vous de modifier le nom du fichier si nécessaire
    include_once("../database/db.php");

    // Requête SQL pour récupérer les détails de la chambre spécifique
    $sql = "SELECT * FROM produits WHERE id = :id";
    $stmt = $connexion->prepare($sql);
    $stmt->execute([':id' => $id_chambre]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // Vérifier si la chambre avec l'ID spécifié existe
    if ($row) {
        ?>
        <div class="container-fluid mt-3 pb-5 p-2">
            <div class="container">
                <div class="row">
                    <!-- Colonne des images et des informations du produit -->
                    <div class="col-md-6 col-sm-12 shadow-sm py-3 p-3 mt-3">
                        <h5 class="font-12 text-uppercase">Images du Logement</h5>
                        <?php 
                        // Récupérer les images du produit
                        $images = explode(',', $row['photo']);
                        $totalImages = count($images);
                        
                        for ($i = 0; $i < $totalImages; $i += 2) { ?>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 mb-3">
                                    <img src="../uploads/<?php echo $images[$i]; ?>" class="img-card img-thumbnail w-100" alt="Image de la galerie">
                                </div>
                                <?php if ($i + 1 < $totalImages) { ?>
                                    <div class="col-md-6 col-sm-6 mb-3">
                                        <img src="../uploads/<?php echo $images[$i + 1]; ?>" class="img-card img-thumbnail w-100" alt="Image de la galerie">
                                    </div>
                                <?php } ?>
                            </div>
                        <?php } ?>
                        <div class="mt-3">
                            <h5 class="font-12 text-uppercase">Informations sur le Logement</h5>
                            <p class="text-justify w-100"><?php echo $row['description']; ?></p>

                            <div class="info">
                                <div class="row">
                                    <div class="col-md-6">
                                    <p class="mb-2"><i class="bi bi-house-lock-fill me-3"></i><?php echo $row['type_logement']; ?></p>
                                    <p class="mb-2"><i class="bi bi-currency-dollar me-3"></i><?php echo $row['prix']; ?> Franc CFA / Mois</p>
                                    <p class="mb-2"><i class="bi bi-pin-map-fill  me-3"></i>Région : <?php echo $row['region']; ?></p>
                                    <p class="mb-2"><i class="bi bi-radar me-3"></i>Ville : <?php echo $row['ville']; ?></p>

                                    </div>

                                    <div class="col-md-6">
                                    <p class="mb-2"><i class="bi bi-geo-fill me-3"></i>Département : <?php echo $row['departement']; ?></p>
                                     <p class="mb-2"><i class="fas fa-map-marker-alt me-3"></i>Arrondissement : <?php echo $row['arrondissement']; ?></p>

                                    <p class="mb-2"><i class='bx bxs-car me-3'></i><?php echo $row['distance']; ?> Franc CFA par rapport à la route</p>
                                    <p class="mb-2"><i class="fas fa-walking me-3"></i><?php echo $row['destination']; ?>  par rapport à la route</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <!-- Colonne du formulaire -->
                    <?php include("script_message.php");?>
                   
                    <div class="col-md-6 col-sm-12 mt-3">
                    <?php 
                        // Après avoir vérifié les champs et effectué les opérations nécessaires
                        if (isset($_POST["envoyer"])) {
                            // Vérification si au moins une des erreurs n'est pas vide
                            if (!empty($MessageErreur)) {
                                // Affichage du message d'erreur
                                echo "<div class='alert alert-danger' role='alert'>$MessageErreur</div>";
                            } else {
                                // Affichage du message de succès
                                echo "<div class='alert alert-success' role='alert'>Votre demande a été soumise avec succès, Nous vous contacterons le plus tôt possible.</div>";
                            }
                        }
                        ?>
                            <div class="shadow-sm py-3 p-3 mt-3">
                            <h5 class="font-12 text-uppercase">Nous Contacter</h5>
                            <p class="text-justify">Pour toute demande d'information ou pour manifester votre intérêt, veuillez remplir le formulaire ci-dessous et soumettre vos coordonnées.</p>
                            <form action="" method="post">
                                <?php $id_chambre = $_GET["id"]; ?>
                                <div class="mb-2">
                                    <input type="hidden" name="id_produit" class="form-control py-2" value="<?php echo $id_chambre; ?>">
                                </div>

                                <div class="mb-2">
                                    <input type="text" value="<?php echo isset($_POST['nom']) ? htmlspecialchars($_POST['nom']) : ''; ?>" class="form-control py-2" placeholder="Votre nom complet" name="nom">
                                </div>
                                <div class="mb-2">
                                    <input type="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" class="form-control py-2" placeholder="Votre adresse email" name="email">

                                </div>
                                <div class="mb-2">
                                    <input type="tel" id="phone" class="form-control py-2" value="<?php echo isset($_POST['tel']) ? htmlspecialchars($_POST['tel']) : ''; ?>" placeholder="Votre numéro de téléphone" name="tel">
                                </div>

                                <div class="mb-2">
                                    <textarea name="description" id="" cols="5" rows="5" class="form-control" placeholder="Hello ! je suis intéressé par ce Logement ..."><?php echo isset($_POST['description']) ? htmlspecialchars($_POST['description']) : ''; ?></textarea>
                                </div>
                                <div class="mb-2">
                                <button  class="btn btn-dark mb-2 btn-lg btn-responsive"  name="envoyer" type="submit"><i class="fas fa-paper-plane"></i> Soumettre votre demande</button>
                                    <!--<a href="#" class="btn btn-success mb-2 btn-responsive border-0" style="background-color: #25D366;"><i class="fab fa-whatsapp"></i> Nous contacter sur WhatsApp</a>-->

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    } else {
        echo "<h4 class='text-center'>Aucune chambre trouvée avec cet ID.</h4>";
    }
}
?>

        
         <!-- Footer Start -->
         <?php include_once("footer.php");?>

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>

    <script>
       const input = document.querySelector("#phone");
window.intlTelInput(input, {
  initialCountry: "gb",
  separateDialCode: true,
  initialCountry :"CM",
  utilsScript: "/intl-tel-input/js/utils.js?1714642302458"
   // just for formatting/placeholders etc
});
    </script>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../package/lib/wow/wow.min.js"></script>
    <script src="../package/lib/easing/easing.min.js"></script>
    <script src="../package/lib/waypoints/waypoints.min.js"></script>
    <script src="../package/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="../package/js/main.js"></script>
</body>

</html>