<?php
// Connexion à la base de données
include_once("../database/db.php");

// Inclure la bibliothèque PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; // Assurez-vous de spécifier le bon chemin

// Définir une variable pour le message de succès
$success_message = '';
$error_message = "";
$error_mail= "";
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si le champ email est vide
    if (empty($_POST["email"])) {
        $error_mail = "Veuillez saisir votre adresse e-mail.";
    } else {
        // Récupérer l'email soumis
        $email = $_POST["email"];

        // Vérifier si l'email existe dans la base de données
        $stmt = $connexion->prepare("SELECT ID, NOM FROM utilisateurs WHERE EMAIL = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            $error_message = "Cet e-mail n'existe pas dans notre système.";
        } else {
            // Générer un nouveau mot de passe sécurisé
            $newPassword = generateRandomPassword(8);

            // Hasher le nouveau mot de passe avec bcrypt
            $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);

            // Enregistrer l'ID utilisateur et le mot de passe haché dans la table mot_de_pass_oublie
            $stmt = $connexion->prepare("INSERT INTO mot_de_pass_oublie (ID_UTILISATEUR, PASSWORD) VALUES (?, ?)");
            $stmt->execute([$user['ID'], $hashedPassword]);

            // Envoyer le nouveau mot de passe par email à l'utilisateur
            $mail = new PHPMailer(true);

            try {
                // Paramètres du serveur SMTP (à remplacer par vos propres informations)
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com'; // Remplacez par votre serveur SMTP
                $mail->SMTPAuth = true;
                $mail->Username = 'laurentalphonsewilfried@gmail.com'; // Remplacez par votre adresse e-mail
                $mail->Password = 'rqak exlb rywc icdx'; // Remplacez par votre mot de passe e-mail
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;
        
                // Destinataire
                $mail->setFrom('laurentalphonsewilfried@gmail.com', 'Laurent Alphonse');
                $mail->addAddress($email, $user['NOM']);

                // Contenu de l'email
                $mail->isHTML(true);
                $mail->Subject = "Réinitialisation de votre mot de passe";
                $mail->Body    = "Bonjour " . $user['NOM'] . ",<br><br>Votre nouveau mot de passe est : $newPassword<br><br>Veuillez utiliser ce mot de passe pour vous connecter à votre compte.";

                $mail->send();

                // Message de succès
                // Message de succès avec un lien cliquable "Cliquez ici"
                $success_message = "Un nouveau mot de passe a été envoyé à votre adresse e-mail. <a href='reset_password.php?id={$user['ID']}'>Cliquez ici</a> pour réinitialiser votre mot de passe.";
            } catch (Exception $e) {
                // En cas d'erreur lors de l'envoi de l'email
                $error_message = "Une erreur s'est produite lors de l'envoi de l'e-mail : " . $mail->ErrorInfo;
            }
        }
    }
}

// Fonction pour générer un mot de passe aléatoire sécurisé
function generateRandomPassword($length = 8) {
    $characters = 'ABCDEFG0123456789';
    $password = '';
    $max = strlen($characters) - 1;
    for ($i = 0; $i < $length; $i++) {
        $password .= $characters[mt_rand(0, $max)];
    }
    return $password;
}
?>
