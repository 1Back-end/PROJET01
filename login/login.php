<?php include_once("script_connexion.php");?>
	<title>
	<?php
        echo ucfirst(str_replace(".php", "", basename($_SERVER['PHP_SELF'])));
    ?>
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
   
		<div class="container mt-5 pb-5 p-2">
        <div class="col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 col-xl-6 offset-xl-3 mx-auto">
        <?php
                // Vérifiez si tous les champs du formulaire sont remplis
                if (isset($_POST["connexion"]) && isset($MessageErreur) && !empty($_POST["email"]) && !empty($_POST["mpd"])) {
                ?>
                    <div class="alert alert-danger  text-center">
                        <?php echo $MessageErreur; ?>
                    </div>
                <?php
                }
                ?>
                 </div>
			<div class="col-sm-8 offset-sm-2 col-lg-6 p-1 offset-lg-3 col-xl-6 offset-xl-3 mx-auto">
				<form class="rounded bg-white card-box py-5 px-3" action="" method="post">
                <h4 class="text-center fw-bold  mb-3 text-uppercase text-success">Connectez-vous à IMMO INVESTMENT SCI</h4>
					<div class=" text-center fw-normal text-muted mb-4"> Nouveau ici?
						<a href="../utilisateurs/creation_compte.php" class="text-primary fw-bold text-decoration-none">Créer un compte</a>
					</div>
					<div class="mb-3">
                        <input type="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>"  name="email" class="form-control mx-auto" id="floatingInput" placeholder="Votre adresse email ou nom d'utilisateur">
                        <?php if(isset($MessageErreurEmail)): ?>
                            <small class="text-danger"><?= $MessageErreurEmail?></small>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <input type="password" value="<?php echo isset($_POST['password']) ? htmlspecialchars($_POST['password']) : ''; ?>" name="mpd" class="form-control mx-auto" id="floatingPassword" placeholder="Votre mot de passe">
                        <?php if(isset($MessageErreurMpd)): ?>
                            <small class="text-danger"><?=$MessageErreurMpd?></small>
                        <?php endif; ?>
                    </div>
                    <div class="mt-2 d-flex flex-column flex-sm-row align-items-sm-center justify-content-sm-between">
                    <div class="form-check form-check-inline">
                    <input type="checkbox" id="showPassword" class="form-check-input">
                    <label for="showPassword" class="form-check-label">Afficher le mot de passe</label>
                </div>

                    <a href="forgot_password.php" class="text-primary text-decoration-none mt-2 mt-sm-0">Mot de passe oublié ?</a>
                </div>



					
                <div class="d-flex mt-4 justify-content-between">
                    <button type="button" class="mx-2 btn btn-add btn-sm text-white btn-responsive btn-danger float-start" onclick="goBack()">Annuler <i class="bi bi-x-square"></i></button>
                        <button type="submit" name="connexion" class="mx-2 btn-sm btn btn-add text-white btn-responsive btn-primary float-end">Se connecter <i class="bi bi-arrow-right-circle"></i></button>
         
            
                        </div><br>

<a href="../index.php" class="text-primary text-decoration-none mt-2 mt-sm-2">Retour à l'acceuil</a>
</div>
        </div>

				</form>
			</div>
		</div>

    <script>
function goBack() {
    window.history.back();
}
</script>

<script>
document.getElementById('showPassword').addEventListener('change', function() {
    var passwordInput = document.getElementById('floatingPassword');
    if (this.checked) {
        passwordInput.type = 'text';
    } else {
        passwordInput.type = 'password';
    }
});
</script>
</body>
</html>

