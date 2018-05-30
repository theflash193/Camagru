<?php
include_once $_SERVER['DOCUMENT_ROOT']."/camagru/config/setup.php";
include_once $_SERVER['DOCUMENT_ROOT']."/camagru/utils/global.php";
// include_once "utils/insert.php";
// create_user($pdo, 'simon muran', 'maxgord77', 'flash-gordon77176@gmail.com');
?>

<!DOCTYPE html>
<html>
    <title>W3.CSS Template</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
    <link rel="stylesheet" href="/camagru/public/style/style.css">
</html>

<div class="navbar-fixed">
    <div class="link">
        <a href="/camagru/index.php">Home</a>
        <a href="/camagru/galerie.php">Galerie</a>
        <a href="/camagru/view/montage.php">Montage d'image</a>
    </div>
    <div class="link">
<?php if (empty($_SESSION['logged'])) {?>
    <a  onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Connexion</a>
    <a  onclick="document.getElementById('id02').style.display='block'" style="width:auto;">Inscription</a>
<?php } else {?>
    <a href="server/deconnexion.php">Deconnexion</a>
<?php }?> 
    </div>
</div>
<body>