<?php include('includes/header.php');?>
<?php include('includes/left_content.php');?>
<?php
if(isset($_SESSION['userid'])){
    $userid = $_SESSION['userid'];
    $select = "SELECT * FROM cart WHERE Customer_ID ='$userid'";
    $query = mysqli_query($dbc,$select);
}
if (isset($_POST["checkout"])){
    $Date = date('y-m-d');
    $User_ID = $_SESSION['userid'];
    $Product_Name = $_GET['Product_Name'];
    $Price = $_GET['Product_Price'];
    $PaymentMethod = $_POST['paymentmethod'];
    $addinvoice = "INSERT INTO `invoice`(`Invoice_Date`, `Customer_ID`, `Product_Name`, `Product_Price`, `Payment_Info`) VALUES ('$Date','$User_ID','$Product_Name','$Price','$PaymentMethod');";
    while($result=mysqli_fetch_assoc($query)){
        $productName = $result['Product_Name'];
        $itemQuantity = $result['Quantity'];
        $query4 = mysqli_query($dbc,"UPDATE `product` SET Quantity = Quantity - '$itemQuantity' WHERE `Product_Name`='$productName'");
    }
    $delete = "DELETE FROM `cart` WHERE `Customer_ID` = '$userid'";
    $query2 = mysqli_query($dbc,$addinvoice);
    $query3 = mysqli_query($dbc,$delete);
    header("location:checkout.php");
}
?>
						<div class="center_title_bar">Checkout</div>
						<div class="box_big">
							<div class="center_box_big">
                                    <?php 
                                        
                                            $num=mysqli_num_rows($query);
                                            if($num>0){ ?>
                                        <table class="summaryTable" cellpadding ="15">
                                        
                                        <caption><strong>Summary of Your Order</strong></caption>
                                        <tr>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                        </tr>
                                        <?php
                                            $total = 0;
                                            $subtotal = 0;
                                            $productNamesAndQuantities = array();
                                                while($result=mysqli_fetch_assoc($query)){
                                                    
                                                    $total = $result['Product_Price'] * $result['Quantity'];
                                                    array_push($productNamesAndQuantities, $result['Quantity']." x ".$result['Product_Name']);
                                                    echo "
                                                    <tr>
                                                        <td>".$result['Product_Name']."</td>
                                                        <td>".$result['Product_Price']." SAR</td>
                                                        <td>".$result['Quantity']."</td>
                                                        <td>".$total." SAR</td>
                                                    </tr>
                                                    ";
                                                    $subtotal+=$total;
                                                }
                                                $namesAndQuantitiesOfProducts = implode(", ", $productNamesAndQuantities);
                                        ?>
                                    </table>
                                    
                                    <form action="checkout.php?Product_Name=<?= $namesAndQuantitiesOfProducts?>&Product_Price=<?= $subtotal?>" method="post" id="checkout">
                                        <p><label><strong>Please select Payment Method:</strong></label></p>
                                          <input type="radio" id="visa" name="paymentmethod" value="VISA" checked>
                                          <label for="visa">VISA</label>
                                          <input type="radio" id="mastercard" name="paymentmethod" value="mastercard" >
                                          <label for="mastercard">mastercard</label>
                                          <input type="radio" id="americanexpress" name="paymentmethod" value="AMERICAN EXPRESS">
                                          <label for="americanexpress">AMERICAN EXPRESS</label>
                                          <input type="radio" id="mada" name="paymentmethod" value="mada">
                                          <label for="mada">mada</label>
								    </form>
                                <p><button class="checkoutButton" name="checkout" form="checkout"><span>PAY A SUBTOTAL OF <?php echo number_format($subtotal,2); ?> SAR</span><i class="fa fa-shopping-cart"></i></button></p>
                                <form action="cart.php">
                                <input class="smallButton" type="submit" value="EDIT CART" />
                                </form>
                                <?php } else {
												echo '<p><div class="loading"><div></div><div></div><div></div></div></p>';
                                                echo "<a style='color:#3669A7; font-size: 22px;'>Please wait, we are placing your order...</a>";
												echo "<script>
												         setTimeout(function(){
												            window.location.href = 'history.php';
												         }, 5000);
												      </script>";
												
                                            }?>
							</div>
						</div>
<?php include('includes/right_content.php');?>
<?php include('includes/footer.php');?>