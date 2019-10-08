<?php
/*
UserSpice 4
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
ini_set('max_execution_time', 1356);
ini_set('memory_limit','1024M');
?>
<?php
  require_once '../users/init.php';
  include $abs_us_root.$us_url_root."users/includes/dashboard_language.php";
  $db = DB::getInstance();
  $settings = $db->query("SELECT * FROM settings")->first();
?>

<?php if (!securePage($_SERVER['PHP_SELF'])){die();} ?>
<?php $view = Input::get('view');?>
<?php require_once $abs_us_root.$us_url_root.'usersc/views/_admin_menu.php'; ?>


  <?php require_once $abs_us_root.$us_url_root.'usersc/views/_admin_header.php'; ?>
  <?php
  function usView($file){
    global $abs_us_root;
    global $us_url_root;
    if(file_exists($abs_us_root.$us_url_root.'usersc/includes/admin/'.$file)){
      $path = $abs_us_root.$us_url_root.'usersc/includes/admin/'.$file;
    }elseif(file_exists($abs_us_root.$us_url_root.'usersc/views/'.$file)){
      $path = $abs_us_root.$us_url_root.'usersc/views/'.$file;
    }else{
      $path = $abs_us_root.$us_url_root.'usersc/views/_admin_dashboard.php';
    }
    return $path;
  }

  // Add checkMenu(X,$user->data()->id) ||  with proper permission id value
  if (checkMenu(3,$user->data()->id)){

  //$view = Input::get('view');
  include($abs_us_root.$us_url_root.'usersc/includes/admin_override.php');
  switch ($view) {
    case "learner":
      $path = usView('_learners_list.php');
      include($path);
      break;
    case "users":
      $path = usView('_admin_users.php');
      include($path);
      break;
    case "t2m1":
      $path = usView('_t2m1_list.php');
      include($path);
      break;
    case "t2m2":
      $path = usView('_t2m2_list.php');
      include($path);
      break;
    case "t2m3":
      $path = usView('_t2m3_list.php');
      include($path);
      break;
    case "t2m4":
      $path = usView('_t2m4_list.php');
      include($path);
      break;
    case "t2m5":
      $path = usView('_t2m4_list.php');
      include($path);
      break;
    case "t2quiz":
      $path = usView('_t2quiz_list.php');
      include($path);
      break;
    case "t3m1":
      $path = usView('_t3m1_list.php');
      include($path);
      break;
    case "t3m2":
      $path = usView('_t3m2_list.php');
      include($path);
      break;
    case "t3m3":
      $path = usView('_t3m3_list.php');
      include($path);
      break;
    case "t3m4":
      $path = usView('_t3m4_list.php');
      include($path);
      break;
    case "t3m5":
      $path = usView('_t3m4_list.php');
      include($path);
      break;
    case "t3quiz":
      $path = usView('_t3quiz_list.php');
      include($path);
      break;
    case "upload":
      $path = usView('_admin_upload.php');
      include($path);
      break;


    default:
    if($view == ''){
    include($abs_us_root.$us_url_root.'usersc/views/_admin_dashboard.php');
  }else{
    $path = usView($view.".php");
    include($path);
  }
  }
}
?>
<p align="center">
<font color='black'><br>&copy;<?=date("Y ")?><?=$settings->copyright; ?></font>
</p>


          </div> <!-- .content -->
        </div><!-- /#right-panel -->

        <!-- Right Panel -->



        <script type="text/javascript">
        $(document).ready(function() {
          $('[data-toggle="popover"]').popover();

          //Transaction total in the lower right
          function messages(data) {
            $('#messages').removeClass();
            $('#message').text("");
            $('#messages').show();
            if(data.success == "true"){
              $('#messages').addClass("sufee-alert alert with-close alert-success alert-dismissible fade show");
            }else{
              $('#messages').addClass("sufee-alert alert with-close alert-success alert-dismissible fade show");
            }
            $('#message').text(data.msg);
            $('#messages').delay(3000).fadeOut('slow');

          }

          $( ".toggle" ).change(function() { //use event delegation
            var value = $(this).prop("checked");
            $(this).prop("checked",value);

            var field = $(this).attr("id"); //the id in the input tells which field to update
            var desc = $(this).attr("data-desc"); //For messages
            var formData = {
              'value' 				: value,
              'field'					: field,
              'desc'					: desc,
              'type'          : 'toggle',
            };

            $.ajax({
              type 		: 'POST',
              url 		: 'parsers/admin_settings.php',
              data 		: formData,
              dataType 	: 'json',
            })

            .done(function(data) {
              messages(data);
            })
          });

          $("#force_user_pr").click(function(data) {
            console.log("clicked");
            var formData = {
              'type'								: 'resetPW'
            };
            $.ajax({
              type 		: 'POST',
              url 		: 'parsers/admin_settings.php',
              data 		: formData,
              dataType 	: 'json',
              encode 		: true
            })
            .done(function(data) {
              messages(data);
            })
          });

          $( ".ajxnum" ).change(function() { //use event delegation
            var value = $(this).val();
            // console.log(value);

            var field = $(this).attr("id"); //the id in the input tells which field to update
            var desc = $(this).attr("data-desc"); //For messages
            var formData = {
              'value' 				: value,
              'field'					: field,
              'desc'					: desc,
              'type'          : 'num',
            };

            $.ajax({
              type 		: 'POST',
              url 		: 'parsers/admin_settings.php',
              data 		: formData,
              dataType 	: 'json',
            })

            .done(function(data) {
              messages(data);
            })
          });

          $( ".ajxtxt" ).change(function() { //use event delegation
            var value = $(this).val();
            console.log(value);

            var field = $(this).attr("id"); //the id in the input tells which field to update
            var desc = $(this).attr("data-desc"); //For messages
            var formData = {
              'value' 				: value,
              'field'					: field,
              'desc'					: desc,
              'type'          : 'txt',
            };

            $.ajax({
              type 		: 'POST',
              url 		: 'parsers/admin_settings.php',
              data 		: formData,
              dataType 	: 'json',
            })

            .done(function(data) {
              messages(data);
            })
          });

          // Toggle menu
          $('#menuToggle').on('click', function() {
            $('body').toggleClass('open');
			$(".dropdown-toggle").dropdown('toggle');

          });

          $('.search-trigger').on('click', function() {
            $('.search-trigger').parent('.header-left').addClass('open');
          });

          $('.search-close').on('click', function() {
            $('.search-trigger').parent('.header-left').removeClass('open');
          });
        });
      </script>
      <?php foreach($usplugins as $k=>$v){
        if($v == 1){
        if(file_exists($abs_us_root.$us_url_root."usersc/plugins/".$k."/footer.php")){
          include($abs_us_root.$us_url_root."usersc/plugins/".$k."/footer.php");
          }
        }
      }?>
    </body>
    </html>
