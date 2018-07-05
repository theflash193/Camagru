<?php
    session_start();
    include_once "/config/setup.php";

    $id = $_GET['id'];
    try {
        $pdo = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec("USE camagru");
        $query = $pdo->query("DELETE FROM photo WHERE id='$id'");
    }
    catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
    }

?>