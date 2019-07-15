<?php
/*
Tier 2 Module
*/
?>
<div class="card">
    <input type="checkbox" id="card2" class="more">
    <div class="content">
      <?php if ($user->data()->complete_tier2 == 0){ ?>
      <div class="front" style="background-image: url('/usersc/images/tier2.jpg')">
      <?php } ?>
      <?php if ($user->data()->complete_tier2 == 1){ ?>
      <div class="front" style="background-image: url('/usersc/images/tier2_watched.png')">
      <?php } ?>
            <div class="inner">
                <h2>Workplace Violence Prevention and Response for Employees</h2>
                <label for="card2" class="button" aria-hidden="true">
                    Details
                </label>
            </div>
        </div>
        <div class="back">
            <div class="inner">
                <div class="description">
                  <h4>Workplace Violence Prevention and Response for Employees</h4>
                  <p>Research shows that over 2 million people are affected each year by violent victimizations in the workplace at a cost of over 100 billion dollars to U.S. corporations annually.  Violence, however, is almost always evolutionary with warning signs along the way.</p>
                </div>
                <label for="card2" class="button return" aria-hidden="true">
                    <i class="fa fa-arrow-left"></i>
                </label>
                <a href="/usersc/viewtier2.php" class="button return button-play" aria-hidden="true">
                  <i class="fa fa-play"></i>
                </a>
            </div>
        </div>
    </div>
</div>
