<?php
include 'register.php';

ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 error_reporting(E_ALL);
if(isset($_POST['send'])){
$name1 = $_POST['firstname'];
$username = $_POST['username'];
$password = $_POST['Password'];
$password2 = $_POST['Password2']; 
$idno = $_POST['Identity'];
$postalcode = $_POST['postalcode'];
$email = $_POST['email'];
if(empty($_POST['username']) && empty($_POST['pass']) ){
  header("location:registration.php?Empty= fill in the details");    
}else{
  if ($password == $password2)
  { 
    $query = "SELECT * FROM clients WHERE firstname ='$name1'";
    $result = mysqli_query($conn, $query);
    if(!$result->num_rows > 0)
    {
      $sql = "INSERT INTO clients (firstname,username,passwordt,Idno,Postal,email) 
    VALUES ('$name1','$username','$password','$idno','$postalcode','$email')";
    $result = mysqli_query($conn, $sql);
    if($result){
      echo '<script> alert ("registration successfull!")</script>';
      header("location:login.php");
  
    }
  
  }else
  {
    echo '<script> alert ("username already exists")</script>';
  
  }

    }else{
      echo '<script> alert ("passwords do not match!")</script>';
  
      
    }
  }
  
  
   
} 


 


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <h1 class="d-flex justify-content-center">Register here </h1>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->

    <div class="container">
    <div class="align-self-center">
      <form class="row g-3 needs-validation" novalidate  method ="POST">
      <?php
      
      if(@$_GET['Empty']==true){
        ?>
        <div class ="alert-light text-danger text-center py-3"> <?php echo $_GET['Empty']; ?></div>
        <?php
      }
        
        
        ?>
        <div class="">
          <label for="validationCustom01" class="form-label">First name</label>
          <input type="text" class="form-control" id="validationCustom01" name ="firstname"  required>
          <div class="valid-feedback">
            Looks good!
          </div>
        </div> 
        <div class="">
          <label for="validationCustom02" class="form-label">Username</label>
          <input type="text" class="form-control" id="validationCustom02" name = "username">
          <div class="valid-feedback">
          Please choose a username.
          </div>
        </div>
        <div class="">
          <label for="validationCustomUsername" class="form-label">Password</label>
          <div class="input-group">
           
            <input type="password" class="form-control" name ="Password" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
            <div class="invalid-feedback">
              
            </div>
          </div>    
          <div class="">
          <label for="validationCustomUsername" class="form-label"> Repeat Password</label>
          <div class="input-group">
            
            <input type="password" class="form-control" name ="Password2" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
            <div class="invalid-feedback">
              
            </div>
          </div>
        </div>
        <div class="">
          <label for="validationCustom03" class="form-label">ID number/passport no</label>
          <input type="text" class="form-control" name ="Identity" id="validationCustom03" required>
          <div class="invalid-feedback">
            Please provide a valid city.
          </div>
        </div>
        
        <div class=""> 
          <label for="validationCustom05" class="form-label">Zip</label>
          <input type="text" class="form-control" name ="postalcode" id="validationCustom05" required>
          <div class="invalid-feedback">
            Please provide a valid zip.
          </div>
          <div class=""> 
          <label for="validationCustom05" class="form-label">email address</label>
          <input type="email" class="form-control" name ="email" id="validationCustom05" required>
          <div class="invalid-feedback">
            Enter your email address
          </div>
        </div>
        <div class="col-12">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
            <label class="form-check-label" for="invalidCheck">
              Agree to terms and conditions
            </label>
            <div class="invalid-feedback">
              You must agree before submitting.
            </div>
          </div>
        </div>
        <div class="col-12">
          <button class="btn btn-primary" name ="send" type="submit">Submit form</button>
        </div>
      </form>


      </div>
    </div>
   

  </body>
</html>



