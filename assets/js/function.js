
function submitForm(idForm) {
    const form = document.getElementById(idForm);
    const formData = new FormData(form);

    fetch('controller/insert1.php', {
        method: 'POST',
        body: formData
    })
        .then(response => response.text())
        .then(data => {
            console.log(data); // Process the response from the PHP script
            alert('Form submitted successfully!');
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while submitting the form.');
        });
}


    function initialize() {
        // Options de la carte (coordonnées du centre, zoom)
        var mapOptions = {
            center: new google.maps.LatLng(-18.397, 45.644),
            zoom: 6,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        // Création d'une nouvelle carte Google Maps
        var carte = new google.maps.Map(document.getElementById("carteId"),
            mapOptions);

        // Coordonnées de l'emplacement du marqueur
        fetch('controller/getAll.php')
            .then(response => response.json())
            .then(data => {
                data.forEach(function (location) {
                    var marker = new google.maps.Marker({
                        position: new google.maps.LatLng(location.latitude, location.longitude),
                        draggable: false,
                        map: carte
                    });
                });
            })
            .catch(error => console.error('Error fetching data:', error));
    }
// Ajout d'un écouteur d'événement au chargement de la fenêtre pour initialiser la carte
google.maps.event.addDomListener(window, 'load', initialize);
