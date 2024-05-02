<?php include_once("../database/db.php"); ?>

<?php
function getTotalChambresAcceptees($connexion) {
    try {
        // Requête SQL pour compter le nombre de chambres avec le statut "Accepté"
        $sql = "SELECT COUNT(*) AS total_chambres FROM produits WHERE  type_logement ='Chambre Moderne'";
        
        // Préparer la requête
        $stmt = $connexion->prepare($sql);
        
        // Exécuter la requête
        $stmt->execute();
        
        // Récupérer le résultat
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Nombre total de chambres avec le statut "Accepté"
        return $row['total_chambres'];
        
    } catch(PDOException $e) {
        // Gérer les erreurs ici (vous pouvez également les renvoyer)
        return false;
    }
}

function getTotalStudiosAcceptes($connexion) {
    try {
        // Requête SQL pour compter le nombre de studios avec le statut "Accepté"
        $sql = "SELECT COUNT(*) AS total_studios FROM produits WHERE type_logement ='Studio Moderne'";
        
        // Préparer la requête
        $stmt = $connexion->prepare($sql);
        
        // Exécuter la requête
        $stmt->execute();
        
        // Récupérer le résultat
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Nombre total de studios avec le statut "Accepté"
        return $row['total_studios'];
        
    } catch(PDOException $e) {
        // Gérer les erreurs ici (vous pouvez également les renvoyer)
        return false;
    }
}

function getTotalAppartementAcceptes($connexion) {
    try {
        // Requête SQL pour compter le nombre de studios avec le statut "Accepté"
        $sql = "SELECT COUNT(*) AS total_appartement FROM produits WHERE type_logement ='Appartement Moderne'";
        
        // Préparer la requête
        $stmt = $connexion->prepare($sql);
        
        // Exécuter la requête
        $stmt->execute();
        
        // Récupérer le résultat
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Nombre total de studios avec le statut "Accepté"
        return $row['total_appartement'];
        
    } catch(PDOException $e) {
        // Gérer les erreurs ici (vous pouvez également les renvoyer)
        return false;
    }
}



function getTotalDuplexAcceptes($connexion) {
    try {
        // Requête SQL pour compter le nombre de studios avec le statut "Accepté"
        $sql = "SELECT COUNT(*) AS total_duplex FROM produits WHERE  type_logement ='Duplex'";
        
        // Préparer la requête
        $stmt = $connexion->prepare($sql);
        
        // Exécuter la requête
        $stmt->execute();
        
        // Récupérer le résultat
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Nombre total de studios avec le statut "Accepté"
        return $row['total_duplex'];
        
    } catch(PDOException $e) {
        // Gérer les erreurs ici (vous pouvez également les renvoyer)
        return false;
    }
}


function getTotalClients($connexion) {
    try {
        // Requête SQL pour compter le nombre d'utilisateurs avec le statut 0 (clients)
        $sql = "SELECT COUNT(*) AS total_clients FROM utilisateurs WHERE ROLE = 0";
        
        // Préparer la requête
        $stmt = $connexion->prepare($sql);
        
        // Exécuter la requête
        $stmt->execute();
        
        // Récupérer le résultat
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Nombre total d'utilisateurs ayant le statut 0 (clients)
        return $row['total_clients'];
        
    } catch(PDOException $e) {
        // Gérer les erreurs ici (vous pouvez également les renvoyer)
        return false;
    }
}


function getTotalAgentsImmobiliers($connexion) {
    try {
        // Requête SQL pour compter le nombre d'utilisateurs avec le rôle 2 (agents immobiliers)
        $sql = "SELECT COUNT(*) AS total_agents FROM utilisateurs WHERE ROLE = 2";
        
        // Préparer la requête
        $stmt = $connexion->prepare($sql);
        
        // Exécuter la requête
        $stmt->execute();
        
        // Récupérer le résultat
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Nombre total d'utilisateurs ayant le rôle 2 (agents immobiliers)
        return $row['total_agents'];
        
    } catch(PDOException $e) {
        // Gérer les erreurs ici (vous pouvez également les renvoyer)
        return false;
    }
}

function getTotalProprietaires($connexion) {
    try {
        // Requête SQL pour compter le nombre d'utilisateurs avec le statut 0 (clients)
        $sql = "SELECT COUNT(*) AS total_proprietaires FROM utilisateurs WHERE ROLE = 1";
        
        // Préparer la requête
        $stmt = $connexion->prepare($sql);
        
        // Exécuter la requête
        $stmt->execute();
        
        // Récupérer le résultat
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Nombre total d'utilisateurs ayant le statut 0 (clients)
        return $row['total_proprietaires'];
        
    } catch(PDOException $e) {
        // Gérer les erreurs ici (vous pouvez également les renvoyer)
        return false;
    }
}



function getTotalReservation($connexion) {
    try {
        // Requête SQL pour compter le nombre total de réservations
        $sql = "SELECT COUNT(*) AS total_reservation FROM reservation";
        
        // Préparer la requête
        $stmt = $connexion->prepare($sql);
        
        // Exécuter la requête
        $stmt->execute();
        
        // Récupérer le résultat
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Nombre total de réservations
        return $row['total_reservation'];
        
    } catch(PDOException $e) {
        // Gérer les erreurs ici (vous pouvez également les renvoyer)
        return false;
    }
    
}
   



function getTotalReservationEnCours($connexion) {
    try {
        // Requête SQL pour compter le nombre total de réservations avec le statut "En cours"
        $sql = "SELECT COUNT(*) AS total_reservation_en_cours FROM reservation WHERE statut = 'En cours'";
        
        // Préparer la requête
        $stmt = $connexion->prepare($sql);
        
        // Exécuter la requête
        $stmt->execute();
        
        // Récupérer le résultat
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Nombre total de réservations avec le statut "En cours"
        return $row['total_reservation_en_cours'];
        
    } catch(PDOException $e) {
        // Gérer les erreurs ici (vous pouvez également les renvoyer)
        return false;
    }
    
    
}




function getTotalReservationAnnuler($connexion) {
    try {
        // Requête SQL pour compter le nombre total de réservations avec le statut "En cours"
        $sql = "SELECT COUNT(*) AS total_reservation_annuler FROM reservation WHERE statut = 'Annulée'";
        
        // Préparer la requête
        $stmt = $connexion->prepare($sql);
        
        // Exécuter la requête
        $stmt->execute();
        
        // Récupérer le résultat
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Nombre total de réservations avec le statut "En cours"
        return $row['total_reservation_annuler'];
        
    } catch(PDOException $e) {
        // Gérer les erreurs ici (vous pouvez également les renvoyer)
        return false;
    }
    
    
}



function getTotalReservationValider($connexion) {
    try {
        // Requête SQL pour compter le nombre total de réservations avec le statut "En cours"
        $sql = "SELECT COUNT(*) AS total_reservation_valider FROM reservation WHERE statut = 'Validée'";
        
        // Préparer la requête
        $stmt = $connexion->prepare($sql);
        
        // Exécuter la requête
        $stmt->execute();
        
        // Récupérer le résultat
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Nombre total de réservations avec le statut "En cours"
        return $row['total_reservation_valider'];
        
    } catch(PDOException $e) {
        // Gérer les erreurs ici (vous pouvez également les renvoyer)
        return false;
    }
    
    
}
?>
