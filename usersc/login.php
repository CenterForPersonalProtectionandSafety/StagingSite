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
<?php require_once $abs_us_root.$us_url_root.'usersc/includes/navigation.php';
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

<div id="page-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <?php if(!$error_message=='') {?><div class="alert alert-danger"><?=$error_message;?></div><?php } ?>
                <?php

                if($settings->glogin==1 && !$user->isLoggedIn()){
                    require_once $abs_us_root.$us_url_root.'users/includes/google_oauth_login.php';
                }
                if($settings->fblogin==1 && !$user->isLoggedIn()){
                    require_once $abs_us_root.$us_url_root.'users/includes/facebook_oauth.php';
                }
                ?>

                <div class="logintopspace"></div>
                <div class="text-center">
                    <img src="/usersc/images/universitylogo.png" alt="..." class="login-logo">
                </div>
            </div>
        </div>
    <div class="row" id="login-row">
        <div class="col-xs-12">
            <form name="login" id="login-form" class="form-signin" action="login.php" method="post">
                    <h2 class="form-signin-heading"></i> <?=lang("SIGNIN_TITLE","");?></h2>
                <input type="hidden" name="dest" value="<?= $dest ?>" />

                <div class="form-group">
                    <label for="username" >Email</label>
                    <input  class="form-control" type="text" name="username" id="username" placeholder="Email" required autofocus>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control"  name="password" id="password"  placeholder="Password" required autocomplete="off">
                </div>
                <?php
                    if($settings->recaptcha == 1){
                ?>
                <div class="g-recaptcha" data-sitekey="<?=$settings->recap_public; ?>" data-bind="next_button" data-callback="submitForm"></div>
                <?php } ?>

                <div class="form-group">
                    <label for="remember">
                        <input type="checkbox" name="remember" id="remember" > Remember Me</label>
                </div>

                <input type="hidden" name="csrf" value="<?=Token::generate(); ?>">
                <input type="hidden" name="redirect" value="<?=Input::get('redirect')?>" />
                <button class="submit  btn  btn-primary" id="next_button" type="submit"><i class="fa fa-sign-in"></i> <?=lang("SIGNIN_BUTTONTEXT","");?></button>

            </form>
        </div>
    </div>
    <div class="row forgot-password-row" id="login-row">
        <div class="col-xs-6"><br>
            <a class="pull-left" href='../users/forgot_password.php'><i class="fa fa-wrench"></i><?=lang("SIGNIN_FORGOTPASS","");?></a><br><br>
        </div>
        <?php if($settings->registration==1) {?>
        <div class="col-xs-6"><br>
            <a class="pull-right" href='../users/join.php'><i class="fa fa-plus-square"></i> <?=lang("SIGNUP_TEXT","");?></a><br><br>
        </div><?php } ?>
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
