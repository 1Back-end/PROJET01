<?php include_once("../include/menu.php");?>
<?php include_once("../database/db.php"); ?>
<?php include_once("script_commentaire.php"); ?>
<link rel="stylesheet" href="../style.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
<link href='https://unpkg.com/boxicons@2.1.4/dist/boxicons.js' rel='stylesheet'>
<?php 
$id_chambre = $_GET["id_chambre"];?>
<div class="main-container pb-5">
<div class="col-md-12 col-sm-12">
        <div class="card-box mb-30 py-3">
            <h4 class="text-center">VEUILLEZ SAISIR LE COMMENTAIRE</h4>
        </div>
    </div>
   

  <div class="col-md-12 col-sm-12">
    <div class="pd-20 card-box mb-3">
        <form action="" method="post">
          <div class="mb-3">
          <label for="" class="label-form">Commentaire</label>
            <textarea name="commentaire" placeholder="Merci de spécifier la raison du rejet du produit." id="" cols="30" rows="10" class="form-control"></textarea>
          </div>
          <div class="mb-3">
          <input type="hidden" name="id_chambre" class="form-control" value="<?php echo $id_chambre; ?>">
      </div>

           <div class="mb-3">
           <button  type="submit" name="enregistrer" class="btn btn-add btn-dark">ENREGISTRER</button>
           </div>
        </form>
    </div>
  <div class="col-md-12 col-sm-12">
  <?php 
if (isset($_POST["enregistrer"])) {
    if (!empty($MessageSucces)) {
?>
        <div class="alert alert-success text-center alert-dismissible fade show" role="alert">
            <?php echo $MessageSucces; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
<?php
    }
    if (!empty($MessageErreur)) {
?>
        <div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
            <?php echo $MessageErreur; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
<?php
    }
    # code...
}
?>



  </div>




  </div>
</div>