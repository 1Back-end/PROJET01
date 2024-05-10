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
                <div class="col-md-6 p-3 mt-lg-5">
                    <h1 class="display-5 animated fadeIn mt-5">À propos de nous</h1> 
                        <p>
                            Notre équipe expérimentée est composée d'experts du marché immobilier
                             qui connaissent parfaitement les tendances actuelles et les opportunités
                              à saisir. Que vous cherchiez la maison de vos rêves, un investissement 
                              lucratif ou que vous souhaitiez mettre en vente votre propriété, nous 
                              sommes là pour vous aider à atteindre vos objectifs.
                        </p>
                </div>
                <div class="col-md-6 animated fadeIn">
                    <img class="img-entete" src="../package/img/image1.jpg" alt="">
                </div>
            </div>
        </div>
        <!-- Header End -->


         <!-- About Start -->
         <div class="container-xxl py-5">           
                <div class="container">
                    <div class="row g-5 align-items-center">
                    <div class="col-md-6 col-sm-12  p-3   wow fadeIn" data-wow-delay="0.1s">
                        <div class="about-img  pe-0">
                            <img class="img-fluid w-100" src="../package/img/image1.jpg">
                        </div>
                    </div>

                        <div class="col-lg-6 p-md-5 p-3 wow fadeIn" data-wow-delay="0.5s">
                            <h3 class="mb-4 text-uppercase">N°1 Pour trouver la propriété idéale</h3>
                            <p class="mb-4 text-justify"> 
                                Trouvez votre chez-vous idéal parmi notre sélection exclusive de biens immobiliers,
                                tout en découvrant des propriétés uniques qui correspondent à votre style de vie et à vos besoins.
                            </p>
                            <p><i class="fa fa-check text-primary me-3"></i>Accessibilité: 24h/24 - 7 jours/7</p>
                            <p><i class="fa fa-check text-primary me-3"></i>Présentation détaillée des biens</p>
                            <p><i class="fa fa-check text-primary me-3"></i>Économie de temps et d'efforts</p>
                           
                        </div>
                    </div>
                </div>
                </div>
<!-- About End -->
        <!-- About End -->

        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h4 class="mb-3">NOS ACTEURS                  </h4>
                    <p class="">Dans notre écosystème immobilier, chaque protagoniste joue un rôle clé. Pour nos locataires, c'est une aventure à travers une sélection de logements modernes et de styles de vie adaptés.
                        Guidés par nos agents immobiliers experts, chaque étape devient une opportunité de découverte. 
                        Pour les propriétaires, c'est une vitrine élégante pour présenter leurs biens avec aisance. 
                        Ensemble, créons une expérience où chacun trouve sa place et son bonheur.</p>
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
        <!-- Category End -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h4 class="mb-3">Nos Logements</h4>
                    <p class="">Dans notre vaste sélection de propriétés, vous découvrirez une gamme variée répondant à tous les styles de vie. Des appartements modernes offrant un confort contemporain aux chambres élégantes créant une atmosphère apaisante, en passant par les studios modernes conçus pour une vie urbaine dynamique, chaque type de logement a été soigneusement sélectionné pour répondre à vos besoins uniques. Que vous recherchiez l'espace supplémentaire d'un duplex ou la simplicité d'un studio moderne, vous trouverez votre refuge idéal parmi nos options diverses.</p>
                </div>
                <div class="row g-4">
                    
                <div class="col-lg-3  col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <a class="card d-block shadow-sm p-3 text-center rounded p-3" href="appartements.php">
                            <div class="rounded p-4">
                                <div class="mb-3">
                                <i class="fa fa-building fa-2x"></i>
                                </div>
                                <h6>Appartements</h6>
                                <span style="font-size:25px;font-weight:700;"><?php echo $resultat['total_appartements_moderne'] ?></span>
                            </div>
                        </a>
                    </div>


                    <div class="col-lg-3  col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <a class="card d-block shadow-sm p-3 text-center rounded p-3" href="studios.php">
                            <div class="rounded p-4">
                                <div class="mb-3">
                                <i class="fa fa-building fa-2x"></i>
                                </div>
                                <h6>Studios Moderne</h6>
                                <span style="font-size:25px;font-weight:700;"><?php echo $resultat['total_studios_moderne'] ?></span>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                        <a class="card d-block shadow-sm p-3 text-center rounded p-3" href="chambres.php">
                            <div class="rounded p-4">
                                <div class="mb-3">
                                <i class="fa fa-building fa-2x"></i>
                                </div>
                                <h6>Chambres Moderne</h6>
                                <span style="font-size:25px;font-weight:700;"><?php echo $resultat['total_chambres_moderne'] ?></span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                        <a class="card d-block shadow-sm p-3 text-center rounded p-3" href="duplex.php">
                            <div class="rounded p-4">
                                <div class="mb-3">
                                <i class="fa fa-building fa-2x"></i>
                                </div>
                                <h6>Duplex</h6>
                                <span style="font-size:25px;font-weight:700;"><?php echo $resultat['total_duplex'] ?></span>
                            </div>
                        </a>
                 </div>
               
                </div>
            </div>
        </div>


        <!-- Category End -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h4 class="mb-3 text-uppercase">NOS pourcentages                 </h4>
                    <p class="">Lorsqu'un produit immobilier est publié par un agent immobilier ou un propriétaire et validé par l'administrateur, une commission est répartie entre les différentes parties prenantes suite à la vente du bien à un client. La répartition de la commission se fera comme suite:</p>
                    
                    <p><i class="fa fa-check text-dark me-3"></i><span class="text text-primary">Agent Immobilier:</span> Il bénéficiera de 30% sur chacun de ses produits pris pas les clients</p>
                        <p><i class="fa fa-check text-dark me-3"></i><span class="text text-primary">Propriétaire:</span> Il bénéficiera de 20% sur chacun de ses produits pris pas les clients</p>
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