<?php
/*
Tier 3 Module
Only for managers
*/
?>
<div class="card">
    <input type="checkbox" id="card3" class="more">
    <div class="content">
      <?php if ($user->data()->complete_tier3 == 0){ ?>
      <div class="front" style="background-image: url('/usersc/images/tier3.jpg')">
      <?php } ?>
      <?php if ($user->data()->complete_tier3 == 1){ ?>
      <div class="front" style="background-image: url('/usersc/images/tier3_watched.png')">
      <?php } ?>
            <div class="inner">
                <h2>Enhanced Guidance for Managers and Leaders</h2>
                <label for="card3" class="button" aria-hidden="true">
                    Details
                </label>
            </div>
        </div>
        <div class="back">
            <div class="inner">
                <div class="description">
                  <h4>Enhanced Guidance for Managers and Leaders</h4>
                  <p>This is a 14-minute video training program that prepares leaders and supervisors to recognize the potential for violence at the earliest stages. Content Includes:
                    <ul>
                      <li>Deepening the understanding of Workplace Violence</li>
                      <li>Further determining if behaviors of concern may lead to violence</li>
                      <li>The importance of change and/or clusters of concerning behavior in the actions of an individual</li>
                      <li>Identifying the behavioral progression of a person’s actions leading to potential violence</li>
                      <li>Response Strategies for learned or noticed behaviors of concern</li>
                    </ul>
                  </p>
                </div>
                <label for="card3" class="button return" aria-hidden="true">
                    <i class="fa fa-arrow-left"></i>
                </label>
                <a href="/usersc/viewtier3.php" class="button return button-play" aria-hidden="true">
                  <i class="fa fa-play"></i>
                </a>
            </div>
        </div>
    </div>
</div>
