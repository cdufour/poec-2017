<?php
include 'includes/util.inc.php';
include 'includes/equipe.inc.php';
include 'includes/header.php';
include 'includes/menu.php';
?>

<h1>Players</h1>

<button id="btn">Test</button>
<button id="reset">Reset</button>
<button id="ajax">Ajax</button>
<ul id="list"></ul>
<div id="listPlayers"></div>

<!-- charger la liste des joueurs par ajax -->
<!--<script src="js/script.js"></script>-->
<script src="js/zepto.min.js"></script>
<script src="js/players.js"></script>

<?php include 'includes/footer.php'; ?>