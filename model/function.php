<?php
include("connexion.php");


function insertRestaurant($name, $latitude, $longitude, $img_name)
{
    $con = dbconnect();
    $query = "INSERT INTO restaurant (name_restaurant, latitude, longitude, img_restaurant, geom) 
            VALUES (?, ?, ?, ?, ST_SetSRID(ST_MakePoint(?, ?), 4326))";
    $statement = $con->prepare($query);
    $statement->bindParam(1, $name, PDO::PARAM_STR);
    $statement->bindParam(2, $latitude, PDO::PARAM_STR);
    $statement->bindParam(3, $longitude, PDO::PARAM_STR);
    $statement->bindParam(4, $img_name, PDO::PARAM_STR);
    $statement->bindParam(5, $longitude, PDO::PARAM_STR);
    $statement->bindParam(6, $latitude, PDO::PARAM_STR);
    $statement->execute();
}


function getRestaurant()
{
    $con = dbconnect();
    $result = $con->query("SELECT id_restaurant , name_restaurant, longitude, latitude, img_restaurant FROM restaurant");
    $restaurants = [];

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $restaurant = array(
            'id_restaurant' => $row['id_restaurant'],
            'name_restaurant' => $row['name_restaurant'],
            'longitude' => $row['longitude'],
            'latitude' => $row['latitude'],
            'img_restaurant' => $row['img_restaurant']
        );
        $restaurants[] = $restaurant;
    }

    return $restaurants;
}



// function searchRestaurant($longitude, $latitude, $rayon, $name_Plat,)
// {

//     $con = dbconnect();
//     $query = "
// WITH current_position AS (
//     SELECT ST_SetSRID(ST_MakePoint(?, ?), 4326) AS geom
// )
// SELECT 
//     r.id_restaurant,
//     r.name_restaurant,
//     r.longitude,
//     r.latitude,
//     r.name_plat,
//     r.img_restaurant
// FROM 
//     v_restoPlat r,
//     current_position cp
// WHERE 
//     ST_DWithin(r.geom::geography, cp.geom::geography, ?)
// ";

//     $statement = $con->prepare($query);
//     $statement->bindParam(1, $longitude, PDO::PARAM_INT);
//     $statement->bindParam(2, $latitude, PDO::PARAM_INT);
//     $statement->bindParam(3, $rayon, PDO::PARAM_INT);
//     // $statement->bindParam(4, $name_Plat, PDO::PARAM_STR);

//     // Concatenate % with the search term in PHP
//     $name_Plat = "%" . $name_Plat . "%";

//     $statement->execute();
//     return $statement->fetchAll(PDO::FETCH_ASSOC);
// }

function searchRestaurant($longitude, $latitude, $distance, $name_plat)
{
    $pdo = dbconnect();
    $sql = "
        SELECT 
            r.id_restaurant, 
            r.name_restaurant, 
            r.longitude, 
            r.latitude, 
            r.img_restaurant
        FROM 
            restaurant r
        JOIN 
            plat p ON r.id_restaurant = p.id_restaurant
        WHERE 
            ST_DWithin(
                r.geom::geography,
                ST_SetSRID(ST_MakePoint(:longitude, :latitude), 4326)::geography,
                :distance
            )
            AND p.name_plat = :name_plat
    ";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':longitude', $longitude);
    $stmt->bindParam(':latitude', $latitude);
    $stmt->bindParam(':distance', $distance, PDO::PARAM_INT);
    $stmt->bindParam(':name_plat', $name_plat);

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function insertPlat($id_restaurant, $name_Plat)
{
    $con = dbconnect();
    $query = "insert into plat (id_restaurant , name_plat) values (?,?)";
    $statement = $con->prepare($query);
    $statement->bindParam(1, $id_restaurant, PDO::PARAM_INT);
    $statement->bindParam(2, $name_Plat, PDO::PARAM_STR);
    $statement->execute();
}
