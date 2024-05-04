<?php 
include_once("connection.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

$erreur_message = "";
$succes_message = "";
$erreur_nom = "";
$erreur_prenom = "";
$erreur_email = "";
$erreur_tel = "";
$erreur_ville = "";
$erreur_quartier = "";
$erreur_password = "";
$erreur_cpassword = "";
$erreur_photo = "";
$erreur_type_compte = "";

if (isset($_POST["enregistrer"])) {
    // Récupération des données du formulaire
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $ville = htmlspecialchars($_POST['ville']);
    $tel = htmlspecialchars($_POST['tel']);
    $quartier = htmlspecialchars($_POST['quartier']);
    $password = htmlspecialchars($_POST['password']);
    $cpassword = htmlspecialchars($_POST['cpassword']);
    $photo = $_FILES['photo']['name'];
    $type_compte = htmlspecialchars($_POST['type_compte']);
    $statut = "Inactif";
    $role = null; // Initialiser le rôle
    $code = generateSixDigitCode();
    $token = genererCode();
    // Vérification des champs obligatoires
    if (empty($nom)) {
        $erreur_nom .= "Veuillez entrer votre nom !<br>";
    }
    if (empty($prenom)) {
        $erreur_prenom .= "Veuillez entrer votre prenom !<br>";
    }
    if (empty($email)) {
        $erreur_email .= "Veuillez entrer votre adresse e-mail !<br>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erreur_email .= "Veuillez entrer une adresse e-mail valide !<br>";
    }
    if (empty($tel)) {
        $erreur_tel .= "Veuillez entrer votre numéro de téléphone ! <br>";
    }
    if (empty($ville)) {
        $erreur_ville .= "Veuillez entrer votre ville !<br>";
    }
    if (empty($quartier)) {
        $erreur_quartier.= "Veuillez entrer votre quartier !<br>";
    }
    if (empty($password)) {
        $erreur_password .= "Utilisez 8 caractères ou plus avec un mélange de lettres, de chiffres et de symboles !<br>";
    } else {
        // Vérifier si le mot de passe respecte les critères spécifiés
        if (!passwordIsValid($password)) {
            $erreur_password .= "Le mot de passe doit contenir au moins une minuscule, une majuscule, un chiffre, un caractère spécial et avoir une longueur minimale de 8 caractères !<br>";
        }
    }
 
    if (empty($cpassword)) {
        $erreur_cpassword .= "Veuillez confirmer votre mot de passe !<br>";
    } else {
        // Vérifier si le mot de passe correspond à sa confirmation
        if ($password !== $cpassword) {
            $erreur_cpassword .= "Les mots de passe ne correspondent pas !<br>";
        }
    }
    
    if (empty($photo)) {
        $erreur_photo .= "Veuillez sélectionner une photo !<br>";
    }
    

    // Vérification du type de compte
    if (empty($type_compte)) {
        $erreur_type_compte .= "Veuillez sélectionner un type de compte !<br>";
    } else {
        // Déterminer le rôle en fonction du type de compte sélectionné
        switch ($type_compte) {
            
            case "Proprietaire":
                $role = 1;
                break;
            case "Agent Immobilier":
                $role = 2;
                break;
            default:
                // En cas de sélection incorrecte ou inattendue, signaler une erreur
                $erreur_type_compte .= "Type de compte sélectionné invalide!<br>";
                break;
        }
    }
            
    // Si aucune erreur n'est survenue, procéder à l'insertion dans la base de données
    if (empty($erreur_nom)  && empty($erreur_email) && empty($erreur_tel) && empty($erreur_ville) && empty($erreur_quartier) && empty($erreur_password) && empty($erreur_cpassword) && empty($erreur_photo) && empty($erreur_type_compte)) {
       // Vérifier si l'e-mail existe déjà dans la base de données
        $query = "SELECT COUNT(*) AS count FROM utilisateurs WHERE EMAIL = :email";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $emailExists = $row['count'] > 0;
        if ($emailExists) {
            $erreur_message .= "Cette adresse e-mail est déjà enregistrée.";
        } else {
            // Insérer les données dans la base de données
            $query = "INSERT INTO utilisateurs (TOKEN,NOM,PRENOM,  EMAIL, TELEPHONE, PASSWORD, PHOTO, CODE, STATUS, VILLE, QUARTIER, ROLE) VALUES (?,?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($query);
            $stmt->bindValue(1, $token);
            $stmt->bindValue(2, $nom);
            $stmt->bindValue(3, $nom);
            $stmt->bindValue(4, $email);
            $stmt->bindValue(5, $tel);
            // Utiliser password_hash() pour hacher le mot de passe avec bcrypt
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $stmt->bindValue(6, $hashedPassword);
            $stmt->bindValue(7, $photo);
            $stmt->bindValue(8, $code);
            $stmt->bindValue(9, $statut);
            $stmt->bindValue(10, $ville);
            $stmt->bindValue(11, $quartier);
            $stmt->bindValue(12, $role);
            $stmt->execute();
            
            $user_id = $pdo->lastInsertId();
            

            // Déplacer le fichier photo téléchargé vers le dossier "galerie"
            move_uploaded_file($_FILES['photo']['tmp_name'], '../image_utilisateurs/' . $photo);

            // Envoyer le code généré à l'utilisateur par e-mail
            sendVerificationCode($email, $code);
         $succes_message = "Votre compte a été créé avec succès. Un e-mail contenant un code de vérification a été envoyé à votre adresse e-mail. <a href='code_verification.php?user_id=$user_id' class='text-danger'>Cliquez ici</a> pour entrer votre code de validation.";
           
 

        }
    } else {
        // Si des erreurs sont survenues, construire le message d'erreur
        $erreur_message = "Echec de la creation de votre compte";
    }
}

function passwordIsValid($password) {
    // Vérifie si la longueur du mot de passe est supérieure ou égale à 8 caractères
    if (strlen($password) < 8) {
        return false;
    }
    
    // Vérifie si le mot de passe contient au moins une minuscule, une majuscule, un chiffre,
    // un caractère spécial
    return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $password);
}


function generateSixDigitCode() {
    // Générer un nombre aléatoire entre 100000 et 999999 (6 chiffres)
    return rand(100000, 999999);
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


// Exemple d'utilisation



function sendVerificationCode($email, $code) {
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
        $mail->Body    = 'Votre code de vérification est : ' . $code;

        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
