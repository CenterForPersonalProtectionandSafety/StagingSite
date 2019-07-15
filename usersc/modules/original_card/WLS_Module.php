<?php
/*
When Lightning Strikes Module
*/
?>
<article class="card">
    <a href="/usersc/viewWLS.php">
        <picture class="thumbnail">
            <?php if ($user->data()->complete_wls == 0){ ?>
            <img class-"module-img" src="/usersc/images/wls.jpg" alt="When Lightning Strikes">
            <?php } ?>
            <?php if ($user->data()->complete_wls == 1){ ?>
            <img class-"module-img" src="/usersc/images/wls_watched.png" alt="When Lightning Strikes Watched">
            <?php } ?>
        </picture>
        <div class="card-content">
            <h2>When Lightning Strikes</h2>
            <p>CPPS has created this latest program to prepare any individual to become situationally aware of their surroundings, pick up on early indicators that something might be wrong, and respond effectively if “Lightning Does Strike” and they find themselves in an Extreme Violence event.</p>
        </div><!-- .card-content -->
    </a>
</article><!-- .card -->
