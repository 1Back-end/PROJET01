<!DOCTYPE html>
<html lang="en">
<?php include_once("../fonction.php"); ?>
<?php include_once("../database/db.php"); ?>
<head>
    <meta charset="utf-8">
    <title>IMMO INVESMENT SCI</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="shortcut icon" href="../package/img/logo.png" type="image/x-icon">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
   

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-iEUCYXZQBrGKEj6Xj9YWDqTinQFPw7Dx6dIDMnF+NPJbCjZZScsik3XR1nNJvVKRtkiIqgcbnepvI9gypYNE1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../package/lib/animate/animate.min.css" rel="stylesheet">
    <link href="../package/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

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
                    <h1 class="display-5 animated fadeIn mt-5">Studios Moderne</h1> 
                        <nav aria-label="breadcrumb animated fadeIn">
                        <ol class="breadcrumb text-uppercase">
                            <li class="breadcrumb-item"><a href="../index.php">Acceuil</a></li>
                            <li class="breadcrumb-item text-body active" aria-current="page">Studios Moderne</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 animated fadeIn">
                    <img class="img-entete" src="../package/img/image1.jpg" alt="">
                </div>
            </div>
        </div>
        <!-- Header End -->


        <!-- Property List Start -->
        <div class="container-xxl py-5">
    <div class="container">
        <div class="row g-0 gx-5 align-items-end">
            <div class="col-lg-6">
                <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                    <h1 class="mb-3">Liste des Studios Moderne</h1>
                    <p>Découvrez notre sélection de studios modernes, offrant des espaces à la fois chic et pratiques pour répondre à vos besoins de confort et à votre mode de vie contemporain. Chaque studio est conçu avec soin pour offrir une expérience de vie harmonieuse, où l'esthétique rencontre la fonctionnalité. Plongez dans un univers où le style et le bien-être se rejoignent pour créer votre havre de paix idéal.</p>
                </div>
            </div>
        </div>
   
        <?php
// Initialisation de la variable $totalCount
$totalCount = 0;

// Requête SQL pour récupérer tous les produits de type Duplex avec une seule image aléatoire
$sql = "SELECT *, SUBSTRING_INDEX(photo, ',', 1) AS photo_principale FROM produits WHERE statut = 'Accepté' AND STATUS = 'Present' AND type_logement = 'Studio Moderne'";

// Pagination
$itemsPerPage = 9;
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($currentPage - 1) * $itemsPerPage;

// Compter le nombre total de produits pour la pagination
$totalCountSQL = "SELECT COUNT(*) AS total FROM produits WHERE statut = 'Accepté' AND STATUS = 'Present' AND type_logement = 'Studio Moderne'";

// Exécution de la requête SQL pour obtenir le nombre total de produits
$totalCountResult = $connexion->query($totalCountSQL);
$totalCountRow = $totalCountResult->fetch(PDO::FETCH_ASSOC);
$totalCount = $totalCountRow['total'];
$totalPages = ceil($totalCount / $itemsPerPage);

// Ajouter la limitation et l'offset pour la pagination
$sql .= " ORDER BY date_ajout ASC LIMIT $offset, $itemsPerPage";

// Exécution de la requête SQL
$result = $connexion->query($sql);
// Vérifier si la requête a réussi
if ($result) {
?>
    <div class="row">
        <?php
        // Vérifier si des résultats ont été trouvés
        if ($totalCount > 0) {
            // Boucle sur chaque ligne de résultat
            foreach ($result as $row) {
        ?>
                <div class="col-md-4 col-sm-12 mb-4">
                    <div class="shadow-sm p-3 bg-white wow fadeInUp rounded text-center" data-wow-delay="0.5s">
                        <div class="card-body text-dark">
                            <div class="img-area mb-4">
                                <img src="../uploads/<?php echo $row['photo_principale']; ?>" class="img-card" alt="Image du produit">
                            </div>
                            <?php
                            // Récupération de la description depuis la base de données ou tout autre endroit où elle est stockée
                            $description = $row['description'];

                            // Séparation du texte en lignes
                            $lignes = explode("\n", $description);

                            // Limiter à cinq lignes maximum
                            $descriptionLimitee = implode("\n", array_slice($lignes, 0, 5));

                            // Affichage du texte limité à cinq lignes
                            echo '<p class="text-center line-champ">' . $descriptionLimitee . '</p>';
                            ?>
                        </div>
                        <div class="btn-group mt-3 text-center" role="group" aria-label="Options">
                            <a href="details.php?id=<?php echo $row['id']; ?>" class="btn btn-xs btn-sm btn-success text-white mx-2">Voir plus <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
        <?php
            }
        } else {
            // Aucun résultat trouvé, afficher un message d'alerte
            echo '<div class="alert alert-info" role="alert">Aucun  Studio Moderne n\'a encore été enregistré.</div>';

        }
        ?>
    </div>
    <!-- Pagination -->
    <div class="row">
        <div class="col-md-12 mt-3 col-sm-12 text-center">
            <ul class="pagination justify-content-center">
                <?php
                // Afficher les liens de pagination
                for ($i = 1; $i <= $totalPages; $i++) {
                    echo '<li class="page-item ' . ($i == $currentPage ? 'active' : '') . '"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                }
                ?>
            </ul>
        </div>
    </div>
<?php
} else {
    echo "Erreur de requête : " . $connexion->errorInfo()[2];
}
?>

        
</div>
</div>

                  


        
         <!-- Footer Start -->
         <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-">
                        <h5 class="text-white mb-4">Immo Investment SCI</h5>
                        <img src="../src/images/logo_footer.png" alt="" width="180px" style="padding-left: 50px;">
                    </div>
                    <div class="col-lg-4 col-md-">
                        <h5 class="text-white mb-4">Contact</h5>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Neptune Golf Bastos, Yaoundé</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+237 6 99 99 93 18</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>immoinvestmentsci@gmail.com</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-whatsapp"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-">
                        <h5 class="text-white mb-4">Menu</h5>
                        <a class="btn btn-link text-white-50" href="../index.php">Acceuil</a>
                        <a class="btn btn-link text-white-50" href="apropos.php">A propos</a>
                        <a class="btn btn-link text-white-50" href="contact.php">Contact</a>
                        <a class="btn btn-link text-white-50" href="#">Politique de Confidentialité</a>
                    </div>
                   
                    <div class="col-lg-3 col-md-">
                        <h5 class="text-white mb-4">Newsletter</h5>
                        <p>Inscrivez-vous dès maintenant pour recevoir nos prochaines actualités directement dans votre boîte de réception</p>
                        <div class="position-relative mx-auto" style="max-width: 400px;">
                            <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text" placeholder="Votre E-mail">
                            <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">S'inscrire</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container" >
                <div class="copyright" >
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0"  >
                            &copy; <a class="border-bottom" href="#" >IMMO INVESTMENT SCI</a>, Tous droits réservés. 	
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

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