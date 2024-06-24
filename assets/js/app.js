var app = angular.module('app', []);

app.controller('Map', ['$scope', '$http', function ($scope, $http) {
    $scope.data = [];

    // Options de la carte (coordonnées du centre, zoom)
    $scope.mapOptions = {
        center: new google.maps.LatLng(-18.916, 47.515),
        zoom: 15,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    // Création d'une nouvelle carte Google Maps
    $scope.carte = new google.maps.Map(document.getElementById("carteId"), $scope.mapOptions);
    // $scope.carte;
    $scope.dish = {
        id_restaurant: 0,
        name_plat: null,
        name_restaurant: null,
    }

    $scope.restaurant = {
        latitude: '',
        longitude: '',
        name_restaurant: '',
        img_file: null
    }

    $scope.markers = [];

    $scope.viewFormPLat = true;

    $scope.getAll = function () {
        $http.get('controller/getAll.php')
            .then(function (response) {
                $scope.data = response.data;
                console.log($scope.data);
                $scope.initialize(response.data);
            });
    };

    $scope.insertDish = function () {
        $http({
            url: "controller/insert.php",
            method: "GET",
            params: $scope.dish
        })
            .then(function (response) {
                alert(response.data);
            })
    }

    $scope.submitForm = function (idForm) {
        const form = document.getElementById(idForm);
        const formData = new FormData(form);
        console.log("insert resto")
        fetch('controller/insert.php', {
            method: 'POST',
            body: formData
        })
            .then(response => response.text())
            .then(data => {
                console.log(data); // Process the response from the PHP script
                alert('Form submitted successfully!');
                $scope.getAll();
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while submitting the form.');
            });
    }

    $scope.search = function (idForm) {
        const form = document.getElementById(idForm);
        const formData = new FormData(form);
        console.log("search resto")
        fetch('controller/search.php', {
            method: 'POST',
            body: formData
        })
            .then(response => response.text())
            .then(data => {
                console.log(JSON.parse(data)); // Process the response from the PHP script
                $scope.data = JSON.parse(data);
                $scope.initialize($scope.data)
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while searching restaurant.');
            });
    }


    $scope.initialize = function (data) {
        // Clear existing markers
        if ($scope.markers) {
            $scope.markers.forEach(function (marker) {
                marker.setMap(null);
            });
        }
        $scope.markers = [];

        

        // Coordonnées de l'emplacement du marqueur
        data.forEach(function (location) {
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(location.latitude, location.longitude),
                draggable: false,
                map: $scope.carte
            });

            var infowindow = new google.maps.InfoWindow({
                content: '<div width:300px >' +
                    '<h3>' + location.name_restaurant + '</h3>' +
                    '<div style="height: 300px; width:400px ; overflow:hidden" ><img src="assets/img/' + location.img_restaurant + '" style="height: 100%; width:100%; object-fit:cover ; object-position:center " ></div></div>'
            });

            marker.addListener("mouseover", function () {
                infowindow.open($scope.carte, marker);
            });

            marker.addListener("mouseout", function () {
                infowindow.close();
            });

            marker.addListener("click", function () {
                $scope.viewFormPLat = false;
                $scope.$apply(function () {
                    $scope.dish.id_restaurant = location.id_restaurant;
                    $scope.dish.name_restaurant = location.name_restaurant;
                });
            });

            // Push the marker to the array
            $scope.markers.push(marker);
        });


        google.maps.event.addListener($scope.carte, "click", function (event) {
            $scope.restaurant.latitude = event.latLng.lat();
            $scope.restaurant.longitude = event.latLng.lng();
            $scope.viewFormPLat = true;
            console.log($scope.restaurant.longitude);
            console.log($scope.restaurant.latitude);
            $scope.$apply();
        });
    };
    $scope.getAll();
}]);
