<?php
    include_once "/config/setup.php";
    header("Content-Type: application/json; charset=UTF-8");

try {
    $pdo = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("USE camagru");
    $query = $pdo->query("SELECT title, creation_date, id FROM photo");
    $result = array();
    $result = $query->fetchAll();
    echo json_encode($result);
}
catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}

?>