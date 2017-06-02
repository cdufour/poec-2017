//*** Variables globales ***
// source de données globale (toutes les fonctions y ont accès)
var players = null;
var ageAsc = false; // booléen permet de savoir si les joueurs
// sont triés par age ascendant
var nomAsc = true;
var filterAge = null; // au départ, aucun filtre sur l'âge

//******************************


//*** Fonctions ****
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

function getFormValues(form) {
    // récupère tous les inputs placées 
    // dans le formulaire fourni en entrée
    var inputs      = form.children('input');

    // récupère la valeur du premier input trouvé (nom)
    var nom         = inputs.eq(0).val();

    var prenom      = inputs.eq(1).val();
    var age         = inputs.eq(2).val();

    // renvoie un tableau de deux balises select
    var selects     = form.children('select');

    var maillot     = selects.eq(0).val();
    var equipe      = selects.eq(1).val();

    //console.log(nom + ' ' + prenom + ' ' + maillot);

    // création d'un objet values 
    // permettant de stocker toutes les valeurs
    // à transmettre au serveur
    var values = {
        nom: nom,
        prenom: prenom,
        age: age,
        maillot: maillot,
        equipe: equipe
    };

    return values;
}

function checkValues(player) {
    // player est un objet
    var conditions =
        player.nom.length > 1 &&
        player.prenom.length > 1 &&
        player.age.length > 1;

    return conditions;
}

function clearMessage(timer) {
    var message = $('#message');
    setTimeout(function() {
        // efface le texte situé dans l'élément #message ainsi que les classes
        message.text('').removeClass();
    }, timer);
}

// **********************************


// *** Ecouteurs d'événement (eventListeners) ***
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
    var text = ' le formulaire pour ajouter un joueur';
    //$('#formPlayer').toggle();
    var form = $(this).next(); // ciblage relatif
    form.toggle(); 

    // changer le texte du lien en fonction de la 
    // visibilité du formulaire
    var status = form.css('display');
    if (status == 'none') {
        $(this).text('Afficher' + text);
    } else {
        $(this).text('Masquer' + text);
    }
});

$('#formPlayer button').on('click', function() {
    var form = $('#formPlayer');

    // création d'un objet player à partir des valeurs
    // récupérées dans le formulaire
    var player = getFormValues(form);

    var check = checkValues(player);

    if (check) {
        // si conditions remplies => requête ajax en post
        var url = 'http://localhost/projet/php/ajaxAddPlayer.php';
        $.post(url, player, function(data) {
        // si php a renvoyé 1 (requête sql éxécutée avec succès)
            if (data == 1) {
                getPlayers(); // recharge la liste des joueurs
                $('#message')
                    .text('L\'enregisrement a réussi')
                    .removeClass()
                    .addClass('bg-success text-success');
            } else {
                $('#message')
                    .text('L\'enregisrement a échoué')
                    .removeClass()
                    .addClass('bg-danger text-danger');
            }
        });

    } else {
        // afficher message d'erreur si les conditions de validation
        // non remplies
        $('#message')
            .text('Formulaire non valide')
            .removeClass()
            .addClass('bg-danger text-danger');
    }
    clearMessage(8000);
});

// ************************************

// chargement de la liste des joueurs
getPlayers(); // appel de la fonction au chargement du script
