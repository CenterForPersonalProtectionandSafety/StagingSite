<?php if($user->isLoggedIn()){ //anyone is logged in?>
	<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
		<div class="container">
			<a class="navbar-brand" href="<?=$us_url_root?>"><img class="img-responsive" src="<?=$us_url_root?>usersc/images/logo.png" alt="" /></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<?php if($user->isLoggedIn()){ //anyone is logged in?>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto ">

						<li class="nav-item navbar-right dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-fw fa-cog"></i> Options</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">

								<?php if (checkMenu(2,$user->data()->id)) {  //Links for permission level 2 (Superuser) ?>
									<a class="dropdown-item" href="<?=$us_url_root?>users/admin.php"><i class="fa fa-fw fa-cogs"></i> Super-User Dashboard</a>
									<div class="dropdown-divider"></div>
								<?php } // if user is logged in ?>

								<!--  Add checkMenu(X,$user->data()->id) ||  with proper permission id value-->
								<?php if (checkMenu(3,$user->data()->id)) {  //Links for permission level X (Admin) ?>
									<a class="dropdown-item" href="<?=$us_url_root?>usersc/client_admin.php"><i class="fa fa-lock" aria-hidden="true"></i> Manager Dashboard</a>
									<a class="dropdown-item" href="<?=$us_url_root?>usersc/client_admin.php?view=learner"><i class="fa fa-file-text"></i> Learners List</a>
									<div class="dropdown-divider"></div>
								<?php } // if user is logged in ?>

									<a class="dropdown-item" href="<?=$us_url_root?>users/logout.php"><i class="fa fa-power-off"></i> Logout</a>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?=$us_url_root?>usersc/user_settings.php"><i class="fa fa-fw fa-user"></i><?php echo echousername($user->data()->id);?></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?=$us_url_root?>users/logout.php"><i class="fa fa-power-off"></i> Logout</a>
						</li>
					</ul>
				<?php }?>
				<?php if(!$user->isLoggedIn()){ //anyone is logged in?>
					<ul class="navbar-nav ml-auto mr-1">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Options</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="<?=$us_url_root?>usersc/forgot_password.php"><i class="fa fa-info-circle"></i> Forgot Password</a>
								<?php if ($email_act){ //Only display following menu item if activation is enabled ?>
									<a class="dropdown-item" href="<?=$us_url_root?>users/login.php">Resend Activation Email</a>
								<?php }?>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?=$us_url_root?>users/login.php"><i class="fa fa-sign-in"></i> Login</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?=$us_url_root?>users/join.php"><i class="fa fa-user-plus"></i> Register</a>
						</li>
					</ul>
				<?php }?>
			</div>
		</div>
	</nav>
<?php } ?>
