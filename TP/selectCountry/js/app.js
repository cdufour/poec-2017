var pays_infos = []; // tableau (vide au départ) permettant de mettre
// en cache le retour des requêtes ajax

$('select').on('change', function() {
    var option = $(this).val();

    // si pays sélectionné => requête ajax
    if (option > 0) {
        // on affiche la fiche pays
        $('#pays_infos').show();

        // index_pays vaudra -1 si le pays n'a pas été trouvé dans pays_infos
        // sinon index_pays vaudra l'indice du pays trouvé dans le tableau
        var index_pays = isCountryInArray(pays_infos, option);

        if (index_pays != -1) {
            // pays déjà présent dans le tableau
            displayCountryData(pays_infos[index_pays]);
        } else {
            // pays non présent => requête ajax
            var url = 'http://localhost/projet/php/TP/selectCountry/pays.php?id='+option;
            $.get(url, function(data) {
                // affichage des données dans la page
                var pays = JSON.parse(data); // conversion de la chaîne JSON
                // en tableau JS
                displayCountryData(pays);

                // mise en cache des données
                pays_infos.push(pays);
                console.log(pays_infos);
            });
        }




    } else {
        $('#pays_infos').hide(); // masque la zone d'infos pays
    }

    function displayCountryData(country) {
        var spans = $('#pays_infos span');
        spans.eq(0).text(country.capitale);
        spans.eq(1).text(country.nb_habitants);
        spans.eq(2).text(country.superficie);
        spans.eq(3).text(country.langues);

        $('img.flag').attr('src', country.drapeau);
    }

    function isCountryInArray(arr, id) {
        var found = -1; // -1 signifie "aucun indice correspondant"

        arr.forEach(function(item, index) {
            if (item.id == id) {
                found = index ; // pays recherché trouvé !
            }
        });

        return found; // renvoie l'indice du pays trouvé
    }
});