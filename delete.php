<?php
// Démarrage session 
session_start();

// Vérification id existe ET pas vide dans l'URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    require_once('req/_connect.php');

    // Réinitialisation de l'id envoyé
    $id = strip_tags($_GET['id']);

    $sql = 'SELECT * FROM `liste` WHERE `id` = :id;';

    // Préparation de la requête
    $query = $database->prepare($sql);

    // Liaison des paramètres id
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    // Exécution de la requête
    $query->execute();

    // Récupération du produit
    $produit = $query->fetch();

    // Vérification de l'existance du produit
    if (!$produit) {
        $_SESSION['erreur'] = 'Cet id n\'existe pas';
        header('Location: index.php');
        die();
    }

    $sql = 'DELETE FROM liste WHERE id = :id;';

    // Préparation de la requête
    $query = $database->prepare($sql);

    // Liaison des paramètres id
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    // Exécution de la requête
    $query->execute();
    $_SESSION['message'] = 'Produit supprimé';
    header('Location: index.php');
} else {
    $_SESSION['erreur'] = 'URL invalide';
    header('Location: index.php');
}
