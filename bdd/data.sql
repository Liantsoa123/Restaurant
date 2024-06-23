-- data restaurant
    INSERT INTO
        restaurant
        (
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
            'monde.jpg',
            ST_SetSRID(ST_MakePoint(47.507905, -18.879190), 4326)
        ),
        (
            'Restaurant B',
            -74.935242,
            40.830610,
            'monde.jpg',
            ST_SetSRID(ST_MakePoint(47.515358, -18.879079), 4326)
        ),
        (
            'Restaurant C',
            -73.935242,
            40.530610,
            'monde.jpg',
            ST_SetSRID(ST_MakePoint(47.509720, -18.862445), 4326)
        ),
        (
            'Restaurant D',
            -72.935242,
            40.730610,
            'monde.jpg',
            ST_SetSRID(ST_MakePoint(47.509117, -18.912860), 4326)
        ),
        (
            'Restaurant E',
            -73.935242,
            41.730610,
            'monde.jpg',
            ST_SetSRID(ST_MakePoint(47.514334, -18.868952), 4326)
        );