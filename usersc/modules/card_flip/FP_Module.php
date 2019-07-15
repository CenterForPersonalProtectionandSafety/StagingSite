<?php
/*
Flashpoint De-escalation and Prevention Module
*/
?>
<div class="card">
    <input type="checkbox" id="card5" class="more">
    <div class="content">
      <?php if ($user->data()->complete_fpdp == 0){ ?>
      <div class="front" style="background-image: url('/usersc/images/fpdp.png')">
      <?php } ?>
      <?php if ($user->data()->complete_fpdp == 1){ ?>
      <div class="front" style="background-image: url('/usersc/images/fpdp_watched.png')">
      <?php } ?>
            <div class="inner">
                <h2>Flashpoint De-escalation and Prevention</h2>
                <label for="card5" class="button" aria-hidden="true">
                    Details
                </label>
            </div>
        </div>
        <div class="back">
            <div class="inner">
                <div class="description">
                  <h4>Flashpoint De-escalation and Prevention</h4>
                  <p>Research shows that over 2 million people are affected each year by violent victimizations in the workplace at a cost of over 100 billion dollars to U.S. corporations annually.  Violence, however, is almost always evolutionary with warning signs along the way.  In this 12-minute video, viewers are equipped to:</p>
                    <ul>
                      <li>Understand what Workplace Violence is</li>
                      <li>Recognize Behaviors of Concern before violence occurs</li>
                      <li>Understand how to report concerns once they are observed</li>
                      <li>Recognize indicators that a co-worker might be involved in a Domestic or Intimate Partner violence relationship…and what to do about it</li>
                      <li>Understand key strategies for de-escalating tense situations in the workplace</li>
                    </ul>
                </div>
                <label for="card5" class="button return" aria-hidden="true">
                    <i class="fa fa-arrow-left"></i>
                </label>
                <a href="/usersc/viewFPDP.php" class="button return button-play" aria-hidden="true">
                  <i class="fa fa-play"></i>
                </a>
            </div>
        </div>
    </div>
</div>
