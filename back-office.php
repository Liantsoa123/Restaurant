<!DOCTYPE html>
<html ng-app="app">

<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/style.css">
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false">
    </script>
    <script src="node_modules/angular/angular.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="assets/js/back-office.js"></script>
</head>

<body ng-controller="BackOfficeCrtl">
    <div>
        <form class="formResto" id="formResto">
            <h3 class="title">AJOUTER UNE <span>GASTRONOMIE PIZZA</span></h3>

            <hr>

            <div class="inputStyle">
                <label>Nom:</label>
                <input type="text" name="name_restaurant" placeholder="Name restaurant" ng-model="restaurant.name_restaurant">
            </div>
            <div class="inputStyle">
                <label>Latitude:</label>
                <input type="text" name="latitude" placeholder="Latitude" ng-model="restaurant.latitude">
            </div>

            <div class="inputStyle">
                <label>Longitude:</label>
                <input type="text" name="longitude" placeholder="Longitude" ng-model="restaurant.longitude">
            </div>
            <div class="inputStyle">
                <label>Image:</label>
                <input class="inputFile" type="file" name="img_file" ng-model="restaurant.img_file">
            </div>
            <button class="btn" ng-click="submitForm('formResto')" oneclick="upForm('form-plat')">Insert</button>
        </form>
    </div>

    <div id="carteId" />
</body>

</html>