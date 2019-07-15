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


<li class="nav-item navbar-right dropdown">
  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-fw fa-cog"></i> Options</a>
  <div class="dropdown-menu" aria-labelledby="navbarDropdown">

    <?php if (checkMenu(2,$user->data()->id)){  //Links for permission level 2 (Superuser) ?>
      <a class="dropdown-item" href="<?=$us_url_root?>users/admin.php"><i class="fa fa-fw fa-cogs"></i> Admin Dashboard</a>
      <a class="dropdown-item" href="<?=$us_url_root?>users/admin.php?view=users"><i class="fa fa-user"></i> User Management</a>
      <a class="dropdown-item" href="<?=$us_url_root?>users/admin.php?view=permissions"><i class="fa fa-lock"></i> User Permissions</a>
      <a class="dropdown-item" href="<?=$us_url_root?>users/admin.php?view=pages"><i class="fa fa-wrench"></i> System Pages</a>
      <a class="dropdown-item" href="<?=$us_url_root?>users/admin.php?view=messages"><i class="fa fa-envelope"></i> Messages Admin</a>
      <a class="dropdown-item" href="<?=$us_url_root?>users/admin.php?view=logs"><i class="fa fa-search"></i> System Logs</a>
      <div class="dropdown-divider"></div>
    <?php } // if user is logged in ?>


    <?php if(checkMenu(2,$user->data()->id) || checkMenu(5,$user->data()->id)){  //Links for permission level 5 (Admin) ?>
      <a class="dropdown-item" href="<?=$us_url_root?>usersc/client_admin.php"><i class="fa fa-cogs"></i> Admin Dashboard</a>
      <a class="dropdown-item" href="<?=$us_url_root?>usersc/client_admin.php?view=users"><i class="fa fa-users"></i> Manage Users</a>
      <a class="dropdown-item" href="<?=$us_url_root?>usersc/client_admin.php?view=learner"><i class="fa fa-file-text"></i> Learners List</a>
      <div class="dropdown-divider"></div>
    <?php } // if user is logged in ?>

      <a class="dropdown-item" href="<?=$us_url_root?>users/logout.php"><i class="fa fa-power-off"></i> Logout</a>
  </div>
</li>
