<?php

  // function random_password() {
  //     $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
  //     $length = 16;
  //     $password = substr( str_shuffle( $chars ), 0, $length );
  //     return $password;
  // }

  // if(isset($_POST["submit"])) {
  //   if($_FILES["file"]["name"]){
  //     $filename = explode(".", $_FILES["file"]["name"]);
  //     if($filename[1] == 'csv') {
  //       $handle = fopen($_FILES["file"]["tmp_name"], "r");
  //       while ($data = fgetcsv($handle)) {
  //         $username = mysqli_real_escape_string($db, $data[3]);
  //
  //         $password = random_password();
  //         $pass_hashed = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));
  //
  //         $email = mysqli_real_escape_string($db, $data[2]);
  //         $fname = mysqli_real_escape_string($db, $data[0]);
  //         $lname = mysqli_real_escape_string($db, $data[1]);
  //
  //         $sql = "insert into user(username, password, email, fname, lname) values ('$username', '$pass_hashed', '$email', '$fname', '$lname')";
  //         mysqli_query($db, $sql);
  //
  //
  //         $params = array(
  //           'username' => $username,
  //           'password' => $password,
  //           'fname' => $fname,
  //           'lname' => $lname,
  //           'email' => rawurlencode($email),
  //         );
  //
  //         $to = rawurlencode($email);
  //         $subject = 'Welcome to '.$settings->site_name;
  //         $body = email_body('_email_adminUser.php',$params);
  //         email($to,$subject,$body);
  //       }
  //       fclose($handle);
  //       print "Import Complete";
  //     }
  //   }
  //
  //   echo "<meta http-equiv='refresh' content='0'>";
  // }


if(isset($_POST["submit"])) {

  $params = array(
    'username' => 'marnold',
    'password' => 'password',
    'fname' => 'Mike',
    'lname' => 'Arnold',
    'email' => rawurlencode("michael.arnold@cpps.com"),
  );
  $to = rawurlencode("michael.arnold@cpps.com");
  $subject = 'Welcome to CPPS';
  $body = email_body('_email_adminUser.php',$params);
  email($to,$subject,$body);
}

?>

<div class="col-sm-8">
  <div class="page-header float-right">
    <div class="page-title">
      <ol class="breadcrumb text-right">
        <li><a href="<?=$us_url_root?>usersc/client_admin.php">Dashboard</a></li>
        <li>Manage</li>
        <li><a class="active" href="<?=$us_url_root?>usersc/client_admin.php?view=learner">User Upload</a></li>
      </ol>
    </div>
  </div>
</div>
</div>
</header>


<div id="page-wrapper">
    <div class="container">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <h1>Manage Users</h1>
            </div>
        </div>

        <div class="row">
          <!-- <form method="POST" enctype="multipart/form-data">
            <p>Upload File:</p><input type="file" name="file" />
            <input type="submit" name="submit" value="Input" />
          </form> -->



          <form method="POST">
            <input type="submit" name="submit" value="Input" />
          </form>

      </div>

    </div>
</div>


<!-- End of main content section -->

<?php require_once $abs_us_root.$us_url_root.'users/includes/page_footer.php'; // the final html footer copyright row + the external js calls ?>

<!-- Place any per-page javascript here -->
