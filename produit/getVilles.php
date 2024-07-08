<?php
include_once("../database/functions.php");

if (isset($_POST['region_id'])) {
    $region_id = $_POST['region_id'];
    $villes = getVillesByRegion($region_id, $connexion);
    echo json_encode($villes);
}
?>
