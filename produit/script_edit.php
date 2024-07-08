<?php
include_once("../database/db.php");

// Vérifier si le formulaire de modification a été soumis
if (isset($_POST["modifier"])) {
    // Récupérer l'identifiant du produit à modifier
    $produit_id = $_POST["produit_id"];

    // Récupérer les données du formulaire
    $ville = $_POST["ville"];
    $region = $_POST["region"];
    $departement = $_POST["departement"];
    $arrondissement = $_POST["arrondissement"];
    $quartier = $_POST["quartier"];
    $prix = $_POST["prix"];
    $type_logement = $_POST["type_logement"];
    $description = $_POST["description"];
    $destination = $_POST["destination"];
    $statut_Louer = $_POST["statut_Louer"];
    $distance = $_POST["distance"];
    $proprietaire_id = $_SESSION['id'];
    $statut = "En attente";
    // Définir le nombre maximum d'images en fonction du type de logement
    switch ($type_logement) {
        case "Chambre Moderne":
            $maxPhotos = 4;
            break;
        case "Studio Moderne":
            $maxPhotos = 6;
            break;
        case "Appartement Moderne":
            $maxPhotos = 8;
            break;
        case "Duplex":
            $maxPhotos = 12;
            break;
        case "Terrain":
            $maxPhotos = 12;
            break;
        case "Villa":
            $maxPhotos = 12;
            break;
        case "Maison":
            $maxPhotos = 12;
            break;
        case "Immeuble":
            $maxPhotos = 12;
            break;
        default:
            $maxPhotos = 3;
            break;
    }
 
    // Vérifier si tous les champs sont remplis
    if (!empty($_POST["statut_Louer"]) &&!empty($_POST["ville"]) && !empty($_POST["distance"]) && !empty($_POST["departement"]) && !empty($_POST["destination"]) && !empty($_POST["region"]) && !empty($_POST["arrondissement"]) && !empty($_POST["quartier"]) && !empty($_POST["prix"]) && !empty($_POST["type_logement"]) && !empty($_POST["description"])) {

        // Vérifier si de nouvelles images ont été téléchargées
        if (!empty($_FILES["photo"]["name"][0])) {
            // Gérer l'upload de l'image
            $targetDir = "../uploads/";
            $uploadedFiles = [];

            // Vérifier chaque fichier image
            foreach ($_FILES["photo"]["name"] as $key => $fileName) {
                $targetFilePath = $targetDir . basename($fileName);
                $imageFileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

                // Vérifier la taille de l'image (max 5MB)
                if ($_FILES["photo"]["size"][$key] > 5000000) {
                    $errorMessage = "La taille de l'image est trop grande.";
                    break;
                }

                // Vérifier le format de l'image (jpeg, jpg, png)
                if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png") {
                    $errorMessage = "Seuls les fichiers JPG, JPEG et PNG sont autorisés.";
                    break;
                }

                // Déplacer le fichier vers le répertoire d'upload
                if (move_uploaded_file($_FILES["photo"]["tmp_name"][$key], $targetFilePath)) {
                    $uploadedFiles[] = $fileName;
                } else {
                    $errorMessage = "Une erreur s'est produite lors de l'upload des images.";
                    break;
                }
            }

            // Vérifier si aucun message d'erreur n'est survenu pendant l'upload des images
            if (!isset($errorMessage)) {
                // Vérifier si le nombre de photos dépasse la limite
                if (count($uploadedFiles) > $maxPhotos) {
                    $errorMessage = "Le nombre maximum de photos autorisées pour ce type de logement est $maxPhotos.";
                } else {
                    // Concaténer les noms des fichiers images
                    $photoNames = implode(",", $uploadedFiles);
                }
            }
        } else {
            // Aucune nouvelle image n'a été téléchargée
            // Récupérer les noms de fichiers d'images actuels de la base de données
            $sql_get_photos = "SELECT photo FROM produits WHERE id = :produit_id";
            $stmt_get_photos = $connexion->prepare($sql_get_photos);
            $stmt_get_photos->execute([":produit_id" => $produit_id]);
            $current_photos = $stmt_get_photos->fetchColumn();

            // Utiliser les noms de fichiers d'images actuels
            $photoNames = $current_photos;
        }

        // Si aucune erreur, procéder à la mise à jour des données
        if (!isset($errorMessage)) {
            // Mettre à jour les données dans la base de données
            $sql = "UPDATE produits SET ville = :ville, region = :region, departement = :departement, arrondissement = :arrondissement, quartier = :quartier, prix = :prix, type_logement = :type_logement, description = :description, photo = :photo 
            ,distance = :distance,statut = :statut, statut_Louer = :statut_Louer, destination = :destination ,proprietaire_id = :proprietaire_id  WHERE id = :produit_id";
            $stmt = $connexion->prepare($sql);

            // Exécuter la requête en utilisant les nouvelles données
            $stmt->execute([
                ":region" => $region,
                ":ville" => $ville,
                ":departement" => $departement,
                ":arrondissement" => $arrondissement,
                ":quartier" => $quartier,
                ":prix" => $prix,
                ":photo" => $photoNames,
                ":type_logement" => $type_logement,
                ":description" => $description,
                ":distance" => $distance,
                ":statut_Louer" => $statut_Louer,
                ":statut" => $statut,
                ":destination" => $destination,
                ":proprietaire_id" => $proprietaire_id,
                ":produit_id" => $produit_id
            ]);

            $successMessage = "Les données ont été mises à jour avec succès.";
        }
    } else {
        $errorMessage = "Veuillez remplir tous les champs du formulaire.";
    }
}

// Supposons que $produit_id contienne l'identifiant du produit modifié

 // Préparer la requête pour sélectionner les informations du produit
$query = "SELECT * FROM produits WHERE id = :id_produit";
 // Préparation de la requête
$stmt = $connexion->prepare($query);

// Liaison des paramètres
$stmt->bindParam(':id_produit', $id_produit, PDO::PARAM_INT);

// Exécution de la requête
$stmt->execute();


// Maintenant, vous pouvez utiliser les données récupérées pour afficher les modifications directement

?>

