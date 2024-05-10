

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="64x64" href="../image/logo.png">
  
    <title>IMMO INVESTMENT SCI</title> 
	<!-- Bootstrap 5 CDN Link -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">


	</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="../vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="../package/img/logo.png">
	<link rel="icon" type="image/png" sizes="16x16" href="../package/img/logo.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	<link rel="stylesheet" type="text/css" href="../vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="../vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="../vendors/styles/style.css">
	<link rel="stylesheet" type="text/css" href="../style.css">
	
</head>
<body> 
<?php include_once("script_verification_compte.php");?>
    <section class="wrapper">
		<div class="container mt-5">
       
        <div class="col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 col-xl-6 offset-xl-3 text-center">
        <?php
if(isset($_POST["submit"])) {
    if(!empty($SuccesMessage)) {
        echo '<div id="successMessage" class="alert alert-success text-center">' . $SuccesMessage . '</div>';
    }
    if(!empty($ErreurMessage)) {
        echo '<div id="errorMessage" class="alert alert-danger text-center">' . $ErreurMessage. '</div>';
    }
}
?>
         
		</div>
			<div class="col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 col-xl-6 offset-xl-3 text-center">
				
				<form class="rounded bg-white card-box p-5" action="" method="POST">
					<h6 class="text-success fw-bolder fs-4 mb-2">Activation du compte</h6>

					<div class="fw-normal text-muted mb-4">
                    Entrez le code de vérification que nous avons envoyé à
					</div>  
                    <?php
        // Récupérer le user_id depuis l'URL
        if (isset($_GET['user_id'])) {
            $user_id = $_GET['user_id'];
        } else {
            // Si user_id n'est pas présent dans l'URL, vous pouvez définir une valeur par défaut ou gérer cette situation selon votre logique
            $user_id = "";
        }
        ?>
        <!-- Champ input pour le user_id -->
                   <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($user_id); ?>" readonly/>
                    <div class="d-flex align-items-center justify-content-center fw-bold mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-asterisk" viewBox="0 0 16 16">
                            <path d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z"/>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-asterisk" viewBox="0 0 16 16">
                            <path d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z"/>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-asterisk" viewBox="0 0 16 16">
                            <path d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z"/>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-asterisk" viewBox="0 0 16 16">
                            <path d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z"/>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-asterisk" viewBox="0 0 16 16">
                            <path d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z"/>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-asterisk" viewBox="0 0 16 16">
                            <path d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z"/>
                        </svg>
                        <span>8459</span>
                    </div>

					<div class="otp_input text-start mb-2">
                        <label for="digit">Tapez votre code de sécurité à 6 chiffres</label>
						<div class="d-flex  align-items-center justify-content-between mt-2">
                            <input type="text" maxlength="1" onkeypress="return isNumberKey(event)" name="code1" class="mx-2 text-center form-control font-14 " placeholder="">
                            <input type="text" maxlength="1" onkeypress="return isNumberKey(event)" name="code2" class="mx-2 text-center form-control font-14" placeholder="">
                            <input type="text" maxlength="1" onkeypress="return isNumberKey(event)" name="code3" class="mx-2 text-center form-control font-14" placeholder="">
                            <input type="text" maxlength="1" onkeypress="return isNumberKey(event)" name="code4" class="mx-2 text-center form-control font-14" placeholder="">
                            <input type="text" maxlength="1" onkeypress="return isNumberKey(event)"   name="code5" class="mx-2 text-center form-control font-14" placeholder="">
                            <input type="text" maxlength="1" onkeypress="return isNumberKey(event)" name="code6" class="mx-2 text-center form-control font-14" placeholder="">
                        </div> 
                       
					</div>  

					<button type="submit" name="submit" class="btn btn-add btn-primary submit_btn my-4">Soumettre</button> 
				</form>
			</div>
		</div>
	</section>
    <script>
        // Récupération de tous les champs de saisie
var inputs = document.querySelectorAll('input[type="text"]');

// Ajout d'un gestionnaire d'événement sur chaque champ de saisie
inputs.forEach(function(input, index) {
    input.addEventListener('input', function(event) {
        var value = event.target.value;
        // Si la valeur saisie est un chiffre et que la longueur est égale à 1
        if (/^\d$/.test(value) && value.length === 1) {
            // Déplacer le curseur vers le champ suivant, s'il existe
            var nextIndex = index + 1;
            if (nextIndex < inputs.length) {
                inputs[nextIndex].focus();
            }
        } else if (value.length === 0) { // Si la valeur est vide (effacement)
            // Déplacer le curseur vers le champ précédent, s'il existe
            var previousIndex = index - 1;
            if (previousIndex >= 0) {
                inputs[previousIndex].focus();
            }
        }
    });
});

// Gestion de la navigation avec les touches de suppression et de retour en arrière
inputs.forEach(function(input, index) {
    input.addEventListener('keydown', function(event) {
        if (event.key === 'Backspace') { // Si la touche pressée est Backspace
            // Si le champ est vide et qu'il a un champ précédent, déplacer le curseur vers ce champ
            if (input.value.length === 0 && index > 0) {
                inputs[index - 1].focus();
            } else if (index === inputs.length - 1 && input.selectionStart === 0 && input.selectionEnd === 0) {
                // Si le champ est le dernier et le curseur est au début, déplacer le curseur vers le champ précédent
                inputs[index - 1].focus();
            }
        } else if (event.key === 'Delete') { // Si la touche pressée est Delete
            // Si le champ est vide et qu'il a un champ suivant, déplacer le curseur vers ce champ
            if (input.value.length === 0 && index < inputs.length - 1) {
                inputs[index + 1].focus();
            }
        }
    });
});
function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

    </script>


<script>
    // Masquer les messages après 2 secondes
    setTimeout(function(){
        document.getElementById('errorMessage').style.display = 'none';
    }, 2000);
</script>
</body>
</html>

