<?php
/*
UserSpice 4
An Open Source PHP User Management System
by the UserSpice Team at http://UserSpice.com

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/
?>
<!-- You can add your own links to the top of the dropdown menu.   -->
<!-- Feel free to use conditional statements like if isLoggedIn and hasPerm to make your menu more dynamic. -->
<!-- Uncomment the sample link below to see how it works -->


<!-- <li class="divider"></li>
<li><a href="<?=$us_url_root?>users/admin.php"><i class="fa fa-fw fa-cogs"></i> Test Link</a></li> -->

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
  <a class="nav-link" href="#"></a>
</li>
<li class="nav-item">
  <a class="nav-link" href="<?=$us_url_root?>users/login.php"><i class="fa fa-sign-in"></i> Login</a>
</li>
<li class="nav-item">
  <a class="nav-link" href="<?=$us_url_root?>users/join.php"><i class="fa fa-user-plus"></i> Register</a>
</li>
