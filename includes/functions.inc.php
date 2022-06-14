<?php
// $email
function emptyInputSignup($name,$username, $pwd,$email, $DOB, $phonenum, $gender, $paymentinfo, $street, $city, $country){

    $result;
    if(empty($name) || empty($username) || empty($pwd) || empty($email) || empty($DOB) 
    || empty($phonenum) || empty($gender) || empty($paymentinfo) || empty($street) || empty($city) || empty($country)  ){

        $result = true;
    }
else{
    $result = false;
}
return $result;
}


function invalidUsername($username){

    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username )){

        $result = true;
    }
else{
    $result = false;
}
return $result;
}


function invalidEmail($email){

    $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){

        $result = true;
    }
else{
    $result = false;
}
return $result;
}


function userExists($dbc, $username){
$sql = "SELECT * FROM customer WHERE Username = ?;";
$stmt = mysqli_stmt_init($dbc);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../signup.php?error=stmtfailed");
    exit();
}

mysqli_stmt_bind_param($stmt,"s", $username);
mysqli_stmt_execute($stmt);

$resultData = mysqli_stmt_get_result($stmt);
if ($row = mysqli_fetch_assoc($resultData)) {
return $row;
}
else{

    $result = false;
    return $result;
}
   mysqli_stmt_close($stmt);
}

// $email
function  createUser($dbc, $username, $pwd,$email, $name, $DOB, $phonenum, $gender, $paymentinfo, $street, $city, $country){
    $sql = "INSERT INTO customer(Username, Password, Email, Full_Name, DOB, PhoneNum, Gender, Payment_info,  Street, City, Country) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($dbc);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hashedPassword = password_hash($pwd, PASSWORD_DEFAULT);
    $username = strtolower($username);
    
    mysqli_stmt_bind_param($stmt,"sssssssssss", $username, $hashedPassword,$email,$name, $DOB, $phonenum, $gender, $paymentinfo, $street, $city, $country);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
    exit();
    }

    function emptyInputLogin($username, $pwd ){

        $result;
        if(empty($username) || empty($pwd)){
    
            $result = true;
        }
    else{
        $result = false;
    }
    return $result;
    }


    function loginUser($dbc, $username, $pwd){

        $userExists =   userExists($dbc, $username);

        if ($userExists === false) {
            header("location: ../login.php?error=wronglogin");
            exit();       
         }

         $pwdHashed = $userExists["Password"];
         $checkPwd = password_verify($pwd, $pwdHashed);

         if ($checkPwd === false) {
            header("location: ../login.php?error=wronglogin");
            exit(); 
                 }
                 else if (($checkPwd === true)){
                    session_start();
                    $_SESSION["userid"] = $userExists["Customer_ID"];
                    $_SESSION["useruid"] = $userExists["Username"];
                    $_SESSION["Full_Name"] = $userExists["Full_Name"];
                    $_SESSION["Email"] = $userExists["Email"];
                    $_SESSION["DOB"] = $userExists["DOB"];
                    $_SESSION["PhoneNum"] = $userExists["PhoneNum"];
                    $_SESSION["Gender"] = $userExists["Gender"];
                    $_SESSION["Payment_info"] = $userExists["Payment_info"];
                    $_SESSION["Street"] = $userExists["Street"];
                    $_SESSION["City"] = $userExists["City"];
                    $_SESSION["Country"] = $userExists["Country"];
                    header("location: ../index.php");
                    exit(); 
                 }
    }
    

    function loginUserLeft($dbc, $username, $pwd){

        $userExists =   userExists($dbc, $username);

        if ($userExists === false) {
            header("location: ../index.php?error=wronglogin");
            exit();       
         }

         $pwdHashed = $userExists["Password"];
         $checkPwd = password_verify($pwd, $pwdHashed);

         if ($checkPwd === false) {
            header("location: ../index.php?error=wronglogin");
            exit(); 
                 }
                 else if (($checkPwd === true)){
                    session_start();
                    $_SESSION["userid"] = $userExists["Customer_ID"];
                    $_SESSION["useruid"] = $userExists["Username"];
                    $_SESSION["Full_Name"] = $userExists["Full_Name"];
                    $_SESSION["Email"] = $userExists["Email"];
                    $_SESSION["DOB"] = $userExists["DOB"];
                    $_SESSION["PhoneNum"] = $userExists["PhoneNum"];
                    $_SESSION["Gender"] = $userExists["Gender"];
                    $_SESSION["Payment_info"] = $userExists["Payment_info"];
                    $_SESSION["Street"] = $userExists["Street"];
                    $_SESSION["City"] = $userExists["City"];
                    $_SESSION["Country"] = $userExists["Country"];
                    header("location: ../index.php");
                    exit(); 
                 }
    }


   function emptyInputLoginLeft($username, $pwd ){

        $result;
        if(empty($username) || empty($pwd)){
    
            $result = true;
        }
    else{
        $result = false;
    }
    return $result;
    }
 
