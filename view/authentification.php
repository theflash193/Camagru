<div id="id01" class="modal">
  
  <form method="POST" class="modal-content animate" action="server/login.php">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="img_avatar2.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="email"><b>Username</b></label>
        <?php if (!empty($_SESSION['emailErr'])) { ?>
            <br><span style="color: red;"><?php echo $_SESSION['emailErr']?></span>
        <?php } ?>
      <input type="text" placeholder="Enter your email" name="email" required>

      <label for="password"><b>Password</b></label>
        <?php if (!empty($_SESSION['passwordErr'])) { ?>
            <br><span style="color: red;"><?php echo $_SESSION['passwordErr']?></span>
        <?php } ?>
      <input type="password" placeholder="Enter Password" name="password" required>
        
      <button type="submit">Login</button>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot<a href="#">password?</a></span>
    </div>
  </form>
</div>