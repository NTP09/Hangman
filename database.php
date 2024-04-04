<?php

session_start();

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($_SESSION['password'])) {
    $_SESSION['password'] = "";
}

if (isset($data['item'])) {
    $_SESSION['password'] = $data['item'];
}

$conn_str = "host=localhost port=5432 dbname=hangman user=postgres password=" . $_SESSION['password'];
$conn = pg_connect($conn_str);

if (!$conn) {
    echo True;
} else {
    pg_close($conn);
}
