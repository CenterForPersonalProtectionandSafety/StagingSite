<?php
require_once '../users/init.php';
require_once $abs_us_root.$us_url_root.'users/includes/template/prep.php';
if(isset($user) && $user->isLoggedIn()){
}
//Redirect user on first login if haven't reset password
if($user->data()->first_login_pass_reset == 0) {
  Redirect::to($us_url_root.'usersc/user_settings.php');
}

?>
  <a id="to-top" title="Back to top" href="#"><i class="fa fa-arrow-up"></i></a>

	<!-- Hero Banner Welcome Section -->
	<header id="hero-section"class="jumbotron jumbotron-fluid hero">
	  <div class="text-center">
	   <h1>BEYOND</h1>
     <h3>LOCKDOWN</h3>
     <hr class="style-one">
     <p class="header-text">Preventing and Responding to Extreme School Violence</p>
     <a href="#" id="sks_link" class="btn btn-md" role="button">Background</a>
	   <a href="#" id="about_link" class="btn btn-md" role="button">About Us</a>
     <a href="#" id="courses_link" class="btn btn-md" role="button">Courses</a>
	  </div>
	</header>

  <!-- Our school, kids, solution section -->
  <div id="sks" class="row row-sks">
    <div class="col-md-2"></div>

    <!-- Left Column w/ Text -->
    <div class="col-md-4">
      <div class="row vert-spacing">
        <h2 class="gold">Our Schools, Our Kids, Our Solution</h2>
      </div>
      <div class="row vert-spacing">
        <h2 class="gold">The Problem</h2>
        <p>As school violence continues to spread across the country, lawmakers, school officials and students are looking for effective ways to confront this increasing risk. But the reality is that students don’t “just snap” and almost always there are warning signs that are observable on the path to violence…violence against others…or violence against self. These warning signs are opportunities to intervene if recognized early and responded to appropriately.</p>
      </div>
      <div class="row vert-spacing">
        <h2 class="gold">The Solution</h2>
        <p>Because of this, CPPS has produced a new 15-minute video program, “Beyond Lockdown – Preventing and Responding to Extreme School Violence” This 15-minute program pulls from guidance from the FBI, Secret Service and Department of Education to educate students, parents, teachers and staff how to recognize warning signs that a student may be progressing towards violence, and how to respond effectively if violence does erupt.</p>
      </div>
    </div>

    <!-- Right Column w/ Images -->
    <div class="col-md-6">
      <div class="row ">
        <img src="images/bl/run_text.png" alt="Run!" class="RHF">
      </div>
      <div class="row ">
        <img src="images/bl/hide_text.png" alt="Hide!" class="RHF">
      </div>
      <div class="row ">
        <img src="images/bl/fight_text.png" alt="Fight!" class="RHF">
      </div>
    </div>
  </div>

  <!-- About Us Section -->
  <div id="about" class="row row-about">
    <div class="row row-car">
      <div class="col-md-1"></div>
      <div class="col-md-5">
        <h2 class="gold">ABOUT</h2>
        <p>As school violence continues to spread across the country, lawmakers, school officials and students are looking for effective ways to confront this increasing risk. But the reality is that students don’t “just snap” and almost always there are warning signs that are observable on the path to violence…violence against others…or violence against self. These warning signs are opportunities to intervene if recognized early and responded to appropriately.</p>
      </div>
    </div>

    <div class="row row-girl">
      <div class="col-md-5 offset-md-6">
        <h2 class="gold">FBI National Citizens Academy Alumni Association Fully Endorsed</h2>
        <p>“The purpose of this letter is to provide a full endorsement of your newly developed video: “Beyond Lockdown – Preventing and Responding to Extreme School Violence.” Our National Board found the video to be professionally filmed using believable student actors and a very credible storyline. The FBINCAAA is proud to provide this endorsement and is willing to assist in its distribution to as many schools in all our Fifty (50) States, as well as in Puerto Rico and Guam.”</p>
      </div>
      <div class="col-md-1"></div>
    </div>
  </div>

  <!-- Courses Section -->
  <div id="courses" class="row row-title">
    <div class="container">
      <div class="text-center">
        <h1 style="color:#fff;">BEYOND LOCKDOWN COURSES</h1>
      </div>
    </div>
    <div class="row row-courses">
      <div class="col-md-1"></div>
      <div class="col-md-5">
        <div class="row">
          <div class="text-center">
            <h2 class="mt-5 mb-3">E-LEARNING</h2>
            <hr class="style-one">
            <p class="sec-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          </div>
        </div>
        <div class="wrapper">
        <?php include $abs_us_root.$us_url_root.'courses/ELearning/cards/ELearning_Card.php'; ?>
        </div>
      </div>
      <div class="col-md-5">
        <div class="row">
          <div class="text-center">
            <h2 class="mt-5 mb-3">VIDEO</h2>
            <hr class="style-one">
            <p class="sec-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          </div>
        </div>
        <div class="wrapper">
        <?php include $abs_us_root.$us_url_root.'courses/Video/cards/Video_Card.php'; ?>
        </div>
      </div>
      <div class="col-md-1"></div>
    </div>
  </div>


<?php  languageSwitcher();?>
<!-- Place any per-page javascript here -->
<?php require_once $abs_us_root . $us_url_root . 'users/includes/html_footer.php'; ?>
