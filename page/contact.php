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
                       
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Propriétés</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="chambres.php" class="dropdown-item">Chambres Moderne</a>
                                <a href="studios.php" class="dropdown-item">Studios Moderne</a>
                                <a href="appartements.php" class="dropdown-item">Appartements Moderne</a>
                                <a href="duplex.php" class="dropdown-item">Duplex</a>
                            </div>
                        </div>
                        <a href="apropos.php" class="nav-item nav-link">À propos</a>
                        
                        <a href="#" class="nav-item nav-link">Contact</a>
                    </div>
                     <!-- Pour les petits écrans -->
                   <div class="d-block d-lg-none">
                        <a href="../login/login.php" class="btn btn-dark text-white border-0 btn-sm">Se connecter</a>
                        <span class="mx-2"></span>
                        <a href="../utilisateurs/creation_compte.php" class="btn btn-success btn-sm text-white px-3">S'Inscrire</a>
                    </div>
                     <br><br>
                    <!-- Pour les grands écrans -->
                    <div class="d-none d-lg-block">
                        <a href="../login/login.php" class="btn btn-dark text-white border-0">Se connecter</a>
                        <span class="mx-2"></span>
                        <a href="../utilisateurs/creation_compte.php" class="btn btn-success text-white px-3">S'Inscrire</a>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Navbar End -->


        <!-- Header Start -->
        <div class="container-fluid header bg-white p-0">
            <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                <div class="col-md-6 p-5 mt-lg-5"><br><br>
                    <h1 class="display-5 animated fadeIn mb-4">Contactez-nous</h1> 
                        <p>
                            Nous sommes là pour répondre à toutes vos questions et vous aider 
                            dans votre recherche de propriété. N'hésitez pas à nous contacter 
                            en utilisant le formulaire ci-dessous ou en nous appelant directement.
                             Notre équipe dévouée se fera un plaisir de vous assister dans votre projet immobilier.
                        </p>
                </div>
                <div class="col-md-6 animated fadeIn">
                    <img class="img-entete" src="../package/img/image1.jpg" alt="">
                </div>
            </div>
        </div>
        <!-- Header End -->

        


        <!-- Contact Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="row gy-4">
                            <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                                <div class="bg-light rounded p-3">
                                    <div class="d-flex align-items-center bg-white rounded p-3" style="border: 1px dashed rgba(0, 185, 142, .3)">
                                        <div class="icon me-3" style="width: 45px; height: 45px;">
                                            <i class="fa fa-map-marker-alt text-primary"></i>
                                        </div>
                                        <span>Neptune Golf Bastos, Yaoundé</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5 wow fadeIn" data-wow-delay="0.3s">
                                <div class="bg-light rounded p-3">
                                    <div class="d-flex align-items-center bg-white rounded p-3" style="border: 1px dashed rgba(0, 185, 142, .3)">
                                        <div class="icon me-3" style="width: 45px; height: 45px;">
                                            <i class="fa fa-envelope-open text-primary"></i>
                                        </div>
                                        <span>investmentimmo425@gmail.com</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.5s">
                                <div class="bg-light rounded p-3">
                                    <div class="d-flex align-items-center bg-white rounded p-3" style="border: 1px dashed rgba(0, 185, 142, .3)">
                                        <div class="icon me-3" style="width: 45px; height: 45px;">
                                            <i class="fa fa-phone-alt text-primary"></i>
                                        </div>
                                        <span>+237 699 999 318</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <iframe class="position-relative rounded w-100 h-100"
                            src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d497.57471572203974!2d11.498744945910774!3d3.896047183328143!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sfr!2scm!4v1713604176425!5m2!1sfr!2scm" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                            frameborder="0" style="min-height: 400px; border:0;" allowfullscreen="" aria-hidden="false"
                            tabindex="0"></iframe>
                    </div>
                    <div class="col-md-6">
                        <div class="wow fadeInUp" data-wow-delay="0.5s">
                            <p class="mb-4">
                                Nous sommes ravis de vous accueillir sur notre site ! Si vous avez des questions, des 
                                commentaires ou si vous souhaitez simplement en savoir plus sur nos services, n'hésitez
                                 pas à nous contacter en utilisant le formulaire ci-dessous. Nous nous engageons à vous
                                 répondre dans les plus brefs délais. Merci de nous faire confiance !
                            </p>
                            <?php include("envoi_message.php");?>
                            <?php if (!empty($erreur)) : ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $erreur; ?>
                            </div>
                        <?php elseif (!empty($succes)) : ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo $succes; ?>
                            </div>
                        <?php endif; ?>

                            <form action="" name="form" method="POST" class="php-email" enctype="multipart/from-data">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" value="<?php echo isset($_POST['nom']) ? htmlspecialchars($_POST['nom']) : ''; ?>" class="form-control" name="nom" id="name" placeholder="Votre Nom">
                                            <label for="name">Votre Nom</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" class="form-control" name="email" id="email" placeholder="Votre adresse Email">
                                            <label for="email">Votre adresse Email</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" value="<?php echo isset($_POST['sujet']) ? htmlspecialchars($_POST['sujet']) : ''; ?>" name="sujet" id="subject" placeholder="Objet">
                                            <label for="subject">Objet</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Veillez entrer votre Message" name="message" id="message" style="height: 150px"><?php echo isset($_POST['message']) ? htmlspecialchars($_POST['message']) : ''; ?></textarea>
                                            <label for="message">Message</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100 py-3" name="valider" type="submit">Envoyer le message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->

        
         <!-- Footer Start -->
         <?php include_once("footer.php");?>
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