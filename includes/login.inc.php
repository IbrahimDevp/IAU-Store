<?php
if (isset($_POST["submit"])) {
$username = $_POST["username"];
$pwd = $_POST["pwd"];

require_once 'db_connect.php';
require_once 'functions.inc.php';

if(emptyInputLogin($username, $pwd ) !== false){
    header("location: ../login.php?error=emptyinput");
    exit();
   }

   loginUser($dbc, $username, $pwd);
}
else {
    header("location: ../login.php");
    exit();
}


   
  
