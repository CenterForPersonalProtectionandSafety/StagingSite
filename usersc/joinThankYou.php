<?php
// This is a user-facing page
/*
UserSpice 5
An Open Source PHP User Management System
by the UserSpice Team at http://UserSpice.com

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/
require_once '../users/init.php';
require_once $abs_us_root.$us_url_root.'users/includes/template/prep.php';

if($user->isLoggedIn()) Redirect::to($us_url_root.'index.php');
//Decide whether or not to use email activation
$query = $db->query("SELECT * FROM email");
$results = $query->first();
$act = $results->email_act;
?>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" type="text/css" href="templates/cpps/assets/css/logged_out.css">
<script type="text/javascript">
  document.addEventListener("DOMContentLoaded", function(){
      document.getElementById('forgotModal').style.display='block'
    });
</script>

<div class="w3-container">
  <div id="forgotModal" class="w3-modal" data-keyboard="false" data-backdrop="static">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:1100px">

      <div class="w3-center"><br>
        <img src="/usersc/images/onboarding_logo.png" class="w3-image" style="width:100%;max-width:300px">
      </div>


			<?php
			if($act == 1) {
				require $abs_us_root.$us_url_root.'users/views/_joinThankYou_verify.php';
			}else{
				require $abs_us_root.$us_url_root.'users/views/_joinThankYou.php';
			}
			?>

    </div>
  </div>
</div>

<!-- Content Ends Here -->
<!-- footers -->
<?php require_once $abs_us_root.$us_url_root.'users/includes/page_footer.php'; // the final html footer copyright row + the external js calls ?>

<!-- Place any per-page javascript here -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<?php require_once $abs_us_root.$us_url_root.'users/includes/html_footer.php'; // currently just the closing /body and /html ?>
