<?php include('includes/header_admin.php');
if(!isset( $_SESSION["userAuid"]))
{
header("location: ./admin-login.php");
}
?>

                        <div class="center_content">
                        <form method="post" autocomplete="off">
                        <div class="admin_title_box">Delete Product</div>
                            <div class="admin_border_box">
                        <div class="center">
                       <div>
                               <input type="text" name="product_ID_1"  class="input" placeholder="Type Product ID.."?/>
                           <div class="bt"><button class="button_admin" type="delete" name="00003">Delete</button></div>
                            <!-- Generate Delete Text fields -->
                           <?php 
                           $prod_id = -1;
                           if(isset($_POST['product_ID_1'])){
                               $prod_id=$_POST['product_ID_1'];
                               $check=mysqli_query($dbc,"SELECT * FROM product WHERE Product_ID ='$prod_id'");
                           
                            if($result = mysqli_fetch_assoc($check)){
                                $sql=mysqli_query($dbc,"DELETE FROM product WHERE Product_ID ='$prod_id'");
                                echo "<h4 style='color:Tomato;'>Product Deleted</h4>";
                            }
                           else {
                               echo "<h4 style='color:Tomato;'>Product not found</h4>";
                           }
                           }
                           
                           /*if(isset($prod_ID))
                           {*/
                            
                          
                              /* if(!$sql)
                               {
                             $Done="<script>window.alert('Error')</script>";
                             echo $Done;
                               }*/
                            mysqli_close($dbc);
                          /* }*/
                           ?>
                         </div>
                            </div>
                            </div>
                            </form>
                            </div>

   <?php include('includes/footer.php');
?>                        
    
                           
   
    
    
    
    
    
    
    
    
       
    
    
    
    
    
    
    