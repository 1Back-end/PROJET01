
<?php include_once("../include/menu.php");?>
<link rel="stylesheet" href="../style.css">


<div class="main-container">
    <div class="col-md-12 col-sm-12">
    <div class="error-page d-flex align-items-center flex-wrap justify-content-center pd-20">
		<div class="pd-10">
			<div class="error-page-wrap text-center">
            <h1>404</h1>
            <h3>Erreur : 404 Page non trouvée</h3>
            <p>Désolé, Vous n'avez pas accès à cette page.</p>
            <div class="pt-20 mx-auto max-width-200">
            <a href="javascript:void(0);" onclick="goBack();" class="btn btn-add btn-primary btn-block btn-lg">Retour</a>
            </div>

			</div>
		</div>
	</div>
    </div>
</div>

<script>
    // Fonction pour revenir à la page précédente
    function goBack() {
        window.history.back();
    }
</script>