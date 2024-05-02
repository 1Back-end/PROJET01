<?php
include_once("../database/db.php");

// Vérifier si le formulaire est soumis
if(isset($_POST["valider"])) {
    // Vérifier si les champs ne sont pas vides
    if(!empty($_POST["password1"]) && !empty($_POST["password2"]) && !empty($_POST["user_id"])) {
        $password1 = htmlspecialchars($_POST["password1"]);
        $password2 = htmlspecialchars($_POST["password2"]);
        $user_id = htmlspecialchars($_POST["user_id"]);

        // Vérifier si les mots de passe entrés sont identiques
        if($password1 === $password2) {
            // Hacher le nouveau mot de passe avec bcrypt
            $hashedPassword = password_hash($password1, PASSWORD_BCRYPT);

            // Mettre à jour le mot de passe dans la table utilisateurs
            $update_query = $connexion->prepare("UPDATE utilisateurs SET PASSWORD = :password WHERE ID = :user_id");
            $update_query->execute(array(':password' => $hashedPassword, ':user_id' => $user_id));
            
            // Supprimer l'entrée de la table mot_de_pass_oublie
            $delete_query = $connexion->prepare("DELETE FROM mot_de_pass_oublie WHERE ID_UTILISATEUR = :user_id");
            $delete_query->execute(array(':user_id' => $user_id));

            $success_message = "Votre mot de passe a été réinitialisé avec succès.";
        } else {
            $error_message = "Les mots de passe ne correspondent pas.";
        }
    } else {
        $error_message = "Veuillez remplir tous les champs.";
    }
}
?>
