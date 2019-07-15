<?php
/*
Tier 2 Module
*/
?>
<article class="card">
    <a href="/usersc/viewtier2.php">
        <picture class="thumbnail">
          <?php if ($user->data()->complete_tier2 == 0){ ?>
          <img class-"module-img" src="/usersc/images/tier2.jpg" alt="Generic placeholder image">
          <?php } ?>
          <?php if ($user->data()->complete_tier2 == 1){ ?>
          <img class-"module-img" src="/usersc/images/tier2_watched.png" alt="Generic placeholder image">
          <?php } ?>
        </picture>
        <div class="card-content">
            <h2>Workplace Violence Prevention and Response for Employees</h2>
            <p>Research shows that over 2 million people are affected each year by violent victimizations in the workplace at a cost of over 100 billion dollars to U.S. corporations annually.  Violence, however, is almost always evolutionary with warning signs along the way.  In this 12-minute video, viewers are equipped to: </p>
        </div><!-- .card-content -->
    </a>
</article><!-- .card -->
