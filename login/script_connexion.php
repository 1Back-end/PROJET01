<?php 
include_once("../database/db.php");
session_start();

$MessageErreurEmail = "";
$MessageErreurMpd = "";
$MessageErreur ="";

if(isset($_POST["connexion"])) {
    // Vérification si les champs sont vides
    if(!empty($_POST["email"]) && !empty($_POST["mpd"])) {
        $login = htmlspecialchars($_POST['email']);
        $mdp = htmlspecialchars($_POST['mpd']); // Utilisation de 'mpd' au lieu de 'password' comme nom du champ
        
        // Requête pour récupérer l'utilisateur correspondant à l'email ou au nom
        $query = $connexion->prepare("SELECT * FROM utilisateurs WHERE (EMAIL = :login OR NOM = :login) AND STATUS = 'Actif'");
        $query->execute(array(':login' => $login)); // Modification ici pour utiliser :login comme paramètre
        $user = $query->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($mdp, $user['PASSWORD'])) { // Vérification du mot de passe
            // Définir les sessions pour l'utilisateur
            $_SESSION['id'] = $user['ID'];
            $_SESSION['token'] = $user['TOKEN'];
            $_SESSION['photo'] = $user['PHOTO'];
            $_SESSION['nom'] = $user['NOM'];
            $_SESSION['role'] = $user['ROLE'];
            $_SESSION['status'] = $user['STATUS'];

            // Redirection en fonction du rôle de l'utilisateur
            switch ($user['ROLE']) {
                case 1:
                case 2:
                    header("Location:../page/mes_publications.php");
                    break;
                case 3:
                    header("Location:../page/dashboard.php");
                    break;
                case 4:
                    header("Location:../page/dashboard.php");
                    break;
                default:
                    // Rediriger vers une page par défaut si le rôle n'est pas défini
                    header("Location:../page/error.php");
            }
            exit(); // Assure que le script ne continue pas après la redirection        
        } else {
            $MessageErreur = "Adresse email ou Mot de passe incorrect !";
        }
    } else {
        if(empty($_POST["email"])) {
            $MessageErreurEmail = "Veuillez entrer votre adresse email ou votre nom d'utilisateur !";
        }
        if(empty($_POST["mpd"])) {
            $MessageErreurMpd = "Veuillez entrer votre mot de passe !";
        }
    } 
}
?>
