<?php
/*
BL Module
*/
?>
<div class="card">
    <input type="checkbox" id="card2" class="more" aria-hidden="true">
    <div class="content">
        <?php if ($user->data()->complete_os == 0){ ?>
        <div class="front" style="background-image: url('/usersc/images/modules/os.png')">
        <?php } ?>
        <?php if ($user->data()->complete_os == 1){ ?>
        <div class="front" style="background-image: url('/usersc/images/modules/os_watched.png')">
        <?php } ?>
            <div class="inner">
                <h2>Sales Training</h2>
                <label for="card2" class="button" aria-hidden="true">
                    Details
                </label>
            </div>
        </div>
        <div class="back">
            <div class="inner">
                <div class="description">
                  <h4>Sales Training</h4>
                  <p>This course has been developed to help CPPS Account Executives better understand our products/services and gives them a baseline understanding of how the sales process works. This training will also provide sales tactics and give Account Executives a better understanding of their role at CPPS.</p>
                </div>
                <label for="card2" class="button return" aria-hidden="true">
                    <i class="fa fa-arrow-left"></i>
                </label>
                <a href="/usersc/modules/view/viewOS.php" class="button return button-play" aria-hidden="true">
                  <i class="fa fa-play"> Play Module</i>
                </a>
            </div>
        </div>
    </div>
</div>
