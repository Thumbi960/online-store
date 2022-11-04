
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
    require 'register.php';  
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
      //echo  $query;
      while($row = mysqli_fetch_assoc($query_run))
      {
          echo $row['item_name'];
          echo $row['price'];
          echo $row['quantity'];
      }
     
      
       
      echo"
      </tbody>
      </table>
      
      
      
    </tr>
    ";

    }
    
    ?>
   
    
  </tbody>
</table>
      </div>
    
    </div>
</div>