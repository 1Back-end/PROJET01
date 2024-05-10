

<?php include_once("script_forgot_password.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="64x64" href="../image/logo.png">
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
    <section class="wrapper">
		<div class="container-md mt-5">
    <div class="col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 col-xl-6 offset-xl-3 mx-auto">
      
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
<div class="row">
    <div class="col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 col-xl-6 offset-xl-3 mx-auto">
        <form class="rounded bg-white card-box py-5 px-3" action="" method="POST">
            <h6 class="fw-bolder fs-4 mb-2" style="color: #1F4284;">Mot de passe oublié ?</h6>

            <div class="fw-normal text-muted mb-4">
                Entrez votre e-mail pour réinitialiser votre mot de passe.
            </div>  

            <div class="form-floating mb-3">
                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="todo@example.com">
            
                <?php if(isset($error_mail)): ?>
                <small class="text-danger"><?=$error_mail?></small>
                <?php endif; ?>
            </div>  

            <div class="d-flex mt-4 justify-content-between">
                    <button type="button" class="mx-2 btn btn-add btn-sm text-white btn-responsive btn-danger float-start" onclick="goBack()">Annuler <i class="bi bi-x-square"></i></button>
                        <button type="submit" name="submit" class="mx-2 btn-sm btn btn-add text-white btn-responsive btn-primary float-end">Soumettre <i class="bi bi-arrow-right-circle"></i></button>
        </form>
    </div>
</div>

	</section>

  <script>
function goBack() {
    window.history.back();
}
</script>
</body>
</html>

