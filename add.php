<?php include('includes/header_admin.php');?>
<?php                       
if(!isset( $_SESSION["userAuid"]))
{
header("location: ./admin-login.php");
}
?>
<link rel="stylesheet" type="text/css" href="style.css?<?php echo time(); ?>"/>
					<div class="center_content">
						<div class="admin_title_box">Add Product</div>
						<div class="admin_border_box">
						<?php 

						# Error handling for image upload 
						if (isset($_GET["error"])) {

						if ($_GET["error"] == "image_didnt_Upload") {
						 echo"<p style='color: red; font-size:30px;'><b> Image did not upload please try again </b></p> <script> alert('Image did not upload please try again'); </script>";
						}
						 

						 }
						# To print Product_been_added
						 if (isset($_GET["TODB"])) {

						  if ($_GET["TODB"] == "Product_been_added") {
						   echo"<p style='color: green; font-size:30px;'><b> The product has been added to the database </b></p>";
						  }
						  
						   }


						?>
							<form action="AddToDB.php" method="post" enctype="multipart/form-data">
                <div>
                  <table style="width:100%">
                   <tr>
    <td>Product_Name</td>
    <td><input type="text" name="Product_Name" class="input_admin_ADDProduct" placeholder="Product_Name" required/></td>
    <td>Category</td>
    <td><select name="Category" class="input_admin_ADDProduct">
                <option value="Smartphones">Smartphones</option>
                <option value="Headphones">Headphones</option>
                <option value="Cases">Cases</option>
                <option value="Smartwatches">Smartwatches</option>
                <option value="Other">Other</option>
        </select>
                   </tr>
  
                   <tr>
    <td>Product_Price</td>
    <td><input type="number" name="Product_Price" class="input_admin_ADDProduct" placeholder="Product_Price" required/></td>
    <td>RAM</td>
    <td><select name="RAM" class="input_admin_ADDProduct">
                <option value="4GB">4GB</option>
                <option value="8GB">8GB</option>
                <option value="16GB">16GB</option>
                <option value="">No RAM</option>
         </select>
                   </tr>
                   <tr>
    <td>Discount</td>
    <td><input type="number" name="Discount" class="input_admin_ADDProduct" placeholder="Discount" required/></td>
    <td>Capacity</td>
    <td><select name="Capacity" class="input_admin_ADDProduct">
                <option value="64GB">64GB</option>
                <option value="128GB">128GB</option>
                <option value="256GB">256GB</option>
                <option value="">No Capacity</option>
         </select></td>
    
                  </tr>
    <td>Quantity</td>
    <td><input type="number" name="Quantity" class="input_admin_ADDProduct" placeholder="Quantity" required/></td>
                  <tr>
    <td>Product_Manufacture</td>
    <td><input type="text" name="Product_Manuf" class="input_admin_ADDProduct" placeholder="Product_Manufacture" required/></td>
    <td>Size</td>
    <td><select name="Size" class="input_admin_ADDProduct">
                <option value="Small">Small</option>
                <option value="Medium">Medium</option>
                <option value="Large">Large</option>
        </select></td>
    
                  </tr>
                  <tr>
    <td>Product_Model</td>
    <td><input type="text" name="Product_Model" class="input_admin_ADDProduct" placeholder="Product_Model" required/></td>
    <td>Release_Date</td>
    <td><input type="date" name="Release_Date" class="input_admin_ADDProduct" placeholder="Release_Date" required/></td>
    
                  <tr>
    <td>Color</td>
    <td><input type="text" name="Color" class="input_admin_ADDProduct" placeholder="Color" required/></td>
    <td>Special</td>
    <td><label>YES</label><input type="radio" name="Special" value=1 /><label>NO</label><input type="radio" name="Special"  value=0 checked/></td>
    
    
                  </tr>
    
                  </tr>

                  <tr>
    <td>Description</td>
    <td>  <textarea style="width: 407px; height: 231px;" class="input_admin_ADDProduct" name="Description" rows="4" cols="50" placeholder="Description"required></textarea></td>
    <td>Product image</td>
    <td><div class="drop-zone">
    <span class="drop-zone__prompt" >Drop file here or click to upload</span>
    <input type="file" name="myFile" class="drop-zone__input" accept="image/png" />
              
  </div>
 </td>
</tr>
</table>

                  <div class="bt">
                <button class="button_admin" name="submit" type="submit">ADD Product</button>
              <button class="button_admin" name="reset" type="reset">Reset</button>
</form>
</div>

      </div>
    </div>     
	</div>
</div>
<script src="js/Drag&Drop.js"></script>
<?php include('includes/footer.php');?>

