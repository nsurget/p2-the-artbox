<?php require 'header.php'; ?>

<?php 
if (!empty($_SESSION) && (!empty($_SESSION['validation_titre']) || !empty($_SESSION['validation_artiste']) || !empty($_SESSION['validation_image']) || !empty($_SESSION['validation_description']))) {
    $titre = $_SESSION['titre'];
    $validation_titre = $_SESSION['validation_titre'] ?? '';
    $artiste = $_SESSION['artiste'];
    $validation_artiste = $_SESSION['validation_artiste'] ?? '';
    $image = $_SESSION['image'];
    $validation_image = $_SESSION['validation_image'] ?? '';
    $description = $_SESSION['description'];
    $validation_description = $_SESSION['validation_description'] ?? '';
}
?>

<form action="traitement.php" method="POST">
    <div class="champ-formulaire">
        <label for="titre">Titre de l'œuvre <span class="obligatoire">*</span></label>
        <input type="text" name="titre" id="titre" value="<?= $titre ?? '' ?>" required>
        <?php if (!empty($validation_titre)) : ?>
            <span class="validation"><?= $validation_titre ?></span>
        <?php endif; ?>
    </div>
    <div class="champ-formulaire">
        <label for="artiste">Auteur de l'œuvre <span class="obligatoire">*</span></label>
        <input type="text" name="artiste" id="artiste" value="<?= $artiste ?? '' ?>" required>
        <?php if (!empty($validation_artiste)) : ?>
            <span class="validation"><?= $validation_artiste ?></span>
        <?php endif; ?>
    </div>
    <div class="champ-formulaire">
        <label for="image">URL de l'image <span class="obligatoire">*</span></label>
        <input type="url" name="image" id="image" value="<?= $image ?? '' ?>" required>
        <?php if (!empty($validation_image)) : ?>
            <span class="validation"><?= $validation_image ?></span>
        <?php endif; ?>
    </div>
    <div class="champ-formulaire">
        <label for="description">Description <span class="obligatoire">*</span></label>
        <textarea name="description" id="description" required> <?= $description ?? '' ?></textarea>
        <?php if (!empty($validation_description)) : ?>
            <span class="validation "><?= $validation_description ?></span>
        <?php endif; ?>
    </div>

    <input type="submit" value="Valider" name="submit">
</form>

<?php require 'footer.php'; ?>
