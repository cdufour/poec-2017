<?php
include 'includes/util.inc.php';
include 'includes/equipe.inc.php';
include 'includes/header.php';
include 'includes/menu.php';
?>

<h1>Equipes</h1>
<?php echo tableFormat(getTeams()); ?>

<?php include 'includes/footer.php'; ?>