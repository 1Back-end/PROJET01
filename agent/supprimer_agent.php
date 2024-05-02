<?php
// Connexion à la base de données
include_once("../database/db.php");

// Vérifier si un utilisateur doit être marqué comme supprimé
if (isset($_GET['id'])) {
    $id_utilisateur = $_GET['id'];

    // Récupérer le rôle de l'utilisateur
    $stmt_role = $connexion->prepare("SELECT ROLE FROM utilisateurs WHERE ID = ?");
    $stmt_role->execute([$id_utilisateur]);
    $role_utilisateur = $stmt_role->fetchColumn();

    // Vérifier le rôle de l'utilisateur avant de le supprimer
    if ($role_utilisateur == 2) { // Vérifie si le rôle est "propriétaire"
        // Marquer l'utilisateur comme supprimé en mettant à jour le champ DELETED_AT et STATUT
        $stmt_delete = $connexion->prepare("UPDATE utilisateurs SET DELETED_AT = NOW(), STATUT = 'Supprimé' WHERE ID = ?");
        $stmt_delete->execute([$id_utilisateur]);
        
        // Afficher une alerte JavaScript pour confirmer la suppression
        echo "<script>
                // Afficher l'alerte
                alert('Suppression effectuée avec succès.');

                // Redirection après un délai
                setTimeout(function() {
                    window.location.href = 'AgentImmobilier.php';
                }, 1000); // Rediriger après 3 secondes
            </script>";
        exit();
    } else {
        // Redirection vers la page proprietaire.php avec un message d'erreur
        header("Location: proprietaire.php?erreur=Impossible de supprimer cet utilisateur");
        exit();
    }
}

// Récupérer la liste des utilisateurs avec un rôle égal à 2 (propriétaires)
$stmt = $connexion->prepare("SELECT * FROM utilisateurs WHERE ROLE = 2 AND STATUT = 'Present'");
$stmt->execute();
$utilisateurs = $stmt->fetchAll();
?>
