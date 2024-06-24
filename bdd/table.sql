-- Required extensions
CREATE EXTENSION postgis;

CREATE EXTENSION postgis_topology;

-- Checking PostGIS full version
SELECT
    postgis_full_version();

-- Creating the restaurant table
CREATE TABLE restaurant (
    id_restaurant serial PRIMARY KEY,
    name_restaurant text NOT NULL,
    longitude numeric(10, 6) NOT NULL,
    latitude numeric(10, 6) NOT NULL,
    img_restaurant text NOT NULL,
    geom geometry(Point, 4326) NOT NULL
);

-- Creating the plat table
CREATE TABLE plat (
    id_plat serial PRIMARY KEY,
    id_restaurant int,
    name_plat text NOT NULL,
    FOREIGN KEY (id_restaurant) REFERENCES restaurant(id_restaurant)
);

-- Creating or replacing the view v_restoPlat
CREATE
OR REPLACE VIEW v_restoPlat AS
SELECT
    restaurant.id_restaurant,
    name_restaurant,
    longitude,
    latitude,
    geom,
    name_plat,
    img_restaurant
FROM
    restaurant
    LEFT JOIN plat ON restaurant.id_restaurant = plat.id_restaurant;

-- Query to search for restaurants around 10km with 'pizza' in the plat name
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
    AND r.name_plat ILIKE '%pizza%';