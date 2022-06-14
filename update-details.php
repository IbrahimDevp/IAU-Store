 <?php include('includes/header_admin.php');
if(!isset( $_SESSION["userAuid"]))
{
header("location: ./admin-login.php");
}
?>
 
   <?php 

if(isset($_POST['Get_Product_ID_For_Search_button']))
     {       
$Get_prod_ID=$_POST['Get_Product_ID_For_Search'];
$check=mysqli_query($dbc,"SELECT * FROM product WHERE Product_ID='$Get_prod_ID'");
if ($result=mysqli_fetch_assoc($check)){
$sql=mysqli_query($dbc,"SELECT * FROM product WHERE Product_ID='$Get_prod_ID'");
$result =mysqli_fetch_array($sql);
$Product_ID=$result['Product_ID'];
$Product_Name=$result['Product_Name'];
$Product_Price=$result['Product_Price'];
$Discount=$result['Discount'];
$Quantity=$result['Quantity'];
$Special=$result['Special'];
$Category=$result['Category'];
$Size=$result['Size'];
$Color=$result['Color'];
$Capacity=$result['Capacity'];
$RAM=$result['RAM'];
$Product_Manuf=$result['Product_Manuf'];
$Product_Model=$result['Product_Model'];
$Description=$result['Description'];
$Release_Date=$result['Release_Date'];
$img=$result['img'];
  mysqli_close($dbc);
    }
    else {
        header("Location: update.php#fail");
        exit();
          }
     }
	 if(isset($_GET['pid']))
     {       
$Get_prod_ID=$_GET['pid'];
$check=mysqli_query($dbc,"SELECT * FROM product WHERE Product_ID='$Get_prod_ID'");
if ($result=mysqli_fetch_assoc($check)){
$sql=mysqli_query($dbc,"SELECT * FROM product WHERE Product_ID='$Get_prod_ID'");
$result =mysqli_fetch_array($sql);
$Product_ID=$result['Product_ID'];
$Product_Name=$result['Product_Name'];
$Product_Price=$result['Product_Price'];
$Discount=$result['Discount'];
$Quantity=$result['Quantity'];
$Special=$result['Special'];
$Category=$result['Category'];
$Size=$result['Size'];
$Color=$result['Color'];
$Capacity=$result['Capacity'];
$RAM=$result['RAM'];
$Product_Manuf=$result['Product_Manuf'];
$Product_Model=$result['Product_Model'];
$Description=$result['Description'];
$Release_Date=$result['Release_Date'];
$img=$result['img'];
  mysqli_close($dbc);
    }
    else {
        header("Location: update.php#fail");
        exit();
          }
     }
/* Display the product attribute as html page */
?>       				<div id="success" class="bgsuccess">
							<div class="success">
								<a class="close" href="#">&times;</a>
								<div class="content">
									 The product <?= $Product_Name?> has been updated.
								</div>
							</div>
						</div>
                        <form method="post" autocomplete="off" action="updateProduct.php" enctype="multipart/form-data">
                        <div class="admin_title_box">Update Product</div>
                        <div class="admin_border_box">
                        <div class="center">
                            
                            
                        
                            <p><input type="hidden" name="Product_ID_1" class="input2" placeholder="product id" value="<?= $Product_ID ?>" readonly/></p>
							<p><input type="hidden" name="image" class="input2" placeholder="product id" value="<?= $result['img']?>" readonly/></p>
                        <div class="drop-zone">
						<span class="drop-zone__prompt" ><img src="<?= $result['img']?>" height="200px" width="200px"/></span>
						<input type="file" name="myFile" class="drop-zone__input" accept="image/png" />		  
						</div>
						<p><label>Product_Name:</label>
                        <input type="text" name="Product_Name_1" class="input2" placeholder="Product_Name" value="<?= $Product_Name ?>"/></p>
                        
                          <p><label>Product_Price:</label>
                        <input type="text" name="Product_Price_1" class="input2" placeholder="Product_Price" value="<?= $Product_Price ?>"/></p>
                        
                       <p><label>Discount:</label>
                        <input type="text" name="Discount_1" class="input2" placeholder="Discount" value="<?= $Discount ?>"/></p>
                            
                        <p><label>Quantity:</label>
                        <input type="text" name="Quantity_1" class="input2" placeholder="Quantity" value="<?= $Quantity ?>"/></p>
                            
                         <p><label>Is this product special? </label>
						<?php if ($Special == 1){
							echo '<label>YES</label><input type="radio" checked="checked" name="Special_1" value=1   /><label>NO</label><input type="radio" name="Special_1"  value=0 />';
						} else {
							echo '<label>YES</label><input type="radio" name="Special_1" value=1   /><label>NO</label><input type="radio" checked="checked" name="Special_1"  value=0 />';
						}?>
						 
                        
                            
                            
                       <p> <label>Category:</label>
                        <input type="text" name="Category_1" class="input2" placeholder="Category" value="<?= $Category ?>"/></p>
                        
                        <p><label>Size:</label>
                        <input type="text" name="Size_1" class="input2" placeholder="Size" value="<?= $Size ?>"/></p>
                        
                        <p><label>Color:</label>
                        <input type="text" name="Color_1" class="input2" placeholder="Color" value="<?= $Color ?>"/></p>
                        
                        <p><label>Capacity:</label>
                        <input type="text" name="Capacity_1" class="input2" placeholder="Capacity" value="<?= $Capacity ?>"/></p>
                        
                       <p><label>RAM:</label>
                        <input type="text" name="RAM_1" class="input2" placeholder="RAM" value="<?= $RAM ?>"/></p>
                        
                       <p><label>Product_Manuf:</label>
                        <input type="text" name="Product_Manuf_1" class="input2" placeholder="Product_Manuf" value="<?= $Product_Manuf ?>"/></p>
                        
                       <p> <label>Product_Model:</label>
                        <input type="text" name="Product_Model_1" class="input2" placeholder="Product_Model" value="<?=$Product_Model ?>"/></p>
                        
                        <p>
						<textarea type = "textarea" class="contact_textarea" name = "Description_1" placeholder="Description"><?= $Description ?></textarea></p>
                            
                           <p><label>Release_Date:</label>
                        <input type="Date" name="Release_Date_1" class="input2" value="<?= $Release_Date ?>"/>
						</p>
                        
                    
                        <p>
                        <button class="button_admin" type="Submit" name="button_admin_check">Update</button>
                         </p>
						 </div>
						 </div>
                         </form>
						 <script src="js/Drag&Drop.js"></script>
<?php include('includes/footer.php');
?>
             