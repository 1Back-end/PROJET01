<?php
include_once("../database/db.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

$erreur_champ ="";
$MessageSucces="";
$MessageErreur ="";

if (isset($_POST["envoyer"])) {
    $nom = $_POST["nom"];
    $email = $_POST["email"];
    $tel = $_POST["tel"];
    $description = $_POST["description"];
    $id_produit= $_POST["id_produit"];
    
    // Vérifier si les champs sont vides
    if (empty($nom) || empty($email) || empty($tel) || empty($description)) {
        $erreur_champ = "Veuillez remplir tous les champs !";
    } else {
        // Requête pour récupérer les informations du produit
        $stmt_produit = $connexion->prepare("SELECT * FROM produits WHERE id = :id_produit");
        $stmt_produit->bindParam(':id_produit', $id_produit);
        $stmt_produit->execute();
        $produit = $stmt_produit->fetch(PDO::FETCH_ASSOC);

        // Requête pour récupérer les informations du propriétaire
        $stmt_proprietaire = $connexion->prepare("SELECT u.id, u.NOM, u.EMAIL, u.TELEPHONE, u.VILLE 
                                                 FROM utilisateurs u 
                                                 INNER JOIN produits p ON u.id = p.proprietaire_id 
                                                 WHERE p.id = :id_produit");
        $stmt_proprietaire->bindParam(':id_produit', $id_produit);
        $stmt_proprietaire->execute();
        $proprietaire = $stmt_proprietaire->fetch(PDO::FETCH_ASSOC);
        
        // Envoyer le message
        $message = "
            Bonjour,<br><br>
            Une nouvelle demande de contact a été soumise.<br><br>
            <b>Informations de l'intéressé(e) :</b><br>
            Nom complet: $nom<br>
            Adresse email: $email<br>
            Numéro de téléphone: $tel<br>
            Message: $description<br><br><br><br>

            <b>Informations sur le produit :</b><br>
            Code: {$produit['code']}<br>
            Type logement: {$produit['type_logement']}<br>
            Prix: {$produit['prix']} XAF / Mois<br>
            Région: {$produit['region']}<br>
            Département: {$produit['departement']}<br>
            Arrondissement: {$produit['arrondissement']}<br>
            Ville: {$produit['ville']}<br>
            Description: {$produit['description']}<br><br><br>

            <b>Informations sur le propriétaire du produit :</b><br>
            Nom: {$proprietaire['NOM']}<br>
            Email: {$proprietaire['EMAIL']}<br>
            Téléphone: {$proprietaire['TELEPHONE']}<br>
            Adresse: {$proprietaire['VILLE']}<br><br>
            Cordialement,<br>
            IMMO INVESTMENT SCI
        ";

        // Envoyer l'e-mail
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
            $mail->addAddress('laurentalphonsewilfried@gmail.com'); 

            // Contenu de l'e-mail
            $mail->isHTML(true);
            $mail->Subject = 'Nouvelle demande de contact';
            $mail->Body = $message;

            // Envoyer l'e-mail
            $mail->send();
            // Insérer les données dans la table de réservation
            try {
                $stmt_reservation = $connexion->prepare("INSERT INTO Reservation (interesse,email,telephone, produit_id, proprietaire_id) VALUES (:interesse,:email,:telephone, :produit_id, :proprietaire_id)");
                $stmt_reservation->bindParam(':interesse', $nom);
                $stmt_reservation->bindParam(':email', $email);
                $stmt_reservation->bindParam(':telephone', $tel);
                $stmt_reservation->bindParam(':produit_id', $id_produit);
                $stmt_reservation->bindParam(':proprietaire_id', $proprietaire['id']);
                $stmt_reservation->execute();

                $MessageSucces = "Votre demande a été envoyée avec succès !";
            } catch (PDOException $e) {
                // En cas d'erreur lors de l'insertion dans la table de réservation
                $MessageErreur = "Erreur lors de l'envoi de l'e-mail : {$mail->ErrorInfo}";
            }
        } catch (Exception $e) {
            $MessageErreur = "Erreur lors de l'envoi de l'e-mail : {$mail->ErrorInfo}";
        }
    }
}
?>
