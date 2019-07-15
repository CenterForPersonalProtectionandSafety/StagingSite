<?php
/*
Admin Dashboard ex. page
*/
?>

<?php require_once '../users/init.php'; ?>
<?php require_once $abs_us_root.$us_url_root.'users/includes/header.php'; ?>
<?php require_once $abs_us_root.$us_url_root.'usersc/includes/navigation.php'; ?>
<?php if (!securePage($_SERVER['PHP_SELF'])){die();} ?>

<?php

  // //Query to fetch list of schools
  // $schools_query = $db->query("SELECT * FROM schools");
  // $schoolData = $schools_query->results();

?>


<div id="page-wrapper">
  <div class="container">
    <!-- Page Heading -->
    <div class="row">
      <div class="col-xs-12 col-md-6">
        <h1>Manage Schools</h1>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <hr />
          <a class="pull-right" href="#" data-toggle="modal" data-target="#addschool"><i class="glyphicon glyphicon-plus"></i> Manually Add School</a>
          <div class="row">
            <div class="col-xs-12">
              <div class="alluinfo">&nbsp;</div>
              <div class="allutable">
                <table id="paginate" class='table table-hover table-list-search'>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>School</th>
                            <th>District</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //Cycle through users
                        foreach ($schoolData as $school) {
                        ?>
                        <tr>
                            <td><?=$school->id?></td>
                            <td><?=$school->name?></td>
                            <td><?=$school->district?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
              </div>
            </div>
          </div><br>
        </div>

            <!-- The Modal -->
            <div class="modal fade" id="addschool">
              <div class="modal-dialog">
                <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">School Addition</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>

                  <!-- Modal body -->
                  <div class="modal-body">
                    <form class="form-signup" action="schools_list.php" method="POST" id="payment-form">
                      <div class="panel-body">
                          <label>School Name: </label><input type="text" class="form-control" id="sname" name="sname" placeholder="School Name" value="<?php if (!$form_valid && !empty($_POST)){ echo $sname;} ?>" required>
                          <br>
                          <label>School District: </label><input type="text" class="form-control" id="sdistrict" name="sdistrict" placeholder="School District" value="<?php if (!$form_valid && !empty($_POST)){ echo $sdistrict;} ?>" required>
                        </div>
                    </form>
                  </div>

                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <input type="hidden" name="csrf" value="<?=Token::generate();?>" />
                    <input class='btn btn-primary' type='submit' id="addSchool" name="addSchool" value='Add School' class='submit' />
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  </div>

                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>


<!-- End of main content section -->

<?php require_once $abs_us_root.$us_url_root.'users/includes/page_footer.php'; // the final html footer copyright row + the external js calls ?>

<!-- Place any per-page javascript here -->
<script src="../users/js/pagination/jquery.dataTables.js" type="text/javascript"></script>
<script src="../users/js/pagination/dataTables.js" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        $('#paginate').DataTable({"pageLength": 25,"aLengthMenu": [[25, 50, 100, -1], [25, 50, 100, "All"]], "aaSorting": []});

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
                else if (response == 'taken') $('#usernameCheck').html('<i class="glyphicon glyphicon-remove" style="color: red; font-size: 12px"></i> This username is taken.');
                else if (response == 'valid') $('#usernameCheck').html('<i class="glyphicon glyphicon-ok" style="color: green; font-size: 12px"></i> This username is not taken.');
                else $('#usernameCheck').html('');
            });
        }
    });
</script>
<?php } ?>

<!-- Content Ends Here -->
<!-- footers -->
<?php require_once $abs_us_root.$us_url_root.'users/includes/page_footer.php'; // the final html footer copyright row + the external js calls ?>

<!-- Place any per-page javascript here -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<?php require_once $abs_us_root.$us_url_root.'users/includes/html_footer.php'; // currently just the closing /body and /html ?>
