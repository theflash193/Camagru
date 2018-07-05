<?php
    session_start();
    include_once "/config/setup.php";

    header("Content-Type: application/json; charset=UTF-8");
    $id = $_SESSION['id'];
try {
    $pdo = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("USE camagru");
    $query = $pdo->query("SELECT * FROM photo WHERE id_user='$id'");
    $result = array();
    $result = $query->fetchAll();
    echo json_encode($result);
}
catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}

?>