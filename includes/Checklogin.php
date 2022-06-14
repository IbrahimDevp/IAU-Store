<?php
if (isset($_POST["submit"])) {
$username = $_POST["username"];
$pwd = $_POST["pass"];
require_once 'db_connect.php';
require_once 'Admin_functions.php';

if(emptyInputLogin($username, $pwd ) !== false){
    header("location: ./admin-login.php?error=emptyinput");
    exit();
   }

   loginUser($dbc, $username, $pwd);
}
else {
    header("location: ./admin-login.php");
    exit();
}
?>