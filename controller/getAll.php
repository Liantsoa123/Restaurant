<?php
include("../model/function.php");
include("../model/corsPolicy.php");

header("Content-Type: application/json");


// if (isset($_POST['dish'])) {
//     insertPlat($_POST['id_restaurant'], $_POST['dish']);
// }
$list_Restaurant = getRestaurant();

echo json_encode($list_Restaurant);
