$('select').on('change', function() {
    var option = $(this).val();

    // si pays sélectionné => requête ajax
    if (option > 0) {
        // on affiche la fiche pays
        $('#pays_infos').show();

        var url = 'http://localhost/projet/php/TP/selectCountry/pays.php?id='+option;
        $.get(url, function(data) {
            // affichage des données dans la page
            var pays = JSON.parse(data); // conversion de la chaîne JSON
            // en tableau JS
            displayCountryData(pays);
        });
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
});