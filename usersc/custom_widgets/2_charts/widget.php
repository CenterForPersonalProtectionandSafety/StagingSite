<!-- This is an example widget file.  It will be included on the statistics page of the Dashboard. -->
<h4>Courses Completed</h4></br><hr>
<div class="row">

<!-- Do any php that needs to happen. You already have access to the db -->
<?php

  //Queries for T2M1 Course
  $t2m1Complete = $db->query("SELECT id FROM users WHERE complete_t2m1 = 1",array(1))->count();
  $t2m1Incomplete = $db->query("SELECT id FROM users WHERE complete_t2m1 = 0",array(0))->count();
  //Queries for T2M2 Course
  $t2m2Complete = $db->query("SELECT id FROM users WHERE complete_t2m2 = 1",array(1))->count();
  $t2m2Incomplete = $db->query("SELECT id FROM users WHERE complete_t2m2 = 0",array(0))->count();
  //Queries for T2M3 Course
  $t2m3Complete = $db->query("SELECT id FROM users WHERE complete_t2m3 = 1",array(1))->count();
  $t2m3Incomplete = $db->query("SELECT id FROM users WHERE complete_t2m3 = 0",array(0))->count();
  //Queries for T2M4 Course
  $t2m4Complete = $db->query("SELECT id FROM users WHERE complete_t2m4 = 1",array(1))->count();
  $t2m4Incomplete = $db->query("SELECT id FROM users WHERE complete_t2m4 = 0",array(0))->count();
  //Queries for T2M5 Course
  $t2m5Complete = $db->query("SELECT id FROM users WHERE complete_t2m5 = 1",array(1))->count();
  $t2m5Incomplete = $db->query("SELECT id FROM users WHERE complete_t2m5 = 0",array(0))->count();


  //Queries for T3M1 Course
  $t3m1Complete = $db->query("SELECT id FROM users WHERE complete_t3m1 = 1",array(1))->count();
  $t3m1Incomplete = $db->query("SELECT id FROM users WHERE complete_t3m1 = 0",array(0))->count();
  //Queries for T3M2 Course
  $t3m2Complete = $db->query("SELECT id FROM users WHERE complete_t3m2 = 1",array(1))->count();
  $t3m2Incomplete = $db->query("SELECT id FROM users WHERE complete_t3m2 = 0",array(0))->count();
  //Queries for T3M3 Course
  $t3m3Complete = $db->query("SELECT id FROM users WHERE complete_t3m3 = 1",array(1))->count();
  $t3m3Incomplete = $db->query("SELECT id FROM users WHERE complete_t3m3 = 0",array(0))->count();
  //Queries for T3M4 Course
  $t3m4Complete = $db->query("SELECT id FROM users WHERE complete_t3m4 = 1",array(1))->count();
  $t3m4Incomplete = $db->query("SELECT id FROM users WHERE complete_t3m4 = 0",array(0))->count();
  //Queries for T3M5 Course
  $t3m5Complete = $db->query("SELECT id FROM users WHERE complete_t3m5 = 1",array(1))->count();
  $t3m5Incomplete = $db->query("SELECT id FROM users WHERE complete_t3m5 = 0",array(0))->count();
?>

<style>

.chart:hover {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  transition-timing-function: ease;
  transition: 0.5s;
}

</style>

  <!-- TIER 2 -->
  <div class="col-lg-6">
    <a href="<?=$us_url_root?>usersc/client_admin.php?view=t2m1">
      <div class="card chart">
          <div class="card-body">
              <h4 class="mb-3">Tier 2 Module 1 </h4>
              <!-- id should be unique -->
              <canvas id="t2m1-chart"></canvas>
          </div>
      </div>
    </a>
  </div>
  <div class="col-lg-6">
    <a href="<?=$us_url_root?>usersc/client_admin.php?view=t2m2">
      <div class="card chart">
          <div class="card-body">
              <h4 class="mb-3">Tier 2 Module 2 </h4>
              <!-- id should be unique -->
              <canvas id="t2m2-chart"></canvas>
          </div>
      </div>
    </a>
  </div>
  <div class="col-lg-6">
    <a href="<?=$us_url_root?>usersc/client_admin.php?view=t2m3">
      <div class="card chart">
          <div class="card-body">
              <h4 class="mb-3">Tier 2 Module 3 </h4>
              <!-- id should be unique -->
              <canvas id="t2m3-chart"></canvas>
          </div>
      </div>
    </a>
  </div>
  <div class="col-lg-6">
    <a href="<?=$us_url_root?>usersc/client_admin.php?view=t2m4">
      <div class="card chart">
          <div class="card-body">
              <h4 class="mb-3">Tier 2 Module 4 </h4>
              <!-- id should be unique -->
              <canvas id="t2m4-chart"></canvas>
          </div>
      </div>
    </a>
  </div>
  <div class="col-lg-6">
    <a href="<?=$us_url_root?>usersc/client_admin.php?view=t2m5">
      <div class="card chart">
          <div class="card-body">
              <h4 class="mb-3">Tier 2 Module 5 </h4>
              <!-- id should be unique -->
              <canvas id="t2m5-chart"></canvas>
          </div>
      </div>
    </a>
  </div>

  <!-- TIER 3 -->
  <div class="col-lg-6">
    <a href="<?=$us_url_root?>usersc/client_admin.php?view=t3m1">
      <div class="card chart">
          <div class="card-body">
              <h4 class="mb-3">Tier 3 Module 1 </h4>
              <!-- id should be unique -->
              <canvas id="t3m1-chart"></canvas>
          </div>
      </div>
    </a>
  </div>
  <div class="col-lg-6">
    <a href="<?=$us_url_root?>usersc/client_admin.php?view=t3m2">
      <div class="card chart">
          <div class="card-body">
              <h4 class="mb-3">Tier 3 Module 2 </h4>
              <!-- id should be unique -->
              <canvas id="t3m2-chart"></canvas>
          </div>
      </div>
    </a>
  </div>
  <div class="col-lg-6">
    <a href="<?=$us_url_root?>usersc/client_admin.php?view=t3m3">
      <div class="card chart">
          <div class="card-body">
              <h4 class="mb-3">Tier 3 Module 3 </h4>
              <!-- id should be unique -->
              <canvas id="t3m3-chart"></canvas>
          </div>
      </div>
    </a>
  </div>
  <div class="col-lg-6">
    <a href="<?=$us_url_root?>usersc/client_admin.php?view=t3m4">
      <div class="card chart">
          <div class="card-body">
              <h4 class="mb-3">Tier 3 Module 4 </h4>
              <!-- id should be unique -->
              <canvas id="t3m4-chart"></canvas>
          </div>
      </div>
    </a>
  </div>
  <div class="col-lg-6">
    <a href="<?=$us_url_root?>usersc/client_admin.php?view=t3m5">
      <div class="card chart">
          <div class="card-body">
              <h4 class="mb-3">Tier 3 Module 5 </h4>
              <!-- id should be unique -->
              <canvas id="t3m5-chart"></canvas>
          </div>
      </div>
    </a>
  </div>


</div> <!-- end of widget -->
<!-- Put any javascript here -->
<script type="text/javascript">
$(document).ready(function() {
  var ctx = document.getElementById( "t2m1-chart" );
      ctx.height = 125;
      var blChart = new Chart( ctx, {
          type: 'pie',
          data: {
              datasets: [ {
                  data: [ <?=$t2m1Complete?>, <?=$t2m1Incomplete?> ],
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
  var ctx = document.getElementById( "t2m2-chart" );
      ctx.height = 125;
      var blChart = new Chart( ctx, {
          type: 'pie',
          data: {
              datasets: [ {
                  data: [ <?=$t2m2Complete?>, <?=$t2m2Incomplete?> ],
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
  var ctx = document.getElementById( "t2m3-chart" );
      ctx.height = 125;
      var blChart = new Chart( ctx, {
          type: 'pie',
          data: {
              datasets: [ {
                  data: [ <?=$t2m3Complete?>, <?=$t2m3Incomplete?> ],
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
  var ctx = document.getElementById( "t2m4-chart" );
      ctx.height = 125;
      var blChart = new Chart( ctx, {
          type: 'pie',
          data: {
              datasets: [ {
                  data: [ <?=$t2m4Complete?>, <?=$t2m4Incomplete?> ],
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
  var ctx = document.getElementById( "t2m5-chart" );
      ctx.height = 125;
      var blChart = new Chart( ctx, {
          type: 'pie',
          data: {
              datasets: [ {
                  data: [ <?=$t2m5Complete?>, <?=$t2m5Incomplete?> ],
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



  var ctx = document.getElementById( "t3m1-chart" );
      ctx.height = 125;
      var blChart = new Chart( ctx, {
          type: 'pie',
          data: {
              datasets: [ {
                  data: [ <?=$t3m1Complete?>, <?=$t3m1Incomplete?> ],
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
  var ctx = document.getElementById( "t3m2-chart" );
      ctx.height = 125;
      var blChart = new Chart( ctx, {
          type: 'pie',
          data: {
              datasets: [ {
                  data: [ <?=$t3m2Complete?>, <?=$t3m2Incomplete?> ],
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
  var ctx = document.getElementById( "t3m3-chart" );
      ctx.height = 125;
      var blChart = new Chart( ctx, {
          type: 'pie',
          data: {
              datasets: [ {
                  data: [ <?=$t3m3Complete?>, <?=$t3m3Incomplete?> ],
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
  var ctx = document.getElementById( "t3m4-chart" );
      ctx.height = 125;
      var blChart = new Chart( ctx, {
          type: 'pie',
          data: {
              datasets: [ {
                  data: [ <?=$t3m4Complete?>, <?=$t3m4Incomplete?> ],
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
  var ctx = document.getElementById( "t3m5-chart" );
      ctx.height = 125;
      var blChart = new Chart( ctx, {
          type: 'pie',
          data: {
              datasets: [ {
                  data: [ <?=$t3m5Complete?>, <?=$t3m5Incomplete?> ],
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
