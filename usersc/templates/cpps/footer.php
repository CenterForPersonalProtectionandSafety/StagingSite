<?php
require_once $abs_us_root . $us_url_root . 'usersc/templates/' . $settings->template . '/container_close.php'; //custom template container

require_once $abs_us_root . $us_url_root . 'users/includes/page_footer.php';

?>

<script type="text/javascript" src="<?=$us_url_root?>usersc/templates/<?=$settings->template?>/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?=$us_url_root?>usersc/templates/<?=$settings->template?>/assets/js/popper.min.js"></script>
<script type="text/javascript" src="<?=$us_url_root?>usersc/templates/<?=$settings->template?>/assets/js/bootstrap.min.js"></script>

<script type="text/javascript" src="<?=$us_url_root?>usersc/templates/<?=$settings->template?>/assets/js/custom.min.js"></script>
<script type="text/javascript" src="<?=$us_url_root?>usersc/templates/<?=$settings->template?>/assets/js/tooltip.min.js"></script>
<script type="text/javascript" src="<?=$us_url_root?>usersc/templates/<?=$settings->template?>/assets/js/hamburger.min.js"></script>

<?php if($user->isLoggedIn()){ //anyone is logged in?>
  <footer class="login-footer">&copy; <?php echo date("Y"); ?> <?=$settings->copyright; ?></footer>
<?php } else{ ?>
  <footer class="logout-footer">&copy; <?php echo date("Y"); ?> <?=$settings->copyright; ?></footer>
<?php } ?>

<?php require_once($abs_us_root.$us_url_root.'users/includes/html_footer.php');?>