

<?php include('includes/header.php');?>


<section class= "">
  <h2 class="title_box"> Login </h2>
  <div class="blue_border_box">
<form action = "includes/login.inc.php" method= "post"> 
    <input type = "text" class="input" name = "username" placeholder="Username...">  <br>
    <input type = "password" class="input" name  = "pwd" placeholder="Password..."> <br>
    <div class ="bt"> <button class = "button"  type = "submit" name = "submit"> Sign Up </button> </div>
</from>
<div> 
<?php 
if (isset($_GET["error"])) {

if ($_GET["error"] == "emptyinput") {
 echo"<p> Please Fill In All Fields!</p>";
}
 else if ($_GET["error"] == "wronglogin") {
  echo"<p> Incorrect Login Information!</p>";
 }
 

 }
?>
</div>

</div>

</section>


<?php include('includes/footer.php');?>