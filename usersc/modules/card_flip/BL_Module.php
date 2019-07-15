<?php
/*
BL Module
*/
?>
<div class="card">
    <input type="checkbox" id="card1" class="more" aria-hidden="true">
    <div class="content">
        <?php if ($user->data()->complete_bl == 0){ ?>
        <div class="front" style="background-image: url('/usersc/images/bl.jpg')">
        <?php } ?>
        <?php if ($user->data()->complete_bl == 1){ ?>
        <div class="front" style="background-image: url('/usersc/images/bl_watched.png')">
        <?php } ?>
            <div class="inner">
                <h2>Beyond Lockdown</h2>
                <label for="card1" class="button" aria-hidden="true">
                    Details
                </label>
            </div>
        </div>
        <div class="back">
            <div class="inner">
                <div class="description">
                  <h4>Beyond Lockdown</h4>
                  <p>CPPS has produced a new 15-minute video program, “Beyond Lockdown – Preventing and Responding to Extreme School Violence” This 15-minute program pulls from guidance from the FBI, Secret Service and Department of Education to educate students, parents, teachers and staff how to recognize warning signs that a student may be progressing towards violence, and how to respond effectively if violence does erupt.</p>
                </div>
                <label for="card1" class="button return" aria-hidden="true">
                    <i class="fa fa-arrow-left"></i>
                </label>
                <a href="/usersc/viewBL.php" class="button return button-play" aria-hidden="true">
                  <i class="fa fa-play"></i>
                </a>
            </div>
        </div>
    </div>
</div>
