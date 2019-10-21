<?php
/*
BL Module
*/
?>
<div class="card">
    <input type="checkbox" id="card10" class="more" aria-hidden="true">
    <div class="content">
        <?php if ($user->data()->complete_t3quiz == 0){ ?>
        <div class="front" style="background-image: url('/usersc/images/modules/placeholder.png')">
        <?php } ?>
        <?php if ($user->data()->complete_t3quiz == 1){ ?>
        <div class="front" style="background-image: url('/usersc/images/modules/placeholder.png')">
        <?php } ?>
            <div class="inner">
                <h2>TIER 3 QUIZ</h2>
                <label for="card10" class="button" aria-hidden="true">
                    Details
                </label>
            </div>
        </div>
        <div class="back">
            <div class="inner">
                <div class="description">
                  <h4>TIER 3 QUIZ</h4>
                  <p>Thank you for viewing all five modules of Tier 3. Please complete this Tier 3 Course quiz for certification.</p>
                </div>
                <label for="card10" class="button return" aria-hidden="true">
                    <i class="fa fa-arrow-left"></i>
                </label>
                <a href="/usersc/viewT3Quiz.php" class="button return button-play" aria-hidden="true">
                  <i class="fa fa-play"> Play Module</i>
                </a>
            </div>
        </div>
    </div>
</div>
