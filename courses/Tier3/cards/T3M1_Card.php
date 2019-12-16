<?php
/*
BL Module
*/
?>
<div class="card">
    <input type="checkbox" id="card7" class="more" aria-hidden="true">
    <div class="content">
        <?php if ($user->data()->complete_t3m1 == 0){ ?>
        <div class="front" style="background-image: url('/usersc/images/modules/t3m1.png')">
        <?php } ?>
        <?php if ($user->data()->complete_t3m1 == 1){ ?>
        <div class="front" style="background-image: url('/usersc/images/modules/t3m1_complete.png')">
        <?php } ?>
            <div class="inner">
                <h2>Module 1</h2>
                <label for="card7" class="button" aria-hidden="true">
                    Details
                </label>
            </div>
        </div>
        <div class="back">
            <div class="inner">
                <div class="description">
                  <h4>Module 1</h4>
                  <p>Intro</p>
                </div>
                <label for="card7" class="button return" aria-hidden="true">
                    <i class="fa fa-arrow-left"></i>
                </label>
                <a href="/courses/Tier3/viewT3M1.php" class="button return button-play" aria-hidden="true">
                  <i class="fa fa-play"> Play Module</i>
                </a>
            </div>
        </div>
    </div>
</div>