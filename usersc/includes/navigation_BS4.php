

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="<?=$us_url_root?>"><img class="img-responsive" src="<?=$us_url_root?>users/images/logo.png" alt="" /></a>

  <?php if($user->isLoggedIn()){ //anyone is logged in?>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="#" style="pointer-events: none; cursor: default;" ><i class="fa fa-fw fa-user"></i><?php echo echousername($user->data()->id);?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=$us_url_root?>users/logout.php"><i class="fa fa-power-off"></i> Logout</a>
        </li>

        <?php include $abs_us_root.$us_url_root.'usersc/includes/navigation_dropdown.php'; ?>
      </ul>
    <?php } else { ?>
      <ul class="navbar-nav mr-auto">
      <?php include $abs_us_root.$us_url_root.'usersc/includes/navigation_loggedout.php'; } ?>
    </ul>
  </div>
</nav>
