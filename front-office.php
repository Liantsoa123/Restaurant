<!DOCTYPE html>
<html ng-app="app">

<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/style.css">
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false">
    </script>
    <script src="node_modules/angular/angular.min.js"></script>
    <script src="assets/js/app.js"></script>
    <!-- <script src="assets/js/function.js" ></script> -->

</head>

<body ng-controller="Map">
    <div>
        <form class="formResto" id="formSearch">
            <h3 class="title">Recherche GASTRONOMIE PIZZA</h3>
            <div class="inputStyle">
                <input type="hidden" name="name_plat" placeholder="Dish Name">
            </div>
            <div class="inputStyle">
                <label>Latitude</label>
                <input type="text" name="latitude" placeholder="Latitude" ng-model="restaurant.latitude">
            </div>

            <div class="inputStyle">
                <label>Longitude</label>
                <input type="text" name="longitude" placeholder="Longitude" ng-model="restaurant.longitude">
            </div>
            <div class="inputStyle">
                <label>Radius</label>
                <input type="text" name="radius" placeholder="radius">
            </div>  

            <button class="btn" ng-click="search('formSearch')">Search</button>
        </form>
    </div>
    <div id="carteId" />
</body>

</html>