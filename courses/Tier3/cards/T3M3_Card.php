<?php
/*
BL Module
*/
?>
<div class="card">
    <input type="checkbox" id="card9" class="more" aria-hidden="true">
    <div class="content">
        <?php if ($user->data()->complete_t3m3 == 0){ ?>
        <div class="front" style="background-image: url('/usersc/images/modules/t3m3.png')">
        <?php } ?>
        <?php if ($user->data()->complete_t3m3 == 1){ ?>
        <div class="front" style="background-image: url('/usersc/images/modules/t3m3_complete.png')">
        <?php } ?>
            <div class="inner">
                <h2>Module 3</h2>
                <label for="card9" class="button" aria-hidden="true">
                    Details
                </label>
            </div>
        </div>
        <div class="back">
            <div class="inner">
                <div class="description">
                  <h4>Module 3</h4>
                  <p>Course Demo</p>
                </div>
                <label for="card9" class="button return" aria-hidden="true">
                    <i class="fa fa-arrow-left"></i>
                </label>
                <a href="/courses/Tier3/viewT3M3.php" class="button return button-play" aria-hidden="true">
                  <i class="fa fa-play"> Play Module</i>
                </a>
            </div>
        </div>
    </div>
</div>
