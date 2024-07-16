
<link rel="icon" type="image/png" sizes="64x64" href="../image/logo.png">
    <title>IMMO INVESTMENT SCI</title> 
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
<link rel="stylesheet" href="style.css">
</head>
<body> 
<?php include_once("script_verification_compte.php");?>
<div class="container mt-5">
    
<?php
// Récupération des messages de l'URL
$message = isset($_GET['message']) ? urldecode($_GET['message']) : "";
$user_id = isset($_GET['user_id']) ? intval($_GET['user_id']) : 0;

?>

<div class="col-md-6 col-sm-12 mx-auto">
<?php if ($message): ?>
    <div class="alert alert-info text-center" role="alert">
        <?php echo $message; ?>
    </div>
<?php endif; ?>
</div>

<div class="col-md-6 col-sm-12 mx-auto">
<?php if (!empty($ErreurMessage)): ?>
            <div class="alert alert-danger text-center" role="alert">
                <?php echo $ErreurMessage; ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($SuccesMessage)): ?>
            <div class="alert alert-success text-center" role="alert">
                <?php echo $SuccesMessage; ?>
            </div>
        <?php endif; ?>
</div>


        <div class="col-md-6 mx-auto text-center col-sm-12">
            <form class="card-box p-4" action="" method="POST">
                <h5 class="fw-bolder fs-4 mb-3 text-center">Tapez votre code</h5>
                <div class="fw-normal text-muted mb-3">
                    Vous avez reçu un code par e-mail. Veuillez le saisir dans ces champs.
                </div>
                <div class="otp_input text-start mb-3">
                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                    <div class="d-flex align-items-center justify-content-between mt-2">
                        <input type="text" maxlength="1" onkeypress="return isNumberKey(event)" name="code1" class="w-10 shadow-none mx-2 text-center form-control font-14" placeholder="">
                        <input type="text" maxlength="1" onkeypress="return isNumberKey(event)" name="code2" class="w-10 shadow-none mx-2 text-center form-control font-14" placeholder="">
                        <input type="text" maxlength="1" onkeypress="return isNumberKey(event)" name="code3" class="w-10 shadow-none mx-2 text-center form-control font-14" placeholder="">
                        <input type="text" maxlength="1" onkeypress="return isNumberKey(event)" name="code4" class="w-10 shadow-none mx-2 text-center form-control font-14" placeholder="">
                        <input type="text" maxlength="1" onkeypress="return isNumberKey(event)" name="code5" class="w-10 shadow-none mx-2 text-center form-control font-14" placeholder="">
                        <input type="text" maxlength="1" onkeypress="return isNumberKey(event)" name="code6" class="w-10 shadow-none mx-2 text-center form-control font-14" placeholder="">
                    </div>
                </div>
               <div class="col-md-12">
                <button type="submit" name="submit" class="btn btn-dark btn-add text-white submit_btn my-4">Soumettre <i class="bi bi-box-arrow-in-right"></i></button>
               </div>
                <div class="col-md-12">
                <small class="text-muted"><a href="?resend_code=1&user_id=<?= isset($user_id) ? htmlspecialchars($user_id) : '' ?>">Vous n'avez pas reçu le code ?</a></small>
                </div>
            </form>
            
        </div>
        
    </div>

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
        $(document).ready(function() {
            // Cacher l'alerte après 2 secondes (2000 ms)
            setTimeout(function() {
                $(".alert").alert('close');
            }, 2000);
        });
</script>


</body>
</html>

