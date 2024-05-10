

<?php include_once("script_reset_password.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>
	<?php
    echo strtoupper(str_replace(".php", "", basename($_SERVER['PHP_SELF'])));
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

		<div class="container mt-5 pb-5">

		<div class="col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 col-xl-6 offset-xl-3 mx-auto">
			<?php if(!empty($error_message)): ?>
			<div class="alert alert-danger"><?php echo $error_message; ?></div>
		<?php endif; ?>
		<?php if(!empty($success_message)): ?>
			<div class="alert alert-success"><?php echo $success_message; ?> <a href="login.php">Cliquez ici</a> pour vous connecter.</div>
		<?php endif; ?>
		</div>

			<div class="col-sm-8 offset-sm-2 p-2  col-lg-6 offset-lg-3 col-xl-6 offset-xl-3 mx-auto">
				<form class="rounded bg-white card-box py-5 px-3" action="" method="POST">
					<h5 class="fw-bold fs-4 mb-2" style="color: #1F4284;" >Réinitialisation du mot de passe</h5>
					<div class="fw-normal text-muted mb-4">
					Entrez votre nouveau mot de passe et sa confirmation pour entamer la réinitialisation.
            </div>  
						<?php
						// Récupérer l'ID de l'utilisateur depuis l'URL
						if (isset($_GET['id'])) {
							$user_id = $_GET['id'];
						} else {
							// Gérer la situation où l'ID n'est pas présent dans l'URL
							$user_id = "";
						}
						?>
					<div class="mb-3">
						<input type="password" class="form-control" id="password1" name="password1" placeholder="Veuillez entrer votre mot de passe">
					</div>  
					<div class="mb-3">
						<input type="password" class="form-control" id="password2" name="password2" placeholder="Veuillez confirmer votre mot de passe">
					</div>  

					<div class="form-check mb-1 form-check-inline">
					<input type="checkbox" id="togglePassword" onchange="toggleCPassword(this)"  class="form-check-input">
					<label for="showPassword" class="form-check-label font-14">Afficher le mot de passe</label>
				</div>


					<div class="form-floating mb-3">
						<input type="hidden" class="form-control"  name="user_id" value="<?php echo htmlspecialchars($user_id); ?>" id="floatingInput">
					</div> 

					<div class="d-flex mt-4 justify-content-between">
                    <button type="button" class="mx-2 btn btn-add btn-sm text-white btn-responsive btn-danger float-start" onclick="goBack()">Annuler <i class="bi bi-x-square"></i></button>
                        <button type="submit" name="connexion" class="mx-2 btn-sm btn btn-add text-white btn-responsive btn-primary float-end">Soumettre <i class="bi bi-arrow-right-circle"></i></button>
            </div>

				</form>
			</div>
		</div>
	
	<script>
function toggleCPassword(checkbox) {
    var passwordInputs = document.querySelectorAll('input[type="password"]');
  
    passwordInputs.forEach(function(input) {
        if (checkbox.checked) {
            input.type = 'text';
        } else {
            input.type = 'password';
        }
    });
}


</script>

<script>
function goBack() {
    window.history.back();
}
</script>
</body>
</html>

