<?php
include_once("../database/db.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

$succes = "";
$erreur = "";

if (isset($_POST["enregistrer"])) {
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $tel = $_POST["tel"];
    $photo = $_FILES['photo']['name'];
    $ville = $_POST["ville"];
    $motDePasse = genererMotDePasse();
    $code = genererCode();
    $role = 4; // Administrateur
    $status = "Inactif";
    $token= genererCode();

    // Vérifier si tous les champs sont remplis
    if (empty($nom) || empty($prenom) || empty($email) || empty($tel) || empty($photo) || empty($ville)) {
        $erreur = "Veuillez remplir tous les champs.";
    } else {
        // Vérifier si l'email ou le numéro de téléphone existe déjà dans la base de données
        $stmt_check = $connexion->prepare("SELECT COUNT(*) FROM utilisateurs WHERE EMAIL = :email OR TELEPHONE = :tel");
        $stmt_check->bindParam(':email', $email);
        $stmt_check->bindParam(':tel', $tel);
        $stmt_check->execute();
        $result = $stmt_check->fetchColumn();

        if ($result > 0) {
            $erreur = "Un utilisateur avec cette adresse e-mail ou ce numéro de téléphone existe déjà.";
        } else {
            // Vérifier la qualité et la taille de l'image
            $photo_tmp = $_FILES['photo']['tmp_name'];
            $photo_size = $_FILES['photo']['size'];

            $photo_path = "../image_utilisateurs/" . $photo;

            // Autoriser uniquement les fichiers image avec une taille maximale de 2 Mo
            $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');
            $file_extension = pathinfo($photo, PATHINFO_EXTENSION);

            if (!in_array($file_extension, $allowed_extensions)) {
                $erreur = "Veuillez télécharger une image valide (format JPG, JPEG, PNG ou GIF).";
            } elseif ($photo_size > 2 * 1024 * 1024) { // 2 Mo (en octets)
                $erreur = "La taille de l'image ne peut pas dépasser 2 Mo.";
            } else {
                // Déplacer le fichier téléchargé vers le dossier de destination
                move_uploaded_file($photo_tmp, $photo_path);

                // Hasher le mot de passe avec bcrypt
                $motDePasseHash = password_hash($motDePasse, PASSWORD_BCRYPT);

                // Insérer les données dans la base de données
                $stmt_insert = $connexion->prepare("INSERT INTO utilisateurs (TOKEN,NOM, PRENOM, EMAIL, TELEPHONE, PASSWORD, PHOTO, CODE, ROLE,VILLE,STATUS) VALUES (:token,:nom, :prenom, :email, :tel, :motDePasse, :photo, :code, :role,:ville,:status)");
                $stmt_insert->bindParam(':token', $token);
                $stmt_insert->bindParam(':nom', $nom);
                $stmt_insert->bindParam(':prenom', $prenom);
                $stmt_insert->bindParam(':email', $email);
                $stmt_insert->bindParam(':tel', $tel);
                $stmt_insert->bindParam(':motDePasse', $motDePasseHash);
                $stmt_insert->bindParam(':photo', $photo);
                $stmt_insert->bindParam(':code', $code);
                $stmt_insert->bindParam(':role', $role); 
                $stmt_insert->bindParam('ville', $ville);
                $stmt_insert->bindParam('status', $status);

                if ($stmt_insert->execute()) {
                    $succes = "Compte administrateur créé avec succès.";

                    // Envoi du mot de passe par e-mail
                    sendVerificationCode($email, $motDePasse,$nom,$prenom);
                } else {
                    $erreur = "Une erreur est survenue lors de la création du compte administrateur.";
                }
            }
        }
    }
}

function genererMotDePasse() {
    // Caractères utilisés pour générer le mot de passe
    $caracteres = 'AB0123456789';
    
    // Longueur du mot de passe
    $longueur = 8;
    
    // Générer le mot de passe
    $motDePasse = '';
    $max = strlen($caracteres) - 1;
    for ($i = 0; $i < $longueur; $i++) {
        $motDePasse .= $caracteres[random_int(0, $max)];
    }
    
    return $motDePasse;
}

function genererCode() {
    // Générer 5 chiffres aléatoires
    $code_chiffres = '';
    for ($i = 0; $i < 5; $i++) {
        $code_chiffres .= rand(0, 9);
    }

    // Combiner la lettre "U" et les chiffres pour former le code final
    $code_final = 'U' . $code_chiffres;

    return $code_final;
}

function sendVerificationCode($email, $motDePasse,$nom,$prenom) {
    // Envoyer le code de vérification par e-mail
    // Utilisez PHPMailer ou une autre bibliothèque pour envoyer l'e-mail
    // Exemple avec PHPMailer :
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Remplacez par votre serveur SMTP
        $mail->SMTPAuth = true;
        $mail->Username = 'laurentalphonsewilfried@gmail.com'; // Remplacez par votre adresse e-mail
        $mail->Password = 'rqak exlb rywc icdx'; // Remplacez par votre mot de passe e-mail
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Destinataire
        $mail->setFrom('laurentalphonsewilfried@gmail.com', 'Laurent Alphonse');
        $mail->addAddress($email);     // Add a recipient

        // Contenu
        $mail->isHTML(true);
        $mail->Subject = 'Code de vérification';
        $mail->CharSet = 'UTF-8'; // Définir l'encodage des caractères
        $mail->Body = 'Bonjour Monsieur ' . $prenom . ' ' . $nom . ',<br><br>
        Nous avons le plaisir de vous informer que votre compte administrateur a été créé avec succès.<br><br>
        Veuillez trouver ci-dessous les détails de votre compte :<br><br>
        Votre mot de passe pour vous connecter à l\'application est : ' . $motDePasse;

        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
