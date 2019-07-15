<?php
/*
Tier 3 Module
Only for managers
*/
?>
<article class="card">
    <a href="/usersc/viewtier3.php">
        <picture class="thumbnail">
          <?php if ($user->data()->complete_tier3 == 0){ ?>
          <img class-"module-img" src="/usersc/images/tier3.jpg" alt="Tier 3">
          <?php } ?>
          <?php if ($user->data()->complete_tier3 == 1){ ?>
          <img class-"module-img" src="/usersc/images/tier3_watched.png" alt="Tier 3 Watched">
          <?php } ?>
        </picture>
        <div class="card-content">
            <h2>Enhanced Guidance for Managers and Leaders</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div><!-- .card-content -->
    </a>
</article><!-- .card -->
