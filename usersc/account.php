<?php
/*
Redirect to user_settings.php
*/
?>

<?php
require_once '../users/init.php';
if(isset($user) && $user->isLoggedIn()){
  Redirect::to($us_url_root.'usersc/user_settings.php');
}else{
  Redirect::to($us_url_root.'usersc/login.php');
}
die();
?>