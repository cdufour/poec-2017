<!DOCTYPE html>
<html ng-app="introApp">
<head>
    <title>Angularjs Intro</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <style>
        th {
            cursor: pointer;
        }

        table img {
            height: 20px;
        }
    </style>
</head>
<body>
    <?php include '../includes/menu.php' ?>

    <h1>Angularjs Intro</h1>

    <div ng-controller="mainCtrl">
        
        <!-- filtres -->
        <div>
            <!-- ng-model surveille la valeur d'un input et la range dans le $scope -->
            <input ng-model="search" type="text" placeholder="Recherche">
            <select ng-model="selectedTeam">
                <option ng-repeat="team in teams">{{team.name}}</option>
            </select>
        </div>

        <!-- nombre de joueurs filtrés sur nombre total -->
        <p>{{filteredGiocatori.length}} / {{giocatori.length}}</p>

        <div ng-hide="true">
            <button ng-click="nb_clicks = nb_clicks + 1">
            Click
            </button> {{nb_clicks}}
        </div>
        
        <table class="table table-striped">
            <tr>
                <th ng-click="changeOrder('nom')">Nom</th>
                <th ng-click="changeOrder('prenom')">Prénom</th>
                <th ng-click="changeOrder('age')">Age</th>
                <th ng-click="changeOrder('numero_maillot')">Numéro</th>
                <th ng-click="changeOrder('equipe_nom')">Equipe</th>
                <th>Logo de l'équipe</th>
                <th>Actions</th>
            </tr>
            <tr ng-repeat="g in filteredGiocatori=(giocatori | 
                filter:search |
                filter:selectedTeam | 
                orderBy:orderKey:reverse)">
                <td>{{g.nom}}</td>

                <td>{{g.prenom}}</td>
                <td>{{g.age}}</td>
                <td>{{g.numero_maillot}}</td>
                <td>
                    <span ng-if="g.equipe != 0">{{g.equipe_nom}}</span>
                    <span ng-if="g.equipe == 0">Pole Emploi</span>
                </td>
                <td><img ng-src="../{{g.equipe_logo}}"></td>
                <td>
                    <button ng-click="deletePlayer()" class="btn btn-danger btn-xs">Supprimer</button>
                </td>
            </tr>
        </table>

    </div>

    <script src="js/angular.min.js"></script>
    <script src="js/app.js"></script>
</body>
</html>