<?php
include_once("../include/menu.php"); 
include_once("../database/db.php");


// Requête SQL pour récupérer les produits publiés par l'utilisateur connecté
$sql = "SELECT * FROM quartiers";

// Préparer la requête SQL avec la clause WHERE et la pagination
$stmt = $connexion->prepare($sql);
$stmt->bindValue(':itemsPerPage', $itemsPerPage, PDO::PARAM_INT);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<link rel="stylesheet" href="../style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<div class="main-container">
<div class="col-md-12 col-sm-12 ">
  
  <div class="card-box p-3 mb-3 d-flex justify-content-between align-items-center">
   <div class="mr-auto">
   <h5 class="text-uppercase">LISTE DE QUARTIERS</h5>
   </div>
     <div class="ml-auto">
     <a href="../ajouter/add_quartier.php" class="btn btn-dark btn-add btn-sm mt-2 mt-sm-0 order-sm-2"><i class="bi bi-plus-circle mr-2"></i>AJOUTER</a>
     </div>
  </div>
</div>

   
    <?php // Vérifier s'il existe des produits à afficher
    if (empty($result)) {
        echo "<div class='col-md-12 col-sm-12'><div class='alert alert-success text-center' role='alert'>Vous n'avez aucun quartier enregistré.</div></div>";
    } else {
    ?>
    <div class="col-md-12 col-sm-12">
        <div class="pd-20 card-box mb-3 w-100">
            <div class="table-responsive">
                <table class="table table-bordered text-center table-striped table-hover">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">Ville</th>
                            <th scope="col">Quartier</th>
                            <th colspan="3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($result as $row): ?>
                            <tr>
                                <td><?php echo $row['ville_id']; ?></td>
                                <td><?php echo $row['nom']; ?></td>
                              
                                <td>
                                <div class="d-flex justify-content-center justify-content-md-center">
                                <a class="btn btn-info btn-sm disabled btn-xs mx-2" href='../produit/modifier.php?id=<?php echo $row['id']; ?>'>Modifier</a>
                                

                                    </div>
                                </td>
                               

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php } ?>

</div>
