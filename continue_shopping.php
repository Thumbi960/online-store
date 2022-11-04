<?php

session_start();
require 'register.php'; 
if ($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(isset($_POST["confirm_shopping"]))
    {   
        $clientsname = $_POST['client_name'];
        $clientsphone = $_POST['user_phone'];
        $clientresidence =$_POST['residence'];
        $clientemail =$_POST['user_email'];
        
        $query1 =" INSERT INTO clients_order( `names`, `phone`, `residence`, `email`)
        VALUES ('$clientsname', '$clientsphone', ' $clientresidence', '$clientemail')";
      if(mysqli_query($conn,$query1))  
      {
          $order_id=mysqli_insert_id($conn);
        $query2 =" INSERT INTO orders(`Order_id`, `item_name`, `price`, `quantity`)
        VALUES (?, ?, ?, ?)"; 
         $stmt=mysqli_prepare($conn, $query2); 
         if($stmt)  
         {
            mysqli_stmt_bind_param($stmt,"isii",$order_id,$item_name,$price,$quantity);
            foreach($_SESSION["shopping"] as $key =>$values)
            {
                $item_name=$values['item_name'];
                $price=$values['item_price'];
                $quantity=$values['item_quantity'];  
                 
                mysqli_stmt_execute($stmt);
            }
            $data_1 = explode(",", $_SESSION["shopping"]);
          
          
           $subject ="thank you for the purchase";
           $headers = array(

            "Cc" => "thumbivincenso@gmail.com",
            "Content-Type" =>"text/html;charset=UTF-8",
            "From" =>"vincentethumbi63@gmail.com",
            "Reply-To" => "vincentethumbi63@gmail.com"
 
           );

           $to =  $clientemail;
           $message =" thak you for shopping with us  ,you will receive a call from one of our agents   regarding your purchase and delivery";
           $send=mail($to,$subject,$message, $headers);
           echo ($send ? "Mail is send": "there was an error");
           
            
           unset($_SESSION["shopping"]);
            echo"<script>
            alert('order complete  check your email');
            window.location.href='index.php';
            </script>";


         }else
         {
            echo"<script>
            alert('SQL_ERROR');
            window.location.href='cart.php';
            </script>";
         }
      }
      else
      { 
        echo"<script>
        alert('SQL_ERROR');
        window.location.href='cart.php';
        </script>";

      }
    }

}
 ?>


