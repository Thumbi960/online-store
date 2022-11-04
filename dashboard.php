<?php

session_start();
session_regenerate_id(true);
require 'register.php';
$cows = $_SESSION['User'];
if(isset($_SESSION['User']))
{
$cows = $_SESSION['User'];
echo '<h6 class ="text-success"> welcome' .' ' .$cows.'<br/></h6>';
 

}else{
  header("location:login.php");
} 

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.72.0">
  <title>Dashboard </title>

  <link rel="canonical" href="https://v5.getbootstrap.com/docs/5.0/examples/dashboard/">



  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
    integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
    integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/"
    crossorigin="anonymous"></script>

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    body {
      font-size: .875rem;
    }

    .feather {
      width: 16px;
      height: 16px;
      vertical-align: text-bottom;
    }

    /* Sidebar*/

    .sidebar {
      position: fixed;
      top: 0;
      bottom: 0;
      left: 0;
      z-index: 100;
      /* Behind the navbar */
      padding: 48px 0 0;
      /* Height of navbar */
      box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
    }

    @media only screen and(max-width: 767.98px) {
      .sidebar {
        top: 5rem;
      }
      table{
        width:50%;
        height:auto;
      }
    }
    @-webkit-keyframes gradbar {
    0% {
        background-position: 0 50%
    }
    50% {
        background-position: 100% 50%
    }
    100% {
        background-position: 0 50%
    }
}

@-moz-keyframes gradbar {
    0% {
        background-position: 0 50%
    }
    50% {
        background-position: 100% 50%
    }
    100% {
        background-position: 0 50%
    }
}

@keyframes gradbar {
    0% {
        background-position: 0 50%
    }
    50% {
        background-position: 100% 50%
    }
    100% {
        background-position: 0 50%
    }
}



    .sidebar-sticky {
      position: relative;
      top: 0;
      height: calc(100vh - 48px);
      padding-top: .5rem;
      overflow-x: hidden;
      overflow-y: auto;
      /* Scrollable contents if viewport is shorter than content. */
    }

    .sidebar .nav-link {
      font-weight: 500;
      color: #333;
    }

    .sidebar .nav-link .feather {
      margin-right: 4px;
      color: #727272;
    }

    .sidebar .nav-link.active {
      color: #007bff;
    }

    .sidebar .nav-link:hover .feather,
    .sidebar .nav-link.active .feather {
      color: inherit;
    }

    .sidebar-heading {
      font-size: .75rem;
      text-transform: uppercase;
    }

    /*Navbar*/
    .navbar-brand {
      padding-top: .75rem;
      padding-bottom: .75rem;
      font-size: 1rem;
      background-color: rgba(0, 0, 0, .25);
      box-shadow: inset -1px 0 0 rgba(0, 0, 0, .25);
    }

    .navbar .navbar-toggler {
      top: .25rem;
      right: 1rem;
    }

    .navbar .form-control {
      padding: .75rem 1rem;
      border-width: 0;
      border-radius: 0;
    }

    .form-control-dark {
      color: #fff;
      background-color: rgba(255, 255, 255, .1);
      border-color: rgba(255, 255, 255, .1);
    }

    .form-control-dark:focus {
      border-color: transparent;
      box-shadow: 0 0 0 3px rgba(255, 255, 255, .25);
    }
  </style>
</head>

<body>
  

  <nav class="navbar navbar-dark sticky-top bg-light flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#"> 
    <img src="Assets/img/logo.png" alt="vinitech company" height="50px" width ="150px"> 
    VINITECK</a>
   
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse"
      data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
     
          
           <?php
           echo '<a class="nav-link text-danger" href ="logout.php?logout "> logout</a>'
    
             ?>
        
      </li>
    </ul>
  </nav>

  <div class="container mt-5 " width="100%">
    <div class="row">
      <div class="col-lg-12">
 <table class="table table-dark table-striped text-center">
  <thead>
    <tr> 
      <th scope="col">Order Id</th>
      <th scope="col">Customer name</th>
      <th scope="col">Phone no</th>
      <th scope="col">Location</th>
      <th scope="col">Email adress</th>
      <th scope="col">Orders</th>
    </tr>
  </thead>  
  <tbody>
    <?php      
    $query ="SELECT * FROM `clients_order`";
    $result_1= mysqli_query($conn, $query);
    while($result_fetch=mysqli_fetch_assoc($result_1))
    {
      echo" <tr>
      <td>$result_fetch[Order_id]</td>
      <td>$result_fetch[names]</td> 
      <td>$result_fetch[phone]</td>
      <td>$result_fetch[residence]</td>
      <td>$result_fetch[email]</td>
      <td>
      <table class='table table-dark table-striped text-center'>
      <thead>
        <tr> 
          
          <th scope='col'>Item</th>
          <th scope='col'>Quantity</th>
          <th scope='col'>Price</th>
          
        </tr>
      </thead>
      <tbody>
      ";
    
      $query ="SELECT * FROM orders WHERE Order_id = '$result_fetch[Order_id]'" ;
      $query_run = mysqli_query($conn, $query ); 
      
      while($row = mysqli_fetch_assoc($query_run))
      {

        echo"
            <tr>
            <td>$row[item_name]</td>
            <td> ksh $row[price]</td>
            <td>$row[quantity]</td>
            </tr>
        
        ";
       // echo $row['item_name'];  
      //  echo $row['price'];
       // echo $row['quantity'];
          
      }
      echo"
      </tbody>
      </table>
      
      
      </td>

    </tr>
    ";

    }
    
    ?>
   
    
  </tbody>
</table>
      </div>
    
    </div>
</div>
  <div class="container  d-flex">
  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">
                <span data-feather="home"></span>
                Dashboard
              </a>
            </li>
            <li class="nav-item g-4">
              <button class="btn btn-link btn-lg  mb-3" > 
                <a href="advert_property.php">
                <span data-feather="file"> ADVERTISE</span>
                
                </a>
                </button>
            </li>
            <li class="nav-item g-4">
              <form action="dashboard.php" method ="POST">
              <button class=" btn btn-link btn-lg  mb-3" type="submit" name ="my_property" >
                <span data-feather="shopping-cart"></span>
                view posted property
                </button>
              </form>
              
            </li>
            <li class="nav-item ">
              <form action="" method="post">
              <button  class="btn btn-link  btn-lg mb-3" type="button " name ="edit_profile">
                <span data-feather="users"></span>
                Edit profile
                </button>
            </li>
            </form>
           
            
          </ul>

          
        </div>
      </nav>

     
    </div>
  </div>


  <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-DBjhmceckmzwrnMMrjI7BvG2FmRuxQVaTfFYHgfnrdfqMhxKt445b7j3KBQLolRl"
    crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.24.1/feather.min.js"
    integrity="sha384-EbSscX4STvYAC/DxHse8z5gEDaNiKAIGW+EpfzYTfQrgIlHywXXrM9SUIZ0BlyfF"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
    integrity="sha384-i+dHPTzZw7YVZOx9lbH5l6lP74sLRtMtwN2XjVqjf3uAGAREAF4LMIUDTWEVs4LI"
    crossorigin="anonymous"></script>
  <script src="dashboard.js"></script>
  <?php
    
     
  ?>
   


</div>


  
 
</body>

</html>