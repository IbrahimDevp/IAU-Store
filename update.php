<?php include('includes/header_admin.php');
if(!isset( $_SESSION["userAuid"]))
{
header("location: ./admin-login.php");
}
?>
                      
                        <div class="center_content">
						<div id="fail" class="bgsuccess">
							<div class="warning">
								<a class="close" href="#">&times;</a>
								<div class="content">
									 This product does not exist.
								</div>
							</div>
						</div>
                        <form method="post" autocomplete="off" action="update-details.php">
                        <div class="admin_title_box">Search product for update </div>
                        <div class="admin_border_box">
                        <div class="center">
                        <div>
                        <input type="text" name="Get_Product_ID_For_Search" class="input" placeholder="Type Product ID.."/></div>
                            <div><button class="button_admin" type="Submit" name="Get_Product_ID_For_Search_button">Get product</button></div>
                            </div>
                             </div>
                         </form>
                        </div>
              
<?php include('includes/footer.php');
?>



