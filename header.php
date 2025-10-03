<?php 
session_start();
require 'helper.php'; 

if (!empty($_SESSION['notification'])) {
    $notification = $_SESSION['notification'];
    unset($_SESSION['notification']);
}
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>The ArtBox</title>
</head>
<body>
<header>
    <a href="index.php"><img src="img/logo.png" alt="Logo Artbox" id="logo"></a>
    <nav>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="ajouter.php">Ajouter une œuvre</a></li>
        </ul>
    </nav>
</header>
<main>
<?php if (!empty($notification)) : ?>
    <div class="notification"><?= $notification ?></div>
<?php endif; ?>
