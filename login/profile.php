<?php
// Inclure les fichiers nécessaires
include_once("../include/menu.php");
include_once("../database/db.php");
include_once("script_edit_profile.php");
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
    <title>Mon Profil</title>
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
        
        <div class="col-md-12">
    <?php if (isset($_POST["modifier"])) : ?>
        <?php if ($succes_message) : ?>
            <div class="alert alert-success" role="alert">
                <?php echo $succes_message; ?>
            </div>
        <?php endif; ?>
        <?php if ($erreur_message) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $erreur_message; ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>
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
                               
                                <div class="mb-2">
                                    <label>Nom</label>
                                    <input type="text" class="form-control" placeholder="Votre nom" name="nom" value="<?php echo $user['NOM']; ?>">
                                </div>
                                <div class="mb-2">
                                    <label>Prenom</label>
                                    <input type="text" class="form-control" placeholder="Votre prenom" name="prenom" value="<?php echo $user['PRENOM']; ?>">
                                </div>
                                <div class="mb-2">
                                    <label>Ville</label>
                                    <input type="text" class="form-control" placeholder="Votre ville" name="ville" value="<?php echo $user['VILLE']; ?>">
                                </div>
                                <div class="mb-2">
                                    <label>Quartier</label>
                                    <input type="text" class="form-control" placeholder="Votre quartier" name="quartier" value="<?php echo $user['QUARTIER']; ?>">
                                </div>
                                <div class="mb-2">
                                    <label>N° Téléphone</label><br>
                                    <input type="text" id="telephone" class="form-control" placeholder="Votre numero de télephone" name="telephone" value="<?php echo $user['TELEPHONE']; ?>">
                                </div>
                                
                              
                                <div class="mb-2">
                                <label for="ancien_mot_de_passe">Ancien mot de passe</label>
                                    <input type="password" class="form-control password-input mb-2" id="ancien_mot_de_passe" placeholder="Votre ancien mot de passe" name="ancien_password">

                                     <input type="checkbox" class="toggle-password"> Afficher mot de passe
                                      
                            </div>
                            <div class="mb-2">
                                <label for="nouveau_mot_de_passe">Nouveau mot de passe</label>
                                    <input type="password" class="form-control password-input mb-2" id="nouveau_mot_de_passe" placeholder="Votre nouveau mot de passe" name="nouveau_password">
                                    <input type="checkbox" class="toggle-password"> Afficher mot de passe
                                      
                            </div>
                            <div class="mb-2">
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

    <script src="profile.js"></script>
</body>
</html>
