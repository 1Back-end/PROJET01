<?php
include_once("../database/db.php");

$MessageSucces ="";
$MessageErreur ="";

if (isset($_POST["enregistrer"])) {
    $id_chambre = $_POST["id_chambre"];
    $commentaire = $_POST["commentaire"];

    // Vérifier si les champs ne sont pas vides
    if (empty($commentaire)) {
        $MessageErreur = "Veuillez saisir un commentaire.";
    } else {
        // Vérifier si le commentaire existe déjà pour cette chambre
        $query = "SELECT COUNT(*) AS count FROM commentaire WHERE id_produit = :id_chambre AND commentaire = :commentaire";
        $stmt = $connexion->prepare($query);
        $stmt->bindParam(":id_chambre", $id_chambre);
        $stmt->bindParam(":commentaire", $commentaire);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $commentaireExists = $row['count'] > 0;

        if ($commentaireExists) {
            $MessageErreur = "Un commentaire identique existe déjà pour ce produit.";
        } else {
            // Insérer le nouveau commentaire dans la base de données
            $sql = "INSERT INTO commentaire (id_produit, commentaire) VALUES (:id_chambre, :commentaire)";
            $stmt = $connexion->prepare($sql);
            $stmt->bindParam(":id_chambre", $id_chambre);
            $stmt->bindParam(":commentaire", $commentaire);
            if ($stmt->execute()) {
                $MessageSucces = "Le commentaire a été enregistré avec succès.";
            } else {
                $MessageErreur = "Une erreur s'est produite lors de l'enregistrement du commentaire.";
            }
        }
    }
}
?>

