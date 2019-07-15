<!-- This is an example widget file.  It will be included on the statistics page of the Dashboard. -->
<h4>Courses Completed</h4></br><hr>
<div class="row">

<!-- Do any php that needs to happen. You already have access to the db -->
<?php

  //Queries for WLS Course
  $wlsComplete = $db->query("SELECT id FROM users WHERE complete_wls = 1",array(1))->count();
  $wlsIncomplete = $db->query("SELECT id FROM users WHERE complete_wls = 0",array(0))->count();

  //Queries for Tier2 Course
  $tier2Complete = $db->query("SELECT id FROM users WHERE complete_tier2 = 1",array(1))->count();
  $tier2Incomplete = $db->query("SELECT id FROM users WHERE complete_tier2 = 0",array(0))->count();

  //Queries for Tier3 Course
  $tier3Complete = $db->query("SELECT id FROM users WHERE complete_tier3 = 1",array(1))->count();
  $tier3Incomplete = $db->query("SELECT id FROM users WHERE complete_tier3 = 0",array(0))->count();

  //Queries for BL Course
  $blComplete = $db->query("SELECT id FROM users WHERE complete_bl = 1",array(1))->count();
  $blIncomplete = $db->query("SELECT id FROM users WHERE complete_bl = 0",array(0))->count();

?>

<style>

.chart:hover {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  transition-timing-function: ease;
  transition: 0.5s;
}

</style>

<!-- Create a div to hold your widget -->
<div class="col-lg-6">
  <a href="<?=$us_url_root?>usersc/client_admin.php?view=wls">
    <div class="card chart">
        <div class="card-body">
            <h4 class="mb-3">When Lightning Strikes Completed </h4>
            <!-- id should be unique -->
            <canvas id="wls-chart"></canvas>
        </div>
    </div>
  </a>
</div>

<!-- Create a div to hold your widget -->
<div class="col-lg-6">
  <a href="<?=$us_url_root?>usersc/client_admin.php?view=tier2">
    <div class="card chart">
        <div class="card-body">
            <h4 class="mb-3">Tier 2 Completed </h4>
            <!-- id should be unique -->
            <canvas id="tier2-chart"></canvas>
        </div>
    </div>
  </a>
</div>

<!-- Create a div to hold your widget -->
<div class="col-lg-6">
  <a href="<?=$us_url_root?>usersc/client_admin.php?view=tier3">
    <div class="card chart">
        <div class="card-body">
            <h4 class="mb-3">Tier 3 Completed </h4>
            <!-- id should be unique -->
            <canvas id="tier3-chart"></canvas>
        </div>
    </div>
  </a>
</div>

<!-- Create a div to hold your widget -->
<div class="col-lg-6">
  <a href="<?=$us_url_root?>usersc/client_admin.php?view=bl">
    <div class="card chart">
        <div class="card-body">
            <h4 class="mb-3">Beyond Lockdown Completed </h4>
            <!-- id should be unique -->
            <canvas id="bl-chart"></canvas>
        </div>
    </div>
  </a>
</div>


</div> <!-- end of widget -->
<!-- Put any javascript here -->
<script type="text/javascript">
$(document).ready(function() {
  var ctx = document.getElementById( "wls-chart" );
      ctx.height = 125;
      var wlsChart = new Chart( ctx, {
          type: 'pie',
          data: {
              datasets: [ {
                  data: [ <?=$wlsComplete?>, <?=$wlsIncomplete?> ],
                  backgroundColor: [
                                      "rgba(109, 224, 94, 1)",
                                      "rgba(205, 92, 223, 1)"
                                  ],
                  hoverBackgroundColor: [
                                      "rgba(109, 224, 94, 0.6)",
                                      "rgba(205, 92, 223, 0.6)"
                                  ]

                              } ],
              labels: [
                              "Complete",
                              "Incomplete"
                          ]
          },
          options: {
              responsive: true
          }
      } );

  var ctx = document.getElementById( "tier2-chart" );
      ctx.height = 125;
      var tier2Chart = new Chart( ctx, {
          type: 'pie',
          data: {
              datasets: [ {
                  data: [ <?=$tier2Complete?>, <?=$tier2Incomplete?> ],
                  backgroundColor: [
                                      "rgba(224, 137, 91, 1)",
                                      "rgba(90, 175, 224, 1)"
                                  ],
                  hoverBackgroundColor: [
                                      "rgba(224, 137, 91, .6)",
                                      "rgba(90, 175, 224, .6)"
                                  ]

                              } ],
              labels: [
                              "Complete",
                              "Incomplete"
                          ]
          },
          options: {
              responsive: true
          }
      } );

  var ctx = document.getElementById( "tier3-chart" );
      ctx.height = 125;
      var tier3Chart = new Chart( ctx, {
          type: 'pie',
          data: {
              datasets: [ {
                  data: [ <?=$tier3Complete?>, <?=$tier3Incomplete?> ],
                  backgroundColor: [
                                      "rgba(87, 108, 223, 1)",
                                      "rgba(225, 206, 95, 1)"
                                  ],
                  hoverBackgroundColor: [
                                      "rgba(87, 108, 223, .6)",
                                      "rgba(225, 206, 95, .6)"
                                  ]

                              } ],
              labels: [
                              "Complete",
                              "Incomplete"
                          ]
          },
          options: {
              responsive: true
          }
      } );

  var ctx = document.getElementById( "bl-chart" );
      ctx.height = 125;
      var blChart = new Chart( ctx, {
          type: 'pie',
          data: {
              datasets: [ {
                  data: [ <?=$blComplete?>, <?=$blIncomplete?> ],
                  backgroundColor: [
                                      "rgba(224, 87, 106, 1)",
                                      "rgba(93, 225, 207, 1)"
                                  ],
                  hoverBackgroundColor: [
                                      "rgba(224, 87, 106, .6)",
                                      "rgba(93, 225, 207, .7)"
                                  ]

                              } ],
              labels: [
                              "Complete",
                              "Incomplete"
                          ]
          },
          options: {
              responsive: true
          }
      } );
});
</script>
