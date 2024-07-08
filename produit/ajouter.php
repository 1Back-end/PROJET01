
<?php include_once("../include/menu.php");?>
<?php include_once("script_add.php");?>
<?php include_once("requete.php");?>
<link rel="stylesheet" href="../style.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places&callback=initMap" async defer></script>

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
 
   <h5 class="text-uppercase">PUBLIER UNE NOUVELLE PROPRIÉTÉ</h5>
   
 
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
                    <label for="region">Région</label>
                    <select name="region" id="region" class="form-control linked-select" data-target="#ville" data-source="villes.json">
                        <option disabled selected>Sélectionner une option</option>
                        <?php
                            $regions = json_decode(file_get_contents('regions.json'), true);
                            foreach ($regions as $region): ?>
                                <option value="<?= htmlspecialchars($region['id']) ?>"><?= htmlspecialchars($region['nom']) ?></option>
                            <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="ville">Ville</label>
                    <select name="ville" id="ville" class="form-control linked-select" data-target="#quartier" data-source="quartiers.json">
                        <option disabled selected>Sélectionner une option</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="quartier">Quartier</label>
                    <select name="quartier" id="quartier" class="form-control">
                        <option disabled selected>Sélectionner une option</option>
                    </select>
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
						<label for="type_logement">Type de logement</label>
						<select name="type_logement" class="form-control">
                            <option value="" disabled>Choisir une option</option>
                            <option value="Chambre Moderne"<?php if(isset($_POST['type_logement']) && $_POST['type_logement'] == "Chambre Moderne") echo " selected"; ?>>Chambre Moderne</option>
                            <option value="Studio Moderne"<?php if(isset($_POST['type_logement']) && $_POST['type_logement'] == "Studio Moderne") echo " selected"; ?>>Studio Moderne</option>
                            <option value="Appartement Moderne"<?php if(isset($_POST['type_logement']) && $_POST['type_logement'] == "Appartement Moderne") echo " selected"; ?>>Appartement Moderne</option>
                            <option value="Duplex"<?php if(isset($_POST['type_logement']) && $_POST['type_logement'] == "Duplex") echo " selected"; ?>>Duplex</option>
                        </select>
                        </div>
                    
                  

                        <div class="form-group">
                            <label for="prix">Prix de la location</label>
                            <input id="prix" type="text" class="form-control" value="<?php echo isset($_POST['prix']) ? htmlspecialchars($_POST['prix']) : ''; ?>" name="prix" min="0"  placeholder="150000">
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


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
        $(document).ready(function() {
            $('.linked-select').on('change', function() {
                var $this = $(this);
                var target = $this.data('target');
                var source = $this.data('source');
                var selectedValue = $this.val();

                if (target && source) {
                    $.getJSON(source, function(data) {
                        var options = '<option disabled selected>Sélectionner une option</option>';
                        var filteredData = data.filter(function(item) {
                            if (source === 'villes.json') {
                                return item.region_id == selectedValue;
                            } else if (source === 'quartiers.json') {
                                return item.ville_id == selectedValue;
                            }
                        });

                        $.each(filteredData, function(key, value) {
                            options += '<option value="' + value.id + '">' + value.nom + '</option>';
                        });
                        $(target).html(options);
                    });
                }
            });
        });
    </script>