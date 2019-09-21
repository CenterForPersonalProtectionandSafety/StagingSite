<div class="col-sm-8">
  <div class="page-header float-right">
    <div class="page-title">
      <ol class="breadcrumb text-right">
        <li><a href="<?=$us_url_root?>usersc/client_admin.php">Dashboard</a></li>
      </ol>
    </div>
  </div>
</div>
</div>
</header>

<?php

//PHP Goes Here!
$errors = $successes = [];
$query = $db->query("SELECT * FROM email");
$results = $query->first();
$act = $results->email_act;
$form_valid=TRUE;
$permOpsQ = $db->query("SELECT * FROM permissions");
$permOps = $permOpsQ->results();
// dnd($permOps);
$validation = new Validate();
if (!empty($_POST)) {

  //Manually Add User
  if(!empty($_POST['addUser'])) {
    $vericode_expiry=date("Y-m-d H:i:s",strtotime("+$settings->join_vericode_expiry hours",strtotime(date("Y-m-d H:i:s"))));
    $join_date = date("Y-m-d H:i:s");
    $fname = Input::get('fname');
    $lname = Input::get('lname');
    $email = Input::get('email');
    if($settings->auto_assign_un==1) {
      $username=username_helper($fname,$lname,$email);
      if(!$username) $username=NULL;
    } else {
      $username=Input::get('username');
    }
    $token = $_POST['csrf'];

    if(!Token::check($token)){
      include($abs_us_root.$us_url_root.'usersc/scripts/token_error.php');
    }

    $form_valid=FALSE; // assume the worst
    if($settings->auto_assign_un==0) {
      $validation->check($_POST,array(
        'username' => array(
          'display' => 'Username',
          'required' => true,
          'min' => $settings->min_un,
          'max' => $settings->max_un,
          'unique' => 'users',
        ),
        'fname' => array(
          'display' => 'First Name',
          'required' => true,
          'min' => 1,
          'max' => 60,
        ),
        'lname' => array(
          'display' => 'Last Name',
          'required' => true,
          'min' => 1,
          'max' => 60,
        ),
        'email' => array(
          'display' => 'Email',
          'required' => true,
          'valid_email' => true,
          'unique' => 'users',
        ),

        'password' => array(
          'display' => 'Password',
          'required' => true,
          'min' => $settings->min_pw,
          'max' => $settings->max_pw,
        ),
        'confirm' => array(
          'display' => 'Confirm Password',
          'required' => true,
          'matches' => 'password',
        ),
      )); }
      if($settings->auto_assign_un==1) {
        $validation->check($_POST,array(
          'fname' => array(
            'display' => 'First Name',
            'required' => true,
            'min' => 1,
            'max' => 60,
          ),
          'lname' => array(
            'display' => 'Last Name',
            'required' => true,
            'min' => 1,
            'max' => 60,
          ),
          'email' => array(
            'display' => 'Email',
            'required' => true,
            'valid_email' => true,
            'unique' => 'users',
          ),

          'password' => array(
            'display' => 'Password',
            'required' => true,
            'min' => $settings->min_pw,
            'max' => $settings->max_pw,
          ),
          'confirm' => array(
            'display' => 'Confirm Password',
            'required' => true,
            'matches' => 'password',
          ),
        ));
      }
      if($validation->passed()) {
        $form_valid=TRUE;
        try {
          // echo "Trying to create user";
          $fields=array(
            'username' => $username,
            'fname' => ucfirst(Input::get('fname')),
            'lname' => ucfirst(Input::get('lname')),
            'email' => Input::get('email'),
            'password' =>
            password_hash(Input::get('password'), PASSWORD_BCRYPT, array('cost' => 12)),
            'permissions' => 1,
            'account_owner' => 1,
            'join_date' => $join_date,
            'email_verified' => 1,
            'active' => 1,
            'vericode' => randomstring(15),
            'force_pr' => $settings->force_pr,
            'vericode_expiry' => $vericode_expiry,
            'oauth_tos_accepted' => true
          );
          $db->insert('users',$fields);
          $theNewId=$db->lastId();
          // bold($theNewId);
          $perm = Input::get('perm');
          $addNewPermission = array('user_id' => $theNewId, 'permission_id' => 1);
          $db->insert('user_permission_matches',$addNewPermission);
          include($abs_us_root.$us_url_root.'usersc/scripts/during_user_creation.php');
          if(isset($_POST['sendEmail'])) {
            $userDetails = fetchUserDetails(NULL, NULL, $theNewId);
            $params = array(
              'username' => $username,
              'password' => Input::get('password'),
              'sitename' => $settings->site_name,
              'force_pr' => $settings->force_pr,
              'fname' => Input::get('fname'),
              'email' => rawurlencode($userDetails->email),
              'vericode' => $userDetails->vericode,
              'join_vericode_expiry' => $settings->join_vericode_expiry
            );
            $to = rawurlencode($email);
            $subject = 'Welcome to '.$settings->site_name;
            $body = email_body('_email_adminUser.php',$params);
            email($to,$subject,$body);
          }
          logger($user->data()->id,"User Manager","Added user $username.");
          Redirect::to($us_url_root.'usersc/client_admin.php?view=user&id='.$theNewId);
        } catch (Exception $e) {
          die($e->getMessage());
        }

      }
    }
  }
  $userData = fetchAllUsers("permissions DESC,id",[],false); //Fetch information for all users
  $showAllUsers = Input::get('showAllUsers');
  if($showAllUsers==1) $userData = fetchAllUsers("permissions DESC,id",[],true);
  $random_password = random_password();

  foreach ($validation->errors() as $error) {
      $errors[] = $error[0];
  }
  ?>


  <?php
    $userData = fetchAllUsers("permissions DESC,id",[],false); //Fetch information for all users
    $showAllUsers = Input::get('showAllUsers');
    $random_password = random_password();
  ?>

  <!--  Add checkMenu(X,$user->data()->id) ||  with proper permission id value-->
  <?php if (checkMenu(3,$user->data()->id)){ ?>

  <div class="container">
    <h2>View Users</h2>
    <?=resultBlock($errors,$successes);?>
    <hr />
    <div class="alluinfo">&nbsp;</div>
    <div class="table-responsive">
      <table id="paginate" class='table table-hover'>
        <thead class="thead-light">
          <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Name</th>
            <th>Email</th>
          </tr>
        </thead>
        <tbody>
          <?php
          //Cycle through users
          foreach ($userData as $v1) {
            ?>
            <tr>
              <td><?=$v1->id?></td>
              <td><?=$v1->username?></td>
              <td><?=$v1->fname?> <?=$v1->lname?></td>
              <td><?=$v1->email?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    <!-- <button class="btn btn-secondary btn-lg pull-right" data-toggle="modal" data-target="#adduser">
      <i class="fa fa-plus"></i> Manually Add User
    </button> -->
  </div>

  <?php }else { include $abs_us_root.$us_url_root.'usersc/includes/warning.php'; } ?>


      <script type="text/javascript" src="js/pagination/datatables.min.js"></script>
      <script src="js/jwerty.js"></script>

      <script>
      $(document).ready(function() {
        jwerty.key('esc', function(){
          $('.modal').modal('hide');
        });
        $('#paginate').DataTable({"pageLength": 25,"stateSave": true,"aLengthMenu": [[25, 50, 100, -1], [25, 50, 100, "All"]], "aaSorting": []});

        $('.password_view_control').hover(function () {
          $('#password').attr('type', 'text');
          $('#confirm').attr('type', 'text');
        }, function () {
          $('#password').attr('type', 'password');
          $('#confirm').attr('type', 'password');
        });


        $('[data-toggle="popover"], .pwpopover').popover();
        $('.pwpopover').on('click', function (e) {
          $('.pwpopover').not(this).popover('hide');
        });
        $('.modal').on('hidden.bs.modal', function () {
          $('.pwpopover').popover('hide');
        });
      });
      </script>

      <?php if($settings->auto_assign_un==0) { ?>
        <script type="text/javascript">
        $(document).ready(function(){
          var x_timer;
          $("#username").keyup(function (e){
            clearTimeout(x_timer);
            var username = $(this).val();
            if (username.length > 0) {
              x_timer = setTimeout(function(){
                check_username_ajax(username);
              }, 500);
            }
            else $('#usernameCheck').text('');
          });

          function check_username_ajax(username){
            $("#usernameCheck").html('Checking...');
            $.post('parsers/existingUsernameCheck.php', {'username': username}, function(response) {
              if (response == 'error') $('#usernameCheck').html('There was an error while checking the username.');
              else if (response == 'taken') { $('#usernameCheck').html('<i class="fa fa-times" style="color: red; font-size: 12px"></i> This username is taken.');
              $('#addUser').prop('disabled', true); }
              else if (response == 'valid') { $('#usernameCheck').html('<i class="fa fa-thumbs-o-up" style="color: green; font-size: 12px"></i> This username is not taken.');
              $('#addUser').prop('disabled', false); }
              else { $('#usernameCheck').html('');
              $('#addUser').prop('disabled', false); }
            });
          }
        });
        </script>
    <?php } ?>
