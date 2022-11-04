<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'register.php';
session_start();


if(isset($_POST['login']))
{
  if(empty($_POST['email']) && empty($_POST['pass'] &&  $password = md5( $password)) ){
    header("location:login.php?Empty= fill in the details");    
  }else{
    $username = mysqli_real_escape_string($conn,$_POST['email']);
   $password = mysqli_real_escape_string($conn,$_POST['pass']);

    $query = "SELECT * FROM clients WHERE email='$username' and passwordt='$password'";
    $result =mysqli_query($conn,$query);
    $count=mysqli_num_rows($result);
    if($count>0) 
     {
       $_SESSION['User']=$_POST['email'];
       header("location:dashboard.php");
       

    

    }else{
      header ("location:login.php?Invalid=please enter correct username or password ");
    }

  }
  
   
  

}
 
?>
 