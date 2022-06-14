<?php
session_start();
?>

<!DOCTYPE HTML>
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
			
			<!-- end of menu tab -->
				<div id="admin-content">