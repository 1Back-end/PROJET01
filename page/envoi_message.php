

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

$erreur = "";
$succes = "";

if (isset($_POST["valider"])) {
    // Vérifier si les champs sont vides
    if (!empty($_POST["nom"]) && !empty($_POST["email"]) && !empty($_POST["sujet"]) && !empty($_POST["message"])) {
        $nom = $_POST["nom"];
        $email = $_POST["email"];
        $sujet = $_POST["sujet"];
        $message = $_POST["message"];

        // Envoyer l'email
        $result = sendEmail($nom, $email, $sujet, $message);

        // Afficher un message en fonction du résultat de l'envoi
        if ($result === true) {
            $succes = 'Votre message a été envoyé avec succès !';
        } else {
            $erreur = 'Une erreur s\'est produite lors de l\'envoi de votre message. Veuillez réessayer plus tard.';
        }
    } else {
        $erreur = 'Veuillez remplir tous les champs du formulaire.';
    }
}

function sendEmail($nom, $email, $sujet, $message) {
    // Instance de PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configuration du serveur SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Votre serveur SMTP
        $mail->SMTPAuth = true;
        $mail->Username = 'laurentalphonsewilfried@gmail.com'; // Remplacez par votre adresse e-mail
        $mail->Password = 'xkue sail qegu hxbu'; // Remplacez par votre mot de passe e-mail
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Destinataire
        $mail->setFrom('dilanenguemzi23@gmail.com', 'IMMO INVESTMENT SCI'); // Votre adresse email et votre nom
        $mail->addAddress('dilanenguemzi23@gmail.com', 'IMMO INVESTMENT SCI'); // Adresse email et nom du destinataire

        // Contenu de l'email
        $mail->isHTML(true);
        $mail->Subject = $sujet;

        // Message professionnel
        $message_professionnel = "
            <p>Bonjour,</p>
            <p>Vous avez reçu un nouveau message :</p>
            <ul>
                <li><strong>Nom :</strong> $nom</li>
                <li><strong>Email :</strong> $email</li>
                <li><strong>Sujet :</strong> $sujet</li>
            </ul>
            <p><strong>Message :</strong></p>
            <p>$message</p>
            <p>Cordialement,<br>IMMO INVESTMENT SCI</p>
        ";

        $mail->Body = $message_professionnel;

        // Envoyer l'email
        $mail->send();

        return true; // Succès de l'envoi
    } catch (Exception $e) {
        return false; // Erreur lors de l'envoi
    }
}

?>








