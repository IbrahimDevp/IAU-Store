<?php include('includes/header_admin.php');
              
if(!isset( $_SESSION["userAuid"]))
{
header("location: ./admin-login.php");
}
?>

				<div class="center_content">
					<div class="admin_title_box">All products</div>
						<div class="admin_border_box">
						<?php
						$query = mysqli_query($dbc,"SELECT * from product");
							while($result = mysqli_fetch_array($query)){
							$pid = $result['Product_ID'];
							?>
							<div class="prod_box">
								<div class="center_prod_box">
									<div class="product_title">
									<a href="update-details.php?pid=<?= $pid?>"><?=$result['Product_Name']?></a></div>
									<div class="product_img"><a href="update-details.php?pid=<?= $pid?>"><img src="<?= $result['img']?>" height="110" width="80" /></a></div>
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
								<div class="prod_details_tab">
									<a href="details.php?pid=<?= $pid?>" class="d_butt">details</a>
								</div>
							</div>
							<?php
							}
							 mysqli_close($dbc);
							?>
							
						</div>
<?php include('includes/footer.php');?>