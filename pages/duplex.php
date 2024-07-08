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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Libraries Stylesheet -->
    <link href="../package/lib/animate/animate.min.css" rel="stylesheet">
    <link href="../package/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../package/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../package/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="style1.css">
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
            <h5 class="m-0 text-primary">IMMO INVESTMENT <span class="text-dark">SCI</span></h5>
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
                        <a href="Maison.php" class="dropdown-item">Maison</a>
                        <a href="immeuble.php" class="dropdown-item">immeuble</a>
                        <a href="appartements.php" class="dropdown-item">Appartements</a>
                        <a href="duplex.php" class="dropdown-item">Duplex</a>
                        <a href="villa.php" class="dropdown-item">Villas</a>
                        <a href="../page/terrains.php" class="dropdown-item">Terrains</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link  dropdown-toggle" data-bs-toggle="dropdown">A Louer</a>
                    <div class="dropdown-menu rounded-0 m-0 ">
                        <a href="../page/chambres.php" class="dropdown-item">Chambres Moderne</a>
                        <a href="../page/studios.php" class="dropdown-item">Studios Moderne</a>
                        <a href="../page/appartements.php" class="dropdown-item">Appartements Moderne</a>
                        <a href="../page/duplex.php" class="dropdown-item">Duplex</a>
                        <a href="../page/Maison.php" class="dropdown-item">Maisons</a>
                        <a href="../page/immeuble.php" class="dropdown-item">Immeubles</a>
                        <a href="../page/villa.php" class="dropdown-item">Villas</a>
                        <a href="terrains.php" class="dropdown-item">Terrains</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link  dropdown-toggle" data-bs-toggle="dropdown">IMMO</a>
                    <div class="dropdown-menu rounded-0 m-0 ">
                        <a href="../page/apropos.php" class="dropdown-item">A propos</a>
                        <a href="../page/contact.php" class="dropdown-item">Contact</a>
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


        <!-- Header Start -->
        <div class="container-fluid header bg-white p-0">
            <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                <div class="col-md-6 p-5 mt-lg-5"><br><br><br>
                    <h1 class="display-5 animated fadeIn mb-4">Votre prochain <span class="text-primary"> chez-vous </span> vous attend</h1> 
                        <p>
                            Vous trouverez une sélection de propriétés exceptionnelles 
                            répondant à divers besoins et styles de vie. Que vous recherchiez
                            une maison spacieuse pour votre famille, un appartement moderne
                            en centre-ville, ou un terrain pour un projet de construction, 
                            nous avons ce qu'il vous faut. 
                        </p>
                </div>
                <div class="col-md-6 animated fadeIn">
                    <img class="img-fluid" src="../img/carousel-3.jpg" alt="">
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
                    <h1 class="mb-3">Liste de duplex à vendre</h1>
                    <p class="">Découvrez notre assortiment de duplex modernes, 
                        où l'élégance s'associe à la fonctionnalité pour créer un 
                        espace de vie Satisfaisant qui répond à vos besoins de confort.</p>
                </div>
            </div>
        </div>
   
        <?php
// Initialisation de la variable $totalCount
$totalCount = 0;

// Requête SQL pour récupérer tous les produits de type Duplex avec une seule image aléatoire
$sql = "SELECT *, SUBSTRING_INDEX(photo, ',', 1) AS photo_principale FROM produits WHERE statut = 'Accepté' AND STATUS = 'Present' AND type_logement = 'Duplex' AND statut_Louer = 'A Vendre'";

// Pagination
$itemsPerPage = 9;
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($currentPage - 1) * $itemsPerPage;

// Compter le nombre total de produits pour la pagination
$totalCountSQL = "SELECT COUNT(*) AS total FROM produits WHERE statut = 'Accepté' AND STATUS = 'Present' AND type_logement = 'Duplex' AND statut_Louer = 'A Vendre'";

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
                        <div class="pb-2" style="position: relative; bottom: 5px;">
                            <a href="../page/details.php?id=<?php echo $row['id']; ?>" class="btn btn-sm  btn-add p-2 btn-success text-white mx-2" >Voir plus <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
        <?php
            }
        } else {
            // Aucun résultat trouvé, afficher un message d'alerte
            echo '<div class="alert alert-info" role="alert">Aucun  Duplex n\'a encore été enregistré.</div>';

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