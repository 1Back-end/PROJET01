<?php
include_once("../database/db.php");

$erreur_message = "";
$succes_message = "";

// Vérifier si le formulaire de modification a été soumis
if (isset($_POST["modifier"])) {
    // Récupérer les valeurs des champs du formulaire
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $telephone = $_POST['telephone'];
    $ville = $_POST['ville'];
    $quartier = $_POST['quartier'];
    $ancien_password = $_POST['ancien_password'];
    $nouveau_password = $_POST['nouveau_password'];
    $confirm_nouveau_password = $_POST['confirm_nouveau_password'];
    $photo = isset($_FILES['photo']) ? $_FILES['photo'] : null;

    // Vérifier d'abord si l'utilisateur a saisi des informations dans les champs de mot de passe
    $motDePasseModifie = !empty($ancien_password) || !empty($nouveau_password) || !empty($confirm_nouveau_password);

    // Vérifier si l'utilisateur a saisi des informations dans les champs de mot de passe et si l'ancien mot de passe est incorrect
    if ($motDePasseModifie) {
        // Vérifier l'ancien mot de passe uniquement si l'utilisateur a modifié l'un des champs de mot de passe
        $sql = "SELECT PASSWORD FROM utilisateurs WHERE ID = :id";
        $stmt = $connexion->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            // Vérifier si l'ancien mot de passe est correct
            if (!password_verify($ancien_password, $result['PASSWORD'])) {
                $erreur_message = "L'ancien mot de passe est incorrect.";
            }
        } else {
            $erreur_message = "Utilisateur introuvable.";
        }
    }

    // Si aucun message d'erreur pour l'ancien mot de passe n'est défini, procéder à la mise à jour des autres champs
    if (empty($erreur_message)) {
        // Continuer la mise à jour des autres champs
        // Vérifier si une nouvelle photo de profil a été téléchargée
        if ($photo && $photo['error'] === UPLOAD_ERR_OK) {
            $target_dir = "../image_utilisateurs/";
            $target_file = $target_dir . basename($photo["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $newFileName = uniqid() . "." . $imageFileType;

            // Déplacer le fichier téléchargé vers le répertoire de destination
            if (move_uploaded_file($photo["tmp_name"], $target_dir . $newFileName)) {
                // Mettre à jour le nom de fichier de la photo dans la base de données
                $photo = $newFileName;

                // Préparer la requête SQL pour mettre à jour les informations de l'utilisateur avec la nouvelle photo de profil
                $sql = "UPDATE utilisateurs SET PHOTO = :photo WHERE ID = :id";
                $stmt = $connexion->prepare($sql);
                $stmt->bindParam(':photo', $photo, PDO::PARAM_STR);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);

                // Exécuter la requête
                if ($stmt->execute()) {
                    // Succès : rediriger ou afficher un message de succès
                    $succes_message = "Photo de profil mise à jour avec succès.";
                    echo '<script>setTimeout(function(){ window.location.href = "logout.php"; }, 3000);</script>'; // Déconnexion après 3 secondes
                } else {
                    // Erreur lors de la mise à jour de la base de données
                    $erreur_message = "Une erreur s'est produite lors de la mise à jour de la photo de profil.";
                }
            } else {
                // Erreur lors du déplacement du fichier téléchargé
                $erreur_message = "Erreur lors du téléchargement de la photo de profil.";
            }
        } elseif ($photo['error'] !== UPLOAD_ERR_NO_FILE) {
            // Gestion des autres erreurs de téléchargement de fichier
            $erreur_message = "Une erreur s'est produite lors du téléchargement de la photo de profil.";
        }

        // Continuez à traiter les autres mises à jour de champ si nécessaire...
    }
}
?>
