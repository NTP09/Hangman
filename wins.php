<?php
session_start();

if(isset($_SESSION['user']) && $_SERVER["REQUEST_METHOD"] == "GET") {
    $host = 'localhost';
    $dbname = 'hangman';
    $username = 'postgres';
    $password = $_SESSION['password'];
    
    try {
        $db = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $username = $_SESSION['user'];
    
        $query = $db->prepare("UPDATE users SET wins = wins + 1 WHERE username = :username");
        $query->bindParam(':username', $username);
        $query->execute();
    
        echo 'Wins updated successfully';
    } catch (PDOException $e) {
        echo 'Error updating wins: ' . $e->getMessage();
    }
}

?>
