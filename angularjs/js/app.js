// .module(arg1, arg2)
// arg1 : nom du module
// arg2 : tableau des dépendances (autres modules chargés)
var app = angular.module('introApp', []);

app.controller('mainCtrl', function($scope, $http) {
    $scope.nb_clicks = 0;
    $scope.orderKey = "age"; // critère de tri initial
    $scope.reverse = false; // par défaut, tri croissant (pas d'inversion)
    $scope.message = "coucou"; // ajout d'une propriété "message"
    // à l'objet $scope (espace d'échange entre la vue et le controller)

    // variable equipes non accessible à la vue
    var equipes = [
        {name: 'Juventus'},
        {name: 'Milan AC'},
        {name: 'Monaco'},
        {name: 'PSG'}
    ];

    // requête ajax via le service $http
    var url = "http://localhost/projet/php/ajax2.php";
    $http.get(url).then(function(res) {
        $scope.giocatori = res.data;
    });

    $scope.teams = equipes; // nous exposons les équipes :
    // elles deviennent accessibles à la vue via le $scope

    $scope.changeOrder = function(key) {
        $scope.orderKey = key;
        $scope.reverse = !$scope.reverse; // on inverse l'ordre du tri
    };

    $scope.deletePlayer = function() {
        // this retourne le "contexte" du bouton cliqué 
        // on obtient ainsi les données incluses dans la même ligne (tr) 
        // que le bouton cliqué
        // this.g (g est généré par le ng-repeat) retourne
        // les données du joueur que l'on veut supprimer
        var player_id = this.g.id;

        // requête ajax pour supprimer le joueur identifié
        
    };
});
