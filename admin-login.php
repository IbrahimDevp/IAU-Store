<?php include('includes/header_admin_login.php');?>

<link rel="stylesheet" type="text/css" href="style.css?<?php echo time(); ?>"/>
					<div class="center_content">
						<div class="admin_title_box">Sign In</div>
						<div class="admin_border_box">
							<form action="includes\Checklogin.php" method="post">
							<input type="text" name="username" class="input_admin" placeholder="Username"required/><br>
							<input type="password" name="pass" class="input_admin" placeholder="Password"required/>
							<?php 
							# Error handling for empty inputs
							if (isset($_GET["error"])) {

							if ($_GET["error"] == "emptyinput") {
							echo"<p style='color: red;'><b> Please Fill In All Fields </b></p>";
							}
							# Error handling for wrong inputs
							else if ($_GET["error"] == "wronglogin") {
							echo"<p style='color: red;'><b>  Incorrect Login Information  </b></p>";
							}
							

							}
?>
							<div class="bt"><button class="button_admin" name="submit" type="submit">Login</button></div>
							</form>
						</div>
					</div>

<?php include('includes/footer.php');?>
