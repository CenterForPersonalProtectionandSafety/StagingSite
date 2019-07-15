<?php
/*
Landing page for Tier3
*/
?>

<?php require_once '../users/init.php'; ?>
<?php require_once $abs_us_root.$us_url_root.'users/includes/header.php'; ?>
<?php require_once $abs_us_root.$us_url_root.'usersc/includes/navigation.php'; ?>
<?php if (!securePage($_SERVER['PHP_SELF'])){die();} ?>

<div id="page-wrapper" class="modulePage">
    <div class="jumbotron jumbotron-fluid tier3banner">
        <div class="container">
            <h1 class=pageTitle>Enhanced Guidance for</h1>
            <h1 class=pageTitleRow1>MANAGERS</h1>
            <h1 class=pageTitleRow2>LEADERS</h1>
        </div>
    </div>
    <div class="container-fluid indexbarplay">
        <div class="text-left">
            <p class="playdescription">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
        <div class="text-center">
            <a href="/usersc/viewtier3.php" target="_blank" class="button is-white moduleButton">PLAY COURSE</a>
        </div>
    </div>
</div> <!-- /.wrapper -->

<!-- footers -->
<?php require_once $abs_us_root.$us_url_root.'users/includes/page_footer.php'; // the final html footer copyright row + the external js calls ?>

<!-- Place any per-page javascript here -->


<?php require_once $abs_us_root.$us_url_root.'users/includes/html_footer.php'; // currently just the closing /body and /html ?>
