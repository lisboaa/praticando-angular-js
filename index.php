<!doctype html>
<html lang="en" ng-app="helloWord">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js" crossorigin="anonymous"></script>
    <script>
        angular.module("helloWord", []);
        angular.module("helloWord").controller("helloWorldCtrl", function ($scope) {
            $scope.message = "Hi Guys";
        });
    </script>
</head>
<body>
    <div ng-controller="helloWorldCtrl">
        {{message}}
    </div>
</body>
</html>