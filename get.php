<?php
include 'includes/header.php';
include 'includes/menu.php';
?>

<h1>GET</h1>

<?php

// la super-globale $_GET est tableau associatif contenant
// les paramètres fournies dans l'URL

echo '<p>Pays demandé: '. $_GET['country'] .'</p>';
echo '<p>Sport demandé: '. $_GET['sport'] .'</p>';

?>


<?php include 'includes/footer.php'; ?>
