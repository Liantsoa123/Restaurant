CREATE EXTENSION postgis;

CREATE EXTENSION postgis_topology;

SELECT
    postgis_full_version();

CREATE TABLE restaurant (
    id_restaurant serial PRIMARY KEY,
    name_restaurant text NOT NULL,
    longitude numeric(10, 6) NOT NULL,
    latitude numeric(10, 6) NOT NULL,
    img_restaurant text NOT NULL,
    geom geometry(Point, 4326) NOT NULL
);

CREATE table plat (
    id_plat serial primary key,
    id_restaurant int,
    name_plat text not null,
    foreign key (id_restaurant) references restaurant(id_restaurant)
);

    CREATE
    or Replace view v_restoPlat as
    SELECT
        restaurant.id_restaurant id_restaurant,
        name_restaurant,
        longitude,
        latitude,
        geom,
        name_plat,
        img_restaurant
    from
        restaurant
    left join plat on restaurant.id_restaurant = plat.id_restaurant;

-- requet to search the restaurant arond 10km 
WITH current_position AS (
    SELECT
        ST_SetSRID(ST_MakePoint(-73.935242, 40.730610), 4326) AS geom
)
SELECT
    r.id_restaurant,
    r.name_restaurant,
    r.longitude,
    r.latitude,
    r.name_plat,
    r.img_restaurant
FROM
    v_restoPlat r,
    current_position cp
WHERE
    ST_DWithin(
        r.geom :: geography,
        cp.geom :: geography,
        10000
    )
    and r.name_plat ilike '% %';