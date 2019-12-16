<?php
/*
BL Module
*/
?>
<div class="card">
    <input type="checkbox" id="card3" class="more" aria-hidden="true">
    <div class="content">
        <?php if ($user->data()->complete_t2m3 == 0){ ?>
        <div class="front" style="background-image: url('/usersc/images/modules/t2m3.png')">
        <?php } ?>
        <?php if ($user->data()->complete_t2m3 == 1){ ?>
        <div class="front" style="background-image: url('/usersc/images/modules/t2m3_complete.png')">
        <?php } ?>
            <div class="inner">
                <h2>Module 3</h2>
                <label for="card3" class="button" aria-hidden="true">
                    Details
                </label>
            </div>
        </div>
        <div class="back">
            <div class="inner">
                <div class="description">
                  <h4>Module 3</h4>
                  <p>Hostage Situation</p>
                </div>
                <label for="card3" class="button return" aria-hidden="true">
                    <i class="fa fa-arrow-left"></i>
                </label>
                <a href="/courses/Tier2/viewT2M3.php" class="button return button-play" aria-hidden="true">
                  <i class="fa fa-play"> Play Module</i>
                </a>
            </div>
        </div>
    </div>
</div>
