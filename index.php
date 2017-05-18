<?php
    $title = "Formation PHP Aston";
    $connected = true;
    include 'includes/header.php';
    include 'includes/menu.php';
?>
<h1><?php echo $title; ?></h1>

<!-- Formulaire de connexion -->
<?php if ($connected): ?>
<form>
    <label>Email: </label>
    <input type="email" placeholder="Tapez votre email">

    <label>Mot de passe: </label>
    <input type="password" placeholder="Tapez votre mot de passe">

    <button>Valider</button>
</form>
<?php endif ?>

<?php include 'includes/footer.php'; ?>

