<?php
    include_once "config/database.php";
    
    // Start session //
    session_start();

    try {
        $_SESSION["pdo"] = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $_SESSION["pdo"]->exec("CREATE DATABASE IF NOT EXISTS camagru");
        $_SESSION["pdo"]->exec("USE camagru");
        $_SESSION["pdo"]->exec("CREATE TABLE Users (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            username VARCHAR(30) NOT NULL,
            password VARCHAR(30) NOT NULL,
            email VARCHAR(50),
            date_creation TIMESTAMP
            )");
    }
    catch (PDOException $e) {
		echo 'Connexion échouée : ' . $e->getMessage();
    }
    
    // $_SESSION["pdo"] = $pdo;
    print_r($_SESSION);
?>