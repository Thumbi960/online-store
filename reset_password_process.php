<?php
include 'register.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_GET['code']))
{
     $code = $_GET['code'];

     if($conn->connect_error){
        die('could not connect to the database');
    
    }
    
     $verifyQuery = $conn->query("SELECT * FROM clients WHERE token ='$code'");
     if ($verifyQuery->num_rows == 0){
         header("location:reset_password.php");
         exit();
     }
     if(isset($_POST['reset'])){
        
         $email = $_POST['email'];
         $new_password = $_POST['newpassword'];
         $changepassword = "UPDATE clients SET passwordt  ='$new_password' WHERE token ='$code'";
         
         if ($conn->query($changepassword)=== TRUE ){
             header("location:success_change.html");
         } 
           
     } 
     $conn->close();
     
}
else
         {
             header("location:login.php");
             exit();
         }


?>