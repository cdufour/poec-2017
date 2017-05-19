<?php
include 'includes/util.inc.php';
include 'includes/header.php';
include 'includes/menu.php';
?>

<h1>GET</h1>

<?php
// la super-globale $_GET est tableau associatif contenant
// les paramètres fournies dans l'URL

$country = $_GET['country'];
$sport = $_GET['sport'];

echop('Pays demandé: '. $country);
echop('Sport demandé: '. $sport);

switch (strtolower($country)) {
    case 'italie':
        echo "Siamo molto felici di imparare il PHP";
        //include strtolower($country) . '.php';
        include 'italie.php';
        break;

    case 'france':
        echo "Nous sommes très heureux d'apprendre le PHP";
        break;

    case 'roumanie':
        echo "Suntem foarte fericiti sa invatam PHP-ul";
        break;

    case 'espagne':
        echo "Estamos muy felices de apprender el PHP";
        break;
    
    default:
        echo "Pays inconnu";
        break;
}

?>


<?php include 'includes/footer.php'; ?>
