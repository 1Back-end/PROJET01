<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="64x64" href="../image/logo.png">
    <title>
    <?php
        echo ucfirst(str_replace(".php", "", basename($_SERVER['PHP_SELF'])));
        ?> 
    </title> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/country-flag-icons/css/country-flag-icons.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <?php include_once("script_creation_compte.php");?>
	<!-- Custom CSS Link -->
	<link rel="stylesheet" href="style.css">
</head>
<body> 
  
		<div class="container mt-5 pb-5 ">
    <div class="col-sm-12 col-md-12">
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

			<div class="col-md-12 col-sm-12 card-box bg-white border-3  p-3 ">
				<form class="rounded  "  method="POST" enctype="multipart/form-data">
					<h3 class="text-dark fw-bolder fs-4 mb-2 text-center">Créer un compte</h3>

					<div class="fw-normal text-muted  mb-2 text-center">
                        Vous avez déjà un compte? <a href="../login/login.php" class="text-primary fw-bold text-decoration-none">Se connecter ici</a>
                                    </div>
                    <div class="row">

        <div class="col-md-6 col-sm-12">

                    <div class="mb-3">
                    <input type="text" class="form-control py-3"  name="nom" placeholder="Veuillez entrer votre nom">
                    <?php if(isset($erreur_nom)): ?>
                    <small class="text-danger"><?=$erreur_nom?></small>
                    <?php endif; ?>
                    </div>


                    <div class=" mb-3">
                    <input type="text" class="form-control py-3"  name="prenom" placeholder="Veuillez entrer votre prenom">
                    <?php if(isset($erreur_nom)): ?>
                    <small class="text-danger"><?=$erreur_nom?></small>
                    <?php endif; ?>
                    </div> 

					    <div class="mb-3">
						<input type="email" class="form-control py-3" placeholder="Veuillez entrer votre adress email" name="email">
            <?php if(isset($erreur_email)): ?>
           <small class="text-danger"><?=$erreur_email?></small>
            <?php endif; ?>
					  </div>

      <div class="mb-3 w-100">
      <input type="tel" id="phone" class="form-control py-3 " placeholder="Veuillez entrer votre numéro de téléphone" name="tel"><br>
      <?php if(isset($erreur_tel)): ?>
          <small class="text-danger"><?=$erreur_tel?></small>
      <?php endif; ?>
      <p id="error-msg" style="color: red; display: none;">Veuillez sélectionner le code pays correspondant.</p>

       </div>
                  
                    <div class="mb-3">
                    <input type="text" class="form-control py-3" placeholder="Veuillez entrer votre ville"  name="ville">
                    <?php if(isset($erreur_ville)): ?>
                   <small class="text-danger"><?=$erreur_ville?></small>
                   <?php endif; ?>
                    </div>
                   </div> 

                    <div class="col-md-6 col-sm-12">
                    <div class="mb-3">
                        <input type="text" class="form-control py-3"  placeholder="Veuillez entrer votre quartier" name="quartier">
                        <?php if(isset($erreur_quartier)): ?>
                        <small class="text-danger"><?=$erreur_quartier?></small>
                         <?php endif; ?>
                    </div> 

                    <div class="mb-3">
                        <input class="form-control py-3" type="file"  name="photo">
                        <?php if(isset($erreur_photo)): ?>
                        <small class="text-danger"><?=$erreur_photo?></small>
                        <?php endif; ?>
                    </div> 

					<div class="mb-3">
						<input type="password" id="cpassword" class="form-control py-3 " placeholder="Veuillez entrer votre mot de passe"  name="password">
            <input type="checkbox" class="mt-2" onclick="togglePassword()"> Afficher mot de passe <br>
            <?php if(isset($erreur_password)): ?>
            <small class="text-danger"><?=$erreur_password?></small>
            <?php endif; ?>     
					</div> 

          <div class="mb-3">
			<input type="password" id="ccpassword" class="form-control py-3" placeholder="Veuillez confirmer votre mot de passe"  name="cpassword">
            <input type="checkbox" class="mt-2" onclick="toggleCPassword()"> Afficher mot de passe <br>
            <?php if(isset($erreur_cpassword)): ?>
            <small class="text-danger"><?=$erreur_cpassword?></small>
            <?php endif; ?>     
					</div> 

          <div class="mb-3">
          <select class="form-select  py-3 font-12" name="type_compte" style="cursor:pointer;">
          <option></option>
          <option>Agent Immobilier</option>
          <option>Proprietaire</option>
        </select>
        <?php if(isset($erreur_type_compte)): ?>
        <small class="text-danger"><?=$erreur_type_compte?></small>
        <?php endif; ?>     
          </div>
          </div> 
       

        <div class="d-grid gap-2 d-md-block">
        <a href="../index.php" class="btn btn-danger">Annuler <i class="fas fa-times-circle"></i></a>
        <button id="submitBtn" class="btn btn-primary" type="submit" name="enregistrer" onclick="showLoader()">Continuer <i class="fas fa-arrow-right"></i></button>
       <!-- Ajouter un élément span pour le loader -->
      <span id="loader" style="display:none;"><i class="fas fa-spinner fa-spin"></i></span>

      </div>
				</form>
			</div>
		</div>

	</section>


  <script>
function showLoader() {
    // Cacher le bouton
    document.getElementById("submitBtn").style.display = "none";
    // Afficher le loader
    document.getElementById("loader").style.display = "inline-block";

    // Vous pouvez également soumettre le formulaire ici si nécessaire
    // document.getElementById("votreFormulaire").submit();
}
</script>


  <script>
    function togglePassword() {
        var passwordField = document.getElementById("cpassword");
        if (passwordField.type === "password") {
            passwordField.type = "text";
        } else {
            passwordField.type = "password";
        }
    }
    function toggleCPassword() {
        var passwordField = document.getElementById("ccpassword");
        if (passwordField.type === "password") {
            passwordField.type = "text";
        } else {
            passwordField.type = "password";
        }
    }
</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    var input = document.querySelector("#phone");
    var iti = window.intlTelInput(input, {
        initialCountry: "CM", // Définition du Cameroun comme pays initial
        separateDialCode: false, // Ne pas séparer le code de pays
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
        autoPlaceholder: "polite", // Ajouter un espace réservé automatiquement
        nationalMode: false, // Afficher le numéro complet sans le préfixe du pays
        allowDropdown: true, // Permettre à l'utilisateur de choisir un autre pays
        formatOnDisplay: true, // Formater le numéro lors de l'affichage
        autoHideDialCode: false, // Ne pas cacher le code de pays lorsqu'il est détecté automatiquement
        placeholderNumberType: "MOBILE", // Utiliser un espace réservé adapté aux numéros de téléphone mobile
    });

    // Préremplir le champ de saisie avec le préfixe du pays
    input.value = "+" + iti.getSelectedCountryData().dialCode;

    // Ajouter l'écouteur d'événement pour la vérification du numéro de téléphone lors de la saisie
    input.addEventListener("input", function() {
        var isValid = iti.isValidNumber();
        if (isValid) {
            input.classList.remove("error");
        } else {
            input.classList.add("error");
        }
    });
});
</script>


</body>
</html>


