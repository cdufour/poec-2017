<?php
include 'includes/util.inc.php';
include 'includes/equipe.inc.php';
include 'includes/header.php';
include 'includes/menu.php';
?>

<h1>Players</h1>
<!--
<button id="btn">Test</button>
<button id="reset">Reset</button>
<button id="ajax">Ajax</button>
<ul id="list"></ul>
-->
<div id="filters">
    <strong>Limite d'âge</strong>
    <select id="selectAge">
        <option value="20">20 ans</option>
        <option value="25">25 ans</option>
        <option value="30">30 ans</option>
        <option value="35">35 ans</option>
    </select>
</div>
<p>Nombre de résultats: <strong id="nbResults"></strong></p>
<div id="listPlayers"></div>

<!-- charger la liste des joueurs par ajax -->
<!--<script src="js/script.js"></script>-->
<script src="js/zepto.min.js"></script>
<script src="js/lodash.min.js"></script>
<script src="js/players.js"></script>

<?php include 'includes/footer.php'; ?>