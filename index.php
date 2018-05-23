<?php
	include_once "config/setup.php";
	include_once "utils/global.php";
	include_once "view/layout/header.php";
?>
    <video autoplay muted loop>
        <source src="/camagru/public/video/final-fantasy-xv.mp4" width="100%"></source>
    </video>
    <div class="row">
        <div class="column header">
            <div class="content">
                <h1 id="title">Bienvenue sur Camagru</h1>
                <p>Admirer les image cree par la communaute ou cree en vous meme</p>
            </div>
        </div>
    </div>
    <?php include_once('view/signup.php')?>
    <?php include_once('view/authentification.php')?>

    <?php if (!empty($_SESSION['messageError']) && $_SESSION['messageError'] == 'signup') {?>
    <script>document.getElementById('id02').style.display='block'</script>
    <?php }?>
    <?php if (!empty($_SESSION['messageError']) && $_SESSION['messageError'] == 'login') {?>
    <script>document.getElementById('id01').style.display='block'</script>
    <?php }?>

    <?php include_once "/view/layout/footer.php";?>
    </body>
</html>
