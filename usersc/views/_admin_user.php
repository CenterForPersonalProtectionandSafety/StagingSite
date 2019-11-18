<div class="col-sm-8">
  <div class="page-header float-right">
    <div class="page-title">
      <ol class="breadcrumb text-right">
        <li><a href="<?=$us_url_root?>users/admin.php">Dashboard</a></li>
        <li>Manage</li>
        <li><a href="<?=$us_url_root?>users/admin.php?view=users">Users</a></li>
        <li class="active">User</li>
      </ol>
    </div>
  </div>
</div>
</div>
</header>

<?php
  // Query setup and execution to fetch data
  $query = $db->query("SELECT * FROM email");
  $results = $query->first();
  $userId = Input::get('id');


  //Check if selected user exists
  if(!userIdExists($userId)){
    Redirect::to($us_url_root.'usersc/client_admin.php?view=users&err=That user does not exist.'); die();
  }

  //Fetch user details
  $userdetails = fetchUserDetails(NULL, NULL, $userId);

  // Check if elearning is complete
  if($userdetails->complete_elearning==0) { $es=0; }else { $es=1; }

  // Check if video is complete
  if($userdetails->complete_video==0) { $vs=0; }else{ $vs=1; }



  if(!empty($_POST['e-complete'])){
    $fields=array('complete_elearning'=>1);
    $db->update('users',$userId,$fields);
    logger($user->data()->id,"User Manager","Updated status for $userdetails->fname from incomplete to complete.");
    echo "<meta http-equiv='refresh' content='0'>";
  }
  if(!empty($_POST['e-incomplete'])){
    $fields=array('complete_elearning'=>0);
    $db->update('users',$userId,$fields);
    logger($user->data()->id,"User Manager","Updated status for $userdetails->fname from complete to incomplete.");
    echo "<meta http-equiv='refresh' content='0'>";
  }
  if(!empty($_POST['v-complete'])){
    $fields=array('complete_video'=>1);
    $db->update('users',$userId,$fields);
    logger($user->data()->id,"User Manager","Updated status for $userdetails->fname from incomplete to complete.");
    echo "<meta http-equiv='refresh' content='0'>";
  }
  if(!empty($_POST['v-incomplete'])){
    $fields=array('complete_video'=>0);
    $db->update('users',$userId,$fields);
    logger($user->data()->id,"User Manager","Updated status for $userdetails->fname from complete to incomplete.");
    echo "<meta http-equiv='refresh' content='0'>";
  }

?>


<div class="container">
  <h2>Course Edits for <?=$userdetails->fname?></h2>
  <hr />
  <div class="card-deck">
    <div class="card">
      <?php if(!$es){?><img src="images/modules/elearning_blue.png" class="card-img-top" alt="..."><?php }?>
      <?php if($es){?><img src="images/modules/elearning_complete_blue.png" class="card-img-top" alt="..."><?php }?>
      <div class="card-body">
        <h5 class="card-title">E-Learning</h5>
        <p class="card-text">Status: <?php if(!$es){echo "incomplete";}else{echo "complete";}?></p>
      </div>
      <div class="card-footer">
        <div class="text-center">
          <form class="" action="" method="post" name="elearning">
            <input type="submit" name="e-complete" class="btn btn-primary" value="Mark Complete"/>
            <input type="submit" name="e-incomplete" class="btn btn-primary" value="Mark Incomplete"/>
          </form>
        </div>
      </div>
    </div>

    <div class="card">
      <?php if(!$vs){?><img src="images/modules/video_blue.png" class="card-img-top" alt="..."><?php }?>
      <?php if($vs){?><img src="images/modules/video_complete_blue.png" class="card-img-top" alt="..."><?php }?>
      <div class="card-body">
        <h5 class="card-title">Video</h5>
        <p class="card-text">Status: <?php if(!$vs){echo "incomplete";}else{echo "complete";}?></p>
      </div>
      <div class="card-footer">
        <div class="text-center">
          <form class="" action="" method="post" name="video">
            <input type="submit" name="v-complete" class="btn btn-primary" value="Mark Complete"/>
            <input type="submit" name="v-incomplete" class="btn btn-primary" value="Mark Incomplete"/>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
