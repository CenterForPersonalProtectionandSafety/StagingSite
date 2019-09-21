<?php
/*
If logged in, redirect to home.
If not logged in, redirect to login page.
*/
?>
<?php
require_once 'users/init.php';
if(isset($user) && $user->isLoggedIn()){
  Redirect::to($us_url_root.'usersc/index.php');
}else{
  Redirect::to($us_url_root.'usersc/login.php');
}
die();
?>
