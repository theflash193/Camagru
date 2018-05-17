<?php
	include_once "config/setup.php";
	include_once "utils/global.php";
	include_once "view/layout/header.php";
?>

        <video autoplay muted loop>
            <source src="public/video/final-fantasy-xv.mp4" width="100%">
            </source>
        </video>
        <div class="navbar-fixed">
            <div class="link">
                <a>Home</a>
                <a>Galerie</a>
                <a href="view/montage.php">Creer son image</a>
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
        <div class="header">
            <h1>Bienvenue sur Camagru</h1>
            <p>Admirer les image cree par la communaute ou cree en vous meme</p>


    <?php include_once('view/signup.php')?>
    <?php include_once('view/authentification.php')?>

    <?php if (!empty($_SESSION['messageError']) && $_SESSION['messageError'] == 'signup') {?>
    <script>document.getElementById('id02').style.display='block'</script>
    <?php }?>
    <?php if (!empty($_SESSION['messageError']) && $_SESSION['messageError'] == 'login') {?>
    <script>document.getElementById('id01').style.display='block'</script>
    <?php }?>
    </body>
</html>
