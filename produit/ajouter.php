
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

<div class="main-container mt-3 pb-5">
<div class="col-md-12 col-sm-12 ">
  
  <div class="card-box p-3 mb-3 text-center lign-items-center">
 
   <h5 class="text-uppercase">PUBLIER UN NOUVEAU PRODUIT</h5>
   
 
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
							<input type="text" id="searchRegions" value="<?php echo isset($_POST['region']) ? htmlspecialchars($_POST['region']) : ''; ?>" class="form-control" placeholder="Sud" name="region">
						    <div id="typeRegionsSuggestions" class="list-group-shadow"></div>
                        </div>
                    


                            <div class="form-group">
                            <label for="ville">Ville</label>
                            <input type="text" id="searchVille" autocomplete="off" class="form-control" value="<?php echo isset($_POST['ville']) ? htmlspecialchars($_POST['ville']) : ''; ?>" placeholder="Yaoundé" name="ville">
                            <div id="villeSuggestions" class="list-group"></div>
                        </div>

                    
                   
                        <div class="form-group">
                            <label for="departement">Département</label>
                            <input type="text" id="searchDepartements" value="<?php echo isset($_POST['departement']) ? htmlspecialchars($_POST['departement']) : ''; ?>" class="form-control" placeholder="Mfoundi" name="departement">
						    <div id="typeDepartmentsSuggestions" class="list-group"></div>
                        </div>
                    
					
                        <div class="form-group">
                            <label for="arrondissement">Arrondissement</label>
							<input type="text" id="searchArrondissement" class="form-control" value="<?php echo isset($_POST['departement']) ? htmlspecialchars($_POST['departement']) : ''; ?>" placeholder="Bafia" name="arrondissement">
						    <div id="arrondissementsSuggestions" class="list-group"></div>
                        </div>
                        
                       
                        <div class="form-group">
                            <label for="quartier">Quartier</label>
                            <input id="quartier" class="form-control" type="text" name="quartier" value="<?php echo isset($_POST['quartier']) ? htmlspecialchars($_POST['quartier']) : ''; ?>"  placeholder="Mbankolo">
                        </div>
                        </div>
               


                        <div class="col-md-6 col-sm-12">
                        <div class="form-group">
						<label for="type_logement">Type de Produit</label>
						<select name="type_logement" class="form-control" id="type_logement">
                            <option value="Choisir" selected>Choisir une option</option>
                            <option value="Chambre Moderne"<?php if(isset($_POST['type_logement']) && $_POST['type_logement'] == "Chambre Moderne") echo " selected"; ?>>Chambre Moderne</option>
                            <option value="Studio Moderne"<?php if(isset($_POST['type_logement']) && $_POST['type_logement'] == "Studio Moderne") echo " selected"; ?>>Studio Moderne</option>
                            <option value="Appartement Moderne"<?php if(isset($_POST['type_logement']) && $_POST['type_logement'] == "Appartement Moderne") echo " selected"; ?>>Appartement</option>
                            <option value="Duplex"<?php if(isset($_POST['type_logement']) && $_POST['type_logement'] == "Duplex") echo " selected"; ?>>Duplex</option>
                            <option value="Maison"<?php if(isset($_POST['type_logement']) && $_POST['type_logement'] == "Maison") echo " selected"; ?>>Maison</option>
                            <option value="Immeuble"<?php if(isset($_POST['type_logement']) && $_POST['type_logement'] == "Immeuble") echo " selected"; ?>>Immeuble</option>
                            <option value="Villa"<?php if(isset($_POST['type_logement']) && $_POST['type_logement'] == "Villa") echo " selected"; ?>>Villa</option>
                            <option value="Terrain"<?php if(isset($_POST['type_logement']) && $_POST['type_logement'] == "Terrain") echo " selected"; ?>>Terrain</option>
                        </select>
                        </div>
                    
                  

                        <div class="form-group">
                            <label for="prix">Prix (Veillez préciser " / Mois" pour les produits à louer et " / Mêtre Carré" pour les terrains)</label>
                            <input id="prix" type="text" class="form-control" value="<?php echo isset($_POST['prix']) ? htmlspecialchars($_POST['prix']) : ''; ?>" name="prix" min="0"  placeholder="eg: 150000/ Mois">
                        </div>
                  

                    
                        <div class="form-group">
                            <label for="prix">Prix à l'adresse de destination</label>
                            <input type="number" min="0" class="form-control" name="distance" value="<?php echo isset($_POST['distance']) ? htmlspecialchars($_POST['distance']) : ''; ?>"  placeholder="200">
                        </div>
                

                        <div class="form-group">
                            <label for="prix">Nombre de kilomètres par rapport à la route </label>
                            <input type="text" class="form-control" name="destination" value="<?php echo isset($_POST['destination']) ? htmlspecialchars($_POST['destination']) : ''; ?>" placeholder="2 Km">
                        </div>
                   
                   
                        <div class="form-group">
                            <label for="photo">Image (04 chambre moderne , 06 studios moderne , 08 appartements , 12 duplex)</label>
                            <input type="file" class="form-control" name="photo[]" multiple>
                        </div>

                        <div class="form-group" id="statut_Louer">
						<label for="type_logement">Statut</label>
						<select name="statut_Louer" class="form-control">
                            <option value="" selected>Choisir une option</option>
                            <option value="A Louer"<?php if(isset($_POST['statut_Louer']) && $_POST['statut_Louer'] == "A Louer") echo " selected"; ?>>A Louer</option>
                            <option value="A Vendre"<?php if(isset($_POST['statut_Louer']) && $_POST['statut_Louer'] == "A Vendre") echo " selected"; ?>>A Vendre</option>
                        </select>
                        </div>
               
                        </div>
                
                        <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea id="description" class="form-control" name="description"   placeholder="Lorem ipsum dolor sit amet consectetur adipisicing elit."><?php echo isset($_POST['description']) ? htmlspecialchars($_POST['description']) : ''; ?></textarea>
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


 