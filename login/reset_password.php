

<?php include_once("script_reset_password.php");?>
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
	<!-- Bootstrap 5 CDN Link -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom CSS Link -->
	<link rel="stylesheet" href="style1.css">
</head>
<body> 
    <section class="wrapper">
		<div class="container mt-5">
		<div class="col-sm-8 col-sm-12 offset-sm-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 text-center">
		<?php if(!empty($error_message)): ?>
        <div class="alert alert-danger"><?php echo $error_message; ?></div>
    <?php endif; ?>
    <?php if(!empty($success_message)): ?>
        <div class="alert alert-success"><?php echo $success_message; ?> <a href="login.php">Cliquez ici</a> pour vous connecter.</div>
    <?php endif; ?>
	</div>

			<div class="col-sm-8 col-sm-12 offset-sm-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
				<form class="rounded bg-white shadow p-5" action="" method="POST">
					<h5 class="fw-bold fs-4 mb-2" style="color: #1F4284;" >réinitialiser votre mot de passe ?</h5>
<br>
						<?php
						// Récupérer l'ID de l'utilisateur depuis l'URL
						if (isset($_GET['id'])) {
							$user_id = $_GET['id'];
						} else {
							// Gérer la situation où l'ID n'est pas présent dans l'URL
							$user_id = "";
						}
						?>
					<div class="form-floating mb-3">
						<input type="password" class="form-control" id="floatingInput" name="password1">
						<label for="floatingInput">Entrer votre mot de passe</label>
					</div>  
					<div class="form-floating mb-3">
						<input type="password" class="form-control" id="floatingInput" name="password2">
						<label for="floatingInput">Confirmer votre mot de passe</label>
					</div>  
					<div class="form-floating mb-3">
						<input type="hidden" class="form-control"  name="user_id" value="<?php echo htmlspecialchars($user_id); ?>" id="floatingInput">
					</div>  
					<button type="submit"name="valider" style="background-color: #1F4284;" class=" mb-2 btn text-white submit_btn w-100 my-4">Soumettre</button> 
					<a href="forgot_password.php" class="btn btn-danger submit_btn w-100 my-4 mb-2">Annuler</a>
				</form>
			</div>
		</div>
	</section>
</body>
</html>

