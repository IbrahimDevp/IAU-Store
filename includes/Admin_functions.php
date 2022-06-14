<?php
// $email
function emptyInputSignup($name,$username, $pwd, $DOB, $phonenum, $gender, $paymentinfo, $street, $city, $country){

    $result;
    if(empty($name) || empty($username) || empty($pwd) || empty($DOB) 
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


function invalidEmail($emai){

    $result;
    if(!filter_var($emai, FILTER_VALIDATE_EMAIL)){

        $result = true;
    }
else{
    $result = false;
}
return $result;
}


function userExists($dbc, $username){
$sql = "SELECT * FROM admin WHERE Username = ?;";
$stmt = mysqli_stmt_init($dbc);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../admin-login.php?error=stmtfailed");
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
function  createUser($dbc, $username, $pwd, $name, $DOB, $phonenum, $gender, $paymentinfo, $street, $city, $country){
    $sql = "INSERT INTO customer(Username, Password, Full_Name, DOB, PhoneNum, Gender, Payment_info,  Street, City, Country) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($dbc);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hashedPassword = password_hash($pwd, PASSWORD_DEFAULT);
    $username = strtolower($username);
    
    mysqli_stmt_bind_param($stmt,"ssssssssss", $username, $hashedPassword,$name, $DOB, $phonenum, $gender, $paymentinfo, $street, $city, $country);
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
            header("location: ../admin-Login.php?error=wronglogin");
            exit();       
         }

         $pwdHashed = $userExists["Password"];
         $checkPwd = password_verify($pwd, $pwdHashed);

         if ($checkPwd === false) {
            header("location: ../admin-Login.php?error=wronglogin");
            exit(); 
                 }
                 else if (($checkPwd === true)){
                    session_start();
                    $_SESSION["userAid"] = $userExists["Admin_ID"];
                    $_SESSION["userAuid"] = $userExists["Username"];
                    header("location: ../admin.php");
                    exit(); 
                 }
    }