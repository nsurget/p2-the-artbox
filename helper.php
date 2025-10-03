<?php 
require_once 'database/Database.php';

function dump($var) {
    echo "<pre style='background-color:rgb(231, 231, 231); padding: 10px; border: 1px solid green;'>";
    var_dump($var);
    echo "</pre>";
}

function dd($var) {
    dump($var);
    die();
}

function sanitizeInput($input)
{
    $input = trim($input);
    $input = htmlspecialchars($input);
    return $input;
}

function insertOeuvre($titre, $artiste, $image, $description): int | null {
    try {
    $database = new Database();
    $connection = $database->getConnection();
    $sql = "INSERT INTO oeuvres (titre, artiste, image, description) VALUES (:titre, :artiste, :image, :description)";
    $statement = $connection->prepare($sql);
    $statement->execute([
        'titre' => $titre,
        'artiste' => $artiste,
        'image' => $image,
        'description' => $description
    ]);

    $lastId = $connection->lastInsertId();
    return $lastId;
   

    } catch (Exception $e) {
       $_SESSION['validation_db'] = 'Une erreur est survenue lors de l\'insertion de l\'oeuvre';
       return null;
    }
}

function deleteOeuvre($id): bool {
    try {
        $database = new Database();
        $connection = $database->getConnection();
        $sql = "DELETE FROM oeuvres WHERE id = :id";
        $statement = $connection->prepare($sql);
        $statement->execute(['id' => $id]);
        return true;
    } catch (Exception $e) {
        $_SESSION['validation_db'] = 'Une erreur est survenue lors de la suppression de l\'oeuvre';
        return false;
    }
}


