<?php
// forgot password code:
    include 'register.php';
    if (isset($_POST['forgot-password']))
    {
      $email =mysqli_real_escape_string($conn,$_POST['mail']);
    
  
      }
  
    else{
      
      exit(0);
    }
    use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;
  
  //Load Composer's autoloader
  require 'vendor/autoload.php';
  
  //Create an instance; passing `true` enables exceptions
  $mail = new PHPMailer(true);
  
  try {
      //Server settings
     // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = 'vincentethumbi63@gmail.com';                     //SMTP username
      $mail->Password   = 'fzzdisbntpfoudph';                               //SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
      $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
  
      //Recipients
      $mail->setFrom('vincentethumbi63@gmail.com', 'Mailer');
      $mail->addAddress($email);     //Add a recipient
      $code = substr(str_shuffle('1234567890qwertyuiopasdfghjklzxcvbnm'),0,10);
  
       
  
      
  
      //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = 'password reset link';
      $mail->Body = 'To reset your password click  on the link below <br> <a href="http://localhost/hireme/reset_password.php?code='.$code.'">here</a></br> reset your password in a day.';
      
      $verifyQuery =$conn->query("SELECT * FROM clients WHERE email='$email'"); 
      if($verifyQuery->num_rows)
       {
  
        $codeQuery = $conn->query("UPDATE clients SET token ='$code'WHERE email ='$email'"); 
        $mail->send();
        echo 'Message has been sent';
      }
  
      //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
  
      $mail->send();
      echo 'Message has been sent check your email';
      $conn->close();
  } catch (Exception $e) { 
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  } 
  
     



?>