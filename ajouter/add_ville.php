
<?php include_once("../include/menu.php");?>
<?php include_once("script_add.php");?>
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



<?php
include_once("../database/db.php");
try {
    $stmt = $connexion->query('SELECT nom FROM regions');
    $regions = $stmt->fetchAll();
} catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage();
}
?>

<div class="main-container mt-3 pb-5">
<div class="col-md-12 col-sm-12 ">
  
  <div class="card-box p-3 mb-3 text-center lign-items-center">
 
   <h5 class="text-uppercase">ENREGISTRER UNE NOUVELE VILLE</h5>
   
 
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
           
            <form method="post" enctype="multipart/form-data">
                <div class="row">

                <div class="col-md-12 col-sm-12">

                <div class="form-group">
                    <label for="region">Région</label>
                    <select name="region" id="regions" class="form-control">
                        <option disabled selected>Sélectionner une option</option>
                        <?php foreach ($regions as $region): ?>
                    <option value="<?php echo htmlspecialchars($region['nom']); ?>">
                        <?php echo htmlspecialchars($region['region_id']); ?>
                    </option>
                <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="ville">Ville</label>
                    
                    <input type="text" class="form-control" name="ville"   placeholder="Yaoundé" required>

                </div>
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


<script>
        $(document).ready(function() {
            // Chargement des villes en fonction de la région sélectionnée
            $('#regions').change(function() {
                var regionId = $(this).val();

                $.ajax({
                    url: 'get_villes.php',
                    type: 'GET',
                    data: { region_id: regionId },
                    success: function(data) {
                        var villes = JSON.parse(data);
                        $('#villes').empty().append('<option disabled selected>Sélectionner une option</option>');

                        if (villes.error) {
                            alert(villes.error);
                        } else {
                            villes.forEach(function(ville) {
                                $('#villes').append('<option value="' + ville.id + '">' + ville.nom + '</option>');
                            });
                        }
                    }
                });
            });

            // Chargement des quartiers en fonction de la ville sélectionnée
            $('#villes').change(function() {
                var villeId = $(this).val();

                $.ajax({
                    url: 'get_quartiers.php',
                    type: 'GET',
                    data: { ville_id: villeId },
                    success: function(data) {
                        var quartiers = JSON.parse(data);
                        $('#quartiers').empty().append('<option disabled selected>Sélectionner une option</option>');

                        if (quartiers.error) {
                            alert(quartiers.error);
                        } else {
                            quartiers.forEach(function(quartier) {
                                $('#quartiers').append('<option value="' + quartier.id + '">' + quartier.nom + '</option>');
                            });
                        }
                    }
                });
            });
        });
    </script>