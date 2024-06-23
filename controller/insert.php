<?php
include("../model/function.php");
include("../model/corsPolicy.php");

header("Content-Type: application/json");


$return  = [
    "message" => "some error occurred"
];


if (isset($_GET['name_plat'])) {
    insertPlat($_GET['id_restaurant'], $_GET['name_plat']);
    $return['message'] = 'insert dish successful';
} else {
    $target_dir = "../assets/img/";
    $target_file = $target_dir . basename($_FILES["img_file"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (isset($_POST["name_restaurant"]) && isset($_POST['longitude']) && isset($_POST['latitude'])) {

        // Allow certain file formats (optional, here we're allowing all)
        $allowedTypes = ["jpg", "png", "jpeg", "gif"];
        if (!in_array($imageFileType, $allowedTypes)) {
            // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $return['message'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo  "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["img_file"]["tmp_name"], $target_file)) {
                // echo "The file " . htmlspecialchars(basename($_FILES["img_file"]["name"])) . " has been uploaded.";
                $return["message"] = "The file " . htmlspecialchars(basename($_FILES["img_file"]["name"])) . " has been uploaded";
            } else {
                // echo "Sorry, there was an error uploading your file.";
                $return["message"] = "Sorry, there was an error uploading your file.";
            }
        }

        insertRestaurant($_POST['name_restaurant'], $_POST['latitude'], $_POST['longitude'], htmlspecialchars(basename($_FILES["img_file"]["name"])));
        $return['message'] .= " and Restaurant has been inserted successfully!"; 
    }
}

echo json_encode($return['message']);
