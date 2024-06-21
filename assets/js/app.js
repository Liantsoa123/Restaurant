var app = angular.module('app', []);

app.controller('Map', ['$scope', '$http', function ($scope, $http) {
    $scope.data = [];
    $scope.carte;
    $scope.latitude = 0;
    $scope.longitude = 0;


    $scope.getAll = function () {
        $http.get('controller/getAll.php')
            .then(function (response) {
                $scope.data = response.data;
                console.log($scope.data); // Corrected to $scope.data
                $scope.initialize(response.data);
            });

    };

    $scope.initialize = function (data) {
        // Options de la carte (coordonnées du centre, zoom)
        $scope.mapOptions = {
            center: new google.maps.LatLng(-18.397, 45.644),
            zoom: 7,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        // Création d'une nouvelle carte Google Maps4
        $scope.carte = new google.maps.Map(document.getElementById("carteId"),
            $scope.mapOptions);
        // Coordonnées de l'emplacement du marqueur
        data.forEach(function (location) {
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(location.latitude, location.longitude),
                draggable: false,
                map: $scope.carte
            });
        });


        google.maps.event.addListener($scope.carte, "click", function (event) {
            $scope.latitude = event.latLng.lat();
            $scope.longitude = event.latLng.lng();
            console.log($scope.longitude);
            console.log($scope.latitude);
            $scope.$apply();
        });
    }



    $scope.getAll();
    // console.log($scope.data)
}]);
