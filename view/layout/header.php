<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT']."/camagru/config/setup.php";
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
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous"> -->
</html>

<body onload="onLoad()">

<?php
     if (isset($_SESSION['error'])) {
        echo "<div class=\"alert\">";
        echo "<span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>";
        echo $_SESSION['message'];
        echo "</div>";
        unset($_SESSION['message']);
        unset($_SESSION['error']);
    }
?>

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
    <a href="/camagru/server/deconnexion.php">Deconnexion</a>
<?php }?> 
    </div>
</div>
