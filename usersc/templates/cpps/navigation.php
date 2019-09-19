<!-- Grab the initial menu work that UserSpice does for you -->
<?php require_once($abs_us_root . $us_url_root . 'users/includes/template/database_navigation_prep.php'); ?>

<!-- This file is a way of allowing the end user to customize stuff -->
<!-- without getting in the middle of the whole template itself -->
<?php require_once($abs_us_root . $us_url_root . 'usersc/templates/' . $settings->template . '/assets/functions/style.php'); ?>

<?php
  if (file_exists($abs_us_root . $us_url_root . 'usersc/templates/' . $settings->template . '/info.xml')) {
    $xml = simplexml_load_file($abs_us_root . $us_url_root . 'usersc/templates/' . $settings->template . '/info.xml');
    $navstyle = $xml->navstyle;
  }
?>

<?php if ($navstyle == 'Default') { ?>
  <?php
    if ($settings->navigation_type == 0) {
      $query = $db->query("SELECT * FROM email");
      $results = $query->first();

      //Value of email_act used to determine whether to display the Resend Verification link
      $email_act = $results->email_act;

      // Set up notifications button/modal
      if ($user->isLoggedIn()) {
        if ($dayLimitQ = $db->query('SELECT notif_daylimit FROM settings', array()))
        $dayLimit = $dayLimitQ->results()[0]->notif_daylimit;
        else
        $dayLimit = 7;

        // 2nd parameter- true/false for all notifications or only current
        $notifications = new Notification($user->data()->id, false, $dayLimit);
      }
      require_once($abs_us_root . $us_url_root . 'usersc/templates/' . $settings->template . '/assets/functions/nav.php');
    }
  ?>
<?php } ?>
