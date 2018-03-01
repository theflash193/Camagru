<?php
    include_once "../utils/global.php";
    
    unset($_SESSION['logged']);
    unset($_SESSION['username']);
    unset($_SESSION['messageError']);
    unset($_SESSION['emailErr']);
    unset($_SESSION['passwordErr']);
    unset($_SESSION['usernameErr']);
    unset($_SESSION['passwordErr']);
    unset($_SESSION['passwordRepeatErr']);
    session_destroy();   
    header('Location: ../index.php');
?>