<?php
require 'header.php';
require_once 'database/Database.php';


// Si l'URL ne contient pas d'id, on redirige sur la page d'accueil
if (empty($_GET['id'])) {
    header('Location: index.php');
}

$database = new Database();
$connection = $database->getConnection();
$sql = "SELECT * FROM oeuvres WHERE id = :id";
$statement = $connection->prepare($sql);
$statement->execute(['id' => $_GET['id']]);
$oeuvre = $statement->fetch();

// Si aucune oeuvre trouvé, on redirige vers la page d'accueil
if (empty($oeuvre)) {
    $_SESSION['notification'] = 'L\'oeuvre n\'a pas été trouvée';
    header('Location: index.php');
}
?>

<article id="detail-oeuvre">
    <div id="img-oeuvre">
        <img src="<?= $oeuvre['image'] ?>" alt="<?= $oeuvre['titre'] ?>">
    </div>
    <div id="contenu-oeuvre">
        <h1><?= $oeuvre['titre'] ?></h1>
        <p class="description"><?= $oeuvre['artiste'] ?></p>
        <p class="description-complete">
            <?= $oeuvre['description'] ?>
        </p>

        <form action="delete.php" method="POST">
            <input type="hidden" name="id" value="<?= $oeuvre['id'] ?>">
            <input type="submit" value="Supprimer">
        </form>
    </div>


</article>

<?php require 'footer.php'; ?>