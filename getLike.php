<?php
    include_once "/config/setup.php";
    session_start();
    header("Content-Type: application/json; charset=UTF-8");
    
    $id_user = $_SESSION['id'];
    $id_photo = $_GET['id_photo'];
try {
    $pdo = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("USE camagru");
    $query = $pdo->query("SELECT * FROM likes WHERE id_photo='$id_photo' AND id_user='$id_user'");
    $result = $query->fetchAll();
    echo json_encode($result);
}
catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}

?>