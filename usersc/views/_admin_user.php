<div class="col-sm-8">
  <div class="page-header float-right">
    <div class="page-title">
      <ol class="breadcrumb text-right">
        <li><a href="<?=$us_url_root?>usersc/client_admin.php">Dashboard</a></li>
        <li>Manage</li>
        <li><a href="<?=$us_url_root?>usersc/client_admin.php?view=users">Users</a></li>
        <li class="active">User</li>
      </ol>
    </div>
  </div>
</div>
</div>
</header>

<?php
$validation = new Validate();
//PHP Goes Here!
$query = $db->query("SELECT * FROM email");
$results = $query->first();
$act = $results->email_act;
$errors = [];
$successes = [];
$userId = Input::get('id');
$email = $db->query("SELECT * FROM email")->first();
//Check if selected user exists
if(!userIdExists($userId)){
  Redirect::to($us_url_root.'usersc/client_admin.php?view=users&err=That user does not exist.'); die();
}

$userdetails = fetchUserDetails(NULL, NULL, $userId); //Fetch user details

//Forms posted
if(!empty($_POST)) {
  $token = $_POST['csrf'];
  if(!Token::check($token)){
    include($abs_us_root.$us_url_root.'usersc/scripts/token_error.php');
  }else {

    if(!empty($_POST['delete'])){
      $deletions = $_POST['delete'];
      if ($deletion_count = deleteUsers($deletions)){
        logger($user->data()->id,"User Manager","Deleted user named $userdetails->fname.");
        Redirect::to($us_url_root.'usersc/client_admin.php?view=users&msg='.lang("ACCOUNT_DELETIONS_SUCCESSFUL", array($deletion_count)));
      }
      else {
        $errors[] = lang("SQL_ERROR");
      }
    }
    else
    {
      //Remove permission level
      if(!empty($_POST['removePermission'])){
        $remove = Input::get('removePermission');
        if ($deletion_count = removePermission($remove, $userId)){
          $successes[] = lang("ACCOUNT_PERMISSION_REMOVED", array ($deletion_count));
          logger($user->data()->id,"User Manager","Deleted $deletion_count permission(s) from $userdetails->fname $userdetails->lname.");
        }
        else {
          $errors[] = lang("SQL_ERROR");
        }
      }

      if(!empty($_POST['addPermission'])){
        $add = Input::get('addPermission');
        if ($addition_count = addPermission($add, $userId,'user')){
          $successes[] = lang("ACCOUNT_PERMISSION_ADDED", array ($addition_count));
          logger($user->data()->id,"User Manager","Added $addition_count permission(s) to $userdetails->fname $userdetails->lname.");
        }
        else {
          $errors[] = lang("SQL_ERROR");
        }
      }

      if(file_exists($abs_us_root.$us_url_root.'usersc/includes/admin_user_system_settings_post.php')){
        require_once $abs_us_root.$us_url_root.'usersc/includes/admin_user_system_settings_post.php';
      }
    }
    $userdetails = fetchUserDetails(NULL, NULL, $userId);
  } }

  $userPermission = fetchUserPermissions($userId);

  //Fetch all permissions with the exception of superuser (id=2)
  $db = DB::getInstance();
  $query = $db->query("SELECT id, name FROM permissions WHERE id!=2");
  $permissionData = $query->results();


  $grav = get_gravatar(strtolower(trim($userdetails->email)));
  $useravatar = '<img src="'.$grav.'" class="img-responsive img-thumbnail" alt="">';
  if((!in_array($user->data()->id, $master_account) && in_array($userId, $master_account) || !in_array($user->data()->id, $master_account) && $userdetails->protected==1) && $userId != $user->data()->id) $protectedprof = 1;
  else $protectedprof = 0;
  ?>

  <div class="content mt-3">
    <?=resultBlock($errors,$successes);?>
    <?php if(!$validation->errors()=='') {?><div class="alert alert-danger"><?=display_errors($validation->errors());?></div><?php } ?>
    <div class="row">
      <div class="col-sm-12 col-sm-2"><!--left col-->
        <?php echo $useravatar;?>
      </div><!--/col-2-->

      <div class="col-sm-12 col-sm-10">
        <form class="form" id='adminUser' name='adminUser' action='client_admin.php?view=user&id=<?=$userId?>' method='post'>

          <h3><?=$userdetails->fname?> <?=$userdetails->lname?> - <?=$userdetails->username?></h3>
          <div class="panel panel-default">
            <div class="panel-heading">User ID: <?=$userdetails->id?><?php if($act==1) {?> - <?php if($userdetails->email_verified==1) {?> Email Verified <input type="hidden" name="email_verified" value="1" /><?php } elseif($userdetails->email_verified==0) {?> Email Unverified - <label class="normal"><input type="checkbox" name="email_verified" value="1" /> Verify</label><?php } else {?>Error: No Validation<?php } } ?> <?php if($protectedprof==1) {?><p class="pull-right">PROTECTED PROFILE - EDIT DISABLED</p><?php } ?> <?php if(in_array($user->data()->id, $master_account)) {?><p class="pull-right"><label class="normal"><input type="checkbox" name="protected" value="1" <?php if($userdetails->protected==1){?>checked<?php } ?>/> Protected Account</label></p><?php } ?></div>
              <div class="panel-body">

                <label>Joined: </label> <?=$userdetails->join_date?><br/>

                <label>Last Login: </label> <?php if($userdetails->last_login != 0) { echo $userdetails->last_login; } else {?> <i>Never</i> <?php }?><br/>

                <label>Username: </label> <?=$userdetails->username?><br/>

                <label>Email: </label> <?=$userdetails->email?><br/>

                <label>First Name: </label> <?=$userdetails->fname?><br/>

                <label>Last Name: </label> <?=$userdetails->lname?><br/>


              </div>
            </div>


            <div class="panel panel-default">
              <div class="panel-heading"><?php if($protectedprof==1) {?><p class="pull-right">PROTECTED PROFILE - EDIT DISABLED</p><?php } ?></div>
              <div class="panel-body">
                <center>
                  <div class="btn-group"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#permissions">Permission Settings</button></div>
                  </center>
                </div>
              </div>

              <div id="permissions" class="modal fade" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Permission Settings</h4>
                    </div>
                    <div class="modal-body">
                      <div class="panel panel-default">
                        <div class="panel-heading">Remove These Permission(s): <?php if($protectedprof==1) {?><p class="pull-right">PROTECTED PROFILE - EDIT DISABLED</p><?php } ?></div>
                        <div class="panel-body">
                          <?php
                          //NEW List of permission levels user is apart of

                          $perm_ids = [];
                          foreach($userPermission as $perm){
                            $perm_ids[] = $perm->permission_id;
                          }

                          foreach ($permissionData as $v1){
                            if(in_array($v1->id,$perm_ids)){ ?>
                              <label class="normal"><input type='checkbox' name='removePermission[]' id='removePermission[]' value='<?=$v1->id;?>' <?php if(!hasPerm([$v1->id],$user->data()->id) && $settings->permission_restriction==1){ ?>disabled<?php } ?> /> <?=$v1->name;?></label>
                              <?php
                            }
                          }
                          ?>

                        </div>
                      </div>

                      <div class="panel panel-default">
                        <div class="panel-heading">Add These Permission(s): <?php if($protectedprof==1) {?><p class="pull-right">PROTECTED PROFILE - EDIT DISABLED</p><?php } ?></div>
                        <div class="panel-body">
                          <?php
                          foreach ($permissionData as $v1){
                            if(!in_array($v1->id,$perm_ids)){ ?>
                              <label class="normal"><input type='checkbox' name='addPermission[]' id='addPermission[]' value='<?=$v1->id;?>' <?php if(!hasPerm([$v1->id],$user->data()->id) && $settings->permission_restriction==1){ ?>disabled<?php } ?>/> <?=$v1->name;?></label>
                              <?php
                            }
                          }
                          ?>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <div class="btn-group"><input class='btn btn-primary' type='submit' value='Update' class='submit' /></div>
                      <div class="btn-group"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button></div>
                    </div>
                  </div>

                </div>
              </div>



                        <input type="hidden" name="csrf" value="<?=Token::generate();?>" />
                        <div class="pull-right">
                          <div class="btn-group"><input class='btn btn-primary' type='submit' value='Update' class='submit' /></div>
                          <div class="btn-group"><a class='btn btn-warning' href="<?=$us_url_root?>usersc/client_admin.php?view=users">Cancel</a></div><br /><Br />
                        </div>

                      </form>

                    </div><!--/col-9-->
                  </div><!--/row-->

                </div>

                <script src="../../users/js/jwerty.js"></script>
                <script>
                jwerty.key('esc', function () {
                  $('.modal').modal('hide');
                });
                </script>

                <?php if($protectedprof==1) {?>
                  <script>$('#adminUser').find('input:enabled, select:enabled, textarea:enabled').attr('disabled', 'disabled');</script>
                <?php } ?>
