<?php
/*
BL Module
*/
?>
<article class="card">
    <a href="/usersc/viewBL.php">
        <picture class="thumbnail">
            <?php if ($user->data()->complete_bl == 0){ ?>
            <img class-"module-img" src="/usersc/images/bl.jpg" alt="Beyond Lockdown">
            <?php } ?>
            <?php if ($user->data()->complete_bl == 1){ ?>
            <img class-"module-img" src="/usersc/images/bl_watched.png" alt="Beyond Lockdown Watched">
            <?php } ?>
        </picture>
        <div class="card-content">
            <h2>Beyond Lockdown</h2>
            <p>CPPS has produced a new 15-minute video program, “Beyond Lockdown – Preventing and Responding to Extreme School Violence” This 15-minute program pulls from guidance from the FBI, Secret Service and Department of Education to educate students, parents, teachers and staff how to recognize warning signs that a student may be progressing towards violence, and how to respond effectively if violence does erupt.</p>
        </div><!-- .card-content -->
    </a>
</article><!-- .card -->
