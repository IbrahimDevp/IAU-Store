<?php

if(isset($_POST["submit"])) {

   $name = $_POST["SUname"];
   $username = $_POST["SUusername"];
   $pwd = $_POST["SUpwd"];
   $email = $_POST["SUemail"];
   $DOB = $_POST["SUDOB"];
   $phonenum = $_POST["SUphonenum"];
   $gender = $_POST["SUgender"];
   $paymentinfo = $_POST["SUpaymentinfo"];
   $street = $_POST["SUstreet"];
   $city = $_POST["SUcity"];
   $country = $_POST["SUcountry"];

   require_once 'db_connect.php';
   require_once 'functions.inc.php';

   //$email
   if(emptyInputSignup($name, $username, $pwd, $email, $DOB, $phonenum, $gender, $paymentinfo, $street, $city, $country) !== false){
    header("location: ../register.php?error=emptyinput");
    exit();
   }

   if(invalidUsername($username) !== false){
    header("location: ../register.php?error=invalidusername");
    exit();
   }

   if(invalidEmail($email) !== false){
    header("location: ../register.php?error=invalidemail");
    exit();
   }

   if(userExists($dbc, $username) !== false){
    header("location: ../register.php?error=usernametaken");
    exit();
   }

   //sign up the user
   createUser($dbc, $username, $pwd, $email, $name, $DOB, $phonenum, $gender, $paymentinfo, $street, $city, $country);     //$email



}

else{
header("location: ../register.php");
}