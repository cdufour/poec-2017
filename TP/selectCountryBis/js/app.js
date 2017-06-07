var divs = $('div.pays_infos'); // récupère tous les zones d'infos pays

$('select').on('change', function() {
    var option = $(this).val(); // récupère l'identifiant du pays
    divs.hide(); // par prévention, masque tous les infos pays
    $('div#pays_' + option).show(); // affiche les infos pays du pays sélectionné
});