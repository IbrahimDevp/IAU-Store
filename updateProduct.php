    <?php
           include('includes/db_connect.php');
           if(isset($_POST['button_admin_check']))
           
           {
			     $file_name = $_FILES['myFile']['name'];
				 $file_type = $_FILES['myFile']['type'];
				 $file_size = $_FILES['myFile']['size'];
				 $file_tem_loc = $_FILES['myFile']['tmp_name'];
				 $rand_file_name = rand(100000,999999);
				 settype($rand_file_name, "string");
				 $new_file_name =  "$rand_file_name.png";
				# echo "<h1>"$new_file_name"</h1>";
				# $file_store = "images/products/".$file_name;
				 $file_store = "images/products/".$new_file_name;
				# chack if the image file is uploaded or not 
				 if (move_uploaded_file($file_tem_loc, $file_store))
				 {
				  header("location: Add_product.php?TODB=Product_been_added");
				  
				 }
				 else{
					 $file_store = $_POST['image'];
				 }
                        
                        $Product_ID_update=$_POST['Product_ID_1'];
                        $Product_Name_update=$_POST['Product_Name_1'];
                        $Product_Price_update=$_POST['Product_Price_1'];
                        $Discount_update=$_POST['Discount_1'];
                        $Quantity_update=$_POST['Quantity_1'];
                        $Special_update=$_POST['Special_1'];
                        $Category_update=$_POST['Category_1'];
                        $Size_update=$_POST['Size_1'];
                        $Color_update=$_POST['Color_1'];
                        $Capacity_update=$_POST['Capacity_1'];
                        $RAM_update=$_POST['RAM_1'];
                        $Product_Manuf_update=$_POST['Product_Manuf_1'];
                        $Product_Model_update=$_POST['Product_Model_1'];
                        $Description_update=$_POST['Description_1'];
						$img=$file_store;
                        $Release_Date_update=$_POST['Release_Date_1'];
                       
                        
        
                      
                      
                        $sql_update="UPDATE product 
						SET Product_Name='$Product_Name_update',
						Product_Price='$Product_Price_update',
						Discount='$Discount_update',
						Quantity='$Quantity_update',
						Special='$Special_update',
						Category='$Category_update',
						Size='$Size_update',
						Color='$Color_update',
						Capacity='$Capacity_update',
						RAM='$RAM_update',
						Product_Manuf='$Product_Manuf_update',
						Product_Model='$Product_Model_update',
						Description='$Description_update',
						Release_Date='$Release_Date_update',
						img = '$img'
						where Product_ID='$Product_ID_update' ";
                        $sql=mysqli_query($dbc,$sql_update);
                          mysqli_close($dbc);
                          header("Location: update-details.php?pid=$Product_ID_update#success");
                         exit();
               
           }
                        ?>