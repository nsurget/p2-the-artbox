<?php
session_start();
include 'helper.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titre = $_POST['titre'];
    $artiste = $_POST['artiste'];
    $image = $_POST['image'];
    $description = $_POST['description'];
} else {
    header('Location: ajouter.php');
    exit;
}

$titre = sanitizeInput($titre);
$artiste = sanitizeInput($artiste);
$image = sanitizeInput($image);
$description = sanitizeInput($description);

// Nettoyage des messages de validation
$_SESSION['validation_titre'] = '';
$_SESSION['validation_artiste'] = '';
$_SESSION['validation_image'] = '';
$_SESSION['validation_description'] = '';

if (empty($titre)) {
    $_SESSION['validation_titre'] = 'Le titre est obligatoire';
}

if (empty($artiste)) {
    $_SESSION['validation_artiste'] = 'L\'artiste est obligatoire';
}

if (empty($image)) {
    $_SESSION['validation_image'] = 'L\'image est obligatoire';
}

if (!filter_var($image, FILTER_VALIDATE_URL)) {
    $_SESSION['validation_image'] = 'L\'image doit être une URL valide';
}

if (empty($description)) {
    $_SESSION['validation_description'] = 'La description est obligatoire';
}

if (strlen($description) < 3) {
    $_SESSION['validation_description'] = 'La description doit contenir au moins 3 caractères';
}

$_SESSION['titre'] = $titre;
$_SESSION['artiste'] = $artiste;
$_SESSION['image'] = $image;
$_SESSION['description'] = $description;

if ($_SESSION['validation_titre'] || $_SESSION['validation_artiste'] || $_SESSION['validation_image'] || $_SESSION['validation_description']) {
    header('Location: ajouter.php');
    exit;
}

$id = insertOeuvre($titre, $artiste, $image, $description);

if (empty($id)) {
    $_SESSION['notification'] = 'Une erreur est survenue lors de l\'insertion de l\'oeuvre';
    header('Location: ajouter.php');
    exit;
} else {
    $_SESSION['notification'] = 'L\'oeuvre a bien été ajoutée';
    header('Location: oeuvre.php?id=' . $id);
    exit;
}

