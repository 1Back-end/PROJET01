<?php

include_once("../database/db.php");

$succes = "";
$erreur = "";

if (isset($_POST["modifier"])) {
    // Valider les données du formulaire
    $id = $_POST['id'];
    $new_nom = isset($_POST['nom']) ? $_POST['nom'] : null;
    $new_prenom = isset($_POST['prenom']) ? $_POST['prenom'] : null;
    $new_tel = isset($_POST['tel']) ? $_POST['tel'] : null;
    $new_ville = isset($_POST['ville']) ? $_POST['ville'] : null;
    $new_quartier = isset($_POST['quartier']) ? $_POST['quartier'] : null;
    $ancien_mot_de_passe = isset($_POST['ancien_mot_de_passe']) ? $_POST['ancien_mot_de_passe'] : null;
    $nouveau_mot_de_passe = isset($_POST['nouveau_mot_de_passe']) ? $_POST['nouveau_mot_de_passe'] : null;
    $confirm_nouveau_mot_de_passe = isset($_POST['confirm_nouveau_mot_de_passe']) ? $_POST['confirm_nouveau_mot_de_passe'] : null;
    $photo = isset($_FILES['photo']) ? $_FILES['photo'] : null;

    // Vérifier si l'utilisateur souhaite modifier son mot de passe
    if (!empty($ancien_mot_de_passe) && !empty($nouveau_mot_de_passe) && !empty($confirm_nouveau_mot_de_passe)) {
        // Vérifier si l'ancien mot de passe est correct
        $query_password = "SELECT PASSWORD FROM utilisateurs WHERE ID= :id";
        $stmt_password = $connexion->prepare($query_password);
        $stmt_password->bindParam(':id', $id);
        $stmt_password->execute();
        $user = $stmt_password->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Comparer le mot de passe récupéré avec celui saisi par l'utilisateur
            if (!password_verify($ancien_mot_de_passe, $user['PASSWORD'])) {
                $erreur = "L'ancien mot de passe est incorrect.";
            } else {
                // Comparer le nouveau mot de passe avec sa confirmation
                if ($nouveau_mot_de_passe !== $confirm_nouveau_mot_de_passe) {
                    $erreur = "Le nouveau mot de passe et sa confirmation ne correspondent pas.";
                } else {
                    // Mettre à jour le mot de passe dans la base de données
                    $query_update_password = "UPDATE utilisateurs SET PASSWORD = :password WHERE ID= :id";
                    $stmt_update_password = $connexion->prepare($query_update_password);
                    $hashed_password = password_hash($nouveau_mot_de_passe, PASSWORD_DEFAULT);
                    $stmt_update_password->bindParam(':password', $hashed_password);
                    $stmt_update_password->bindParam(':id', $id);
                    $stmt_update_password->execute();
                    $succes = "Mot de passe mis à jour avec succès.";
                }
            }
        } else {
            $erreur = "Utilisateur introuvable.";
        }
    }

    // Vérifier si une nouvelle photo de profil est téléchargée
    if ($photo && $photo['error'] === UPLOAD_ERR_OK) {
        // Gérer le téléchargement de la nouvelle photo de profil
        $target_dir = "../image_utilisateurs/";
        $target_file = $target_dir . basename($photo["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $newFileName = uniqid() . "." . $imageFileType;

        // Déplacer le fichier téléchargé vers le répertoire de destination
        if (move_uploaded_file($photo["tmp_name"], $target_dir . $newFileName)) {
            // Mettre à jour le nom de fichier de la photo dans la base de données
            $query_update_photo = "UPDATE utilisateurs SET PHOTO = :photo WHERE ID= :id";
            $stmt_update_photo = $connexion->prepare($query_update_photo);
            $stmt_update_photo->bindParam(':photo', $newFileName);
            $stmt_update_photo->bindParam(':id', $id);
            $stmt_update_photo->execute();
            $succes .= "Photo de profil mise à jour avec succès.";
        } else {
            $erreur .= "Erreur lors du téléchargement de la photo de profil.<br>";
        }
    }

   // Mettre à jour tous les champs de l'utilisateur dans la base de données
    $query_update_user = "UPDATE utilisateurs SET NOM = :nom, PRENOM = :prenom, TELEPHONE = :tel, VILLE = :ville, QUARTIER = :quartier WHERE ID = :id";
    $stmt_update_user = $connexion->prepare($query_update_user);
    $stmt_update_user->bindParam(':nom', $new_nom);
    $stmt_update_user->bindParam(':prenom', $new_prenom);
    $stmt_update_user->bindParam(':tel', $new_tel, PDO::PARAM_STR); // Assurez-vous de lier le paramètre en tant que chaîne de caractères
    $stmt_update_user->bindParam(':ville', $new_ville);
    $stmt_update_user->bindParam(':quartier', $new_quartier);
    $stmt_update_user->bindParam(':id', $id);
    $stmt_update_user->execute();



    $succes = "Profil mis à jour avec succès.";
    
}

?>
