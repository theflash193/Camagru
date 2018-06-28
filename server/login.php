<?php
    include_once "../utils/validation.php";
    include_once "../utils/global.php";
    include_once "../config/setup.php";

    $email = "";
    $password = "";
    $_SESSION['emailErr'] = '';
    $_SESSION['passwordErr'] = '';
    $error = FALSE;
    $_SESSION['messageError'] = '';
    if (empty($_POST['email']) || $_POST['email'] == '') {
        $_SESSION['emailErr'] = "field required";
        $error = TRUE;
    }
    if (empty($_POST['password'])) {
        $_SESSION['passwordErr'] = "field required";
        $error = TRUE;
    }
    if ($error) {
        $_SESSION['messageError'] = 'login';
        print_r($_SESSION);
        header('Location: ../index.php');
        exit();
    }
    $email = test_input($_POST['email']);
    $password = test_input($_POST['password']);
    if ($error) {
        $_SESSION['messageError'] = 'login';
        header('Location: ../index.php');
        exit();
    }
    try {
        $pdo = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec("USE camagru");
        $query = $pdo->query("SELECT * FROM users WHERE '$email' = username AND '$password' = password");
        $result = $query->fetchAll(); 
        if (count($result) != 1) {
            $_SESSION['error'] = true;
            $_SESSION['message'] = 'email or password is not valid';
            header('Location: ../index.php');
        }
        $_SESSION['id'] = $result[0]['id'];
        $_SESSION['username'] = $result[0]['username'];
    }
    catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
    }
    $_SESSION['logged'] = TRUE;

    header('Location: ../index.php');
?>
?>