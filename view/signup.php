

	<!-- The Modal (contains the Sign Up form) -->
	<div id="id02" class="modal">
		<span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
		<form class="modal-content" method="POST" action="server/signup.php">
			<div class="container">
				<h1>Sign Up</h1>
				<p>Please fill in this form to create an account.</p>
				<hr>
				<label for="email"><b>Email</b></label>
				<?php if (!empty($_SESSION['emailErr'])) { ?>
					<br><span style="color: red;"><?php echo $_SESSION['emailErr']?></span>
				<?php } ?>
				<input type="text" placeholder="Enter Email" name="email">
				<br>
				
				<label for="email"><b>Username</b></label>
				<?php if (!empty($_SESSION['usernameErr'])) { ?>
					<br><span style="color: red;"><?php echo $_SESSION['usernameErr']?></span>
				<?php } ?>
				<input type="text" placeholder="Enter Your username" name="username" required>
				<br>

				<label for="password"><b>Password</b></label>
				<?php if (!empty($_SESSION['passwordErr'])) { ?>
					<br><span style="color: red;"><?php echo $_SESSION['passwordErr']?></span>
				<?php } ?>
				<input type="password" placeholder="Enter Password" name="password" required>
				<?php if (!empty($_SESSION['passwordErr'])) { ?>
					<span class="error"><?php echo $_SESSION['passwordErr']?></span>
				<?php } ?>
				<br>


				<label for="password_repeat"><b>Repeat Password</b></label>
				<?php if (!empty($_SESSION['passwordRepeatErr'])) { ?>
					<br><span style="color: red;"><?php echo $_SESSION['passwordRepeatErr']?></span>
				<?php } ?>
				<input type="password" placeholder="Repeat Password" name="password_repeat" required>
				<br>


				<div class="clearfix">
					<button class="button cancelbtn" type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
					<button  class="button confirmbtn" type="submit" class="signup">Sign Up</button>
				</div>
			</div>
		</form>
	</div>	
