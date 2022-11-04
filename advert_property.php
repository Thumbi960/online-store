<?php
include_once 'log.php';

if(isset($_SESSION['User']))
{
  echo '<h6 class ="text-success"> welcome' .' ' .$_SESSION['User'].'<br/></h6>';
 

}else{
  header("location:login.php");
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

    <title> adverterse property</title>
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
    <form action="" method ="POST" enctype="multipart/form-data">

    <div class="mb-3">
  <label for="formFileMultiple" class="form-label">Add property image </label>
  <input class="form-control" type="file" id="formFileMultiple" name="image" multiple>
</div>
    
  <div class="mb-3">
  
  <label for="exampleFormControlInput1" class="form-label">property location</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="property location" name="location">
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">describe the property </label>
  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
</div>
<div class="mb-3">
  
  <label for="exampleFormControlInput1" class="form-label">date uploaded</label>
  <input type="date" class="form-control" id="exampleFormControlInput1" placeholder="property location" name="dated">
</div>
<div class="col-12">
    <button class="btn btn-primary" type="submit" name = "upload">Submit form</button>
  </div>
    </form>
  </body>
</html>
<?php
include 'register.php';
if(isset($_POST['upload']))
{
  $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
  $location = $_POST['location'];
  $describe = $_POST['description'];
  $dated = $_POST['dated'];
  $email = $_SESSION['User'];

  $query = "INSERT INTO advert (images,locale,describer,date,) VALUES ('$file', '$location','$describe',' $dated')";
    $query_run = mysqli_query($conn,$query);
    if( $query_run ){
      echo " property details uploaded success";

    }else{
      mysqli_error(); 
    }

}


?>
 