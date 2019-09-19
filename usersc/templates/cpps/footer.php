<?php
require_once $abs_us_root . $us_url_root . 'usersc/templates/' . $settings->template . '/container_close.php'; //custom template container

require_once $abs_us_root . $us_url_root . 'users/includes/page_footer.php';

?>

<script type="text/javascript">
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
</script>
<script>
var $hamburger = $(".hamburger");
$hamburger.on("click", function(e) {
  $hamburger.toggleClass("is-active");
  // Do something else, like open/close menu
});
</script>

<div class="container-fluid">
  <div class="row">
    <footer class="text-center footer">
      <br>
      &copy; <?php echo date("Y"); ?> <?=$settings->copyright; ?>
      <br><br>
    </footer>
  </div>
</div>
<?php require_once($abs_us_root.$us_url_root.'users/includes/html_footer.php');?>
