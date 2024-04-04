<?php

session_start();

$conn_str = "host=localhost port=5432 dbname=hangman user=postgres password=" . $_SESSION['password'];
$conn = pg_connect($conn_str);

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_SERVER["CONTENT_TYPE"]) && $_SERVER["CONTENT_TYPE"] == "application/json") {

    $sql = "SELECT word FROM public.words ORDER BY RANDOM() LIMIT 1";
    $result = pg_query($conn, $sql);

    if ($result) {
        $row = pg_fetch_assoc($result);
        if ($row) {
            $randomWord = $row['word'];
            echo $randomWord;
        } else {
            echo "error";
        }
    } else {
        echo "error";
    }
}

pg_close($conn);
