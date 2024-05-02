<?php include_once("script_connexion.php");?>
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
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom CSS Link -->
	<link rel="stylesheet" href="login.css">
    <style>
        /* Style pour le spinner */
        .spinner-border {
            display: none; /* Masquer le spinner par défaut */
        }
    </style>
</head>
<body>
    <section class="wrapper">
		<div class="container mt-5 pb-5">
            <div class="col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 text-center">
                <?php
                if (isset($_POST["connexion"])) {
                    if (!empty($MessageErreur)): ?>
                        <div id="errorMessage" class="alert alert-danger"><?php echo $MessageErreur; ?></div>
                        <div id="loader" class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                <?php
                    endif;
                }
                ?>
            </div>
            <div class="col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                <form id="loginForm" class="rounded bg-white shadow py-5 px-4" action="" method="POST" onsubmit="return validateForm(this)">
                    <h3 class="fw-bolder fs-4 mb-2 text-center" style="color: #1F4284;">Connectez-vous</h3>
                    <div class="fw-normal text-muted mb-4 text-center">Nouveau ici?
                        <a href="../utilisateurs/creation_compte.php" class="fw-bold text-decoration-none" style="color: #1F4284;">Créer un compte</a>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Adresse e-mail</label>
                        <?php if(isset($MessageErreurEmail)): ?>
                            <small class="text-danger"><?=$MessageErreurEmail?></small>
                        <?php endif; ?>
                    </div>
                    <div class="form-floating">
                        <input type="password" name="mpd" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Mot de passe</label>
                        <?php if(isset($MessageErreurMpd)): ?>
                            <small class="text-danger"><?=$MessageErreurMpd?></small>
                        <?php endif; ?><br>
                        <input type="checkbox" id="showPasswordCheckbox"> Afficher le mot de passe
           
                    </div>
                    <div class="mt-2 text-end">
                        <a href="forgot_password.php" class="fw-bold text-decoration-none" style="color: #1F4284;">Mot de passe oublié?</a>
                    </div>
                    <!-- Bouton de connexion avec le spinner -->
                    <button type="submit" name="connexion" id="connexionButton" style="background-color: #1F4284;" class="btn text-white  submit_btn w-100 my-4">
                        Se Connecter <i class="fas fa-sign-in-alt"></i>
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- JavaScript pour afficher le spinner et désactiver le bouton après la soumission du formulaire -->
    <script>
    function validateForm(form) {
        var button = form.querySelector('#connexionButton');
        var loader = button.querySelector('.spinner-border');
        var errorMessage = form.querySelector('#errorMessage');

        // Afficher le loader
        loader.style.display = 'inline-block';
        // Cacher le message d'erreur
        errorMessage.style.display = 'none';

        // Attendre 30 minutes avant d'afficher les messages d'erreur
        var timer = setTimeout(function() {
            // Afficher les messages d'erreur sur chaque champ
            var inputs = form.querySelectorAll('.form-control');
            inputs.forEach(function(input) {
                if (input.nextElementSibling && input.nextElementSibling.classList.contains('text-danger')) {
                    input.nextElementSibling.style.display = 'inline-block';
                }
            });

            // Vérifier si les informations sont correctes
            var errorMessage = form.querySelector('.alert-danger');
            if (errorMessage) {
                // Afficher le message d'erreur
                errorMessage.style.display = 'block';
            } else {
                // Soumettre le formulaire
                form.submit();
            }

            // Cacher le loader après un certain délai (par exemple, 2 secondes supplémentaires)
            setTimeout(function() {
                loader.style.display = 'none';
            }, 2000);
        }, 30 * 60 * 1000); // Attendre 30 minutes avant d'afficher les messages d'erreur (30 minutes * 60 secondes * 1000 millisecondes)

        // Cacher le loader après un certain délai (30 minutes)
        setTimeout(function() {
            loader.style.display = 'none';
            clearTimeout(timer); // Arrêter le délai pour afficher les messages d'erreur
        }, 9000); // Attendre 30 minutes avant de cacher le loader

        // Empêcher la soumission du formulaire par défaut
        return false;
    }
</script>
<script>
    document.getElementById('showPasswordCheckbox').addEventListener('change', function() {
        const passwordInput = document.getElementById('floatingPassword');

        if (this.checked) {
            passwordInput.type = 'text';
        } else {
            passwordInput.type = 'password';
        }
    });
</script>

</body>
</html>
