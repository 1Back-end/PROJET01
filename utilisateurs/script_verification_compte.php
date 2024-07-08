<?php
include_once("connection.php");

$ErreurMessage = "";
$SuccesMessage = "";

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
            // Mettre à jour le statut de l'utilisateur à "Actif"
            $query_update = "UPDATE utilisateurs SET STATUS = 'Actif' WHERE ID = :user_id";
            $stmt_update = $pdo->prepare($query_update);
            $stmt_update->bindParam(":user_id", $user_id);
            $stmt_update->execute();

            // Supprimer le code de validation de la base de données
            $query_delete = "UPDATE utilisateurs SET CODE = NULL WHERE ID = :user_id";
            $stmt_delete = $pdo->prepare($query_delete);
            $stmt_delete->bindParam(":user_id", $user_id);
            $stmt_delete->execute();

            // Message de succès
            $SuccesMessage = "Votre compte a été activé avec succès.";
            echo '<meta http-equiv="refresh" content="1;url=../login/login.php">';

        } else {
            // Message d'erreur si le code saisi ne correspond pas à celui enregistré
            $ErreurMessage = "Code de validation incorrect. Veuillez réessayer !";
        }
    }
}
?>
