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

	<h2 class="text-center"><?=$ruser->data()->fname;?>,</h2>
	<p class="text-center"><?=lang("VER_PLEASE");?></p>
	<form action="forgot_password_reset.php?reset=1" method="post" class="w3-container">
		<?php if(!$errors=='') {?><div class="alert alert-danger"><?=display_errors($errors);?></div><?php } ?>

		<label for="password"><?=lang("PW_NEW");?>:</label>
		<input type="password" name="password" value="" id="password" class="w3-input w3-border" autocomplete="new-password">

		<label for="confirm"><?=lang("PW_CONF");?>:</label>
		<input type="password" name="confirm" value="" id="confirm" class="w3-input w3-border" autocomplete='new-password'>

		<input type="hidden" name="csrf" value="<?=Token::generate();?>">
		<input type="hidden" name="email" value="<?=$email;?>">
		<input type="hidden" name="vericode" value="<?=$vericode;?>">
		<input type="submit" name="resetPassword" value="<?=lang("GEN_RESET");?>" class="w3-button w3-block w3-dark-grey w3-section w3-padding">
	</form>
	<br />

</div>
