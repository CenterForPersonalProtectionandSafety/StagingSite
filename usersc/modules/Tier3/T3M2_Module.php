<?php
/*
BL Module
*/
?>
<div class="card">
    <input type="checkbox" id="card7" class="more" aria-hidden="true">
    <div class="content">
        <?php if ($user->data()->complete_t3m2 == 0){ ?>
        <div class="front" style="background-image: url('/usersc/images/modules/temp.png')">
        <?php } ?>
        <?php if ($user->data()->complete_t3m2 == 1){ ?>
        <div class="front" style="background-image: url('/usersc/images/modules/temp.png')">
        <?php } ?>
            <div class="inner">
                <h2>Module 2</h2>
                <label for="card7" class="button" aria-hidden="true">
                    Details
                </label>
            </div>
        </div>
        <div class="back">
            <div class="inner">
                <div class="description">
                  <h4>Module 2</h4>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
                <label for="card7" class="button return" aria-hidden="true">
                    <i class="fa fa-arrow-left"></i>
                </label>
                <a href="/usersc/viewT3M2.php" class="button return button-play" aria-hidden="true">
                  <i class="fa fa-play"> Play Module</i>
                </a>
            </div>
        </div>
    </div>
</div>
