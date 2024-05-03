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
</div>
    <div class=" align-items-center justify-content-center">
    <div class="container mt-3 p-2">
        <div class="align-items-center">
                <div class="login-box bg-white box-shadow border-radius-10">
                    <div class="login-title">
                    <h5 class="text-center text-dark text-uppercase">Connectez-vous à IMMO SCI</h5>
                                    <?php
                // Vérifiez si tous les champs du formulaire sont remplis
                if (isset($_POST["connexion"]) && isset($MessageErreur) && !empty($_POST["email"]) && !empty($_POST["mpd"])) {
                ?>
                    <div class="text-danger text-center">
                        <?php echo $MessageErreur; ?>
                    </div>
                <?php
                }
                ?>

                </div>
                <form method="POST" action=""> 
                        <!-- Ajout de l'attribut action -->
                            <div class="form-group">
                            <label>Adresse Email</label>
                            <input type="email" class="form-control" name="email" placeholder="todo@gmail.com">
                                <?php if(isset($MessageErreurEmail)): ?>
                                    <small class="text-danger"><?= $MessageErreurEmail?></small>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                            <label>Mot de passe</label>
                            <input type="password" class="form-control" name="mpd" placeholder="*********">
                                <?php if(isset($MessageErreurMpd)): ?>
                                    <small class="text-danger"><?=$MessageErreurMpd?></small>
                                <?php endif; ?>
                            </div>
                <div class="row pb-30">
                    <div class="col-6">
                        <div class="forgot-password"><a href="forgot_password.php"><label for="">Mot de passe oublié</label></a></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <input class="btn btn-dark btn-add btn-lg btn-block" name="connexion" type="submit" value="Se connecter">
                        <div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">OU</div>
                        <a class="btn btn-success btn-add btn-lg btn-block" href="../utilisateurs/creation_compte.php">Créer un compte</a>
                    </div></br>
                    <div class="col-6">
                        <div class="back"><a href="../index.php"><label for="">Retour à l'acceuil</label></a></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    </div>
</div>
