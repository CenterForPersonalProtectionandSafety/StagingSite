<?php
/*
Safe Passage Module
*/
?>
<div class="card">
    <input type="checkbox" id="card6" class="more">
    <div class="content">
      <?php if ($user->data()->complete_sp == 0){ ?>
      <div class="front" style="background-image: url('/usersc/images/sp.png')">
      <?php } ?>
      <?php if ($user->data()->complete_sp == 1){ ?>
      <div class="front" style="background-image: url('/usersc/images/sp_watched.png')">
      <?php } ?>
            <div class="inner">
                <h2>Safe Passage</h2>
                <label for="card6" class="button" aria-hidden="true">
                    Details
                </label>
            </div>
        </div>
        <div class="back">
            <div class="inner">
                <div class="description">
                  <h4>Safe Passage</h4>
                  <p>Reduce your exposure and those your protect; guide your people through the key stages of travel and provide them with critical strategies, techniques and procedures aimed at minimizing travel risks including how to survive a hostage situation.</p>
                </div>
                <label for="card6" class="button return" aria-hidden="true">
                    <i class="fa fa-arrow-left"></i>
                </label>
                <a href="/usersc/viewSP.php" class="button return button-play" aria-hidden="true">
                  <i class="fa fa-play"></i>
                </a>
            </div>
        </div>
    </div>
</div>
