<?php
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
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electronics & Accesories </title>
</head>
<body>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


<div class="container py-5">
    <div class="row mt-4">
    <?php
                
                  if($check) 
                   {
                    while($row = mysqli_fetch_array($query_run))
                    {
                        ?> 
                        <div class="col-md-4 mt-4">
                        
             <div class="card " >
                  <div class="card-body">
                  <form action="cart.php?action=add&id=<?php echo $row["id"];?> " method="post">
                  <?php echo '<img src="data:image;base64,'.base64_encode($row['images']).'" class="card-img-top" alt="..." width ="250px" height = "200px" >' ;?>
                  <h5 class="card-title"><?php echo $row['name'] ;  ?></h5>
                  <h5 class="card-title"><?php echo $row['price'] ;  ?></h5>
                          <p class="card-text"><?php echo $row['describer'] ;  ?></p>
                          <input type ="text" name="quantity" class ="form-control" value="1"/>
                    <input type ="hidden" name="hidden_name"value="<?php echo  $row["name"]?>"/>
                    <input type ="hidden" name="hidden_describer"value="<?php echo  $row["describer"]?>"/>
                    <input type ="hidden" name="hidden_price"value="<?php echo  $row["price"]?>"/>
                    <input type ="submit" name ="add_cart" style= "margin-top:5px;" class="btn btn-success" value ="Add to cart"/>
                      </form>
                  </div>
             </div>
         </div>
                       <?php
                    }
                    
                    }
                    else {
                        echo $row['price'] ;

                    } 
              ?>
       
    </div>
</div>
<?php

 $pr_query = "SELECT  * from advert ORDER BY date";

$pr_result = mysqli_query($conn, $pr_query); 
$total_record = mysqli_num_rows($pr_result);
$total_page = ceil($total_record/$num_per_page) ;
  if($page>1)
   {
    echo  "<a  href='index.php?page=".($page-1)."' class = 'btn btn-danger' >previous</a> " ;
  }
 for($i=1;$i<$total_page; $i++){
  echo  "<a  href='display.php?page=".$i."' class = 'btn btn-primary' > $i</a> " ; 
 } 
 if($i>$page)
 {
  echo  "<a  href='display.php?page=".($page+1)."' class = 'btn btn-danger' >next</a> " ;
}   

?>


</body>
</html>