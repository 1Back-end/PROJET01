

<?php include_once("script_forgot_password.php");?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="64x64" href="../image/logo.png">
    <title>IMMO INVESTMENT SCI</title> 
	<!-- Bootstrap 5 CDN Link -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom CSS Link -->
	<link rel="stylesheet" href="style1.css">
</head>
<body> 
    <section class="wrapper">
		<div class="container-md mt-5">
    <div class="col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 text-center">
      
      <?php

    if(isset($_POST["submit"]) && empty($erreur_mail)) {
      if(!empty($error_message)) {
          echo '<div class="alert alert-danger text-center">' . $error_message . '</div>';
      }
      if(!empty($success_message)) {
          echo '<div class="alert alert-success text-center">' . $success_message . '</div>';
      }
    }
    ?>
</div>
			<div class="col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
				<form class="rounded bg-white shadow p-5" action="" method="POST">
					<h3 class="fw-bolder fs-4 mb-2" style="color: #1F4284;">Mot de passe oublié ?</h3>

					<div class="fw-normal text-muted mb-4">
					Entrez votre e-mail pour réinitialiser votre mot de passe.
					</div>  

					<div class="form-floating mb-3">
						<input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
						<label for="floatingInput">Adresse e-mail</label>
            <?php if(isset($error_mail)): ?>
            <small class="text-danger"><?=$error_mail?></small>
            <?php endif; ?>
					</div>  

					<button type="submit" name="submit" style="background-color: #1F4284;" class="btn text-white submit_btn w-100 my-4">Soumettre</button>
                  
				</form>
			</div>
		</div>
	</section>
</body>
</html>

