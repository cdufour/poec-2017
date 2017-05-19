<?php
    $title = "Formation PHP Aston";
    $connected = true;
    include 'includes/header.php';
    include 'includes/menu.php';
?>
<h1><?php echo $title; ?></h1>

<!-- Formulaire de connexion -->
<?php if ($connected): ?>
<form action="post.php" method="POST">
    <label>Email: </label>
    <input name="email" type="email" placeholder="Tapez votre email">

    <label>Mot de passe: </label>
    <input name="pass" type="password" placeholder="Tapez votre mot de passe">

    <label>Administrateur</label>
    <input type="checkbox" name="admin">

    <input type="submit" value="Valider">
</form>
<?php endif ?>

<?php include 'includes/footer.php'; ?>

