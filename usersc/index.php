<?php
/*
If logged in, redirect to home.
If not logged in, redirect to login page.
*/
?>
<?php
require_once '../users/init.php';
if(isset($user) && $user->isLoggedIn()){
  if ($user->data()->updated_pass_status == 0) {
    Redirect::to($us_url_root.'usersc/user_settings.php');
  }else {
    Redirect::to($us_url_root.'index.php');
  }
}else{
  Redirect::to($us_url_root.'usersc/login.php');
}
die();
?>
