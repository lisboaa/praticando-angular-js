<!doctype html>
<html lang="en" ng-app="listaTelefonica">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js" crossorigin="anonymous"></script>

    <style>
        .jumbotron {
            width: 400px;
            text-align: center;
            margin-top: 20px;
            margin-left: 20px;
            margin-right: auto;
            margin-left: auto;
        }
    </style>

    <script>
        angular.module('listaTelefonica', []);
        angular.module('listaTelefonica').controller('listaTelefonicaCtrl', ($scope) => {
            $scope.app = "Lista Telefonica";
            $scope.contatos = [
                {nome: 'Douglas', telefone: '99999999'},
                {nome: 'Fernando', telefone: '99999999'},
                {nome: 'Lisboa', telefone: '99999999'}
            ];
            $scope.adicionarContato = (dadosContato) => {
                $scope.contatos.push(angular.copy(dadosContato));
            };
        });
    </script>
</head>
<body ng-controller="listaTelefonicaCtrl">
    <div class="jumbotron">
        <h4 ng-bind='app'></h4>
        <table class="table table-striped">
            <tr>
                <th>Nome</th>
                <th>Telefone</th>
            </tr>
            <tr ng-repeat="dadosContato in contatos">
                <td>{{dadosContato.nome}}</td>
                <td>{{dadosContato.telefone}}</td>
            </tr>
        </table>
        <hr/>
        <input class="form-control" type="text" ng-model="dadosContato.nome"/>
        <input class="form-control" type="text" ng-model="dadosContato.telefone"/>
        <button ng-click="adicionarContato(dadosContato)" class="btn btn-primary btn-block">Adicionar</button>
    </div>
</body>
</html>