<?php
try {
    // Connexion à la base
    $database = new PDO('mysql:host=localhost;dbname=crud', 'root', '');
    $database->exec('SET NAMES "UTF8"');
} catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage();
    die();
}
