<?php
$host = 'localhost';
$dbname = 'u616544546_immo';
$username = 'u616544546_Immo';
$password = 'Immo237@';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Configuration pour afficher les erreurs SQL
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>
