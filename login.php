<?php

//require "log.php"

//include 'log.php';

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>login </title>
  <style>
    body{
      margin:0;padding:0;
      font-family:montserrat;
     
      height:100vh;
      overflow: hidden; 
      background-image: url("images/house.jpg");
    background-size: cover;
    background-repeat: no-repeat;
    }
    #image{
      border-radius:50%;
    }
    .center{
      position:absolute;
      top: 50%;
      left: 50%;
      background:linear-gradient(120deg,#2980b9, #8e44ad);
      transform: translate(-50%,-50%);
      width: 500px;
      height:450px;
      border-radius: 10px;
    }
    .center h3{
      text-align:center;
      padding:0 0 20px 0;
      border-bottom:1px solid silver;
      top:15px;
    }
    .center form{
      padding:0px 40px;
      box-sizing:border-box;
      
    }
    form .txt_field{
      position:relative;
      border-bottom:2px solid #adadad;
      margin:30px 0;

    }
    .txt_field input{
      width:100%;
      padding:0 5px;
      height:40px;
      font-size: 16px;
      border:none;
      background:none;
      outline:none;

    }
    .txt_field label{
      position :absolute;
      top:50px;
      left: 5px;
      color:#adadad;
      transform: translateY(-50%);
      font-size:16px;
      pointer-events:none;
      transition:.5s;
    }  
    .txt_field span::before{
      content:'';
      position:absolute;
      top:40px;
      left:0px;
      width:100%;
      height:2px;
      background:#2691d9; 
      transition:.5s;
    }
    .txt_field input:focus ~ label,
    .txt_field input:valid ~ label{
      top: -5px;
      color: #2691d9;

    }
    .txt_field input:focus ~ span::before,
    .txt_field input:valid ~ span ::before{
      width:100px;
    }
    .items{
      margin: -5px 0 20px 5px;
      color:red;
      cursor: pointer;
    }
    .items:hover{
      text-decoration:underline;
    }
    .send{
      width:100%;
      height:30px;
      border: 1px solid;
      background:blue;
      border-radius:25px;
      font-size:18px;
      color:white;
      cursor:pointer;
      outline:none;
      
    }
    .send:hover{
      border-color:#2691d9;
      transition:.5s;

    }
    .signup_link{
      margin:30px 0;
      text-align: center;
      color:red;
    }
    .signup_link a{
      color:#2691d9;
      text-decoration:none;
    }
    .signup_link a:hover{
      text-decoration:underline;
    }

  </style>

  </head>
  <body>
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
   
                
                   
                
                
                <div id="container"> 
                  <div class="center">
                  <form action="log.php" method="post">
                  <h3> LOGIN 
                    <br>
                    <img  id =" image"src="images/avater.jpg" alt="" width="100px" height="50px">
                     </h3>
                  
                  <?php
      
      if(@$_GET['Empty']==true){
        ?>
        <div class ="alert-light text-danger text-center py-3"> <?php echo $_GET['Empty']; ?></div>
        <?php
      }
        
        
        ?>
        <?php
      
      if(@$_GET['Invalid']==true){
        ?>
        <div class ="alert-light text-danger text-center py-3"> <?php echo $_GET['Invalid']; ?></div>
        <?php
      }
        
        
        ?>
        
                        <div class="txt_field">
                        <input type="text"  name="email">
                       <span></span>
                        <label for="">emailaddress</label>
                        </div>
                       <div class="txt_field">
                       <input type="password"  name="pass"> 
                       <span></span>
                       <label for="">password</label>
                       </div>
                        <br>

                        <input  class="send" type="submit" name ="login" value ="login in"  >
                      
                            <a class="items" href="forgot_password.php"> forgot password</a>
                       
                       <a  class ="signup_link" href="register.php" > Sign up</a>
                    </form>
                  </div>
       
               
                </div>
        
  
     

            
    
 
  </body>
</html>
