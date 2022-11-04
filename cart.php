
<?php
session_start();

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>shopping cart</title>
    <style>
    .shopping-cart table {
      text-align:center;
      width:100%;
    }
    shopping-cart table th{
      padding:1.5rem;
      font-size:2rem;
      color:var(--white);
      background-color :var(--black);
    }
    shopping-cart table tr td{
     border-bottom:var(--border);
     padding:1.5rem;
      font-size:2rem;
    }
    </style>
  </head>
  <body>
 
    <h1 class="heading">shopping cart</h1>
    <section class="shopping-cart">
    
    <?php

if(isset($_POST["add_cart"]))
 {
  if (isset($_SESSION["shopping "])) 
   {
       $item_array_id=array_column( $_SESSION["shopping"],"item_id");
       if(!in_array($_GET["id"], $item_array_id ))
       {
            
            $item_array = array(
                'item_id' -> $_GET["id"],
               'item_name' ->$_POST["hidden_name"],
               'item_price' ->$_POST["hidden_price"],
               'item_quantity' ->$_POST["quantity"]
          
            );

          
       }
       else
       {
            echo '<script> alert("item already added");</script>';
            echo '<script>window.location="index.php";</script>';
       }


  } else{
      $item_array = array(
          'item_id ' => $_GET["id"],
         'item_name' =>$_POST["hidden_name"],
         'item_price' =>$_POST["hidden_price"],
         'item_quantity' =>$_POST["quantity"]
    
      ); 
      $_SESSION["shopping"][] = $item_array;
  }
 }
 // code for deleting items from the shopping cart
 if(isset($_POST["remove_item"]))
 {
foreach ($_SESSION["shopping"] as $key => $values) 
{
  if ($values['item_id']==$_GET['item_id'])
  {
    unset($_SESSION["shopping"][$key]);
    $_SESSION['shopping']=array_values($_SESSION['shopping']);
    echo"<script>
    alert('item has been removed');
    window.location.href='cart.php';
    </script>";
  }
 
  # code...
}
 }
 
 ?>
 <div class="container">
 <div class="col-lg-8">
 <div class ="table-responsive">
 <table class="table table-bordered">
 <tr>
 <th>Item name</th>
 <th>Quantity</th>
 <th>Price</th>
 <th>Total</th>
 <th>Action</th>

 
 </tr>
 <?php
 if(!empty($_SESSION["shopping"]))
 {
     $total=0;
     foreach($_SESSION["shopping"] as $key => $values)
     {
             ?>
 
 
             <tr>
             <td> <?php  echo $values["item_name"];?></td>
             <td> <?php  echo $values["item_quantity"];?></td>
             <td> <?php  echo $values["item_price"];?></td>
             
             <td> </td>
              <td> <form action="cart.php" method="post">
              <button  name ="remove_item"class= "btn btn-sm btn-outline-danger">remove item</button>
              <input type="hidden"name="Item_name"value='$values[item_name]'>
              </form></td>
             

             </tr>
             <?php
             $total = $total +($values["item_quantity"] * $values["item_price"]);
     }
     ?>
         
     <td colspan="3" align ="right">Total</td>
     <td  > $<?php  echo number_format($total, 2) ?></td>
     <td> <a href="cart.php?delete_all"onclick="return confirm('are you sure you want to clear the cart');"
      class="btn btn-danger"> clear cart</a></td>
      
    
     
    
    
     </tr>
     </table>
     
 </div>
 <div col-lg-4>
 <div class ="border bg-light rounded p-4">
 <h3 claSS="text-center"> total</h3>
                        <h5 class="text-left"> <?php echo  number_format($total, 2);  ?> </h5>
                         
     <h3> Provide your details below to complete your order</h3>
     <form action="continue_shopping.php" method="POST">
     <div class="input-group input-group-sm mb-3">
  <span class="input-group-text" id="inputGroup-sizing-sm">Name</span>
  <input type="text"  name ="client_name"class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
      </div>
      <div class="input-group input-group-sm mb-3">
  <span class="input-group-text" id="inputGroup-sizing-sm">Phone number</span>
  <input type="text" name ="user_phone" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
      </div>
      <div class="input-group input-group-sm mb-3">
  <span class="input-group-text" id="inputGroup-sizing-sm">residence</span>
  <input type="text"name ="residence" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
      </div>
      <div class="input-group input-group-sm mb-3">
  <span class="input-group-text" id="inputGroup-sizing-sm">Email Address</span>
  <input type="text"name ="user_email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
      </div>
     <button name="confirm_shopping" class="btn btn-success"style="margin-top:0;">complete your order</button>
     </form>
 </div>

                        
     
                      </div> 
 
 </div>
 
     <?php
 }

 
 ?>
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    



 
 
  </body>
</html>

