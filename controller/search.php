<?php
include("../model/function.php");
include("../model/corsPolicy.php");


$result = [];
$raduis = $_POST['radius'] * 1000 ;
$longitude = $_POST['longitude'];
$latitude = $_POST['latitude'];
if (isset($_POST['name_plat'])) {
    $dish = $_POST['name_plat'];
    $result = searchRestaurant($longitude, $latitude, $raduis, $dish);
} else {
    $result = searchRestaurant($longitude, $latitude, $raduis, '');
}
echo json_encode($result);
