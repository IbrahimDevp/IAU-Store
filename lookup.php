<?php include('includes/header_admin.php');
if(!isset( $_SESSION["userAuid"]))
{
header("location: ./admin-login.php");
}
?>      
<div class="center_content">
<!-- change this to fix the items arrangment --> 
                        <form method="post" autocomplete="On">
                        <div class="admin_title_box">Search by name</div>
						<div class="admin_border_box">
                        <div class="center">
                            <input type="text" name="searchtext" class="input" placeholder="Type product name.."/>
                         <div class="bt"><button class="button_admin" type="submit" id="search_field">Search</button></div>
                         </div>
                         </div>   
                        </form>
                         <!-- Search Query -->
                
                       
                        <?php    
                        $search_query=-1;
                      
                        if(isset($_POST['searchtext']))
                        {
                            $search_query=$_POST['searchtext'];
                               echo '<div class="admin_title_box">Result</div>';
							   echo '<div class="admin_border_box">';
                        }
                            $sql= mysqli_query($dbc,"SELECT * FROM product WHERE Product_Name LIKE '%$search_query%'");
				           while($result = mysqli_fetch_array($sql)){
							$pid = $result['Product_ID'];
                       
							?>
                        <!-- if no result then print message -->
                       
                           
							<div class="prod_box">
								<div class="center_prod_box">
									<div class="product_title">
									<a href="details.php?pid=<?= $pid?>"><?=$result['Product_Name']?></a></div>
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
    
    <?php ;}  
	echo '</div>';
	mysqli_close($dbc);?>
							 
</div>		
<?php include('includes/footer.php');?>