<div class="row">
<div class="col-sm-12 mb-4">
  <div class="card-group">
    <!-- Begin Users Panel -->
    <?php $count = $db->query("SELECT id from users")->count();?>
    <div class="card col-12  col-md-6 no-padding ">
      <div class="card-body">
        <div class="dropdown float-left">
          <!-- <button class="btn bg-transparent dropdown-toggle theme-toggle text-dark" type="button" id="dropdownMenuButton" data-toggle="dropdown">
            <i class="fa fa-cog"></i>
          </button> -->
          <a class="dropdown-item" href="client_admin.php?view=users"><i class="fa fa-cog"> Manage Users</i></a>
          <hr>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <div class="dropdown-menu-content">
              <a class="dropdown-item" href="client_admin.php?view=users"><i class="fa fa-cog"> Manage Users</i></a>
            </div>
          </div>
        </div>
        <div class="h1 text-muted text-right mb-4">
          <i class="fa fa-users"></i>
        </div>

        <div class="h4 mb-0">
          <span class="count"><?=$count?></span>
        </div>

        <small class="text-muted  font-weight-bold">Users</small>
        <div class="progress progress-xs mt-3 mb-0 bg-flat-color-1" style="width: 40%; height: 5px;"></div>
      </div>
    </div>

    <?php $count = $db->query("SELECT id from users")->count();?>
    <div class="card col-12  col-md-6 no-padding ">
      <div class="card-body">
        <div class="dropdown float-left">
          <!-- <button class="btn bg-transparent dropdown-toggle theme-toggle text-dark" type="button" id="dropdownMenuButton" data-toggle="dropdown">
            <i class="fa fa-cog"></i> -->
            <a class="dropdown-item" href="client_admin.php?view=learner"><i class="fa fa-cog"> Learners List</i></a>
            <hr>
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <div class="dropdown-menu-content">
              <a class="dropdown-item" href="client_admin.php?view=learner"><i class="fa fa-file-text"> Learners List</i></a>
            </div>
          </div>
        </div>
        <div class="h1 text-muted text-right mb-4">
          <i class="fa fa-file-text"></i>
        </div>

        <div class="h4 mb-0">
          <span class="count"><?=$count?></span>
        </div>

        <small class="text-muted  font-weight-bold">Users</small>
        <div class="progress progress-xs mt-3 mb-0 bg-flat-color-1" style="width: 40%; height: 5px;"></div>
      </div>
    </div>
    <!-- End Users Panel -->
    <!-- End of Row 1 -->
  </div>
</div>
</div>
