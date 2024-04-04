<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Hangman Word Database</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin: 20px auto;
            font-family: 'Roboto', sans-serif;
        }

        th,
        td {
            border: 2px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: grey;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:nth-child(odd) {
            background-color: #ddd;
        }

        body {
            background: lightskyblue
        }
    </style>
</head>

<body>
    <a href="./">Home</a>

    <style>
        body {
            margin: 30px;
        }

        h2 {
            text-align: center;
            color: white;
            font-family: 'Roboto', sans-serif;
            text-transform: uppercase;
        }

        a {
            border-radius: 5px;
            background: lightskyblue;
            color: white;
            border: solid 1px white;
            cursor: pointer;
            font-size: 1.5em;
            padding: 18px 10px;
            width: 180px;
            margin: 10px;
            text-decoration: none;
            font-family: 'Roboto', sans-serif;
        }

        a:hover {
            transition: all 0.5s ease-in-out;
            background: white;
            border: solid 1px white;
            color: lightskyblue;
        }
    </style>
    <?php
    $host = "localhost";
    $dbname = "hangman";
    $user = "postgres";
    $password = $_SESSION['password'];

    $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);

    echo '<h2>Hangman User Databse</h2>';

    ?>
    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Wins</th>
        </tr>
        <?php

        $query = "SELECT id, username, wins FROM users";
        $statement = $db->prepare($query);
        $statement->execute();

        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['id']) . "</td>";
            echo "<td>" . htmlspecialchars($row['username']) . "</td>";
            echo "<td>" . htmlspecialchars($row['wins']) . "</td>";
            echo "</tr>";
        }

        echo '</table>';

        echo '<h2>Hangman Word Databse</h2>';

        ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Word</th>
            </tr>
            <?php

            $query = "SELECT id, word FROM words";
            $statement = $db->prepare($query);
            $statement->execute();

            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['word']) . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
</body>

</html>