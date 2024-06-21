<?php
include("../model/corsPolicy.php");
include("../model/function.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dish = $_POST['dish'] ?? '';
    $id_restaurant = $_POST['id_restaurant'] ?? '';
    insertPlat($id_restaurant, $dish);
    echo json_encode(array('success' => true));
} else {
    echo json_encode(array('success' => false));
}
