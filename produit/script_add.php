<?php
include_once("../database/db.php");

// Vérifier si le formulaire a été soumis
if (isset($_POST["enregistrer"])) {
    // Récupérer les données du formulaire
    $ville = $_POST["ville"];
    $region = $_POST["region"];
    $departement = $_POST["departement"];
    $arrondissement = $_POST["arrondissement"];
    $quartier = $_POST["quartier"];
    $prix = $_POST["prix"];
    $type_logement = $_POST["type_logement"];
    $description = $_POST["description"];
    $distance = $_POST["distance"];
    $destination = $_POST["destination"];
    $statut = "En attente";
    $identifiant = $_SESSION['id'];
    $code = generateRandomCode();
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
        default:
            $maxPhotos = 3;
            break;
    }

    // Vérifier si tous les champs sont remplis
    if (!empty($_POST["ville"]) && !empty($_POST["destination"]) && !empty($_POST["distance"]) &&  !empty($_POST["departement"]) && !empty($_POST["region"]) && !empty($_POST["arrondissement"]) && !empty($_POST["quartier"]) && !empty($_POST["prix"]) && !empty($_POST["type_logement"]) && !empty($_POST["description"]) && isset($_FILES["photo"])) {
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
                // Insérer les données dans la base de données
                $sql = "INSERT INTO produits (ville, region, departement, arrondissement, quartier, prix, photo, type_logement, description, statut, code, distance, destination, proprietaire_id, date_ajout) VALUES (:ville, :region, :departement, :arrondissement, :quartier, :prix, :photo, :type_logement, :description, :statut, :code, :distance, :destination, :identifiant, NOW())";
                $stmt = $connexion->prepare($sql);

                // Concaténer les noms des fichiers images
                $photoNames = implode(",", $uploadedFiles);

                // Exécuter la requête en utilisant les noms des fichiers seulement
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
                    ":statut" => $statut,
                    ":code" => $code,
                    ":distance" => $distance,
                    ":destination" => $destination,
                    ":identifiant" => $identifiant // Ajout de l'identifiant du propriétaire
                ]);

                $successMessage = "Produit passé en attente de validation.";
            }
        }
    } else {
        $errorMessage = "Veuillez remplir tous les champs du formulaire.";
    }

}

// Fonction pour générer un code aléatoire
function generateRandomCode($length = 8) {
    // Caractères autorisés pour le code
    $characters = '0123456789ABCD';
    $charactersLength = strlen($characters);
    $randomCode = '';
    // Générer un code aléatoire en sélectionnant des caractères aléatoires à partir de la liste de caractères autorisés
    for ($i = 0; $i < $length; $i++) {
        $randomCode .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomCode;
}

// Utilisation de la fonction pour générer un code aléatoire de 8 caractères
$randomRoomCode = generateRandomCode(8);
?>
