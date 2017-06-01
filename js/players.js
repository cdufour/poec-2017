// source de données globale (toutes les fonctions y ont accès)
var players = null;
var ageAsc = false; // booléen permet de savoir si les joueurs
// sont triés par age ascendant
var nomAsc = true;
var filterAge = null; // au départ, aucun filtre sur l'âge

function getPlayers() {
    var url = 'http://localhost/projet/php/ajax2.php';

    // requête ajax ASYNCHRONE. Javasscript n'attend pas la réponse
    // du serveur pour continuer l'éxécution du script
    $.get(url, function(data) {
        // data contiendra les données envoyées par le serveur
        players = JSON.parse(data);
        displayTable(players); // fonction responsable de 
        // l'affichage d'un tableau de joueurs
    });
}

function displayTable(players) {
    var table = '<table class="table table-striped">';
    // entête
    table += '<tr><th id="nomHeader">Nom</th><th>Prenom</th>' +
    '<th id="ageHeader">Age</th><th>Numéro</th><th>Equipe</th></tr>';

    var oldest = _.max(getAges(players)); // récupère l'âge le plus élevé

    //boucle
    players.forEach(function(player) {
        table += '<tr>';
        table += '<td>' + player.nom + '</td>';
        table += '<td>' + player.prenom + '</td>';

        if (player.age == oldest) {
            table += '<td class="oldest">' + player.age + '</td>';
        } else {
            table += '<td>' + player.age + '</td>';
        }
        
        table += '<td>' + player.numero_maillot + '</td>';

        if (player.equipe_nom == null) {
            table += '<td>Sans équipe</td>';
        } else {
            table += '<td>' + player.equipe_nom + '</td>'; 
        }
        
        table += '</tr>';
    });

    table += '</table>';

    $('#listPlayers').html(table);
}

function hidePlayers(ageLimit) {
    var nbResults = 0;
    var rows = $('table tr'); // on récupère les lignes du tableau

    $.each(rows, function(index, row) {
        //row.hide(); // erreur : row.hide is not a function

        // on cible la ligne par zepto afin "d'envelopper" l'élément
        // de nouvelles capacités (propriétés et méthodes)
        var r = $(row); // r est "plus riche" en fonctionnalités 
        // que row
        var age = r.children().eq(2).text();

        //if (age > ageLimit && age != 'Age') {
        if (age > ageLimit && index != 0) {
            r.hide();
        } else {
            r.show();
            nbResults++;
        }

    });

    // on affiche le résultat dans le DOM
    // -1 pour ne pas compter la ligne d'en-tête
    $('#nbResults').html(nbResults - 1);

}

function getAges(players) {
    var ages = []; // on initialise un tableau vide

    players.forEach(function(player) {
        ages.push(player.age); // push ajoute un élément dans le tableau
    });

    return ages; // on retourne le tableau des ages
}

getPlayers(); // appel de la fonction au chargement du script

$('#selectAge').on('change', function() {
    // .val() récupère la valeur de l'élément de formulaire (select)
    filterAge = $(this).val(); 
    hidePlayers(filterAge);
});


// Lorsque l'élément #ageHeader EXISTERA dans le dom, JS placera
// un écouteur d'événement click dessus
$(document).on('click', '#ageHeader', function() {
   if (ageAsc) {
        var sortedPlayers = _.reverse(_.sortBy(players, ['age']));
    } else {
         var sortedPlayers = _.sortBy(players, ['age']);
    }
    ageAsc = !ageAsc; // true devient false ou false devient true
    displayTable(sortedPlayers);
    // si variable filterAge différente de null,false ou undefined
    if (filterAge) { 
        hidePlayers(filterAge); // on masque les joueurs dont l'âge
        // est supérieur à la valeur stockée dans filterAge
    }
});

$(document).on('click', '#nomHeader', function() {
   if (nomAsc) {
        var sortedPlayers = _.reverse(_.sortBy(players, ['nom']));
    } else {
         var sortedPlayers = _.sortBy(players, ['nom']);
    }
    nomAsc = !nomAsc; // true devient false ou false devient true
    displayTable(sortedPlayers);
    if (filterAge) {
        hidePlayers(filterAge);
    }
});

$('#displayFormPlayer').on('click', function() {
    //$('#formPlayer').toggle();
    $(this).next().toggle(); // ciblage relatif
});



// Lodash: exemples
/*
var notes = [7, 56, 12, 74, 30];

var max = _.max(notes);
var min = _.min(notes);

console.log(max);
console.log(min);
*/




