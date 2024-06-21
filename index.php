<!DOCTYPE html>
<html ng-app="app">

<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <style type="text/css">
        html {
            height: 100%
        }

        body {
            height: 100%;
            margin: 0;
            padding: 0
        }

        #carteId {
            height: 100%
        }
    </style>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false">
    </script>
    <script src="node_modules/angular/angular.min.js"></script>
    <script src="assets/js/app.js"></script>

</head>

<body ng-controller="Map">
    <div id="carteId" />

</body>

</html>