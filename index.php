<!DOCTYPE html>
<html lang="en">
<?php include_once("database/db.php"); ?>
<?php include_once("fonction.php"); ?>
<head>
    <meta charset="utf-8">
    <title>IMMO INVESTMENT SCI</title>
    <link rel="shortcut icon" href="package/img/logo.png" type="image/x-icon">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-iEUCYXZQBrGKEj6Xj9YWDqTinQFPw7Dx6dIDMnF+NPJbCjZZScsik3XR1nNJvVKRtkiIqgcbnepvI9gypYNE1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&family=Mulish:ital,wght@1,500&family=Poppins:ital,wght@0,300;0,400;1,300&display=swap" rel="stylesheet"> 
    <!-- Libraries Stylesheet -->
    <link href="package/lib/animate/animate.min.css" rel="stylesheet">
    <link href="package/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://kit.fontawesome.com/bfa2594b1c.js" crossorigin="anonymous"></script>
    <!-- Customized Bootstrap Stylesheet -->
    <link href="package/css/bootstrap.min.css" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="package/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="page/style.css">
</head>

<body>
    <div class="container-xxl bg-white p-0">
       <!-- Spinner Start -->
       <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-dark" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>

        


<!-- Navbar Start -->
<div class="container-fluid nav-bar bg-transparent">
    <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
        <a href="index.php" class="navbar-brand d-flex align-items-center text-center">
            <div >
                <img class="img-fluid" src="package/img/logo.png" alt="Icon" style="width: 65px; height: 65px; margin-right: 10px;">
            </div>
            <h5 class="m-0 text-primary">IMMO INVESTMENT<span class="text-dark"> SCI</span></h5>
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto">
                <a href="index.php" class="nav-item nav-link active">Acceuil</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link  dropdown-toggle" data-bs-toggle="dropdown">A Vendre</a>
                    <div class="dropdown-menu rounded-0 m-0 ">
                        <a href="pages/Maison.php" class="dropdown-item">Maison</a>
                        <a href="pages/immeuble.php" class="dropdown-item">Immeubles</a>
                        <a href="pages/appartements.php" class="dropdown-item">Appartements</a>
                        <a href="pages/duplex.php" class="dropdown-item">Duplex</a>
                        <a href="pages/villa.php" class="dropdown-item">Villas</a>
                        <a href="page/terrains.php" class="dropdown-item">Terrains</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link  dropdown-toggle" data-bs-toggle="dropdown">A Louer</a>
                    <div class="dropdown-menu rounded-0 m-0 ">
                        <a href="page/chambres.php" class="dropdown-item">Chambres Moderne</a>
                        <a href="page/studios.php" class="dropdown-item">Studios Moderne</a>
                        <a href="page/appartements.php" class="dropdown-item">Appartements Moderne</a>
                        <a href="page/duplex.php" class="dropdown-item">Duplex</a>
                        <a href="page/Maison.php" class="dropdown-item">Maisons</a>
                        <a href="page/immeuble.php" class="dropdown-item">Immeubles</a>
                        <a href="page/villa.php" class="dropdown-item">Villas</a>
                        <a href="pages/terrains.php" class="dropdown-item">Terrains</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link  dropdown-toggle" data-bs-toggle="dropdown">IMMO</a>
                    <div class="dropdown-menu rounded-0 m-0 ">
                        <a href="page/apropos.php" class="dropdown-item">A propos</a>
                        <a href="page/contact.php" class="dropdown-item">Contact</a>
                    </div>
                </div>
            </div>
                    <!-- Pour les petits écrans -->
                    <div class="d-block d-lg-none">
                        <a href="login/login.php" class="btn-add btn btn-dark text-white outline-none border-0 btn-sm">Se connecter</a>
                        <span class="mx-2"></span>
                        <a href="utilisateurs/creation_compte.php" class="btn-add btn btn-success outline-none btn-sm text-white px-3">S'Inscrire</a>
                    </div>
                     <br><br>
                    <!-- Pour les grands écrans -->
                    <div class="d-none d-lg-block">
                        <a href="login/login.php" class="btn btn-dark outline-none text-white border-0">Se connecter</a>
                        <span class="mx-2"></span>
                        <a href="utilisateurs/creation_compte.php" class="btn btn-success outline-none text-white px-3">S'Inscrire</a>
                    </div>
        </div>
    </nav>
</div>
<!-- Navbar End -->


        <!-- Header Start -->
        <div class="container-fluid header bg-white p-0">
            <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
            <div class="col-md-6 p-5 mt-lg-5">
                    <h1 class="display-5 animated fadeIn mb-4">Votre recherche<span class="text-primary"> du logement idéale </span>commence ici</h1>
                    <p class="animated fadeIn mb-4 pb-2">Bienvenue sur IMMO INVESTMENT SCI votre partenaire de confiance pour trouver la propriété parfaite. 
                        Découvrez des biens immobiliers exceptionnels qui répondent à vos besoins tout en explorant un monde de possibilités immobilières.
                    </p>
                    <a href="#produit" class="btn btn-primary py-3 px-5 me-3 animated fadeIn">Nos Produits</a>
                </div>
                <div class="col-md-6 animated fadeIn">
                    <div class="owl-carousel header-carousel">
                        <div class="owl-carousel-item">
                            <img class="img-fluid" src="img/3.png" alt="">
                        </div>
                        <div class="owl-carousel-item">
                            <img class="img-fluid" src="img/1.png" alt="">
                        </div>
                        <div class="owl-carousel-item">
                            <img class="img-fluid" src="img/2.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->


        <!-- Search Start -->
        <div class="container-fluid p-2 bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
            <div class="container">
                <div class="row g-2">
                    <div class="col-md-10">
                    <form  method="GET">
                        <div class="row g-2">
                            <div class="col-md-3">
                                <select name="region" class="form-select border-0 py-3" required>
                                    <option selected disabled> Régions</option>
                                    <?php foreach ($regions as $region): ?>
                                    <option><?php echo $region; ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select name="ville" class="form-select border-0 py-3" required>
                                    <option value="" selected disabled> Villes</option>
                                    <?php foreach ($villes as $ville): ?>
                                    <option><?php echo $ville; ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select name="quartier" class="form-select border-0 py-3" required>
                                    <option value="" selected disabled> Quartiers</option>
                                    <?php foreach ($quartiers as $quartier): ?>
                                    <option><?php echo $quartier; ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                           
                          
                            <div class="col-md-3">
                                <select name="logement" class="form-select border-0 py-3" required>
                                    <option selected disabled> Type de Produit</option>
                                    <?php foreach ($types_logement as $type_logement): ?>
                                        <option><?php echo $type_logement; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" name="submit" class="btn btn-dark border-0 w-100 py-3">Rechercher</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <!-- Search End -->


        <!-- Property List Start -->
        <div class="container-xxl py-5" id="produit">
    <div class="container">
        <div class="row g-0 gx-5 align-items-end">
            <div class="col-lg-6">
                <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                <h1 class="mb-3">Liste des propriétés</h1>
                            <p>
                                Trouvez la perle rare parmi notre collection de biens immobiliers soigneusement sélectionnés pour vous
                            </p>
                </div>
            </div>
        </div>
   


<?php
// Initialisation des variables de recherche

$typePropriete = '';
$ville = '';
$region = '';
$quartier = '';


// Vérifier si le formulaire de recherche a été soumis
if (isset($_GET['submit'])) {
    $typePropriete = isset($_GET['type_propriete']) ? $_GET['type_propriete'] : '';
    $ville = isset($_GET['ville']) ? $_GET['ville'] : '';
    $region = isset($_GET['region']) ? $_GET['region'] : '';
    $quartier = isset($_GET['quartier']) ? $_GET['quartier'] : '';
   
}

// Pagination
$itemsPerPage = 9;
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($currentPage - 1) * $itemsPerPage;

// Initialisation de la variable $totalCount
$totalCount = 0;

// Requête SQL pour récupérer tous les produits avec une seule image aléatoire
$sql = "SELECT *, SUBSTRING_INDEX(photo, ',', 1) AS photo_principale FROM produits WHERE statut = 'Accepté' AND STATUS ='Present'";

// Ajouter les conditions de recherche si des critères sont spécifiés

if (!empty($typePropriete)) {
    $sql .= " AND type_logement = '$typePropriete'";
}
if (!empty($ville)) {
    $sql .= " AND ville = '$ville'";
}
if (!empty($region)) {
    $sql .= " AND region = '$region'";
}
if (!empty($quartier)) {
    $sql .= " AND quartier = '$quartier'";
}


// Compter le nombre total de produits pour la pagination
$totalCountSQL = "SELECT COUNT(*) AS total FROM produits WHERE statut = 'Accepté'  AND STATUS ='Present'";
if (!empty($quartier)) {
    $totalCountSQL .= " AND quartier LIKE '%$motCle%'";
}
if (!empty($typePropriete)) {
    $totalCountSQL .= " AND type_logement = '$typePropriete'";
}
if (!empty($ville)) {
    $totalCountSQL .= " AND ville = '$ville'";
}
if (!empty($region)) {
    $totalCountSQL .= " AND region = '$region'";
}
if (!empty($quartier)) {
    $totalCountSQL .= " AND quartier = '$quartier'";
}
if (!empty($arrondissement)) {
    $totalCountSQL .= " AND arrondissement = '$arrondissement'";
}
if (!empty($depatement)) {
    $totalCountSQL .= " AND depatement = '$depatement'";
}

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
                    <div class="shadow-sm p-2 bg-white wow fadeInUp rounded text-center" data-wow-delay="0.5s">
                        <div class="card-body text-dark p-1">
                            <div class="img-area mb-4">
                                <img src="uploads/<?php echo $row['photo_principale']; ?>" class="img-card" alt="Image du produit">
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
                        <div class="pb-2" style="position: relative; bottom: 5px;">
                            <a href="page/details.php?id=<?php echo $row['id']; ?>" class="btn btn-sm  btn-add p-2 btn-success text-white mx-2" >Voir plus <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            <?php
            }
        } else {
            // Aucun résultat trouvé, afficher un message d'alerte
            echo '<div class="alert alert-danger" role="alert">Aucun résultat trouvé.</div>';
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

 <div class="container-xxl py-5 ">
            <div class="container p-2">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h4 class="mb-3">Nos Produits</h4>
                    <p>Trouvez votre havre de paix avec notre sélection exclusive de biens immobiliers de qualité sur notre site web immobilier. Votre prochaine maison vous attend ici !</p>
                </div>
                <div class="row g-4">
                <div class="row g-4">
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a class="card d-block shadow-sm p-3 text-center rounded p-3" href="page/duplex.php">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="img/icon-apartment.png" alt="Icon">
                                </div>
                                <h6>Duplex</h6>
                                <span><?php echo $resultat['total_duplex'] ?></span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <a class="card d-block shadow-sm  text-center rounded p-3" href="page/appartements.php">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="img/icon-villa.png" alt="Icon">
                                </div>
                                <h6>Appartement Moderne</h6>
                                <span><?php echo $resultat['total_appartements_moderne'] ?></span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                        <a class="card d-block shadow-sm p-3 text-center rounded p-3" href="page/studios.php">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="img/icon-house.png" alt="Icon">
                                </div>
                                <h6>Studio Moderne</h6>
                                <span><?php echo $resultat['total_studios_moderne'] ?></span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                        <a class="card d-block shadow-sm p-3 text-center rounded p-3" href="page/chambres.php">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="img/icon-housing.png" alt="Icon">
                                </div>
                                <h6>Chambre Moderne</h6>
                                <span><?php echo $resultat['total_chambres_moderne'] ?></span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                        <a class="card d-block shadow-sm p-3 text-center rounded p-3" href="page/terrains.php">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="img/icon-housing.png" alt="Icon">
                                </div>
                                <h6>Terrains</h6>
                                <span><?php echo $resultat['total_terrain'] ?></span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                        <a class="card d-block shadow-sm p-3 text-center rounded p-3" href="pages/Maison.php">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="img/icon-housing.png" alt="Icon">
                                </div>
                                <h6>Maisons</h6>
                                <span><?php echo $resultat['total_Maison'] ?></span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                        <a class="card d-block shadow-sm p-3 text-center rounded p-3" href="pages/immeuble.php">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="img/icon-housing.png" alt="Icon">
                                </div>
                                <h6>Immeubles</h6>
                                <span><?php echo $resultat['total_Immeuble'] ?></span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                        <a class="card d-block shadow-sm p-3 text-center rounded p-3" href="pages/villa.php">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="img/icon-housing.png" alt="Icon">
                                </div>
                                <h6>Villas</h6>
                                <span><?php echo $resultat['total_Villa'] ?></span>
                            </div>
                        </a>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <!-- Category End -->


            
        


        <!-- About Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                        <div class="about-img position-relative overflow-hidden p-5 pe-0">
                            <img class="img-fluid w-100" src="img/about.jpg">
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                        <h1 class="mb-4">N°1 Pour trouver la propriété idéale</h1>
                        <p class="mb-4">
                            Trouvez votre chez-vous idéal parmi notre sélection exclusive de biens immobiliers,
                            tout en découvrant des propriétés uniques qui correspondent à votre style de vie et à vos besoins.
                        </p>
                        <p><i class="fa fa-check text-primary me-3"></i>Accessibilité 24/7</p>
                        <p><i class="fa fa-check text-primary me-3"></i>Présentation détaillée des biens</p>
                        <p><i class="fa fa-check text-primary me-3"></i>Économie de temps et d'efforts</p>
                        <a class="btn btn-primary py-3 px-5 mt-3" href="">En savoir plus</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->
</div>
</div>

         <!-- Footer Start -->
         <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-">
                        <h5 class="text-white mb-4">Immo Investment SCI</h5>
                        <img src="img/logo_footer.png" alt="" width="180px" style="padding-left: 50px;">
                    </div>
                    <div class="col-lg-4 col-md-">
                        <h5 class="text-white mb-4">Contact</h5>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Neptune Golf Bastos, Yaoundé</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i><a href="tel: +237699999318">+237 699 999 318</a></p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i><a href="mailto: immoinvestmentsci425@gmail.com">immoinvestmentsci425@gmail.com</a></p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-whatsapp"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-">
                        <h5 class="text-white mb-4">Menu</h5>
                        <a class="btn btn-link text-white-50" href="index.php">Acceuil</a>
                        <a class="btn btn-link text-white-50" href="page/apropos.php">A propos</a>
                        <a class="btn btn-link text-white-50" href="page/contact.php">Contact</a>
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
    <script src="package/lib/wow/wow.min.js"></script>
    <script src="package/lib/easing/easing.min.js"></script>
    <script src="package/lib/waypoints/waypoints.min.js"></script>
    <script src="package/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="package/js/main.js"></script>
</body>

</html>
