<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once '../users/init.php';

if (!securePage($_SERVER['PHP_SELF'])){die();}


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


if(isset($_POST["Email"])){
  //Create a new PHPMailer instance
  $mail = new PHPMailer;
  //Tell PHPMailer to use SMTP
  $mail->isSMTP();
  //Enable SMTP debugging
  // 0 = off (for production use)
  // 1 = client messages
  // 2 = client and server messages
  $mail->SMTPDebug = 0;
  //Set the hostname of the mail server
  $mail->Host = 'smtp.gmail.com';
  // use
  // $mail->Host = gethostbyname('smtp.gmail.com');
  // if your network does not support SMTP over IPv6
  //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
  $mail->Port = 587;
  //Set the encryption system to use - ssl (deprecated) or tls
  $mail->SMTPSecure = 'tls';
  //Whether to use SMTP authentication
  $mail->SMTPAuth = true;
  //Username to use for SMTP authentication - use full email address for gmail
  $mail->Username = "michael.arnold.cpps@gmail.com";
  //Password to use for SMTP authentication
  $mail->Password = "marnoldCPPSdev1!";
  //Set who the message is to be sent from
  $mail->setFrom('michael.arnold.cpps@gmail.com', 'CPPS Admin');
  //Set an alternative reply-to address
  $mail->addReplyTo('replyto@example.com', 'First Last');
  //Set who the message is to be sent to
  $mail->addAddress('minimearnold@gmail.com', 'John Doe');
  //Set the subject line
  $mail->Subject = 'PHPMailer GMail SMTP test';
  //Read an HTML message body from an external file, convert referenced images to embedded,
  //convert HTML into a basic plain-text alternative body
  // $mail->msgHTML(file_get_contents('contents.html'), __DIR__);
  //Replace the plain text body with one created manually
  // $mail->AltBody = 'This is a plain-text message body';

  //Temp Body
  $mail->Body = 'This is the HTML message body <b>in bold!</b>';


  //Attach an image file
  //$mail->addAttachment('images/phpmailer_mini.png');
  //send the message, check for errors


  //Section 2: IMAP
  //IMAP commands requires the PHP IMAP Extension, found at: https://php.net/manual/en/imap.setup.php
  //Function to call which uses the PHP imap_*() functions to save messages: https://php.net/manual/en/book.imap.php
  //You can use imap_getmailboxes($imapStream, '/imap/ssl') to get a list of available folders or labels, this can
  //be useful if you are trying to get this working on a non-Gmail IMAP server.
  function save_mail($mail)
  {
      //You can change 'Sent Mail' to any other folder or tag
      $path = "{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail";
      //Tell your server to open an IMAP connection using the same username and password as you used for SMTP
      $imapStream = imap_open($path, $mail->Username, $mail->Password);
      $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
      imap_close($imapStream);
      return $result;
  }

  if (!$mail->send()) {
      echo "Mailer Error: " . $mail->ErrorInfo;
  } else {
      echo "Message sent!";
      if (save_mail($mail)) {
          echo "Message saved!";
      }
  }
}
?>
