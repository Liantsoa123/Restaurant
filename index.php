<!DOCTYPE html>
<html ng-app="app">

<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/style.css">
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false">
    </script>
    <script src="node_modules/angular/angular.min.js"></script>
    <script src="assets/js/app.js"></script>

</head>

<body ng-controller="Map">
    <div>
        <form class="formResto">
            <h3 class="title">Insert Restaurant</h3>
            <div class="inputStyle" >
                <label>Nom </label>
                <input  type="text" name="nom" placeholder="Name restaurant">
            </div>
            <div class="inputStyle" >
                <label>Latitude</label>
                <input  type="number" name="latitude" placeholder="Latitude">
            </div>

            <div class="inputStyle" >
                <label>Longitude</label>
                <input  type="number" name="longitude" placeholder="Longitude">
            </div>
            <div>
                <label> Image Restaurant </label>
                <input class="inputFile" type="file" name="img_file">
            </div>


             <button class="btn">Insert</button>
        </form>


    </div>
    <div id="carteId" />
</body>

</html>