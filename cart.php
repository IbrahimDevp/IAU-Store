<?php include('includes/header.php');?>
<?php include('includes/left_content.php');?>
<?php
if(isset($_SESSION['userid'])){
    $userid = $_SESSION['userid'];
    $select = "SELECT * FROM cart WHERE Customer_ID ='$userid'";
    $query = mysqli_query($dbc,$select);
}
if(isset($_GET['Cart_ID'])){
    $cartid=$_GET['Cart_ID'];
    $delete = mysqli_query($dbc, "DELETE FROM `cart` WHERE `Cart_ID` ='$cartid' AND `Customer_ID` = '$userid'");
    header("location:cart.php");
}
if (isset($_POST["emptyCart"])){
    $delete = "DELETE FROM `cart` WHERE `Customer_ID` = '$userid'";
    $query3 = mysqli_query($dbc,$delete);
    header("location:cart.php");
}
?>
						<div class="center_title_bar">My Cart</div>
						<div class="box_big">
							<div class="center_box_big">
                                <?php 
                                        
                                            $num=mysqli_num_rows($query);
                                            if($num>0){ ?>
                                
                                    <form id="emptyCart" method='post'></form><button class="smallButton" style="float: right;"name="emptyCart" form="emptyCart">EMPTY CART</button>
                                    <form action="products.php">
                                    <input class="smallButton" style="float: left;"type="submit" value="GO SHOPPING" />
                                    </form>
                                    <table class="table_summary_checkout" cellpadding ="15">
                                        <tr align = "left">
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th></th>
                                            <th style="text-align:right">Total</th>
                                        </tr>
                                        <?php
                                            $total = 0;
                                            $subtotal = 0;
                                            $num=mysqli_num_rows($query);
                                            if($num>0){
                                                while($result=mysqli_fetch_assoc($query)){
                                                    $total = $result['Product_Price'] * $result['Quantity'];
                                                    echo "
                                                    <tr style='font-size:22px;'>
                                                        <td>".$result['Product_Name']."</td>
                                                        <td>".$result['Product_Price']." SAR</td>
                                                        <td>".$result['Quantity']."</td>
                                                        <td><a href='cart.php?Cart_ID=".$result['Cart_ID']."'><img title='Remove' src='images/remove-icon.png' alt='Remove'/></td>
                                                        <td style='text-align:right'>".$total." SAR</td>
                                                    </tr>
                                                    ";
                                                    $subtotal+=$total;
                                                }
                                            }
                                        
                                            print("<td colspan='4' align='right' style='font-size: 30px;' ><hr>SUBTOTAL = </td>
                                                        <td style='font-size: 26px;' align='right'><hr>");
                                                echo number_format($subtotal,2);
                                                print(" SAR</td>");
                                        ?>
                                    </table>
                                <form action="checkout.php">
                                <input class="checkoutButton" type="submit" value="PROCEED TO CHECKOUT" />
                                </form>
                                <?php } else {
                                                echo "<div><p style='color:red; font-size: 22px;'>Your cart is currently empty.</p></div>";
                                            }?>
							</div>
						</div>
<?php include('includes/right_content.php');?>
<?php include('includes/footer.php');?>