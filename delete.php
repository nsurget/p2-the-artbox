<?php
session_start();
require_once 'helper.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $result = deleteOeuvre($id);
    if ($result) {
        $_SESSION['notification'] = 'L\'oeuvre a bien été supprimée';
        header('Location: index.php');
        die();
    } else {
        $_SESSION['notification'] = 'Une erreur est survenue lors de la suppression de l\'oeuvre';
        header('Location: oeuvre.php?id=' . $id);
        die();
    }
}
