<?php
    // print_r($_POST);
    // echo $_POST['filename'];
    // $img = $_POST['image'];
    // $img = substr(explode(";",$img)[1], 7);
    // $success = file_put_contents('img.jpg', base64_encode($img));
    // imagecreatefrompng("img.png");
    // echo $img;
    
    // // echo $data;
	// $img = str_replace('data:image/png;base64,', '', $data);
    // // echo $img;
	// // $img = str_replace(' ', '+', $img);
    // // echo $img;
	// $final = base64_decode($img);
    // echo $data;
    // $success = file_put_contents("donald.png", $img);
    // if ($success == FALSE) {
        //     echo "error";
        // } else {
            //     echo "OK";
            //     echo $success;
            // }
            // $data = base64_encode($data);
            // print_r($_FILES['userfile']);
    phpinfo();
    header('Content-Type: image/jpeg');
    // $im = imagecreatefromjpeg($_FILES['userfile']['name']);
    $im = imagecreatefromjpeg("https://celebrityhometown.com/wp-content/uploads/featured-img/c/charlotte-sartre.jpg");
    // $im = imagecreatefromjpeg('/camagru/img/yuyu1.jpg');
    // // $im = imagecreatefromstring($data);
    if (!$im) {
        imagejpeg($im);
        imagedestroy($im);
    }
    else {
        echo 'An error occurred.';
    }
?>