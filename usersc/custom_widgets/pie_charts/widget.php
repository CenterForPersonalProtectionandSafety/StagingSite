<!-- This is an example widget file.  It will be included on the statistics page of the Dashboard. -->
<h4>Courses Completed</h4></br><hr>
<div class="row">

<!-- Do any php that needs to happen. You already have access to the db -->
<?php

  //Queries for Onboarding All Employees Course
  $oaeComplete = $db->query("SELECT id FROM users WHERE complete_oae = 1",array(1))->count();
  $oaeIncomplete = $db->query("SELECT id FROM users WHERE complete_oae = 0",array(0))->count();

  //Queries for Onboarding Sales Course
  $osComplete = $db->query("SELECT id FROM users WHERE complete_os = 1",array(1))->count();
  $osIncomplete = $db->query("SELECT id FROM users WHERE complete_os = 0",array(0))->count();

  //Queries for Onboarding Trainer Training Course
  $ottComplete = $db->query("SELECT id FROM users WHERE complete_ott = 1",array(1))->count();
  $ottIncomplete = $db->query("SELECT id FROM users WHERE complete_ott = 0",array(0))->count();


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
  <a href="<?=$us_url_root?>usersc/client_admin.php?view=oae">
    <div class="card chart">
        <div class="card-body">
            <h4 class="mb-3">Onboarding All Employees Completed </h4>
            <!-- id should be unique -->
            <canvas id="oae-chart"></canvas>
        </div>
    </div>
  </a>
</div>

<!-- Create a div to hold your widget -->
<div class="col-lg-6">
  <a href="<?=$us_url_root?>usersc/client_admin.php?view=os">
    <div class="card chart">
        <div class="card-body">
            <h4 class="mb-3">Onboarding Sales Completed </h4>
            <!-- id should be unique -->
            <canvas id="os-chart"></canvas>
        </div>
    </div>
  </a>
</div>

<!-- Create a div to hold your widget -->
<div class="col-lg-6">
  <a href="<?=$us_url_root?>usersc/client_admin.php?view=ott">
    <div class="card chart">
        <div class="card-body">
            <h4 class="mb-3">Onboarding Trainer Training Completed </h4>
            <!-- id should be unique -->
            <canvas id="ott-chart"></canvas>
        </div>
    </div>
  </a>
</div>



</div> <!-- end of widget -->
<!-- Put any javascript here -->
<script type="text/javascript">
$(document).ready(function() {
  var ctx = document.getElementById( "oae-chart" );
      ctx.height = 125;
      var oaeChart = new Chart( ctx, {
          type: 'pie',
          data: {
              datasets: [ {
                  data: [ <?=$oaeComplete?>, <?=$oaeIncomplete?> ],
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

  var ctx = document.getElementById( "os-chart" );
      ctx.height = 125;
      var osChart = new Chart( ctx, {
          type: 'pie',
          data: {
              datasets: [ {
                  data: [ <?=$osComplete?>, <?=$osIncomplete?> ],
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

  var ctx = document.getElementById( "ott-chart" );
      ctx.height = 125;
      var ottChart = new Chart( ctx, {
          type: 'pie',
          data: {
              datasets: [ {
                  data: [ <?=$ottComplete?>, <?=$ottIncomplete?> ],
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
});
</script>
