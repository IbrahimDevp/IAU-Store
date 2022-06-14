<?php
# Connect the AddtoDB.php to Database 
require_once 'includes/db_connect.php';

# get info about the file image
if (isset($_POST['submit']))

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
  header("location: add.php?TODB=Product_been_added");
  
 }
 else{
  header("location: add.php?error=image_didnt_Upload");
  exit();
 }

# insert all input values from addpro.php to the new values below   
$Product_Name=$_POST['Product_Name'];
$Product_Price=$_POST['Product_Price'];
$Discount=$_POST['Discount'];
$Category=$_POST['Category'];
$Size=$_POST['Size'];
$Color=$_POST['Color'];
$Capacity=$_POST['Capacity'];
$RAM=$_POST['RAM'];
$Product_Manuf=$_POST['Product_Manuf'];
$Product_Model=$_POST['Product_Model'];
$Description=$_POST['Description'];
$img=$file_store;
$Release_Date=$_POST['Release_Date'];
$Quantity=$_POST['Quantity'];
$Special=$_POST['Special'];


# insert values into database 
$sql = "INSERT INTO product (Product_Name, Product_Price, Discount, Quantity, Special, Category, Size, Color, Capacity, RAM, Product_Manuf, Product_Model, Description, img, Release_Date)
VALUES ('$Product_Name', '$Product_Price', '$Discount','$Quantity', '$Special' ,'$Category' , '$Size', '$Color', '$Capacity', '$RAM', '$Product_Manuf', '$Product_Model','$Description','$img' , '$Release_Date')";
$result= mysqli_query($dbc, $sql);


?>