<!DOCTYPE html>
<html lang="fr">
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
                    <div >
                        <img class="img-fluid" src="../package/img/logo.png" alt="Icon" style="width: 65px; height: 65px; margin-right: 10px;">
                    </div>
                    <h5 class="m-0 text-primary">IMMO INVESTMENT<span class="text-dark"> SCI</span></h5>
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="../index.php" class="nav-item nav-link active">Acceuil</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link  dropdown-toggle" data-bs-toggle="dropdown">A Vendre</a>
                    <div class="dropdown-menu rounded-0 m-0 ">
                        <a href="../pages/Maison.php" class="dropdown-item">Maisons</a>
                        <a href="../pages/immeuble.php" class="dropdown-item">Immeubles</a>
                        <a href="../pages/appartements.php" class="dropdown-item">Appartements</a>
                        <a href="../pages/duplex.php" class="dropdown-item">Duplex</a>
                        <a href="../pages/villa.php" class="dropdown-item">Villas</a>
                        <a href="terrains.php" class="dropdown-item">Terrains</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link  dropdown-toggle" data-bs-toggle="dropdown">A Louer</a>
                    <div class="dropdown-menu rounded-0 m-0 ">
                        <a href="chambres.php" class="dropdown-item">Chambres Moderne</a>
                        <a href="studios.php" class="dropdown-item">Studios Moderne</a>
                        <a href="appartements.php" class="dropdown-item">Appartements Moderne</a>
                        <a href="duplex.php" class="dropdown-item">Duplex</a>
                        <a href="Maison.php" class="dropdown-item">Maisons</a>
                        <a href="immeuble.php" class="dropdown-item">Immeubles</a>
                        <a href="villa.php" class="dropdown-item">Villas</a>
                        <a href="../pages/terrains.php" class="dropdown-item">Terrains</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link  dropdown-toggle" data-bs-toggle="dropdown">IMMO</a>
                    <div class="dropdown-menu rounded-0 m-0 ">
                        <a href="apropos.php" class="dropdown-item">A propos</a>
                        <a href="contact.php" class="dropdown-item">Contact</a>
                    </div>
                </div>
                    </div>
                    <!-- Pour les petits écrans -->
                    <div class="d-block d-lg-none">
                        <a href="../login/login.php" class="btn-add btn btn-dark text-white outline-none border-0 btn-sm">Se connecter</a>
                        <span class="mx-2"></span>
                        <a href="../utilisateurs/creation_compte.php" class="btn-add btn btn-success outline-none btn-sm text-white px-3">S'Inscrire</a>
                    </div>
                     <br><br>
                    <!-- Pour les grands écrans -->
                    <div class="d-none d-lg-block">
                        <a href="../login/login.php" class="btn btn-dark outline-none text-white border-0">Se connecter</a>
                        <span class="mx-2"></span>
                        <a href="../utilisateurs/creation_compte.php" class="btn btn-success outline-none text-white px-3">S'Inscrire</a>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Navbar End -->

            <style>
                p {
    margin-top: 0;
    margin-bottom: 1rem;
    font-size: 14px;
    color: lightslategray;
    text-align: justify;
}
            </style>    


<!-- Header Start -->
<div class="container-fluid header bg-white p-0">
    <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
        <div class="col-md-6 p-5 mt-lg-5"><br><br>
            <h1 class="display-5 animated fadeIn mb-4">Gagnez de l'argent avec Immo Investment SCI !

            </h1> 
                <p>
                    <span class="text-primary"> Maximisez Vos Profits avec Immo Investment SCI !</span>
                    Vous êtes agent immobilier et cherchez à augmenter vos revenus ? Chez Immo Investment SCI, nous avons la solution idéale pour vous.
                    En choisissant de vendre vos biens par notre plateforme, vous bénéficierez d'une commission exceptionnelle de 50% sur chaque vente réalisée en tant que agent immobilier et 30% 
                    en tant que propiétaire
                    
                </p>
        </div>
        <div class="col-md-6 animated fadeIn">
            <img class="img-fluid" src="../img/carousel-4.png" alt="">
        </div>
    </div>
</div>
<!-- Header End -->


        <!-- About Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                        <div class="about-img position-relative overflow-hidden p-5 pe-0">
                            <img class="img-fluid w-100" src="../img/about.jpg">
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
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->


        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h4 class="mb-3">NOS ACTEURS </h4>
                    <p class=""></p>
                </div>
                <div class="row g-4">
                    
                <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <a class="card d-block shadow-sm p-3 text-center rounded p-3" href="">
                            <div class="rounded p-4">
                                <div class="mb-3">
                                <i class="fa fa-users fa-2x"></i>
                                </div>
                                <h6>Clients</h6>
                                <span style="font-size:25px;font-weight:700;"><?php echo $result['total_interesses']?></span>
                            </div>
                        </a>
                    </div>


                    <div class="col-lg-4  col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <a class="card d-block shadow-sm p-3 text-center rounded p-3" href="#">
                            <div class="rounded p-4">
                                <div class="mb-3">
                                <i class="fa fa-users fa-2x"></i>
                                </div>
                                <h6>Agents Immobiliers</h6>
                                <span style="font-size:25px;font-weight:700;"><?php echo  $resultat_agents['total_agents'] ?></span>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                        <a class="card d-block shadow-sm p-3 text-center rounded p-3" href="#">
                            <div class="rounded p-4">
                                <div class="mb-3">
                                <i class="fa fa-users fa-2x"></i>
                                </div>
                                <h6>Propriétaires</h6>
                                <span style="font-size:25px;font-weight:700;"><?php echo $resultat_proprietaires['total_proprietaires'] ?></span>
                            </div>
                        </a>
                    </div>  
                    
                </div>
            </div>
        </div>

        
 <div class="container-xxl py-5 ">
            <div class="container p-2">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h4 class="mb-3">Nos Propriétés</h4>
                    <p>Trouvez votre havre de paix avec notre sélection exclusive de biens immobiliers de qualité sur notre site web immobilier. Votre prochaine maison vous attend ici !</p>
                </div>
                <div class="row g-4">
                <div class="row g-4">
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a class="card d-block shadow-sm p-3 text-center rounded p-3" href="page/duplex.php">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="../img/icon-apartment.png" alt="Icon">
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
                                    <img class="img-fluid" src="../img/icon-villa.png" alt="Icon">
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
                                    <img class="img-fluid" src="../img/icon-house.png" alt="Icon">
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
                                    <img class="img-fluid" src="../img/icon-housing.png" alt="Icon">
                                </div>
                                <h6>Chambre Moderne</h6>
                                <span><?php echo $resultat['total_chambres_moderne'] ?></span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                        <a class="card d-block shadow-sm p-3 text-center rounded p-3" href="../pages/immeuble.php">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="../img/icon-housing.png" alt="Icon">
                                </div>
                                <h6>Immeubles</h6>
                                <span><?php echo $resultat['total_Immeuble'] ?></span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                        <a class="card d-block shadow-sm p-3 text-center rounded p-3" href="../pages/villa.php">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="../img/icon-housing.png" alt="Icon">
                                </div>
                                <h6>Villas</h6>
                                <span><?php echo $resultat['total_Villa'] ?></span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                        <a class="card d-block shadow-sm p-3 text-center rounded p-3" href="../pages/Maison.php">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="../img/icon-housing.png" alt="Icon">
                                </div>
                                <h6>Maisons</h6>
                                <span><?php echo $resultat['total_Maison'] ?></span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                        <a class="card d-block shadow-sm p-3 text-center rounded p-3" href="../pages/terrains.php">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="../img/icon-housing.png" alt="Icon">
                                </div>
                                <h6>Terrains</h6>
                                <span><?php echo $resultat['total_terrain'] ?></span>
                            </div>
                        </a>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <!-- Category End -->

 <div class="container-xxl py-5 ">
            <div class="container p-2">
    
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h4 class="mb-3 text-uppercase">Vos Pourcentages                 </h4>
                    <p class="">Lorsqu'un produit immobilier est publié par un agent immobilier ou un propriétaire et validé par l'administrateur, une commission est répartie entre les différentes parties prenantes suite à la vente du bien à un client. La répartition de la commission se fera comme suite:</p>
                    
                    <p><i class="fa fa-check text-dark me-3"></i><span class="text text-primary">Agent Immobilier:</span> Il bénéficiera de 50% sur chacun de ses produits pris par les clients</p>
                        <p><i class="fa fa-check text-dark me-3"></i><span class="text text-primary">Propriétaire:</span> Il bénéficiera de 30% sur chacun de ses produits pris par les clients</p>
                </div>
              
                

                   
               
            </div>
        </div>

        

        
        <?php include_once("footer.php");?>

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