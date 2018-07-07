<?php
    include_once "/config/setup.php";
    session_start();
    header("Content-Type: application/json; charset=UTF-8");

    print_r($_GET);
    $id_photo = $_GET['id_photo'];
    $id_user = $_SESSION['id'];
try {
    $pdo = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("USE camagru");
    $query = $pdo->query("SELECT * FROM likes WHERE id_photo='$id_photo' AND id_user='$id_user'");
    $result = $query->fetchAll();
    if (count($result) == 0) {
        $query = $pdo->query("INSERT INTO likes (id_photo, id_user, liked) VALUES ('$id_photo', '$id_user', TRUE)");
    } else {
        if ($result[0]['liked']) {
            $query = $pdo->query("UPDATE likes SET liked=FALSE WHERE id_photo='$id_photo' AND id_user='$id_user'");
        } else {
            $query = $pdo->query("UPDATE likes SET liked=TRUE WHERE id_photo='$id_photo' AND id_user='$id_user'");
        }
    }
}
catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}

?>