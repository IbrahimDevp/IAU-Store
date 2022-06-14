<?php
if (isset($_POST["submit"])) {
$username = $_POST["username"];
$pwd = $_POST["pwd"];
require_once 'db_connect.php';
require_once 'functions.inc.php';

if(emptyInputLoginLeft($username, $pwd ) !== false){
    header("location:../index.php?error=emptyinput");
    exit();
   }

   loginUserLeft($dbc, $username, $pwd);
}
else {
    header("location:../index.php");
    exit();
}


   
  
