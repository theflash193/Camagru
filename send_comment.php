<?php
    include_once "config/setup.php";

    // print_r()
    if (empty($POST["comment"]) ) {
        echo $_POST["comment"];
        $message = $_POST["comment"];
    }
    if (empty($POST["id_photo"]) ) {
        $id_photo = $_POST["id_photo"];
    }
    
    try {
        // echo "world";
        $pdo = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec("USE camagru");
        $pdo->exec("INSERT INTO comments (message, creation_date, id_users, id_photo) VALUES ('$message', '".date("Y-m-d")."', '1', '$id_photo')");
    }
    catch (PDOException $e) {
		echo 'Connexion échouée : ' . $e->getMessage();
    }
    header('Location: galerie.php');
?>