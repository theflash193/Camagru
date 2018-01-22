<?php
    include_once "config/database.php";
    include_once "config/setup.php";
    
    // Start session //

    function create_user($pdo, $username, $password, $email) {
        $time = date("Y/m/d");
        $cle = md5(microtime(TRUE) * 100000);

        $sql = "INSERT INTO Users (username, password, email, date_creation, cle) VALUES ('$username', '$password', '$email', '$time', '$cle')";
        $pdo->exec($sql);
        active_account($email, $username, $cle);
    }
    
    function active_account($email, $username, $cle) {
        $destinataire = $email;
        ini_set("SMTP", "smtp.gmail.com");
        $sujet = "Activer votre compte" ;
        $entete = "From: inscription@camagru.com" ;
        
        // Le lien d'activation est composé du login(log) et de la clé(cle)
        $message = 'Bienvenue sur Camagru,
        
        Pour activer votre compte, veuillez cliquer sur le lien ci dessous
        ou copier/coller dans votre navigateur internet.
        
        localhost/activation.php?log='.urlencode($username).'&cle='.urlencode($cle).'
        
        
        ---------------
        Ceci est un mail automatique, Merci de ne pas y ré
        pondre.';
        
        
        mail($destinataire, $sujet, $message, $entete);
    }
?>
µ

