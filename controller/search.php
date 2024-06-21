<?php
include("../model/function.php");
include("../model/corsPolicy.php");


$dish = $_POST['dish'];
$raduis = $_POST['radius'];
$longitude = $_POST['longitude'];
$latitude = $_POST['latitude'];
$result = searchRestaurant($longitude, $latitude, $raduis, $dish);
echo json_encode($result);
