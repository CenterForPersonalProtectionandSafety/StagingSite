<div class="col-sm-8">
  <div class="page-header float-right">
    <div class="page-title">
      <ol class="breadcrumb text-right">
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

  // Check if t2m1 is complete
  if($userdetails->complete_t2m1==0) { $t2m1=0; }else { $t2m1=1; }
  // Check if t2m2 is complete
  if($userdetails->complete_t2m2==0) { $t2m2=0; }else { $t2m2=1; }
  // Check if t2m3 is complete
  if($userdetails->complete_t2m3==0) { $t2m3=0; }else { $t2m3=1; }
  // Check if t2m4 is complete
  if($userdetails->complete_t2m4==0) { $t2m4=0; }else { $t2m4=1; }
  // Check if t2m5 is complete
  if($userdetails->complete_t2m5==0) { $t2m5=0; }else { $t2m5=1; }
  // Check if t2quiz is complete
  if($userdetails->complete_t2quiz==0) { $t2quiz=0; }else { $t2quiz=1; }

  // Check if t3m1 is complete
  if($userdetails->complete_t3m1==0) { $t3m1=0; }else { $t3m1=1; }
  // Check if t3m2 is complete
  if($userdetails->complete_t3m2==0) { $t3m2=0; }else { $t3m2=1; }
  // Check if t3m3 is complete
  if($userdetails->complete_t3m3==0) { $t3m3=0; }else { $t3m3=1; }
  // Check if t3quiz is complete
  if($userdetails->complete_t3quiz==0) { $t3quiz=0; }else { $t3quiz=1; }




  //T2M1
  if(!empty($_POST['t2m1-complete'])){
    $fields=array('complete_t2m1'=>1);
    $db->update('users',$userId,$fields);
    logger($user->data()->id,"User Manager","Updated status for $userdetails->fname from incomplete to complete.");
    echo "<meta http-equiv='refresh' content='0'>";
  }
  if(!empty($_POST['t2m1-incomplete'])){
    $fields=array('complete_t2m1'=>0);
    $db->update('users',$userId,$fields);
    logger($user->data()->id,"User Manager","Updated status for $userdetails->fname from complete to incomplete.");
    echo "<meta http-equiv='refresh' content='0'>";
  }

  //T2M2
  if(!empty($_POST['t2m2-complete'])){
    $fields=array('complete_t2m2'=>1);
    $db->update('users',$userId,$fields);
    logger($user->data()->id,"User Manager","Updated status for $userdetails->fname from incomplete to complete.");
    echo "<meta http-equiv='refresh' content='0'>";
  }
  if(!empty($_POST['t2m2-incomplete'])){
    $fields=array('complete_t2m2'=>0);
    $db->update('users',$userId,$fields);
    logger($user->data()->id,"User Manager","Updated status for $userdetails->fname from complete to incomplete.");
    echo "<meta http-equiv='refresh' content='0'>";
  }

  //T2M3
  if(!empty($_POST['t2m3-complete'])){
    $fields=array('complete_t2m3'=>1);
    $db->update('users',$userId,$fields);
    logger($user->data()->id,"User Manager","Updated status for $userdetails->fname from incomplete to complete.");
    echo "<meta http-equiv='refresh' content='0'>";
  }
  if(!empty($_POST['t2m3-incomplete'])){
    $fields=array('complete_t2m3'=>0);
    $db->update('users',$userId,$fields);
    logger($user->data()->id,"User Manager","Updated status for $userdetails->fname from complete to incomplete.");
    echo "<meta http-equiv='refresh' content='0'>";
  }

  //T2M4
  if(!empty($_POST['t2m4-complete'])){
    $fields=array('complete_t2m4'=>1);
    $db->update('users',$userId,$fields);
    logger($user->data()->id,"User Manager","Updated status for $userdetails->fname from incomplete to complete.");
    echo "<meta http-equiv='refresh' content='0'>";
  }
  if(!empty($_POST['t2m4-incomplete'])){
    $fields=array('complete_t2m4'=>0);
    $db->update('users',$userId,$fields);
    logger($user->data()->id,"User Manager","Updated status for $userdetails->fname from complete to incomplete.");
    echo "<meta http-equiv='refresh' content='0'>";
  }

  //T2M5
  if(!empty($_POST['t2m5-complete'])){
    $fields=array('complete_t2m5'=>1);
    $db->update('users',$userId,$fields);
    logger($user->data()->id,"User Manager","Updated status for $userdetails->fname from incomplete to complete.");
    echo "<meta http-equiv='refresh' content='0'>";
  }
  if(!empty($_POST['t2m5-incomplete'])){
    $fields=array('complete_t2m5'=>0);
    $db->update('users',$userId,$fields);
    logger($user->data()->id,"User Manager","Updated status for $userdetails->fname from complete to incomplete.");
    echo "<meta http-equiv='refresh' content='0'>";
  }

  //T2Quiz
  if(!empty($_POST['t2quiz-complete'])){
    $fields=array('complete_t2quiz'=>1);
    $db->update('users',$userId,$fields);
    logger($user->data()->id,"User Manager","Updated status for $userdetails->fname from incomplete to complete.");
    echo "<meta http-equiv='refresh' content='0'>";
  }
  if(!empty($_POST['t2quiz-incomplete'])){
    $fields=array('complete_t2quiz'=>0);
    $db->update('users',$userId,$fields);
    logger($user->data()->id,"User Manager","Updated status for $userdetails->fname from complete to incomplete.");
    echo "<meta http-equiv='refresh' content='0'>";
  }

  //T3M1
  if(!empty($_POST['t3m1-complete'])){
    $fields=array('complete_t3m1'=>1);
    $db->update('users',$userId,$fields);
    logger($user->data()->id,"User Manager","Updated status for $userdetails->fname from incomplete to complete.");
    echo "<meta http-equiv='refresh' content='0'>";
  }
  if(!empty($_POST['t3m1-incomplete'])){
    $fields=array('complete_t3m1'=>0);
    $db->update('users',$userId,$fields);
    logger($user->data()->id,"User Manager","Updated status for $userdetails->fname from complete to incomplete.");
    echo "<meta http-equiv='refresh' content='0'>";
  }

  //T3M2
  if(!empty($_POST['t3m2-complete'])){
    $fields=array('complete_t3m2'=>1);
    $db->update('users',$userId,$fields);
    logger($user->data()->id,"User Manager","Updated status for $userdetails->fname from incomplete to complete.");
    echo "<meta http-equiv='refresh' content='0'>";
  }
  if(!empty($_POST['t3m2-incomplete'])){
    $fields=array('complete_t3m2'=>0);
    $db->update('users',$userId,$fields);
    logger($user->data()->id,"User Manager","Updated status for $userdetails->fname from complete to incomplete.");
    echo "<meta http-equiv='refresh' content='0'>";
  }

  //T3M3
  if(!empty($_POST['t3m3-complete'])){
    $fields=array('complete_t3m3'=>1);
    $db->update('users',$userId,$fields);
    logger($user->data()->id,"User Manager","Updated status for $userdetails->fname from incomplete to complete.");
    echo "<meta http-equiv='refresh' content='0'>";
  }
  if(!empty($_POST['t3m3-incomplete'])){
    $fields=array('complete_t3m3'=>0);
    $db->update('users',$userId,$fields);
    logger($user->data()->id,"User Manager","Updated status for $userdetails->fname from complete to incomplete.");
    echo "<meta http-equiv='refresh' content='0'>";
  }

  //T3Quiz
  if(!empty($_POST['t3quiz-complete'])){
    $fields=array('complete_t3quiz'=>1);
    $db->update('users',$userId,$fields);
    logger($user->data()->id,"User Manager","Updated status for $userdetails->fname from incomplete to complete.");
    echo "<meta http-equiv='refresh' content='0'>";
  }
  if(!empty($_POST['t3quiz-incomplete'])){
    $fields=array('complete_t3quiz'=>0);
    $db->update('users',$userId,$fields);
    logger($user->data()->id,"User Manager","Updated status for $userdetails->fname from complete to incomplete.");
    echo "<meta http-equiv='refresh' content='0'>";
  }


?>
<style media="screen">
.customcard {
  min-width: 35%;-admin_user
}
</style>

<div class="container">
  <h2>Course Edits for <?=$userdetails->fname?></h2>
  <hr />
  <div class="card-deck">
    <!-- TIER 2 -->
    <div class="card customcard">
      <?php if(!$t2m1){?><img src="images/modules/t2m1.png" class="card-img-top" alt="..."><?php }?>
      <?php if($t2m1){?><img src="images/modules/t2m1_complete.png" class="card-img-top" alt="..."><?php }?>
      <div class="card-body">
        <h5 class="card-title">T2M1</h5>
        <p class="card-text">Status: <?php if(!$t2m1){echo "incomplete";}else{echo "complete";}?></p>
      </div>
      <div class="card-footer">
        <div class="text-center">
          <form class="" action="" method="post" name="t2m1">
            <input type="submit" name="t2m1-complete" class="btn btn-primary" value="Mark Complete"/>
            <input type="submit" name="t2m1-incomplete" class="btn btn-primary" value="Mark Incomplete"/>
          </form>
        </div>
      </div>
    </div>
    <div class="card customcard">
      <?php if(!$t2m2){?><img src="images/modules/t2m2.png" class="card-img-top" alt="..."><?php }?>
      <?php if($t2m2){?><img src="images/modules/t2m2_complete.png" class="card-img-top" alt="..."><?php }?>
      <div class="card-body">
        <h5 class="card-title">T2M2</h5>
        <p class="card-text">Status: <?php if(!$t2m2){echo "incomplete";}else{echo "complete";}?></p>
      </div>
      <div class="card-footer">
        <div class="text-center">
          <form class="" action="" method="post" name="t2m2">
            <input type="submit" name="t2m2-complete" class="btn btn-primary" value="Mark Complete"/>
            <input type="submit" name="t2m2-incomplete" class="btn btn-primary" value="Mark Incomplete"/>
          </form>
        </div>
      </div>
    </div>
    <div class="card customcard">
      <?php if(!$t2m3){?><img src="images/modules/t2m3.png" class="card-img-top" alt="..."><?php }?>
      <?php if($t2m3){?><img src="images/modules/t2m3_complete.png" class="card-img-top" alt="..."><?php }?>
      <div class="card-body">
        <h5 class="card-title">T2M3</h5>
        <p class="card-text">Status: <?php if(!$t2m3){echo "incomplete";}else{echo "complete";}?></p>
      </div>
      <div class="card-footer">
        <div class="text-center">
          <form class="" action="" method="post" name="t2m3">
            <input type="submit" name="t2m3-complete" class="btn btn-primary" value="Mark Complete"/>
            <input type="submit" name="t2m3-incomplete" class="btn btn-primary" value="Mark Incomplete"/>
          </form>
        </div>
      </div>
    </div>
    <div class="card customcard">
      <?php if(!$t2m4){?><img src="images/modules/t2m4.png" class="card-img-top" alt="..."><?php }?>
      <?php if($t2m4){?><img src="images/modules/t2m4_complete.png" class="card-img-top" alt="..."><?php }?>
      <div class="card-body">
        <h5 class="card-title">T2M4</h5>
        <p class="card-text">Status: <?php if(!$t2m4){echo "incomplete";}else{echo "complete";}?></p>
      </div>
      <div class="card-footer">
        <div class="text-center">
          <form class="" action="" method="post" name="t2m4">
            <input type="submit" name="t2m4-complete" class="btn btn-primary" value="Mark Complete"/>
            <input type="submit" name="t2m4-incomplete" class="btn btn-primary" value="Mark Incomplete"/>
          </form>
        </div>
      </div>
    </div>
    <div class="card customcard">
      <?php if(!$t2m5){?><img src="images/modules/t2m5.png" class="card-img-top" alt="..."><?php }?>
      <?php if($t2m5){?><img src="images/modules/t2m5_complete.png" class="card-img-top" alt="..."><?php }?>
      <div class="card-body">
        <h5 class="card-title">T2M5</h5>
        <p class="card-text">Status: <?php if(!$t2m5){echo "incomplete";}else{echo "complete";}?></p>
      </div>
      <div class="card-footer">
        <div class="text-center">
          <form class="" action="" method="post" name="t2m5">
            <input type="submit" name="t2m5-complete" class="btn btn-primary" value="Mark Complete"/>
            <input type="submit" name="t2m5-incomplete" class="btn btn-primary" value="Mark Incomplete"/>
          </form>
        </div>
      </div>
    </div>
    <div class="card customcard">
      <?php if(!$t2quiz){?><img src="images/modules/t2quiz.png" class="card-img-top" alt="..."><?php }?>
      <?php if($t2quiz){?><img src="images/modules/t2quiz_complete.png" class="card-img-top" alt="..."><?php }?>
      <div class="card-body">
        <h5 class="card-title">T2Quiz</h5>
        <p class="card-text">Status: <?php if(!$t2quiz){echo "incomplete";}else{echo "complete";}?></p>
      </div>
      <div class="card-footer">
        <div class="text-center">
          <form class="" action="" method="post" name="t2quiz">
            <input type="submit" name="t2quiz-complete" class="btn btn-primary" value="Mark Complete"/>
            <input type="submit" name="t2quiz-incomplete" class="btn btn-primary" value="Mark Incomplete"/>
          </form>
        </div>
      </div>
    </div>

    <!-- TIER 3 -->
    <div class="card customcard">
      <?php if(!$t3m1){?><img src="images/modules/t3m1.png" class="card-img-top" alt="..."><?php }?>
      <?php if($t3m1){?><img src="images/modules/t3m1_complete.png" class="card-img-top" alt="..."><?php }?>
      <div class="card-body">
        <h5 class="card-title">T3M1</h5>
        <p class="card-text">Status: <?php if(!$t3m1){echo "incomplete";}else{echo "complete";}?></p>
      </div>
      <div class="card-footer">
        <div class="text-center">
          <form class="" action="" method="post" name="t3m1">
            <input type="submit" name="t3m1-complete" class="btn btn-primary" value="Mark Complete"/>
            <input type="submit" name="t3m1-incomplete" class="btn btn-primary" value="Mark Incomplete"/>
          </form>
        </div>
      </div>
    </div>
    <div class="card customcard">
      <?php if(!$t3m2){?><img src="images/modules/t3m2.png" class="card-img-top" alt="..."><?php }?>
      <?php if($t3m2){?><img src="images/modules/t3m2_complete.png" class="card-img-top" alt="..."><?php }?>
      <div class="card-body">
        <h5 class="card-title">T3M2</h5>
        <p class="card-text">Status: <?php if(!$t3m2){echo "incomplete";}else{echo "complete";}?></p>
      </div>
      <div class="card-footer">
        <div class="text-center">
          <form class="" action="" method="post" name="t3m2">
            <input type="submit" name="t3m2-complete" class="btn btn-primary" value="Mark Complete"/>
            <input type="submit" name="t3m2-incomplete" class="btn btn-primary" value="Mark Incomplete"/>
          </form>
        </div>
      </div>
    </div>
    <div class="card customcard">
      <?php if(!$t3m3){?><img src="images/modules/t3m3.png" class="card-img-top" alt="..."><?php }?>
      <?php if($t3m3){?><img src="images/modules/t3m3_complete.png" class="card-img-top" alt="..."><?php }?>
      <div class="card-body">
        <h5 class="card-title">T3M3</h5>
        <p class="card-text">Status: <?php if(!$t3m3){echo "incomplete";}else{echo "complete";}?></p>
      </div>
      <div class="card-footer">
        <div class="text-center">
          <form class="" action="" method="post" name="t3m3">
            <input type="submit" name="t3m3-complete" class="btn btn-primary" value="Mark Complete"/>
            <input type="submit" name="t3m3-incomplete" class="btn btn-primary" value="Mark Incomplete"/>
          </form>
        </div>
      </div>
    </div>
    <div class="card customcard">
      <?php if(!$t3quiz){?><img src="images/modules/t2quiz.png" class="card-img-top" alt="..."><?php }?>
      <?php if($t3quiz){?><img src="images/modules/t2quiz_complete.png" class="card-img-top" alt="..."><?php }?>
      <div class="card-body">
        <h5 class="card-title">T3Quiz</h5>
        <p class="card-text">Status: <?php if(!$t3quiz){echo "incomplete";}else{echo "complete";}?></p>
      </div>
      <div class="card-footer">
        <div class="text-center">
          <form class="" action="" method="post" name="t3quiz">
            <input type="submit" name="t3quiz-complete" class="btn btn-primary" value="Mark Complete"/>
            <input type="submit" name="t3quiz-incomplete" class="btn btn-primary" value="Mark Incomplete"/>
          </form>
        </div>
      </div>
    </div>

  </div>
</div>
