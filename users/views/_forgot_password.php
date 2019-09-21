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

<div class="w3-center"><br>
	<h1>Password Reset</h1>
		<p>Enter your email address and click Reset</p>
		<p>Check your email and click the link that is sent to you.</p>
		<p>Follow the on screen instructions</p>
</div>

<?php if(!$errors=='') {?><div class="alert alert-danger"><?=display_errors($errors);?></div><?php } ?>

<form action="forgot_password.php" method="post" class="w3-container">
	<label for="email"><?=lang("GEN_EMAIL");?></label>
	<input type="text" name="email" placeholder="<?=lang("GEN_EMAIL");?>" class="w3-input w3-border" autofocus autocomplete='email'>

	<input type="hidden" name="csrf" value="<?=Token::generate();?>">
	<p><input type="submit" name="forgotten_password" value="<?=lang("GEN_RESET");?>" class="w3-button w3-block w3-dark-grey w3-section w3-padding"></p>
</form>
