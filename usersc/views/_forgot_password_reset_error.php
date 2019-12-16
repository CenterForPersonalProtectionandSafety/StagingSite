<?php
/*
this is a user-facing page
UserSpice 5
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
<div class="w3-center">

  <h2><?=lang("VER_OOPS");?></h2>
  <div class="w3-container">
    <button class="w3-button w3-block w3-dark-grey w3-section w3-padding" onclick="window.location.href='<?=$us_url_root?>usersc/forgot_password.php'"><?=lang("PW_RESET");?></button>
  </div>
  <br />

</div>
