<?php
// Definition des droits d'acces
$role = $_SESSION['role']; 
$identifiant = $_SESSION['id'];
$IsClient = ($role == 0) ? true : false; 
$IsProprietaire= ($role == 1) ? true : false; 
$IsAgentImmobilier = ($role == 2) ? true : false; 
$IsAdmin = ($role == 3) ? true : false; 
$IsSuperAdmin= ($role == 4) ? true : false; 
?>