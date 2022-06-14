				
				
				<div class="left_content">
				<script defer src="js\lgValidate.js?<?php echo time(); ?>"></script>
				<?php
					if (isset($_SESSION["useruid"])){
						$fuser=strtok($_SESSION["Full_Name"], " "); 
						$cfuser= ucfirst($fuser);
					echo	"<div class='title_box'>Hello, ".$cfuser."</div>";
					echo 	"<div class='blue_border_box'>";
					}
					else{
						echo "<div class='title_box'>Sign In</div>";
						echo "<div class='blue_border_box'>";
					}
						if (isset($_SESSION["useruid"])){
							echo "<p>Phone Number: ".$_SESSION["PhoneNum"]."</p>";
							echo "<p>Country: ".$_SESSION["Country"]."</p>";
							echo "<p>City: ".$_SESSION["City"]."</p>";
							echo "<p>Street: ".$_SESSION["Street"]."</p>";
							echo "<a href='profile.php'>";
							echo "<button class = 'editp_button'>Edit Profile</button>";
							echo "</a>";
							echo "<p><a href='history.php'>";
							echo "<button class = 'orderhistory_button'>Order History</button>";
							echo "</a></p>";
							echo "<a href='includes\logout.php'>";
							echo "<button class = 'logout_button'>Logout</button>";
							echo "</a>";
						}
						else{

							echo	"<form action = 'includes/left_content.inc.php' method= 'post' id='lgform'>" ;
							echo	"<input type = 'text' class='input' name = 'username' id='lgusername' placeholder='Username...'>  <br>";
							echo	"<input type = 'password' class='input' name  = 'pwd' id='lgpwd' placeholder='Password...'> <br>"; 
							if (isset($_GET["error"])) {
						
							if ($_GET["error"] == "wronglogin") {
							  echo"<p style='color:red;'> Incorrect Sign In Information!</p>";
							}
						
						
							}
							echo 	"<div style='color:red;' id='lgerror'></div>";
							echo	"<div class ='bt'> <button class = 'button'  type = 'submit' name = 'submit'> Sign In </button> </div>";
							echo	"</from>";
						}			
							?>					
						</div>
						<div class="title_box">Categories</div>
						<ul class="list_menu">
							<?php
							$query = mysqli_query($dbc,"SELECT DISTINCT Category from product");
							while($result = mysqli_fetch_array($query)){
							?>
							<li class="row"><a href="search.php?name=<?= $result['Category']?>&catg=<?= $result['Category']?>"><?= $result['Category']?></a></li>
							<?php
							}
							?>
						</ul>
						<?php
						$query = mysqli_query($dbc,"SELECT * from product where Special=1 order by rand() limit 1");
						if ($result = mysqli_fetch_assoc($query)){
						?>
						<div class="title_box">Special Products</div>
						<div class="blue_border_box">
							<div class="product_title"><a href="details.php"><?= $result['Product_Name'] ?></a></div>
							<div class="product_img"><a href="details.php?pid=<?= $result['Product_ID'] ?>"><img src="<?= $result['img']?>" alt="<?= $result['Product_Name'] ?>" height="100px" width="80px"/></a></div>
							<div class="prod_price">
							<?php
										if ($result['Discount'] != "0"){
										echo '<span class="reduce">'.$result['Product_Price'].
										' SAR</span>';
										}
										?>
										<span class="price">
										<?php
										if ($result['Discount'] != "0"){
											echo ($result['Product_Price']-$result['Discount']);
										} else {
											echo $result['Product_Price'];
										}
										?> SAR</span>
							</div>
						</div>
						<?php } ?>
					</div><!-- end of left content -->
					<div class="center_content">