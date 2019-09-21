<?php
require_once $abs_us_root . $us_url_root . 'usersc/templates/' . $settings->template . '/container_close.php'; //custom template container

require_once $abs_us_root . $us_url_root . 'users/includes/page_footer.php';

?>

<!-- jQuery & Ajax  -->
<script src="https://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript" src="<?=$us_url_root?>usersc/templates/<?=$settings->template?>/assets/js/bootstrap.min.js"></script>

<script type="text/javascript" src="<?=$us_url_root?>usersc/templates/<?=$settings->template?>/assets/js/custom.js"></script>
<script type="text/javascript" src="<?=$us_url_root?>usersc/templates/<?=$settings->template?>/assets/js/tooltip.js"></script>
<script type="text/javascript" src="<?=$us_url_root?>usersc/templates/<?=$settings->template?>/assets/js/hamburger.js"></script>

<?php if($user->isLoggedIn()){ //anyone is logged in?>
  <footer class="login-footer">&copy; <?php echo date("Y"); ?> <?=$settings->copyright; ?></footer>
<?php } else{ ?>
  <footer class="logout-footer">&copy; <?php echo date("Y"); ?> <?=$settings->copyright; ?></footer>
<?php } ?>

<?php require_once($abs_us_root.$us_url_root.'users/includes/html_footer.php');?>
