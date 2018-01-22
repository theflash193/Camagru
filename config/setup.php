<?php
    include_once "config/database.php";
    
    // Start session //

    try {
        $pdo = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec("CREATE DATABASE IF NOT EXISTS camagru");
        $pdo->exec("USE camagru");
        $pdo->exec("DROP TABLE users");
        $pdo->exec("CREATE TABLE IF NOT EXISTS users (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            username VARCHAR(30) NOT NULL,
            password VARCHAR(30) NOT NULL,
            email VARCHAR(50),
            date_creation TIMESTAMP,
            cle VARCHAR(32),
            actif INTEGER DEFAULT '0'
            )");
    }
    catch (PDOException $e) {
		echo 'Connexion échouée : ' . $e->getMessage();
    }
    
?>