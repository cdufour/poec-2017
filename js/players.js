function test() {
    console.log('zepto fonctionne');
}


function getPlayers() {
    var url = 'http://localhost/projet/php/ajax2.php';
    $.get(url, function(data) {
        // data contiendra les données envoyées par le serveur
        var players = JSON.parse(data);
        displayTable(players); // fonction responsable de 
        // l'affichage d'un tableau de joueurs
    });
}

function displayTable(players) {
    var table = '<table class="table table-striped">';
    // entête
    table += '<tr><th>Nom</th><th>Prenom</th><th>Age</th><th>Numéro</th></tr>';

    //boucle
    players.forEach(function(player) {
        table += '<tr>';
        table += '<td>' + player.nom + '</td>';
        table += '<td>' + player.prenom + '</td>';
        table += '<td>' + player.age + '</td>';
        table += '<td>' + player.numero_maillot + '</td>';
        table += '</tr>';
    });

    table += '</table>';

    $('#listPlayers').html(table);
}

$('#btn').on('click', test);

getPlayers(); // appel de la fonction au chargement du script