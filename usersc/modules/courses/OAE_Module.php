<?php
/*
BL Module
*/
?>
<div class="card">
    <input type="checkbox" id="card1" class="more" aria-hidden="true">
    <div class="content">
        <?php if ($user->data()->complete_oae == 0){ ?>
        <div class="front" style="background-image: url('/usersc/images/modules/oae.png')">
        <?php } ?>
        <?php if ($user->data()->complete_oae == 1){ ?>
        <div class="front" style="background-image: url('/usersc/images/modules/oae_watched.png')">
        <?php } ?>
            <div class="inner">
                <h2>All Employee Training</h2>
                <label for="card1" class="button" aria-hidden="true">
                    Details
                </label>
            </div>
        </div>
        <div class="back">
            <div class="inner">
                <div class="description">
                  <h4>All Employee Training</h4>
                  <p>This course has been developed to help you get a better understanding of where CPPS came from, what CPPS does, why we do what we do and some training tutorials to better prepare you to be successful here at CPPS.</p>
                </div>
                <label for="card1" class="button return" aria-hidden="true">
                    <i class="fa fa-arrow-left"></i>
                </label>
                <a href="/usersc/modules/view/viewOAE.php" class="button return button-play" aria-hidden="true">
                  <i class="fa fa-play"> Play Module</i>
                </a>
            </div>
        </div>
    </div>
</div>
