<!-- This is an example widget file.  It will be included on the statistics page of the Dashboard. -->
<h4>Courses Completed</h4></br>


<!-- Do any php that needs to happen. You already have access to the db -->
<?php

  //Queries for T2M1 Course
  $elearningComplete = $db->query("SELECT id FROM users WHERE complete_elearning = 1",array(1))->count();
  $elearningIncomplete = $db->query("SELECT id FROM users WHERE complete_elearning = 0",array(0))->count();
  //Queries for T2M2 Course
  $videoComplete = $db->query("SELECT id FROM users WHERE complete_video = 1",array(1))->count();
  $videoIncomplete = $db->query("SELECT id FROM users WHERE complete_video = 0",array(0))->count();

?>

<style>
.chart:hover {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  transition-timing-function: ease;
  transition: 0.5s;
}
</style>


  <!-- E-Learning -->
  <div class="row">
    <div class="col-lg-6">
      <h4>E-Learning Course</h4></br>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-6">
      <a href="<?=$us_url_root?>usersc/client_admin.php?view=elearning">
        <div class="card chart">
          <div class="card-body">
            <h4 class="mb-3">E-Learning </h4>
            <canvas id="elearning-chart"></canvas>
          </div>
        </div>
      </a>
    </div>
  </div>

  <!-- Video -->
  <div class="row">
    <div class="col-lg-6">
      <h4>Video Course</h4></br>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-6">
      <a href="<?=$us_url_root?>usersc/client_admin.php?view=video">
        <div class="card chart">
          <div class="card-body">
            <h4 class="mb-3">Video </h4>
            <canvas id="video-chart"></canvas>
          </div>
        </div>
      </a>
    </div>
  </div>


<!-- end of widget -->
<!-- Put any javascript here -->
<script type="text/javascript">
$(document).ready(function() {
  var ctx = document.getElementById( "elearning-chart" );
      ctx.height = 125;
      var blChart = new Chart( ctx, {
          type: 'pie',
          data: {
              datasets: [ {
                  data: [ <?=$elearningComplete?>, <?=$elearningIncomplete?> ],
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
  var ctx = document.getElementById( "video-chart" );
      ctx.height = 125;
      var blChart = new Chart( ctx, {
          type: 'pie',
          data: {
              datasets: [ {
                  data: [ <?=$videoComplete?>, <?=$videoIncomplete?> ],
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
