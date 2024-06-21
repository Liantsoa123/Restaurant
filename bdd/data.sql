-- data restaurant
INSERT INTO
    restaurant (
        name_restaurant,
        longitude,
        latitude,
        img_restaurant,
        geom
    )
VALUES
    (
        'Restaurant A',
        -73.935242,
        40.730610,
        'image_a.jpg',
        ST_SetSRID(ST_MakePoint(-73.935242, 40.730610), 4326)
    ),
    (
        'Restaurant B',
        -74.935242,
        40.830610,
        'image_b.jpg',
        ST_SetSRID(ST_MakePoint(-74.935242, 40.830610), 4326)
    ),
    (
        'Restaurant C',
        -73.935242,
        40.530610,
        'image_c.jpg',
        ST_SetSRID(ST_MakePoint(-73.935242, 40.530610), 4326)
    ),
    (
        'Restaurant D',
        -72.935242,
        40.730610,
        'image_d.jpg',
        ST_SetSRID(ST_MakePoint(-72.935242, 40.730610), 4326)
    ),
    (
        'Restaurant E',
        -73.935242,
        41.730610,
        'image_e.jpg',
        ST_SetSRID(ST_MakePoint(-73.935242, 41.730610), 4326)
    );

-- data plat
INSERT INTO
    plat (id_restaurant, name_plat)
VALUES
    (3, 'Pizza Margherita'),
    (4, 'Spaghetti Carbonara'),
    (2, 'Sushi'),
    (2, 'Ramen'),
    (3, 'Tacos'),
    (3, 'Burritos'),
    (4, 'Burger'),
    (4, 'Fries'),
    (5, 'Pasta Alfredo'),
    (5, 'Caesar Salad');


