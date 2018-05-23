<?php
 $to = "palani@vahaitech.com";
 $subject = "Hi!";
// $body = "Hi,\n\nHow are you?";
$body = file_get_contents('welcome.html');
 if (mail($to, $subject, $body )) {
   echo("<p>Email successfully sent!</p>");
  } else {
   echo("<p>Email delivery failed…</p>");
  }
 ?>

