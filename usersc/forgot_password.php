<?php
// This is a user-facing page
/*
UserSpice 4
An Open Source PHP User Management System
by the UserSpice Team at http://UserSpice.com

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

require_once '../users/init.php';
require_once $abs_us_root.$us_url_root.'users/includes/header.php';

//require_once $abs_us_root.$us_url_root.'users/includes/template/prep.php';


if (!securePage($_SERVER['PHP_SELF'])){die();}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if(ipCheckBan()){Redirect::to($us_url_root.'usersc/scripts/banned.php');die();}
$error_message = null;
$errors = array();
$email_sent=FALSE;

$token = Input::get('csrf');
if(Input::exists()){
    if(!Token::check($token)){
        include($abs_us_root.$us_url_root.'usersc/scripts/token_error.php');
    }
}

if (Input::get('forgotten_password')) {
    $email = Input::get('email');
    $fuser = new User($email);
    //validate the form
    $validate = new Validate();
    $msg1 = "Email";
    $validation = $validate->check($_POST,array('email' => array('display' => $msg1,'valid_email' => true,'required' => true,),));

    if($validation->passed()){
        if($fuser->exists()){
          $vericode=randomstring(15);
          $vericode_expiry=date("Y-m-d H:i:s",strtotime("+$settings->reset_vericode_expiry minutes",strtotime(date("Y-m-d H:i:s"))));
          $db->update('users',$fuser->data()->id,['vericode' => $vericode,'vericode_expiry' => $vericode_expiry]);
            //send the email
            $options = array(
              'fname' => $fuser->data()->fname,
              'email' => rawurlencode($email),
              'vericode' => $vericode,
              'reset_vericode_expiry' => $settings->reset_vericode_expiry
            );
            // $subject = "Password Reset";
            $encoded_email=rawurlencode($email);

            //Email Body
            $body =  email_body('_email_template_forgot_password.php',$options);


            $fname = $fuser->data()->fname;
            $email = rawurlencode($email);
            $reset_vericode_expiry = $settings->reset_vericode_expiry;

            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->SMTPDebug = 0;
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587;
            $mail->SMTPSecure = 'tls';
            $mail->SMTPAuth = true;
            $mail->Username = "michael.arnold.cpps@gmail.com";
            $mail->Password = "marnoldCPPSdev1!";
            $mail->setFrom('michael.arnold.cpps@gmail.com', 'CPPS Admin');
            $mail->addReplyTo('dontreplyto@example.com', 'First Last');

            $mail->addAddress($email, $fname);
            $mail->Subject = "Password Reset";
            // $mail->msgHTML(file_get_contents('contents.html'), __DIR__);
            $mail->Body = $body;

            function save_mail($mail)
            {
                $path = "{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail";
                $imapStream = imap_open($path, $mail->Username, $mail->Password);
                $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
                imap_close($imapStream);
                return $result;
            }

            //$email_sent=email($email,$subject,$body);

            logger($fuser->data()->id,"User","Requested password reset.");
            if(!$mail->send()){
                $errors[] = $mail->ErrorInfo;;
            }else {
              $email_sent = true;
            }
        }else{
            $errors[] = "That email does not exist in our database";
        }
    }else{
        //display the errors
        $errors = $validation->errors();
    }
}
?>
<?php
if ($user->isLoggedIn()) $user->logout();
?>

<!-- ************************************************** HTML STARTS HERE  ************************************************************** -->


<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" type="text/css" href="css/logged_out.css">
<script type="text/javascript">
  $(document).ready(function(){
      document.getElementById('joinModal').style.display='block'
    });
</script>



<div class="w3-container">
  <div id="joinModal" class="w3-modal" data-keyboard="false" data-backdrop="static">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:1100px">

      <div class="w3-center"><br>
        <img src="/usersc/images/cppslogo.png" class="w3-image" style="width:100%;max-width:300px">
      </div>

      <?php

      if($email_sent){
          require $abs_us_root.$us_url_root.'users/views/_forgot_password_sent.php';
      }else{
          require $abs_us_root.$us_url_root.'users/views/_forgot_password.php';
      }

      ?>

        <div class="w3-bar">
          <button class="w3-bar-item w3-button w3-dark-grey w3-mobile" style="width:50%" onclick="window.location.href='<?=$us_url_root?>users/login.php'"><i class="fa fa-sign-in"></i> Login</button>
          <button class="w3-bar-item w3-button w3-dark-grey w3-mobile" style="width:50%" onclick="window.location.href='<?=$us_url_root?>usersc/forgot_password.php'"><i class="fa fa-info-circle"></i> Forgot Password</button>
          <!-- <button class="w3-bar-item w3-button w3-dark-grey w3-mobile" style="width:33.3%" onclick="window.location.href='<?=$us_url_root?>users/join.php'"><i class="fa fa-user-plus"></i> Register</button> -->
        </div>

      </div>
    </div>
  </div>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<!-- footer -->
<!-- footers -->
<?php require_once $abs_us_root.$us_url_root.'users/includes/page_footer.php'; // the final html footer copyright row + the external js calls ?>

<!-- Place any per-page javascript here -->

<?php require_once $abs_us_root.$us_url_root.'users/includes/html_footer.php'; // currently just the closing /body and /html ?>
