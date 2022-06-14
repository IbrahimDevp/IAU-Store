<?php include('includes/header.php');?>
<?php include('includes/left_content.php');?>
<div class="slideshow-container">
                <div class="mySlides fade">
                    <img src="images\iau2.jpeg" alt="ad1" class="pics"/>
                </div>
                <div class="mySlides fade">
                    <img src="images\iau1.jpeg" alt="ad2" class="pics"/>
                </div>
                <div class="mySlides fade">
                    <img src="images\iau3.jpeg" alt="ad3" class="pics"/>
                </div>
                
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
            
            <!--    Putting in the click dots   -->
            <div style="text-align:center">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
            </div>
					<div class="center_title_bar">Featured Items</div>
					<?php
							if (isset($_POST["addtocart"])){
								$User_ID = $_SESSION['userid'];
								$Product_Name = $_GET['name'];
								$Price = $_GET['final'];
								$OriginalQuantity = $_GET['originalQuantity'];
							$UserQuantity = $_POST['quantity'];
                            $select2 = "SELECT Quantity FROM cart WHERE Customer_ID = '$User_ID' AND Product_Name = '$Product_Name'";
                            $query2 = mysqli_query($dbc,$select2);
                            $cartQuantity = 0;
                            while($result=mysqli_fetch_assoc($query2)){
                                $cartQuantity += $result['Quantity'];
                            }
                            if($OriginalQuantity <= 0) {
                                ?>
                                <div id="notice" class="bgsuccess">
										<div class="failed">
											<a class="close" href="#">&times;</a>
											<div class="content">
												 Sorry, this product is sold out!
											</div>
										</div>
								</div>
                            <?php 
                            } else if (($UserQuantity + $cartQuantity) > $OriginalQuantity){
                                ?> <div id="notice" class="bgsuccess">
										<div class="warning">
											<a class="close" href="#">&times;</a>
											<div class="content">
												 You cannot have more than <?php print($OriginalQuantity); ?> piece(s) of this item in the cart.
											</div>
										</div>
								</div>
                            <?php
                            } else {
							$sql = "INSERT INTO cart(Customer_ID, Product_Name, Product_Price, Quantity) VALUES('$User_ID','$Product_Name', '$Price', '$UserQuantity');";
								if ( !( $result = mysqli_query( $dbc,$sql ) ) ) {
									print( "<p>Could not execute query!</p>" );
									die( mysqli_error());
								}
						?>
							<div id="notice" class="bgsuccess">
										<div class="success">
											<a class="close" href="#">&times;</a>
											<div class="content">
												<?= $UserQuantity ?>× <?= $Product_Name?> added successfully to your cart.
											</div>
										</div>
								</div>
						<?php 
						      }
							}
						$query = mysqli_query($dbc,"SELECT * from product order by rand() limit 12");
							while($result = mysqli_fetch_array($query)){
							$pid = $result['Product_ID'];
							$name = $result['Product_Name'];
							?>
							<div class="prod_box">
								<div class="center_prod_box">
									<div class="product_title">
									<a href="details.php?pid=<?= $pid?>"><?=$result['Product_Name']?></a></div>
									<div class="product_img"><a href="details.php?pid=<?= $pid?>"><img alt="<?=$result['Product_Name']?>" src="<?= $result['img']?>" height="110" width="80" /></a></div>
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
											$final = $result['Product_Price']-$result['Discount'];
											echo $final;
										} else {
											$final = $result['Product_Price'];
											echo $final;
										}
										?> SAR</span>
									</div>
								</div>
								<div class="prod_details_tab">
									<a href="details.php?pid=<?= $pid?>" class="d_butt">details</a> <?php if (isset($_SESSION['useruid'])) {?>
									<a href="#popup?pid=<?= $pid?>"><img src="images/cart.gif" alt="" border="0" class="right_bt_cart" /></a>
								<?php } ?>
								</div>
								 <?php echo '<div id="popup?pid='.$result['Product_ID'].'" class="overlay">' ?>
									<a class="cancel" href="#"></a>
									<div class="popup">
										<h2><?= $name?></h2>
										<a class="close" href="#">&times;</a>
										<div class="content">
										<?php $id = "name?".$pid;
												$OriginalQuantity = $result['Quantity'];
										?>
											<form action="index.php?pid=<?= $pid?>&name=<?= $name?>&final=<?= $final?>&originalQuantity=<?= $OriginalQuantity ?>#notice" method="post" id="cartform<?= $pid?>">
												<label>Quantity:</label>
												<div class="value-button" id="decrease" onclick="decreaseValue<?= $pid?>()" value="Decrease Value">-</div>
												<input name="quantity" type="number"class="numberfield" id="<?= $pid?>" value="1" form="cartform<?= $pid?>"/>
												<div class="value-button" id="increase" onclick="increaseValue<?= $pid?>()" value="Increase Value">+</div>
											</form>
											<!-- <input type="text" id="fname" name="quantity" form="cartform<?= $pid?>" -->
											<p><button class="poptocart" name="addtocart" form="cartform<?= $pid?>">add to cart <i class="fa fa-shopping-cart"></i></button>
										</div>
									</div>
								</div>
							</div>
							<script>
							function increaseValue<?= $pid?>() {
								
								var value = parseInt(document.getElementById('<?= $pid?>').value, 10);
								value = isNaN(value) ? 0 : value;
								value++;
								if(value>10){return}
								document.getElementById('<?= $pid?>').value = value;
								}

								function decreaseValue<?= $pid?>() {
								var value = parseInt(document.getElementById('<?= $pid?>').value, 10);
								value = isNaN(value) ? 0 : value;
								value < 1 ? value = 1 : '';
								value--;						
								if(value<1){return}
								document.getElementById('<?= $pid?>').value = value;
								}
							</script>
							<?php
							}
							?>

<script>
var slideIndex = 0;
showSlides();
//add the global timer variable
var slides,dots,timer;

function showSlides() {
    var i;
    slides = document.getElementsByClassName("mySlides");
    dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex> slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    //put the timeout in the timer variable
    timer = setTimeout(showSlides, 4000); // Change image every 8 seconds
}

function plusSlides(position) {
    //clear/stop the timer
    clearTimeout(timer);
    slideIndex +=position;
    if (slideIndex> slides.length) {slideIndex = 1}
    else if(slideIndex<1){slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    //create a new timer
    timer = setTimeout(showSlides, 4000);
}

function currentSlide(index) {
    //clear/stop the timer
    clearTimeout(timer);
    if (index> slides.length) {index = 1}
    else if(index<1){index = slides.length}
    //set the slideIndex with the index of the function
    slideIndex = index;
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[index-1].style.display = "block";  
    dots[index-1].className += " active";
    //create a new timer
    timer = setTimeout(showSlides, 4000);
}
</script>
<?php include('includes/right_content.php');?>
<?php include('includes/footer.php');?>