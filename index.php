<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GASTRONOMIE PIZZA</title>
    <style>
        *,
        *::before,
        *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            display: flex;
            justify-content: center;

            width: 100vw;
            height: 100vh;
            background: url('assets/img/R.jpeg');
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }

        section {
            flex-basis: 50%;

            display: flex;
            align-items: center;
            justify-content: center;
        }

        a {
            width: 400px;
            padding: 1rem 1.5rem;
            border: 4px solid black;
            border-radius: 1rem;

            color: white;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            font-size: 1.5rem;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
        }

        a:hover {
            cursor: pointer;
        }

        .left {
            background-color: rgba(255, 255, 255, .9);
        }

        .left a {
            border-color: transparent;
            background-color: rgb(255, 50, 50);
        }

        .left a:hover {
            border: 4px solid rgb(255, 50, 50);
            background-color: transparent;
            color: rgb(255, 50, 50);

            transition: 200ms ease;
        }

        .right {
            background-color: rgba(255, 50, 50, .9);
            backdrop-filter: blur(6px);
            -webkit-backdrop-filter: blur(6px);
        }

        .right a {
            border-color: transparent;
            background-color: white;
            color: rgb(255, 50, 50);
        }
        
        .right a:hover {
            background-color: transparent;
            border: 4px solid white;
            color: white;

            transition: 200ms ease;
        }
    </style>
</head>

<body>
    <section class="right">
        <a href="back-office.php">Back Office</a>
    </section>

    <section class="left">
        <a href="front-office.php">Front Office</a>
    </section>
</body>

</html>