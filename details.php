<?php
// Démarrage session 
session_start();

// Vérification id existe ET pas vide dans l'URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
} else {
    $_SESSION['erreur'] = 'URL invalide';
    header('Location: index.php');
}
