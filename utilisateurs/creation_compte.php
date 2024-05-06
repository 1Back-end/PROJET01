



    <link rel="icon" type="image/png" sizes="64x64" href="../image/logo.png">
    <title>
    <?php
    echo strtoupper(ucfirst(str_replace(".php", "", basename($_SERVER['PHP_SELF']))));
?>

    </title> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/country-flag-icons/css/country-flag-icons.min.css">

  
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&family=Mulish:ital,wght@1,500&family=Poppins:ital,wght@0,300;0,400;1,300&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" type="text/css" href="../vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="../vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="../vendors/styles/style.css">
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css">
 
	<!-- Custom CSS Link -->
	<link rel="stylesheet" href="../style.css">


<style>
       #profile-image {
    width: 150px; /* Taille de l'image */
    height: 150px; /* Taille de l'image */
    border-radius: 50%; /* Pour arrondir l'image */
    object-fit: cover; /* Pour que l'image conserve ses proportions et remplisse le conteneur */
    cursor: pointer; /* Curseur pointer pour indiquer que l'image est cliquable */
}

</style>
<div class="container mt-5 pb-5 ">
    <div class="col-sm-12 col-md-12">
    <?php include_once("script_creation_compte.php");?>
    <?php
    if(isset($_POST["enregistrer"]) && empty($erreur_nom) && empty($erreur_email) && empty($erreur_tel) && empty($erreur_ville) && empty($erreur_quartier) && empty($erreur_password) && empty($erreur_cpassword) && empty($erreur_photo) && empty($erreur_type_compte)) {
        if(!empty($succes_message)) {
            echo '<div id="success-message" class="alert alert-success text-center">' . $succes_message . '</div>';
        }
        if(!empty($erreur_message)) {
            echo '<div id="error-message" class="alert alert-danger text-center">' . $erreur_message . '</div>';
        }
    }
    ?>
</div>
<div class="col-md-12 col-sm-12">
   
   <form action="" method="post"  enctype="multipart/form-data">
       <div class="row">
      
<div class="col-md-4 col-sm-12 p-1">
<div class="card-box p-2 mb-3 text-center">
   <!-- Balise img pour afficher l'image par défaut -->
   <img src="https://www.pngfind.com/pngs/b/110-1102775_download-empty-profile-hd-png-download.png" id="profile-image" alt="Profile Avatar" style="cursor: pointer;">
   <h6 id="choose-image">Cliquez pour choisir une photo</h6>
   <!-- Input file caché pour le téléchargement de la nouvelle photo -->
   <input type="file" name="photo" value="<?php echo isset($_POST['photo']) ? htmlspecialchars($_POST['photo']) : ''; ?>"  id="upload-image"  style="display: none;" accept="image/*">
</div>
</div>
       <div class="col-md-8 col-sm-12 p-1">  
       
       <div class="card-box p-3 mb-3">
       <h6 class="text-uppercase text-success text-center ">Créer votre compte chez IMMO SCI </h6> 
       <div class="col-md-12 col-sm-12 mt-3 p-1">
       <div class="mb-3">
                    <input type="text" class="form-control py-3" value="<?php echo isset($_POST['nom']) ? htmlspecialchars($_POST['nom']) : ''; ?>" name="nom" placeholder="Veuillez entrer votre nom">
                    <?php if(isset($erreur_nom)): ?>
                        <small class="text-danger"><?=$erreur_nom?></small>
                    <?php endif; ?>
                </div>

            <div class="mb-3">
                <input type="text" class="form-control py-3" name="prenom" value="<?php echo isset($_POST['prenom']) ? htmlspecialchars($_POST['prenom']) : ''; ?>" placeholder="Veuillez entrer votre prénom">
                <?php if(isset($erreur_prenom)): ?>
                    <small class="text-danger"><?=$erreur_prenom?></small>
                <?php endif; ?>
            </div>



            <div class="mb-3">
                <input type="email" class="form-control py-3" placeholder="Veuillez entrer votre adresse email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" name="email">
                <?php if(isset($erreur_email)): ?>
                    <small class="text-danger"><?=$erreur_email?></small>
                <?php endif; ?>
            </div>

        <div class="mb-3">
            <input type="tel" id="phone" class="form-control py-3" placeholder="Veuillez entrer votre numéro de téléphone" name="tel" value="<?php echo isset($_POST['tel']) ? htmlspecialchars($_POST['tel']) : ''; ?>"><br>
            <?php if(isset($erreur_tel)): ?>
                <small class="text-danger"><?=$erreur_tel?></small>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <input type="text" class="form-control py-3" placeholder="Veuillez entrer votre ville" name="ville" value="<?php echo isset($_POST['ville']) ? htmlspecialchars($_POST['ville']) : ''; ?>">
            <?php if(isset($erreur_ville)): ?>
                <small class="text-danger"><?=$erreur_ville?></small>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <input type="text" class="form-control py-3" placeholder="Veuillez entrer votre quartier" name="quartier" value="<?php echo isset($_POST['quartier']) ? htmlspecialchars($_POST['quartier']) : ''; ?>">
            <?php if(isset($erreur_quartier)): ?>
                <small class="text-danger"><?=$erreur_quartier?></small>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <input type="password" id="cpassword" class="form-control py-3" placeholder="Veuillez entrer votre mot de passe" name="password" value="<?php echo isset($_POST['password']) ? htmlspecialchars($_POST['password']) : ''; ?>">
            <input type="checkbox" class="mt-2" onclick="togglePassword()"> Afficher mot de passe <br>
            <?php if(isset($erreur_password)): ?>
                <small class="text-danger"><?=$erreur_password?></small>
            <?php endif; ?>     
        </div>

        <div class="mb-3">
            <input type="password" id="ccpassword" class="form-control py-3" placeholder="Veuillez confirmer votre mot de passe" name="cpassword" value="<?php echo isset($_POST['cpassword']) ? htmlspecialchars($_POST['cpassword']) : ''; ?>">
            <input type="checkbox" class="mt-2" onclick="toggleCPassword()"> Afficher mot de passe <br>
            <?php if(isset($erreur_cpassword)): ?>
                <small class="text-danger"><?=$erreur_cpassword?></small>
            <?php endif; ?>     
        </div>

        <div class="mb-3">
            <select class="form-control" name="type_compte" style="cursor:pointer;">
            <option value="" disabled <?php if(!isset($_POST['type_compte'])) echo "selected"; ?>>Choisir une option</option>
            <option value="Agent Immobilier"<?php if(isset($_POST['type_compte']) && $_POST['type_compte'] == "Agent Immobilier") echo " selected"; ?>>Agent Immobilier</option>
            <option value="Proprietaire"<?php if(isset($_POST['type_compte']) && $_POST['type_compte'] == "Proprietaire") echo " selected"; ?>>Proprietaire</option>
            </select>
            <?php if(isset($erreur_type_compte)): ?>
                <small class="text-danger"><?=$erreur_type_compte?></small>
            <?php endif; ?>     
        </div>
               
             
               <div class="mb-4 mt-3">
                  
           <button type="submit" name="enregistrer" class="btn-add mb-2 btn btn-success btn-sm btn-responsive">Continuer <i class="bi bi-arrow-right-short fs-1 mr-2"></i></button>
           <a href="#" onclick="history.go(-1)" class="btn-add mb-2 btn btn-sm btn-responsive btn-danger">Annuler <i class="bi bi-x"></i></a>

       </div>
           </div>
           </div> 
           
       </div>
      
   </form>
</div>
</div>


</div>

                 
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script src="creation_compte.js"></script>
