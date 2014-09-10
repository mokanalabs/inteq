<?php

echo "0";
if(isset($_POST['submit'])) {
  echo "1";
  $subject = $_POST['subject'];
  $to = "inteqinternational@gmail.com";
  $from = $_POST['email'];
  echo "2";
  $msg = "NAME: "  . $_POST['name'] . "<br \>\n";
  $msg .= "ID: "  . $_POST['id'] . "<br \>\n";
  $msg .= "PHONE: "  . $_POST['phone'] . "<br \>\n";
  $msg .= "EMAIL: "  . $_POST['email'] . "<br \>\n";
  $msg .= "COMMENTS: "  . $_POST['comments'] . "<br \>\n";
  echo "3";
  $headers  = "MIME-Version: 1.0\r\n";
  $headers .= "Content-type: text/html; charset=UTF-8\r\n";
  $headers .= "From: <" . $from . ">" ;
  echo "4";
  $smtp = Mail::factory('smtp', array(
          'host' => 'ssl://smtp.gmail.com',
          'port' => '465',
          'auth' => true,
          'username' => 'inteqinternational@gmail.com',
          'password' => 'inteq2014'
      ));
  echo "5";
  $mail = $smtp->send($to, $headers, $msg);
  if (PEAR::isError($mail)) { 
    echo("ERROR: " . $mail->getMessage()); 
  } else { 
    echo("Message successfully sent!"); 
  } 
  
} else {
  echo "No Submit";
}

?>