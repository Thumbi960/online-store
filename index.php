<?php
session_start();
 require 'register.php'; 

 if(isset($_GET['page'])) 
  {
      $page = $_GET['page'];


 }else{
     $page = 1; 
 } 
 $num_per_page = 05;
 $start_from = ($page-1)*5; 
   
  
 $query = "SELECT * FROM advert  ORDER BY  date limit $start_from,$num_per_page" ;
 $query_run = mysqli_query($conn,$query);
 $check = mysqli_num_rows($query_run) > 0; 
 

 
?>




<!DOCTYPE html>
<html lang="en">
<header class="header">

</header>


<head>
    <meta charset="UTF-8">
    <title>Homepage</title>
    <link rel="stylesheet" href="Assets/styles/style.css">
    <script src="Assets/js/js.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


        
        

</head>
<body>

<div class="page-wrapper">
    <div class="nav-wrapper">
        <div class="grad-bar"></div>
        <nav class="navbar">
            <a href="index.php">
            <img src="Assets/img/logo.png" alt="vinitech company"> VINITECK</a>
            <div class="menu-toggle" id="mobile-menu">
                <span class="bar"> </span>
                <span class="bar"> </span>
                <span class="bar"></span>
            </div> 
            <ul class="nav no-search">
                <li class="nav-item"><a href="#">Home</a></li>
                
                <li class="nav-item">

                <?php
                $count=0;
                if(isset($_SESSION["shopping"]))
                {
                    $count=count($_SESSION["shopping"]);
                }
                
                ?> 
                <a href="cart.php" class="btn btn-success">Cart (<?php echo $count; ?>)</a></li> 
                <li class="nav-item"><a href="#">Contact Us</a></li>
                <li class="nav-item"><a href="login.php">Login/Register</a></li>
                
            </ul>
        </nav>
    </div>
    <div> 
    <section class="headline">
        <video autoplay loop muted plays-inline  class="back-video">  
        
        <source src="Assets/img/advert_video.mp4" type="video/mp4">  
        </video>
            <h1>Welcome to our company</h1>
            <p>Your one stop shop for Electronics </p>
        </section>
    </div>
   


       
        <div>

       <h2 id="sisi">WHO WE ARE </h2>
              
            </div>
<section class="features">
    <div class="feature-container">
        <img src="Assets/img/about us.jpg" height ="300px" alt="Flexbox Feature">
        <h2>About Us</h2>
        <p>The company started in 2021 and has grown  due to the high demands it receives from its competitive environment.
            we are the number one solution for electronic devices.We sell high quality devices at affordable prices
        </p>
    </div>
    <div class="feature-container">
        <img src="Assets/img/Syinix.jpg"height ="300px" alt="Flexbox Feature">
        <h2>Our Partners</h2>
        <p>Synix is one of our  many  partners ,through our partnership  we are able to deliver quality services and products 
            to our esteemed customers.
        </p>
    </div>
    <div class="feature-container">
        <img src="Assets/img/services.jpg" height ="300px" alt="Flexbox Feature">
        <h2>Our Services</h2>
        <p> From our store sell high  variety of  electronics and their   accesories . 
        Our products  are limited to tv, phone,laptop  to house hold electronics . 
        You place your order on this platform and we deliver.. </p>
    </div>
</section>
<h2 >  OUR PRODUCTS</h2>

<section class="features" >

    <?php
                
                  if($check) 
                   {   
                    while($row = mysqli_fetch_array($query_run))
            {

                        ?> 
                       <main class="py-4 container">

<div class="row">
                        <div class="col-sm-8  " >
                <div class="card ">
                <div class="card-body h-100   bg-default p-4 flex-column text-black box">
                 <form action="cart.php?action=add&id=<?php echo $row["id"];?> " method="post">
                
                  <?php  echo '<img  src = "data:image;base64,'.base64_encode($row['images']).' " class="card-img-top" alt="..." width ="250px" height = "200px" />';?>  <br/>
                    <h4 class ="text-info"> <?php echo  $row["name"]?></h4>
                    <h4 class ="text-info"> <?php echo  $row["describer"]?></h4>
                    <h4 class ="text-danger"> <?php echo  $row["price"]?></h4>
                    <input type ="number" name="quantity" class ="form-control" value="1"/>
                    <input type ="hidden" name="hidden_name"value="<?php echo  $row["name"]?>"/>
                    <input type ="hidden" name="hidden_describer"value="<?php echo  $row["describer"]?>"/>
                    <input type ="hidden" name="hidden_price"value="<?php echo  $row["price"]?>"/>
                    <input type ="submit" name ="add_cart" style= "margin-top:5px;" class="btn btn-warning my-3" value ="Add to cart"/>
                    
                    </form>
                </div>
               
                    </div>
                        </div>
                        </main>
      
                       
                       <?php
                    }
                    
                    }
                    else {

                    }
                
    
              ?>
       
    </div>
</div>



</section>

<?php

 $pr_query = "SELECT  * from advert";

$pr_result = mysqli_query($conn, $pr_query); 
$total_record = mysqli_num_rows($pr_result);
$total_page = ceil($total_record/$num_per_page) ;
  if($page>1)
   {
    echo  "<a  href='index.php?page=".($page-1)."' class = 'btn btn-danger' >previous</a> " ;
  }
 for($i=1;$i<$total_page; $i++){
  echo  "<a  href='index.php?page=".$i."' class = 'btn btn-primary' > $i</a> " ; 
 } 
 if($i>$page)
 {
  echo  "<a  href='display.php?page=".($page+1)."' class = 'btn btn-danger' >next</a> " ;
}   

?>

<section class="follow">
    <h3>follow us</h3>
    <p1>We are always there for you </p1>

    <section class="follow-icons">
         <a href="#"> <img src="Assets/img/icons/facebook.png"></a>
        <a href="#"><img src="Assets/img/icons/google+.png"></a>
        <a href="#"><img src="Assets/img/icons/twitter.png"></a>
        <a href="#"><img src="Assets/img/icons/linkedin.png"></a>
    </section>

    <p1>Connect with us today</p1>

</section>
<footer class="footer-distributed">

    <div class="footer-left">

        <h3><span><img src="Assets/img/logo.png" alt="vinitech company" Height="50px" width="150px"></span></h3>

        <p class="footer-links">
            <a href="#" class="link-1">Home</a>

            <a href="#">Blog</a>

            <a href="#">Pricing</a>

            <a href="#">About</a>

            <a href="#">Faq</a>

            <a href="#">Contact</a>
        </p>

        <p class="footer-company-name"></p>
    </div>

    <div class="footer-center">

        <div>
            <i class="fa fa-map-marker"></i>
            <p><span>1530. Thika</span> Nairobi, Kenya</p>
        </div>

        <div>
            <i class="fa fa-phone"></i>
            <p>+2547208201</p>
        </div>

        <div>
            <i class="fa fa-envelope"></i>
            <p><a href="mailto:support@company.com">support@vinitech.com</a></p>
        </div>

    </div>

    <div class="footer-right">

        <p class="footer-company-about">
            <span>More about the company</span>
            The company started in 2021 and has grown  due to the high demands it receives from its competitive environment.
            we are the number one solution for electronic devices.We sell high quality devices at affordable prices
        </p>

        <div class="footer-icons">

            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-github"></i></a>

        </div>

    </div>

</footer>


</body>
</html>



