<?php
    include_once "/config/setup.php";
    header("Content-Type: application/json; charset=UTF-8");

    $id = $_GET['id'];
try {
    $pdo = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("USE camagru");
    $query = $pdo->query("SELECT * FROM comments WHERE id_photo='$id'");
    $result = array();
    $result = $query->fetchAll();
    echo json_encode($result);
}
catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}

?>