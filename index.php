<?php
	include_once "config/setup.php";
	include_once "utils/global.php";
	// include_once "utils/insert.php";
	// create_user($pdo, 'simon muran', 'maxgord77', 'flash-gordon77176@gmail.com');
?>

<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
	body {font-family: "Times New Roman", Georgia, Serif;}
	h1,h2,h3,h4,h5,h6 {
		font-family: "Playfair Display";
		letter-spacing: 5px;
	}

	.header {
		padding: 80px;
		text-align: center;
		color: white;
		font-size: 20px;
	} 

	body {
		margin: 0;
		background: #000; 
	}

	video {
		position: fixed;
		right: 0;
		bottom: 0;
		min-width: 100%;
		min-height: 100%;
		background-size: cover;
		z-index: -1; 
	}

	.navbar-fixed {
		background: black;
		width: 100%;
		display: flex;
		justify-content: space-between;
	}

	.navbar-fixed > div > a {
		color: white;
		text-decoration: none;
		padding: 10px 10px;
	}
	.link {
		color: white;
		text-decoration: none;
		padding: 10px 10px;
	}

	.navbar-fixed a:hover{
		color: black;
		padding: 10px 10px;
		text-decoration: none;
		background-color: white;
	}

	/* .left {
		align-self: flex-start;
		color: white;
	} */

	.right {
		color: white;
	}

	/* Modal */
	/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
    color: black;
}
.error {
    color: red;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #fff;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
/* Modal */
* {box-sizing: border-box}

/* Full-width input fields */
  input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
  padding: 16px;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
    width: 100%;
  }
}
</style>
<body>
	<video autoplay muted loop>
		<source src="public/video/final-fantasy-xv.mp4" width="100%">
		</source>
	</video>
	<div class="navbar-fixed">
		<div class="link">
			<a>Home</a>
			<a>Galerie</a>
			<a>Creer son image</a>
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
