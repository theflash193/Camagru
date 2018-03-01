<?php
    include_once "../utils/validation.php";
    include_once "../utils/global.php";
    include_once "../config/setup.php";

    $email = "";
    $username = "";
    $password = "";
    $repassword = "";

    $_SESSION['emailErr'] = '';
    $_SESSION['usernameErr'] = '';
    $_SESSION['passwordErr'] = '';
    $_SESSION['passwordRepeatErr'] = '';
    $error = FALSE;
    $_SESSION['messageError'] = FALSE;
    if (empty($_POST['email']) || $_POST['email'] == '') {
        $_SESSION['emailErr'] = "field required";
        $error = TRUE;
    }
    if (empty($_POST['username'])) {
        $_SESSION['emailErr'] = "field required";
        $error = TRUE;
    }
    if (empty($_POST['password'])) {
        $_SESSION['passwordErr'] = "field required";
        $error = TRUE;
    }
    if (empty($_POST['password_repeat'])) {
        $_SESSION['passwordRepeatErr'] = "field required";
        $error = TRUE;
    }
    if ($error) {
        $_SESSION['messageError'] = TRUE;
        print_r($_SESSION);
        header('Location: ../index.php');
        exit();
    }
    $email = test_input($_POST['email']);
    $username = test_input($_POST['username']);
    $password = test_input($_POST['password']);
    $password_repeat = test_input($_POST['password_repeat']);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['emailErr'] = "Invalid email format";
        $error = TRUE;
    }
    if ($password != $password_repeat) {
        $_SESSION['passwordRepeatErr'] = "password must be the same";
        $error = TRUE;
    }
    if ($error) {
        $_SESSION['messageError'] = TRUE;
        header('Location: ../index.php');
        exit();
    }

    try {
        // echo "world";
        $pdo = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec("USE camagru");
        $pdo->exec("INSERT INTO users (username, password, email, date_creation, cle, actif) VALUES ('$username', '$password', '$email', '".date("Y-m-d")."', '1', true)");
    }
    catch (PDOException $e) {
		echo 'Connexion échouée : ' . $e->getMessage();
    }
    header('Location: ../index.php');
?>