

    <?php
    if (!$form_valid && Input::exists()){?>
      <?php if(!$validation->errors()=='') {?><div class="alert alert-danger"><?=display_errors($validation->errors());?></div><?php } ?>
    <?php }
    includeHook($hooks,'body');
    ?>

    <form class="w3-container" action="<?=$form_action;?>" method="<?=$form_method;?>">

      <h2 class="form-signin-heading"> <?=lang("SIGNUP_TEXT","");?></h2>



        <?php if($settings->auto_assign_un==0) {?><label><?=lang("GEN_UNAME");?>*</label>&nbsp;&nbsp;<span id="usernameCheck" class="small"></span>
        <input type="text" class="w3-input w3-border" id="username" name="username" placeholder="<?=lang("GEN_UNAME");?>" value="<?php if (!$form_valid && !empty($_POST)){ echo $username;} ?>" required autofocus autocomplete="username"><?php } ?>


        <label for="fname"><?=lang("GEN_FNAME");?>*</label>
        <input type="text" class="w3-input w3-border" id="fname" name="fname" placeholder="<?=lang("GEN_FNAME");?>" value="<?php if (!$form_valid && !empty($_POST)){ echo $fname;} ?>" required autofocus autocomplete="first-name">

        <label for="lname"><?=lang("GEN_LNAME");?>*</label>
        <input type="text" class="w3-input w3-border" id="lname" name="lname" placeholder="<?=lang("GEN_LNAME");?>" value="<?php if (!$form_valid && !empty($_POST)){ echo $lname;} ?>" required autocomplete="family-name">

        <label for="email"><?=lang("GEN_EMAIL");?>*</label>
        <input  class="w3-input w3-border" type="text" name="email" id="email" placeholder="<?=lang("GEN_EMAIL");?>" value="<?php if (!$form_valid && !empty($_POST)){ echo $email;} ?>" required autocomplete="email">

        <?php

        $character_range = lang("GEN_MIN")." ".$settings->min_pw . " ". lang("GEN_AND") ." ". $settings->max_pw . " " .lang("GEN_MAX")." ".lang("GEN_CHAR");
        $character_statement = '<span id="character_range" class="gray_out_text">' . $character_range . ' </span>';

        if ($settings->req_cap == 1){
          $num_caps = '1'; //Password must have at least 1 capital
          if($num_caps != 1){
            $num_caps_s = 's';
          }
          $num_caps_statement = '<span id="caps" class="gray_out_text">'.lang("JOIN_HAVE") . $num_caps . lang("JOIN_CAP") .'</span>';
        }

        if ($settings->req_num == 1){
          $num_numbers = '1'; //Password must have at least 1 number
          if($num_numbers != 1){
            $num_numbers_s = 's';
          }

          $num_numbers_statement = '<span id="number" class="gray_out_text">'.lang("JOIN_HAVE") . $num_numbers . lang("GEN_NUMBER") .'</span>';
        }
        $password_match_statement = '<span id="password_match" class="gray_out_text">'.lang("JOIN_TWICE").'</span>';


        //2.) Apply default class to gray out green check icon
        echo '
        <style>
        .gray_out_icon{
          -webkit-filter: grayscale(100%); /* Safari 6.0 - 9.0 */
          filter: grayscale(100%);
        }
        .gray_out_text{
          opacity: .5;
        }
        </style>
        ';

        //3.) Javascript to check to see if user has met conditions on keyup (NOTE: It seems like we shouldn't have to include jquery here because it's already included by UserSpice, but the code doesn't work without it.)
        echo '
        <script type="text/javascript">
        $(document).ready(function(){

          $( "#password" ).keyup(function() {
            var pswd = $("#password").val();

            //validate the length
            if ( pswd.length >= ' . $settings->min_pw . ' && pswd.length <= ' . $settings->max_pw . ' ) {
              $("#character_range_icon").removeClass("gray_out_icon");
              $("#character_range").removeClass("gray_out_text");
            } else {
              $("#character_range_icon").addClass("gray_out_icon");
              $("#character_range").addClass("gray_out_text");
            }

            //validate capital letter
            if ( pswd.match(/[A-Z]/) ) {
              $("#num_caps_icon").removeClass("gray_out_icon");
              $("#caps").removeClass("gray_out_text");
            } else {
              $("#num_caps_icon").addClass("gray_out_icon");
              $("#caps").addClass("gray_out_text");
            }

            //validate number
            if ( pswd.match(/\d/) ) {
              $("#num_numbers_icon").removeClass("gray_out_icon");
              $("#number").removeClass("gray_out_text");
            } else {
              $("#num_numbers_icon").addClass("gray_out_icon");
              $("#number").addClass("gray_out_text");
            }
          });

          $( "#confirm" ).keyup(function() {
            var pswd = $("#password").val();
            var confirm_pswd = $("#confirm").val();

            //validate password_match
            if (pswd == confirm_pswd) {
              $("#password_match_icon").removeClass("gray_out_icon");
              $("#password_match").removeClass("gray_out_text");
            } else {
              $("#password_match_icon").addClass("gray_out_icon");
              $("#password_match").addClass("gray_out_text");
            }

          });
        });
        </script>
        ';

        ?>


          <label for="password"><?=lang("GEN_PASS");?>* (Between 6 & 20 Characters. Must include number and capital letter.)</label>
          <input  class="w3-input w3-border" type="password" name="password" id="password" placeholder="<?=lang("GEN_PASS");?>" required autocomplete="password" aria-describedby="passwordhelp">

          <label for="confirm"><?=lang("PW_CONF");?>*</label>
          <input  type="password" id="confirm" name="confirm" class="w3-input w3-border" placeholder="<?=lang("PW_CONF");?>" required autocomplete="password" >

        <br><br>

        <?php
        includeHook($hooks,'form');
        include($abs_us_root.$us_url_root.'usersc/scripts/additional_join_form_fields.php'); ?>
        <?php if($settings->show_tos == 1){ ?>
          <label for="confirm"> <?=lang("JOIN_TC");?></label>
          <textarea id="agreement" name="agreement" rows="4" class="form-control" style="background-color:white;" disabled >
            <?php
            if(!isset($_SESSION['us_lang']) || $_SESSION['us_lang'] == 'en-US' || $_SESSION['us_lang'] == '' ){
            require $abs_us_root.$us_url_root.'usersc/includes/user_agreement.php';
            }else{
              if(file_exists($abs_us_root.$us_url_root.'usersc/lang/termsandcond/'.$_SESSION['us_lang'].'.php')){
                require $abs_us_root.$us_url_root.'usersc/lang/termsandcond/'.$_SESSION['us_lang'].'.php';
              }else{
                require $abs_us_root.$us_url_root.'usersc/includes/user_agreement.php';
              }
            }
            ?>
          </textarea>

          <label><input type="checkbox" id="agreement_checkbox" name="agreement_checkbox"> <?=lang("JOIN_ACCEPTTC");?></label>
        <?php } //if TOS enabled ?>


      <input type="hidden" value="<?=Token::generate();?>" name="csrf">
      <button class="w3-button w3-block w3-dark-grey w3-section w3-padding" type="submit" id="next_button"><i class="fa fa-plus-square"></i> <?=lang("SIGNUP_TEXT");?></button>
      <?php if($settings->recaptcha == 1|| $settings->recaptcha == 2){ ?>
        <div class="g-recaptcha" data-sitekey="<?=$settings->recap_public; ?>" data-bind="next_button" data-callback="submitForm"></div>
      <?php } ?>
    </form><br />
