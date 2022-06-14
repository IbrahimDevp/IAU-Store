					</div><!-- end of center content -->
					<div class="right_content">
						<?php if(isset($_SESSION["userid"])){ 
                        $userid = $_SESSION['userid'];
                        $select = "SELECT * FROM cart WHERE Customer_ID ='$userid'";
                        $query = mysqli_query($dbc,$select);
                        ?>
						<div class="shopping_cart">
							<div class="cart_title"><a href="cart.php" class="cart_title_color">Shopping Cart</a></div>
							<div class="cart_details">
								<div class="cart_content">
                                    <?php
                                            $total = 0;
                                            $subtotal = 0;
                                            $num=mysqli_num_rows($query);
                                            if($num>0){
                                                while($result=mysqli_fetch_assoc($query)){
                                                    $total = $result['Product_Price'] * $result['Quantity'];
                                                    echo "".$result['Quantity']."x
                                                        <td><strong>".$result['Product_Name']."</strong><br/>";
                                                    $subtotal+=$total;
                                                }
                                            }
                                        ?>
								</div>
								<span class="spliter"></span>
								<span class="cart_price">Total: <?php echo number_format($subtotal,2) ?> SAR</span>
								<a href="cart.php"><div class="cart_icon"></div></a>
							</div>
							
						</div>
						<?php
						}
						$query = mysqli_query($dbc,"SELECT * FROM product ORDER BY Product_ID DESC LIMIT 1");
						if ($result = mysqli_fetch_assoc($query)){
						?>
						<div class="title_box">New Product</div>
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
						<div class="title_box">Manufacturers</div>
						<ul class="list_menu">
							<?php
							$query = mysqli_query($dbc,"SELECT DISTINCT Product_Manuf from product");
							while($result = mysqli_fetch_array($query)){
							?>
							<li class="row"><a href="search.php?name=<?= $result['Product_Manuf']?>&manf=<?= $result['Product_Manuf']?>"><?= $result['Product_Manuf']?></a></li>
							<?php
							}
							?>
						</ul>
					</div><!-- end of right content -->
					
					<?php
					mysqli_close( $dbc );
						?>