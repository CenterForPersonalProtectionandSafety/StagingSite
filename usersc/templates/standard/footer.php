<?php
require_once $abs_us_root . $us_url_root . 'usersc/templates/' . $settings->template . '/container_close.php'; //custom template container

require_once $abs_us_root . $us_url_root . 'users/includes/page_footer.php';

?>
<script type="text/javascript">

  $(document).scroll(function () {
    var $nav = $(".fixed-top");
    $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
  });

  function scrollToAnchor(aid) {
    var aTag = $("div[id='"+ aid +"']");
    $('html,body').animate({scrollTop: aTag.offset().top},'slow');
  }

  $("#link_about").click(function() {
     scrollToAnchor('aboutus');
  });

  $("#tier2_link").click(function() {
     scrollToAnchor('t2course');
  });

  $("#tier3_link").click(function() {
     scrollToAnchor('t3course');
  });

  $("#sec_tier2_link").click(function() {
     scrollToAnchor('t2course');
  });

  $("#sec_tier3_link").click(function() {
     scrollToAnchor('t3course');
  });

  function scrollupToAnchor(aid){
    var aTag = $("div[id='"+ aid +"']");
    $('html,body').animate({scrollTop: 0},'slow');
  }

  $("#to_top_link").click(function() {
     scrollupToAnchor('hero-section');
  });

</script>

<script type="text/javascript">
  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
  });
</script>

<script type="text/javascript">
  var $hamburger = $(".hamburger");
  $hamburger.on("click", function(e) {
    $hamburger.toggleClass("is-active");
    // Do something else, like open/close menu
  });
</script>

<?php if($user->isLoggedIn()){ //anyone is logged in?>
  <footer class="login-footer">&copy; <?php echo date("Y"); ?> <?=$settings->copyright; ?></footer>
<?php } else{ ?>
  <footer class="logout-footer">&copy; <?php echo date("Y"); ?> <?=$settings->copyright; ?></footer>
<?php } ?>

<?php require_once($abs_us_root.$us_url_root.'users/includes/html_footer.php');?>
