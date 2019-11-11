<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CPPS University Dashboard</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="apple-touch-icon" href="apple-icon.png">
  <link rel="shortcut icon" href="favicon.ico">

  <link rel="stylesheet" href="../../users/css/dashboard/normalize.css">
  <link rel="stylesheet" href="../../users/css/dashboard/bootstrap.min.css">
  <link rel="stylesheet" href="../../users/fonts/css/font-awesome.min.css">
  <link rel="stylesheet" href="../../users/css/dashboard/style.css">

  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
  <script src="../../users/js/jquery.js"></script>
  <script src="../../users/js/popper.min.js"></script>
  <script src="../../users/js/bootstrap.min.js"></script>
<style>
.btn-circle.btn-lg {
  width: 40px;
  height: 40px;
  padding: 5px 8px;
  font-size: 12px;
  line-height: 1.33;
  border-radius: 25px;
}

.feedback{position: fixed;}

.feedback.left{left:5px; bottom:15px}
.feedback.right{right:5px; bottom:15px}

.feedback .dropdown-menu{width: 290px;height: 250px;bottom: 50px;}
.feedback.left .dropdown-menu{ left: 0px}
.feedback.right .dropdown-menu{ right: 0px}
.feedback .hideme{ display: none}
</style>
</head>
<body>
<?php
//Notifications and messages
  if ($dayLimitQ = $db->query('SELECT notif_daylimit FROM settings', array()))
  $dayLimit = $dayLimitQ->results()[0]->notif_daylimit;
  else
  $dayLimit = 7;

  // 2nd parameter- true/false for all notifications or only current
  $notifications = new Notification($user->data()->id, false, $dayLimit);
  if($settings->messaging == 1){
    $msgQ = $db->query("SELECT id FROM messages WHERE msg_to = ? AND msg_read = 0 AND deleted = 0",array($user->data()->id));
    $msgC = $msgQ->count();
    if($msgC == 1){
      $grammar = 'Message';
    }else{
      $grammar = 'Messages';
    }
  }
?>

<?php

function activeDropdown($View, $dropId, $Area = false){
	$sttngsDown = ['general','reg','social','email'];
	$toolsDown = ['backup','updates','cron','forms','ip','messages','notifications','security_logs','sessions','logs','templates'];
	switch($dropId){
		case 'settings':
		if (in_array($View,$sttngsDown)){
			return ['show', 'true'];
		}
		return ['', 'false'];
		case 'tools':
		if (in_array($View,$toolsDown)){
			return ['show', 'true'];
		}
		return ['', 'false'];
		default:
		return ['','false'];;
	}

}

?>

  <!-- Left Panel -->

  <aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

      <div class="navbar-header">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fa fa-bars"></i>
        </button>
        <a class="navbar-brand" href="<?=$us_url_root?>index.php"><img src="../usersc/images/logo.png" alt="Logo"></a>
        <a class="navbar-brand hidden" href="./"><img src="../usersc/images/home.png" alt="Logo"></a>
      </div>

      <div id="main-menu" class="main-menu collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li <?=($view) ? '' : 'class="active"' ;?>>
            <a href="client_admin.php"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
          </li>
          <!-- <h3 class="menu-title">Settings</h3> -->
          <li class="menu-title">Manage</li>
            <li <?=($view == 'users') ? 'class="active"' : '' ;?>><a href="client_admin.php?view=users"><i class="menu-icon fa fa-user"></i>Users</a></li>
            <li <?=($view == 'learner') ? 'class="active"' : '' ;?>><a href="client_admin.php?view=learner"><i class="menu-icon fa fa-users"></i>Learners List</a></li>

          <h3 class="menu-title">Misc</h3>
          <li class="menu-item">
            <?php if(file_exists($abs_us_root.$us_url_root.'usersc/includes/admin_menu.php')){
              include($abs_us_root.$us_url_root.'usersc/includes/admin_menu.php');
            }?>
            <a href="<?=$us_url_root?>usersc/user_settings.php"><i class="menu-icon fa fa-qq"></i>Your Account</a>
            <a href="<?=$us_url_root?>index.php"><i class="menu-icon fa fa-home"></i>Visit Homepage</a>
            <a href="<?=$us_url_root?>users/logout.php"><i class="menu-icon fa fa-hand-peace-o"></i>Logout</a>
          </li>

        </ul>
      </div><!-- /.navbar-collapse --><div class="feedback left">
      <div class="tooltips">
          <div class="btn-group dropup">
            <button type="button" class="btn btn-primary dropdown-toggle btn-circle btn-lg" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-bug fa-2x" title="Report Bug"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-right dropdown-menu-form">
              <li>
                <div class="report">
                  <h2 class="text-center">Report Bug</h2>

                    <div class="col-sm-12">
                      <br>Did you find a bug?  Please help the UserSpice team and your fellow developers by reporting it with as much detail as possible.<br><br>
                      </div>
                      <div class="col-sm-12 clearfix">
                       <button class="btn btn-primary btn-block"
                        onclick="window.location.href='https://userspice.com/bugs/usersc/dashboard.php','_blank'">Continue</button>
                     </div>

                </div>
              </li>
            </ul>
          </div>
      </div>
    </div>
    </nav>

  </aside><!-- /#left-panel -->

  <!-- Left Panel -->
<script>
(function ( $ ) {
    $.fn.feedback = function(success, fail) {
    	self=$(this);
		self.find('.dropdown-menu-form').on('click', function(e){e.stopPropagation()})
    	self.find('.do-close').on('click', function(){
			self.find('.dropdown-toggle').dropdown('toggle');
			self.find('.report').show();
		});
	};
}( jQuery ));

$(document).ready(function () {
	// $('.feedback').feedback();
});
</script>
  <!-- Right Panel -->
