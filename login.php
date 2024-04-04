<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: lightskyblue;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 200px
        }

        .container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px white;
            padding: 20px;
            width: 500px;
            text-align: center;
        }

        h1 {
            margin-top: 0;
            color: lightskyblue;
        }

        p {
            color: black;
        }

        input[type="text"],
        input[type="password"],
        button {
            width: calc(100% - 50px);
            padding: 10px;
            margin: 15px 0;
            border: none;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="text"],
        input[type="password"] {
            background-color: lightgrey;
        }

        button {
            background-color: lightskyblue;
            color: white;
            cursor: pointer;
        }

        input[type="submit"] {
            background-color: lightskyblue;
            color: white;
            border: none;
            cursor: pointer;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 3px;
            display: inline-block;

        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        session_start();

        if (isset($_SESSION['user'])) {
            header('Location: user.php');
            exit();
        } else {
            $host = 'localhost';
            $dbname = 'hangman';
            $username = 'postgres';
            $password = $_SESSION['password'];

            try {
                $db = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Connection failed: " . $e->getMessage());
            }

            if (isset($_POST['again'])) {
                header('Location: login.php');
                exit();
            }

            if (isset($_POST['home'])) {
                header('Location: ./');
                exit();
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['password']) && isset($_POST['username'])) {
                $enteredPassword = $_POST['password'];
                $enteredUsername = $_POST['username'];

                if ($enteredPassword == 'admin' && $enteredUsername == 'admin') {
                    header('Location: admin.php');
                    exit();
                } else {
                    $query = $db->prepare("SELECT * FROM users WHERE username=:username");
                    $query->bindParam(':username', $enteredUsername);
                    $query->execute();

                    if ($query->rowCount() > 0) {
                        $row = $query->fetch(PDO::FETCH_ASSOC);
                        $temp = $row['password'];
                        if ($temp == $enteredPassword) {
                            $_SESSION['user'] = $enteredUsername;
                            header('Location: user.php');
                            exit();
                        } else {
                            echo '<h1>Wrong password</h1>';
                            echo '<form method="POST" action="">';
                            echo '<input type="submit" name="again" value="Try again">';
                            echo '</form>';
                        }
                    } else {
                        $query = $db->prepare("INSERT INTO users (username, password, wins) VALUES (:username, :password, 0)");
                        $query->bindParam(':username', $enteredUsername);
                        $query->bindParam(':password', $enteredPassword);
                        $query->execute();
                        $_SESSION['user'] = $enteredUsername;
                        header('Location: user.php');
                        exit();
                    }
                }
            } else {
        ?>
                <h1>Login/Create Account</h1>
                <p>Create an account or login to an existing account.</p>
                <p>If you have admin role, please enter "admin" as username and password</p>
                <form method="POST" action="login.php">
                    <input type="text" name="username" placeholder="Username" required><br>
                    <input type="password" name="password" placeholder="Password" required><br>
                    <button type="submit">Login</button>
                </form>
                <form method="POST" action="">
                    <input type="submit" name="home" value="Home">
                </form>
        <?php
            }
        }
        ?>
    </div>
</body>

</html>