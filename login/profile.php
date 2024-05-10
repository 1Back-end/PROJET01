<?php
// Inclure les fichiers nécessaires
include_once("../include/menu.php");
include_once("../database/db.php");

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['id'])) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: ../login/login.php");
    exit();
}


// Récupérer l'identifiant de l'utilisateur depuis la session
$identifiant = $_SESSION['id'];
// Préparer la requête SQL pour récupérer les informations de l'utilisateur
$sql = "SELECT * FROM utilisateurs WHERE ID = :id";

// Préparation de la requête
$stmt = $connexion->prepare($sql);

// Liaison des paramètres
$stmt->bindParam(':id', $identifiant, PDO::PARAM_INT);

// Exécution de la requête
$stmt->execute();

// Récupérer les données de l'utilisateur
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Vérifier si des données ont été trouvées
if (!$user) {
   
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>IMMO INVESTMENT SCI</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="profile.css">
    
<body>
    <div class="main-container pb-5">
        <div class="col-md-12 col-sm-12">
            <div class="card-box mb-10 py-2">
                <h4 class="text-center">MON PROFIL</h4>
            </div>
        </div>

       <div class="col-md-12 col-sm-12">
        <?php include_once("script_edit_profile.php");?>
        <?php
        // Vérifier si le formulaire a été soumis avec succès
        if (isset($_POST['modifier'])) {
            // Vérifier s'il y a un message de succès ou d'erreur dans les variables
            if (!empty($succes)) {
                // Afficher l'alerte de succès
                echo '<div class="alert alert-success text-center" role="alert">' . $succes . '</div>';
            } elseif (!empty($erreur)) {
                // Afficher l'alerte d'erreur
                echo '<div class="alert alert-danger text-center" role="alert">' . $erreur . '</div>';
            }
        }
        ?>


       </div>
        <div class="col-md-12 col-sm-12">
            <div class="row">
                <div class="col-md-4 col-sm-12 text-center">
                    <div class="card-box  p-2">
                    <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-4 mt-3 text-center position-relative">
                    <label for="photo" class="position-relative">
                        <img src="../image_utilisateurs/<?php echo $user['PHOTO']; ?>" alt="" class="img-fluid rounded-circle profile-img" id="preview-image">
                    </label>
                    <div class="edit-indicator mt-5">
                        <i class="fas fa-pencil-alt"></i> Modifier
                    </div>
                   
                    <input type="file" name="photo" id="photo" class="form-control" style="display: none;">
                   
                </div>
                </div>

                </div>
                <div class="col-md-8 col-sm-12 mt-3">
                    <div class="card-box p-3">
                            <div class="col-md-12 col-sm-12">
                                   
                                    <input type="hidden" class="form-control" placeholder="Votre nom" name="id" value="<?php echo $user['ID']; ?>">
                               
                                <div class="mb-3">
                                    <label>Nom</label>
                                    <input type="text" class="form-control" placeholder="Votre nom" name="nom" value="<?php echo $user['NOM']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label>Prenom</label>
                                    <input type="text" class="form-control" placeholder="Votre prenom" name="prenom" value="<?php echo $user['PRENOM']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label>Ville</label>
                                    <input type="text" class="form-control" placeholder="Votre ville" name="ville" value="<?php echo $user['VILLE']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label>Quartier</label>
                                    <input type="text" class="form-control" placeholder="Votre quartier" name="quartier" value="<?php echo $user['QUARTIER']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label>N° Téléphone</label><br>
                                    <input type="tel" id="phone" class="form-control" placeholder="Votre numéro de téléphone" name="tel" value="<?php echo $user['TELEPHONE']; ?>">

                                </div>
                                
                              
                                <div class="mb-3">
                                <label for="ancien_mot_de_passe">Ancien mot de passe</label>
                                    <input type="password" class="form-control password-input mb-2" id="ancien_mot_de_passe" placeholder="Votre ancien mot de passe" name="ancien_password">

                                     <input type="checkbox" class="toggle-password"> Afficher mot de passe
                                      
                            </div>
                            <div class="mb-3">
                                <label for="nouveau_mot_de_passe">Nouveau mot de passe</label>
                                    <input type="password" class="form-control password-input mb-2" id="nouveau_mot_de_passe" placeholder="Votre nouveau mot de passe" name="nouveau_password">
                                    <input type="checkbox" class="toggle-password"> Afficher mot de passe
                                      
                            </div>
                            <div class="mb-3">
                                <label for="nouveau_mot_de_passe">Confirmer votre mot de passe</label>
                                    <input type="password" class="form-control password-input mb-2" id="confirm_nouveau_mot_de_passe" placeholder="Votre nouveau mot de passe" name="confirm_nouveau_password">
                                    <input type="checkbox" class="toggle-password"> Afficher mot de passe
                                      
                            </div><br>


                                <div class="mb-4">
                                    <input type="submit" name="modifier" value="Modifier" class="btn btn-add btn-block btn-success">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
                
                const input = document.querySelector("#phone");
                window.intlTelInput(input, {
                initialCountry: "CM",
                separateDialCode: true,
                geoIpLookup: callback => {
                    fetch("https://ipapi.co/json")
                    .then(res => res.json())
                    .then(data => callback(data.country_code))
                    .catch(() => callback("us"));
                },
                utilsScript: "/intl-tel-input/js/utils.js?1714642302458" // just for formatting/placeholders etc
                });
        
            </script>










    <script src="profile.js"></script>
   
</body>
</html>
