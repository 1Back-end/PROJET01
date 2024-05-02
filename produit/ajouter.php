
<?php include_once("../include/menu.php");?>
<?php include_once("script_add.php");?>
<link rel="stylesheet" href="../style.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
    /* Ajouter une ombre à la liste de groupe */
    .list-group-shadow {
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
      border: none; /* Supprimer la bordure */
    }
.form-control::placeholder {
color: var(--bs-secondary-color);
opacity: 1;
font-size: 12px;
}


  </style>

<div class="main-container  pb-5">
    <div class="pd-ltr-10 xs-pd-5-5 p-2">
	<div class="col-md-12 col-sm-12">
        <div class="pd-10 card-box mb-3 p-3">
            <h4 class="text-center">PUBLIER UNE NOUVELLE PROPRIÉTÉ</h4>
        </div>
		</div>


		<!-- Structure HTML pour le conteneur des alertes -->
		<div class="col-md-12 col-sm-12">
    <?php 
        if(isset($_POST["enregistrer"])) {
            if(!empty($successMessage)) {
                echo '<div class="alert alert-success text-center">' . $successMessage . '<button type="button" class="close" onclick="closeMessage(this)">&times;</button></div>';
            } else if(!empty($errorMessage )) {
                echo '<div class="alert alert-danger text-center">' . $errorMessage . '<button type="button" class="close" onclick="closeMessage(this)">&times;</button></div>';
            }
        }
    ?>
</div>




<div class="col-md-12 col-sm-12">
        <div class="pd-20 card-box mb-3 ">
           
            <form id="studentForm" method="POST" enctype="multipart/form-data">
                <div class="row">

                <div class="col-md-6 col-sm-12">
				
                        <div class="form-group">
                            <label for="region">Region</label>
							<input type="text" id="searchRegions" class="form-control" placeholder="Sud" name="region">
						    <div id="typeRegionsSuggestions" class="list-group-shadow"></div>
                        </div>
                    


                            <div class="form-group">
                            <label for="ville">Ville</label>
                            <input type="text" id="searchVille" autocomplete="off" class="form-control" placeholder="Yaoundé" name="ville">
                            <div id="villeSuggestions" class="list-group"></div>
                        </div>

                    
                   
                        <div class="form-group">
                            <label for="departement">Département</label>
                            <input type="text" id="searchDepartements" class="form-control" placeholder="Mfoundi" name="departement">
						    <div id="typeDepartmentsSuggestions" class="list-group"></div>
                        </div>
                    
					
                        <div class="form-group">
                            <label for="arrondissement">Arrondissement</label>
							<input type="text" id="searchArrondissement" class="form-control" placeholder="Bafia" name="arrondissement">
						    <div id="arrondissementsSuggestions" class="list-group"></div>
                        </div>
                        
                       
                        <div class="form-group">
                            <label for="quartier">Quartier</label>
                            <input id="quartier" class="form-control" type="text" name="quartier"  placeholder="Mbankolo">
                        </div>
                        </div>
               


                        <div class="col-md-6 col-sm-12">
                        <div class="form-group">
						<label for="type_logement">Type de logement</label>
						<input type="text" id="searchInput" class="form-control" placeholder="Appartement Moderne..." name="type_logement">
						<div id="typeLogementSuggestions" class="list-group"></div>
                        </div>
                    
                  

                        <div class="form-group">
                            <label for="prix">Prix de la location</label>
                            <input id="prix" type="text" class="form-control" name="prix" min="0"  placeholder="150000 / Mois">
                        </div>
                  

                    
                        <div class="form-group">
                            <label for="prix">Prix à l'adresse de destination</label>
                            <input type="number" min="0" class="form-control" name="distance"  placeholder="200">
                        </div>
                

                        <div class="form-group">
                            <label for="prix">Nombre de kilomètres par rapport à la route </label>
                            <input type="text" class="form-control" name="destination" placeholder="2 Km">
                        </div>
                   
                   
                        <div class="form-group">
                            <label for="photo">Image (04 chambre moderne , 06 studios moderne , 08 appartements , 12 duplex)</label>
                            <input type="file" class="form-control" name="photo[]" multiple>
                        </div>
               
                        </div>
                
                        <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea id="description" class="form-control" name="description"  placeholder="Lorem ipsum dolor sit amet consectetur adipisicing elit."></textarea>
                        </div>
                  
</div>
                    <div class="d-grid gap-2 col-md-12 d-md-flex justify-content-md-center w-100">
                        <button type="submit" name="enregistrer" class="btn btn-add btn-responsive  btn-dark text-center "><i class="bi bi-floppy"></i> Enregistrer</button>
                    </div>
			
                </div>
            </form>
        </div>
    </div>
	</div>
	

</div>


 </div>
</div>

<script src="script.js"></script>
<script>
    // Fonction pour fermer le message d'alerte
    function closeMessage(element) {
        element.parentNode.remove(); // Supprimer l'élément parent du bouton de fermeture
    }
</script>


 