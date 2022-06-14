<?php include('includes/header.php');?>
<?php include('includes/left_content.php');?>
						<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
						<?php
						if (isset($_POST["addtocart"])){
							$User_ID = $_SESSION['userid'];
							$Product_Name = $_GET['name'];
							$Price = $_GET['final'];
                            $OriginalQuantity = $_GET['originalQuantity'];
							$UserQuantity = $_POST['quantity'];
                            $select2 = "SELECT Quantity FROM cart WHERE Customer_ID = '$User_ID' AND Product_Name = '$Product_Name'";
                            $query2 = mysqli_query($dbc,$select2);
                            $cartQuantity = 0;
                            while($result=mysqli_fetch_assoc($query2)){
                                $cartQuantity += $result['Quantity'];
                            }
                            if($OriginalQuantity <= 0) {
                                ?>
                                <div id="notice" class="bgsuccess">
										<div class="failed">
											<a class="close" href="#">&times;</a>
											<div class="content">
												 Sorry, this product is sold out!
											</div>
										</div>
								</div>
                            <?php 
                            } else if (($UserQuantity + $cartQuantity) > $OriginalQuantity){
                                ?> <div id="notice" class="bgsuccess">
										<div class="warning">
											<a class="close" href="#">&times;</a>
											<div class="content">
												 You cannot have more than <?php print($OriginalQuantity); ?> piece(s) of this item in the cart.
											</div>
										</div>
								</div>
                            <?php
                            } else {
							$sql = "INSERT INTO cart(Customer_ID, Product_Name, Product_Price, Quantity) VALUES('$User_ID','$Product_Name', '$Price', '$UserQuantity');";
								if ( !( $result = mysqli_query( $dbc,$sql ) ) ) {
									print( "<p>Could not execute query!</p>" );
									die( mysqli_error());
								}
						?>
						<div id="notice" class="bgsuccess">
										<div class="success">
											<a class="close" href="#">&times;</a>
											<div class="content">
												<?= $UserQuantity ?>× <?= $Product_Name?> added successfully to your cart.
											</div>
										</div>
								</div>
						<?php 
						      } 
                        }
						$pid = -1;
						if(isset($_GET['pid'])){
							$pid = $_GET['pid'];
						}
						$query = mysqli_query($dbc,"SELECT * from product WHERE Product_ID ='$pid'");
						if ($result = mysqli_fetch_assoc($query)){
						?>
						<div class="center_title_bar"><?=$result['Product_Manuf']?></div>
						<div class="box_big">
							<div class="center_box_big">
								<div class="product_img_big"><img src="<?= $result['img']?>" alt="<?= $result['Product_Name'] ?>" height="280px" width="210px"/>
								</div>
								<div class="details_big_box">
									<div class="product_title_big"><?=$result['Product_Name']?></div>
									<div class="specifications">
											Product Model: <span class="blue"><?=$result['Product_Model']?></span><br />
											Product Manufacturer: <span class="blue"><?=$result['Product_Manuf']?></span><br />
											Color: <span class="blue"><?=$result['Color']?></span><br />
											<?php
											if ($result['Capacity']){
											?>
												Capacity: <span class="blue"><?=$result['Capacity']?></span><br />
											<?php
											}
											if ($result['RAM']) {
											?>
												RAM: <span class="blue"><?=$result["RAM"]?></span><br />
											<?php
											}
											?>
									</div>
									<div class="prod_price_big">
										<?php
										if ($result['Discount'] != "0"){
										echo '<span class="reduce">'.$result['Product_Price'].
										' SAR</span>';
										}
										?>
										<span class="price">
										<?php
										if ($result['Discount'] != "0"){
											$final_price = $result['Product_Price']-$result['Discount'];
											echo $final_price;
										} else {
											$final_price = $result['Product_Price'];
											echo $final_price;
										}
										?> SAR</span>
									</div>
								</div>
							</div>
							<div class="description">
									<?=$result['Description']?>
							</div>
							<?php
							if(isset($_SESSION["userid"])){
								$Product = $result['Product_Name'];
                                $OriginalQuantity = $result['Quantity'];
								$final_price;
							?>
							<div class="adding">
								<p>
								<form action="details.php?pid=<?= $pid?>&name=<?= $Product?>&final=<?= $final_price?>&originalQuantity=<?= $OriginalQuantity?>#notice" method="post" id="cartform">
											<label>Quantity:</label>
											  <div class="value-button" id="decrease" onclick="decreaseValue()" value="Decrease Value">-</div>
											  <input name="quantity" class="numberfield" type="number" id="numberofitem" value="1" />
											  <div class="value-button" id="increase" onclick="increaseValue()" value="Increase Value">+</div>
								</form>		
								</p>
								<p><button class="addtocart" name="addtocart" form="cartform">add to cart <i class="fa fa-shopping-cart"></i></button>
								</p>
							</div>
							<?php } ?>
						</div>
						<?php
							$current_prod = $result['Product_ID'];
							$current_cat = $result['Category'];
							$query = mysqli_query($dbc,"SELECT * from product WHERE Category ='$current_cat' && Product_ID != '$current_prod' ORDER BY RAND() LIMIT 6");
							$check = mysqli_query($dbc,"SELECT * from product WHERE Category ='$current_cat' && Product_ID != '$current_prod' ORDER BY RAND() LIMIT 1");
							if (mysqli_fetch_assoc($check)){
								echo '<div class="center_title_bar">Similar products</div>';
							}
							 while($result = mysqli_fetch_array($query)){
							$pid = $result['Product_ID'];
							$name = $result['Product_Name'];
							?>
							<div class="prod_box">
								<div class="center_prod_box">
									<div class="product_title">
									<a href="details.php?pid=<?= $pid?>"><?=$result['Product_Name']?></a></div>
									<div class="product_img"><a href="details.php?pid=<?= $pid?>"><img alt="<?=$result['Product_Name']?>" src="<?= $result['img']?>" height="110" width="80" /></a></div>
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
											$final = $result['Product_Price']-$result['Discount'];
											echo $final;
										} else {
											$final = $result['Product_Price'];
											echo $final;
										}
										?> SAR</span>
									</div>
								</div>
								<div class="prod_details_tab">
									<a href="details.php?pid=<?= $pid?>" class="d_butt">details</a> <?php if (isset($_SESSION['useruid'])) {?>
									<a href="#popup?pid=<?= $pid?>"><img src="images/cart.gif" alt="" border="0" class="right_bt_cart" /></a>
								<?php } ?>
								</div>
								 <?php echo '<div id="popup?pid='.$result['Product_ID'].'" class="overlay">' ?>
									<a class="cancel" href="#"></a>
									<div class="popup">
										<h2><?= $name?></h2>
										<a class="close" href="#">&times;</a>
										<div class="content">
										<?php $id = "name?".$pid;
												$OriginalQuantity = $result['Quantity'];
										?>
											<form action="details.php?pid=<?= $pid?>&name=<?= $name?>&final=<?= $final?>&originalQuantity=<?= $OriginalQuantity ?>#notice" method="post" id="cartform<?= $pid?>">
												<label>Quantity:</label>
												<div class="value-button" id="decrease" onclick="decreaseValue<?= $pid?>()" value="Decrease Value">-</div>
												<input name="quantity" type="number"class="numberfield" id="<?= $pid?>" value="1" form="cartform<?= $pid?>"/>
												<div class="value-button" id="increase" onclick="increaseValue<?= $pid?>()" value="Increase Value">+</div>
											</form>
											<!-- <input type="text" id="fname" name="quantity" form="cartform<?= $pid?>" -->
											<p><button class="poptocart" name="addtocart" form="cartform<?= $pid?>">add to cart <i class="fa fa-shopping-cart"></i></button>
										</div>
									</div>
								</div>
							</div>
							<script>
							function increaseValue<?= $pid?>() {
								
								var value = parseInt(document.getElementById('<?= $pid?>').value, 10);
								value = isNaN(value) ? 0 : value;
								value++;
								if(value>10){return}
								document.getElementById('<?= $pid?>').value = value;
								}

								function decreaseValue<?= $pid?>() {
								var value = parseInt(document.getElementById('<?= $pid?>').value, 10);
								value = isNaN(value) ? 0 : value;
								value < 1 ? value = 1 : '';
								value--;						
								if(value<1){return}
								document.getElementById('<?= $pid?>').value = value;
								}
							</script>
							<?php
							}
						} else {
						?>
						<div class="center_title_bar">Product</div>
						<div class="box_big">
							<div class="center_box_big">
									<div class="product_title_big">This Product Does Not Exist.</div>
							</div>
						</div>
						<?php } ?>
<?php include('includes/right_content.php');?>
<?php include('includes/footer.php');?>