<!DOCTYPE HTML>
<?php require('includes/db_connect.php');

session_start();?>
<html>
	<head>
	<meta charset="UTF-8">
	<title>IAU Phone Store</title>
	<link rel="stylesheet" type="text/css" href="style.css?<?php echo time(); ?>"/>
	<link rel="icon" href="images/logo.ico" sizes="any">
	<script type="text/javascript" src="js/windowopen.js"></script>
	<script type="text/javascript" src="js/boxOver.js"></script>
	</head>
	<body>
		<div id="main_container">
			<div class="top">
				<div class="admin_gate">
					<a href="admin-Login.php" class="adm"><div class="admin_text">Admin Panel</div><img src="images/admin.png" /></a>
				</div>
			</div>
			<div id="header">
				<div id="logo"> <a href="/site"><img id="logo-border" src="images/logo.png?<?php echo time(); ?>" alt="" border="0" width="370" height="150" /></a> </div>
			</div>
			<div id="main_content">
				<div id="menu_side_admin">
					<div id="options_admin">
						<ul class="menu">
							<li><a href="admin.php" class="nav1"> Home</a></li>
							<li class="divider"></li>
							<li><a href="add.php" class="nav2">Add product</a></li>
							<li class="divider"></li>
							<li><a href="update.php" class="nav3">Update product </a></li>
							<li class="divider"></li>
							<li><a href="delete.php" class="nav4">Delete Product</a></li>
							<li class="divider"></li>
							<li><a href="lookup.php" class="nav5">Search</a></li>
							<li class="divider"></li>
							<?php if(!isset( $_SESSION["userAuid"]))
							{
							echo "<li><a href='includes\logout_admin.php' class='nav5'>Login</a></li>";
							}
							else
							{
							echo "<li><a href='includes\logout_admin.php' class='nav5'>Logout</a></li>";
							}
							



							?>
						</ul>
					</div>
					</div>
				</div><!-- end of menu tab -->
				<div id="admin-content">