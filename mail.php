<?php
$sub = "Your subject";
//the message
$msg = "Your message";
//recipient email here
$rec = "thumbivincenso@gmail.com";
//send email
 $send =mail($rec,$sub,$msg);
echo ($send ? "Mail is send": "there was an error");
?>