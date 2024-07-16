<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; // Assurez-vous que le chemin est correct

include_once("connection.php");

// Fonction pour générer un code de validation à 6 chiffres
function generateSixDigitCode() {
    return rand(100000, 999999);
}

// Fonction pour envoyer l'e-mail de validation
function sendVerificationCode($email, $code) {
    $mail = new PHPMailer(true);

    try {
        // Paramètres du serveur
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'laurentalphonsewilfried@gmail.com'; // Adresse Gmail
        $mail->Password = 'xkue sail qegu hxbu'; // Mot de passe Gmail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Destinataire
        $mail->setFrom('investmentimmo425@gmail.com', 'IMMO INVESTMENT SCI');
        $mail->addAddress($email, 'IMMO INVESTMENT SCI'); // Add a recipient
        $mail->addAddress($email);

        // Contenu de l'e-mail
        $mail->isHTML(true);
        $mail->Subject = 'Votre nouveau code de validation';
        $mail->Body    = "Bonjour,<br><br>Voici votre nouveau code de validation : <b>$code</b><br><br>Merci.";
        $mail->AltBody = "Bonjour,\n\nVoici votre nouveau code de validation : $code\n\nMerci.";

        $mail->send();
    } catch (Exception $e) {
        echo "Le message n'a pas pu être envoyé. Mailer Error: {$mail->ErrorInfo}";
    }
}

// Initialisation des messages
$ErreurMessage = "";
$SuccesMessage = "";

// Vérifier si le formulaire a été soumis
if (isset($_POST['submit'])) {
    // Récupérer les valeurs des champs de code
    $code1 = $_POST["code1"];
    $code2 = $_POST["code2"];
    $code3 = $_POST["code3"];
    $code4 = $_POST["code4"];
    $code5 = $_POST["code5"];
    $code6 = $_POST["code6"];
    $user_id = $_POST["user_id"];

    // Concaténer les valeurs pour former le code complet
    $code = $code1 . $code2 . $code3 . $code4 . $code5 . $code6;

    // Vérifier si les champs sont vides
    if (empty($code)) {
        $ErreurMessage = "Veuillez entrer votre code de validation !";
    } else {
        // Requête SQL pour vérifier si le code saisi correspond à celui enregistré en base de données
        $query = "SELECT COUNT(*) AS count FROM utilisateurs WHERE ID = :user_id AND CODE = :code";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":user_id", $user_id);
        $stmt->bindParam(":code", $code);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $codeExists = $row['count'] > 0;

        if ($codeExists) {
            // Mettre à jour le statut de l'utilisateur à "Actif" et supprimer le code de validation
            $query_update = "UPDATE utilisateurs SET STATUS = 'Actif', CODE = NULL WHERE ID = :user_id";
            $stmt_update = $pdo->prepare($query_update);
            $stmt_update->bindParam(":user_id", $user_id);
            $stmt_update->execute();

            // Message de succès
            $SuccesMessage = "Votre compte a été activé avec succès.";
            echo '<meta http-equiv="refresh" content="1;url=../login/login.php">';
        } else {
            // Message d'erreur si le code saisi ne correspond pas à celui enregistré
            $ErreurMessage = "Code de validation incorrect. Veuillez réessayer !";
        }
    }
}

// Vérifier si le lien de renvoi de code a été cliqué
if (isset($_GET['resend_code']) && isset($_GET['user_id'])) {
    $user_id = intval($_GET['user_id']);

    // Récupérer l'adresse e-mail de l'utilisateur
    $query_email = "SELECT EMAIL FROM utilisateurs WHERE ID = :user_id";
    $stmt_email = $pdo->prepare($query_email);
    $stmt_email->bindParam(":user_id", $user_id);
    $stmt_email->execute();
    $row_email = $stmt_email->fetch(PDO::FETCH_ASSOC);

    if ($row_email) {
        $email = $row_email['EMAIL'];
        $new_code = generateSixDigitCode();

        // Mettre à jour le code de validation de l'utilisateur
        $query_resend = "UPDATE utilisateurs SET CODE = :code WHERE ID = :user_id";
        $stmt_resend = $pdo->prepare($query_resend);
        $stmt_resend->bindParam(":code", $new_code);
        $stmt_resend->bindParam(":user_id", $user_id);
        $stmt_resend->execute();

        // Envoyer le nouveau code par e-mail
        sendVerificationCode($email, $new_code);

        // Message de succès
        $SuccesMessage = "Un nouveau code de validation a été envoyé à votre adresse e-mail.";
    } else {
        $ErreurMessage = "Utilisateur introuvable.";
    }
}
?>