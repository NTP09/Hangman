<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome User</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: lightskyblue;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-transform: uppercase;
        }

        .container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px white;
            padding: 20px;
            width: 400px;
            text-align: center;
        }


        input[type="submit"] {
            background-color: lightskyblue;
            color: white;
            border: none;
            cursor: pointer;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 3px;
        }

        a {
            color: lightskyblue;
            text-decoration: none;
            margin-top: 10px;
            display: inline-block;
        }

    </style>
</head>
<body>
    <div class="container">
        <?php
        session_start();

        if (isset($_POST['logout'])) {
            unset($_SESSION['user']);
        }

        if (isset($_SESSION['user'])) {
            echo '<h1>Welcome ' . $_SESSION['user'] . '!</h1>';
            echo '<form method="POST" action="">'; 
            echo '<input type="submit" name="logout" value="Log Out">';
            echo '</form>';
            echo '<a href="./">Home</a>';

        } else {
            header('Location: ./');
            exit();
        }
        ?>
    </div>
</body>
</html>
