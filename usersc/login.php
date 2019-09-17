<?php
/*
Custom login page
*/

// error_reporting(E_ALL);
// ini_set('display_errors', 1);
ini_set("allow_url_fopen", 1);
if(isset($_SESSION)){session_destroy();}
?>
<?php require_once '../users/init.php';?>
<?php require_once $abs_us_root.$us_url_root.'users/includes/header.php'; ?>
<?php
if($settings->twofa == 1){
    $google2fa = new PragmaRX\Google2FA\Google2FA();
}
?>
<?php
if(ipCheckBan()){Redirect::to($us_url_root.'usersc/scripts/banned.php');die();}
$settingsQ = $db->query("SELECT * FROM settings");
$settings = $settingsQ->first();
$error_message = '';
if (@$_REQUEST['err']) $error_message = $_REQUEST['err']; // allow redirects to display a message
$reCaptchaValid=FALSE;
if($user->isLoggedIn()) Redirect::to($us_url_root.'index.php');

if (Input::exists()) {
    $token = Input::get('csrf');
    if(!Token::check($token)){
        include($abs_us_root.$us_url_root.'usersc/scripts/token_error.php');
    }
    //Check to see if recaptcha is enabled
    if($settings->recaptcha == 1){
        require_once $abs_us_root.$us_url_root.'users/includes/recaptcha.config.php';

        //reCAPTCHA 2.0 check
        $response = null;

        // check secret key
        $reCaptcha = new ReCaptcha($settings->recap_private);

        // if submitted check response
        if ($_POST["g-recaptcha-response"]) {
            $response = $reCaptcha->verifyResponse($_SERVER["REMOTE_ADDR"],$_POST["g-recaptcha-response"]);
        }
        if ($response != null && $response->success) {
            $reCaptchaValid=TRUE;

        }else{
            $reCaptchaValid=FALSE;
            $error_message .= 'Please check the reCaptcha.';
        }
    }else{
        $reCaptchaValid=TRUE;
    }

    if($reCaptchaValid || $settings->recaptcha == 0){ //if recaptcha valid or recaptcha disabled

        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'username' => array('display' => 'Username','required' => true),
            'password' => array('display' => 'Password', 'required' => true)));

        if ($validation->passed()) {
            //Log user in
            $remember = (Input::get('remember') === 'on') ? true : false;
            $user = new User();
            $login = $user->loginEmail(Input::get('username'), trim(Input::get('password')), $remember);
            if ($login) {
                $dest = sanitizedDest('dest');
                $twoQ = $db->query("select twoKey from users where id = ? and twoEnabled = 1",[$user->data()->id]);
                if($twoQ->count()>0) {
                    $_SESSION['twofa']=1;
                    if(!empty($dest)) {
                        $page=encodeURIComponent(Input::get('redirect'));
                        logger($user->data()->id,"Two FA","Two FA being requested.");
                        Redirect::to($us_url_root.'users/twofa.php?dest='.$dest.'&redirect='.$page); }
                    else Redirect::To($us_url_root.'users/twofa.php');
                } else {
                    # if user was attempting to get to a page before login, go there
                    $_SESSION['last_confirm']=date("Y-m-d H:i:s");
                    if (!empty($dest)) {
                        $redirect=htmlspecialchars_decode(Input::get('redirect'));
                        if(!empty($redirect) || $redirect!=='') Redirect::to($redirect);
                        else Redirect::to($dest);
                    } elseif (file_exists($abs_us_root.$us_url_root.'usersc/scripts/custom_login_script.php')) {

                        # if site has custom login script, use it
                        # Note that the custom_login_script.php normally contains a Redirect::to() call
                        require_once $abs_us_root.$us_url_root.'usersc/scripts/custom_login_script.php';
                    } else {
                        if (($dest = Config::get('homepage')) ||
                            ($dest = 'account.php')) {
                            #echo "DEBUG: dest=$dest<br />\n";
                            #die;
                            Redirect::to($dest);
                        }
                    }
                }
            } else {
                $error_message .= '<strong>Login failed</strong>. Please check your username and password and try again.';
            }
        } else{
            $error_message .= '<ul>';
            foreach ($validation->errors() as $error) {
                $error_message .= '<li>' . $error[0] . '</li>';
            }
            $error_message .= '</ul>';
        }
    }
}
if (empty($dest = sanitizedDest('dest'))) {
    $dest = '';
}

?>

<!-- ************************************************** HTML STARTS HERE  ************************************************************** -->

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" type="text/css" href="css/logged_out.css">
<script type="text/javascript">
  $(document).ready(function(){
      document.getElementById('loginModal').style.display='block'
    });
</script>



<div class="w3-container">
  <div id="loginModal" class="w3-modal" data-keyboard="false" data-backdrop="static">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

      <div class="w3-center"><br>
        <img src="/usersc/images/cppslogo.png" alt="Avatar" style="width:50%" class=" w3-margin-top">
      </div>

      <form name="login" id="login-form" class="w3-container" action="login.php" method="post">
        <div class="w3-section">

          <input type="hidden" name="dest" value="<?= $dest ?>" />

          <label for="username" >Email</label>
          <input  class="w3-input w3-border w3-margin-bottom" type="text" name="username" id="username" placeholder="Email" required autofocus>

          <label for="password">Password</label>
          <input type="password" class="w3-input w3-border"  name="password" id="password"  placeholder="Password" required autocomplete="off">

          <!-- <label for="remember">
          <input type="checkbox" name="remember" id="remember" > Remember Me</label> -->

          <input type="hidden" name="csrf" value="<?=Token::generate(); ?>">
          <input type="hidden" name="redirect" value="<?=Input::get('redirect')?>" />
          <button class="w3-button w3-block w3-dark-grey w3-section w3-padding" id="next_button" type="submit"><i class="fa fa-sign-in"></i> <?=lang("SIGNIN_BUTTONTEXT","");?></button>
        </div>
      </form>

        <div class="w3-bar">
          <button class="w3-bar-item w3-button w3-dark-grey w3-mobile" style="width:33.3%" onclick="window.location.href='<?=$us_url_root?>users/login.php'"><i class="fa fa-sign-in"></i> Login</button>
          <button class="w3-bar-item w3-button w3-dark-grey w3-mobile" style="width:33.3%" onclick="window.location.href='<?=$us_url_root?>usersc/forgot_password.php'"><i class="fa fa-info-circle"></i> Forgot Password</button>
          <button class="w3-bar-item w3-button w3-dark-grey w3-mobile" style="width:33.3%" onclick="window.location.href='<?=$us_url_root?>users/join.php'"><i class="fa fa-user-plus"></i> Register</button>
        </div>

      </div>
    </div>
  </div>




<!-- footers -->
<?php require_once $abs_us_root.$us_url_root.'users/includes/page_footer.php'; // the final html footer copyright row + the external js calls ?>

<!-- Place any per-page javascript here -->

<?php   if($settings->recaptcha == 1){ ?>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
    function submitForm() {
        document.getElementById("login-form").submit();
    }
</script>
<?php } ?>
<?php require_once $abs_us_root.$us_url_root.'users/includes/html_footer.php'; // currently just the closing /body and /html ?>
