
<?php
session_start();
require ('includes/db_connect.php');
?>

<!DOCTYPE HTML>
<html lang="en">
	<head>
	<meta charset="UTF-8">
	<title>IAU Phone Store</title>
	<link rel="stylesheet" type="text/css" href="style.css?<?php echo time(); ?>"/>
	<link rel="icon" href="images/logo.ico" sizes="any">
	<script type="text/javascript" src="js/windowopen.js?<?php echo time(); ?>"></script>
	<script type="text/javascript" src="js/qbutton.js?<?php echo time(); ?>"></script>
	</head>
	<body>
		<div id="main_container">
			<div class="top">
				<div class="help">
					<a href="help.php" target="popup" onclick="window.open('help.php','help','width=600,height=280')"><img src="images/help.png" alt="Help" width = "35" height = "35"></a>
				</div>
				<div class="admin_gate">
					<a href="admin.php" class="adm"><div class="admin_text">Admin Panel</div><img src="images/admin.png" alt="Admin Panel" /></a>
				</div>
			</div>
			<div id="header">
				<div id="logo"> <a href="/site"><img alt="logo" id="logo-border" src="images/logo.png?<?php echo time(); ?>" alt="" border="0" width="370" height="150" /></a> </div>
			</div>
			<div id="main_content">
				<div id="menu_side">
					<div id="options">
						<ul class="menu">
							<li><a href="index.php" class="nav1"> Home</a></li>
							<li class="divider"></li>
							<li><a href="products.php" class="nav2">Products</a></li>
							<li class="divider"></li>
							<?php
							if (isset($_SESSION["useruid"])) {
								echo "	<li><a href='profile.php' class='nav4'>Profile</a></li>";
								echo "<li class='divider'></li>";
							}
							else{
								echo"<li><a href='register.php' class='nav4'>Register</a></li>";
								echo "<li class='divider'></li>";
							}
							?>
							<li><a href="contact.php" class="nav6">Contact Us</a></li>
						</ul>
					</div>
					<div id="search">
						<form action="search.php" method="GET">
							<input class="input_search" type="text" placeholder="Search for a product.." name="search">
							<div class="search_bt"><button class="search_bt_style" type="submit">Search</button></div>
						</form>
						</div>
					</div>
				</div><!-- end of menu tab -->
				<div id="all-content-sides">