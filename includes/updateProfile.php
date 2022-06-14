<?php
session_start();
           if(isset($_POST['button_update_check']))
           {

                        require ('db_connect.php');
                        require_once 'functions.inc.php'; 
                        $Customer_IDu=$_SESSION["userid"];
                        $Emailu=$_POST['Email'];
                        $Full_Nameu=$_POST['Full_Name'];
                        $DOBu=$_POST['DOB'];
                        $PhoneNumu=$_POST['PhoneNum'];
                        $Genderu=$_POST['Gender'];
                        $Payment_infou=$_POST['Payment_info'];
                        $Streetu=$_POST['Street'];
                        $Cityu=$_POST['City'];
                        $Countryu=$_POST['Country'];

               
                        $sql_update="update customer set Email='$Emailu',Full_Name='$Full_Nameu',DOB='$DOBu',PhoneNum='$PhoneNumu',Gender='$Genderu',Payment_info='$Payment_infou',Street='$Streetu',City='$Cityu',Country='$Countryu' where Customer_ID=' $Customer_IDu' ";
                        $sql=mysqli_query($dbc,$sql_update);
                        header("location: ../profile.php?error=none");
                        exit();
                        mysqli_close($dbc);
                        
           }
                        ?>