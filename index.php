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
            width: 700px;
            text-align: center;
            margin-top: 20px;
            margin-left: 20px;
            margin-right: auto;
            margin-left: auto;
        }
        .table {
            margin-top: 20px;
        }
        .selecionado {
            background-color: yellow;
        }
        .negrito {
            font-weight: bold;
        }
    </style>

    <script>
        angular.module('listaTelefonica', []);
        angular.module('listaTelefonica').controller('listaTelefonicaCtrl', ($scope) => {
            $scope.app = "";
            $scope.contatos = [
                {
                    nome: 'Douglas',
                    telefone: '9999-8888',
                    operadora: {nome:"Oi", codigo:14, categoria: "Celular"},
                    data: new Date()
                },
                {
                    nome: 'Fernando',
                    telefone: '9999-8888',
                    operadora: {nome:"tim", codigo:41, categoria: "Celular"},
                    data: new Date()
                },
                {
                    nome: 'Lisboa',
                    telefone: '9999-8888',
                    operadora: {nome:"vivo", codigo:15, categoria: "Celular"},
                    data: new Date()
                }
            ];

            $scope.adicionarContato = (dadosContato) => {
                $scope.contatos.push(angular.copy(dadosContato));
                delete $scope.dadosContato;
                $scope.contatoForm.$setPristine();
            };

            $scope.apagarContatos = (contatos) => {
                $scope.contatos = contatos.filter((dadosContato) => {
                    if (!dadosContato.selecionado) return dadosContato
                });
                console.log($scope.contatos);
            };

            $scope.isContatoSelecionado = (dadosContato) =>{
               return dadosContato.some((contato) => {
                    return contato.selecionado;
                });
            };

            $scope.operadoras = [
                {nome: 'Oi', codigo: 14, categoria: "Celular"},
                {nome: 'Vivo', codigo: 15, categoria: "Celular"},
                {nome: 'Tim', codigo: 41, categoria: "Celular"},
                {nome: 'GVT', codigo: 25, categoria: "Fixo"},
                {nome: 'Embratel', codigo: 21, categoria: "Fixo"}
            ];
        });
    </script>
</head>
<body ng-controller="listaTelefonicaCtrl">
    <div class="jumbotron">
        <h4 ng-bind='app'></h4>
        <input type="text" class="form-control" ng-model="criterioDeBusca" placeholder="Digite um nome para busca"/>
        <table class="table table-striped">
            <tr>
                <th></th>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Operadora</th>
                <th>Data</th>
            </tr>
            <tr ng-class="{selecionado: dadosContato.selecionado}" ng-repeat="dadosContato in contatos | filter:{nome: criterioDeBusca}">
                <td><input type="checkbox" ng-model="dadosContato.selecionado"/></td>
                <td>{{dadosContato.nome | uppercase}}</td>
                <td>{{dadosContato.telefone}}</td>
                <td>{{dadosContato.operadora.nome | uppercase}}</td>
                <td>{{dadosContato.data | date:'dd/MM/yy HH:mm'}}</td>
            </tr>
        </table>
        <hr/>
        <form name="contatoForm">
            <input class="form-control" type="text" ng-model="dadosContato.nome" name="nome" placeholder="Nome" ng-required="true"/>
            <input class="form-control" type="text" ng-model="dadosContato.telefone" name="telefone" placeholder="Telefone"
                   ng-required="true" ng-pattern="/^\([1-9]{2}\)[0-9]{4,5}-[0-9]{4}$/"/>
            <select class="form-control" ng-model="dadosContato.operadora" ng-options="operadora.nome group by operadora.categoria for operadora in operadoras">
                <option value="">Selecione uma operadora</option>
            </select>
        </form>


        <div  ng-show="contatoForm.nome.$error.required && contatoForm.nome.$dirty" class="alert alert-danger">
                Por favor, preencha o campo nome!
        </div>

        <div ng-show="contatoForm.nome.$error.minlenght" class="alert alert-danger">
            O campo nome deve ter no mínimo 10 caracteres.
        </div>

        <div ng-show="contatoForm.telefone.$error.required && contatoForm.telefone.$dirty" class="alert alert-danger">
            O campo telefone deve ser informado.
        </div>

        <div ng-show="contatoForm.telefone.$error.pattern" class="alert alert-danger">
            O campo telefone deve ter o formato  ( )-DDDD-DDDD
        </div>

            <button ng-click="adicionarContato(dadosContato)" ng-disabled="!dadosContato.nome || !dadosContato.telefone" class="btn btn-primary btn-block">Adicionar</button>
            <button ng-click="apagarContatos(contatos)"  ng-show="isContatoSelecionado(contatos)" class="btn btn-danger btn-block">Excluir</button>
    </div>
</body>
</html>