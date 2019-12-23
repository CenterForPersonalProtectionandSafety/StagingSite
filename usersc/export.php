<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once '../users/init.php';

if (!securePage($_SERVER['PHP_SELF'])){die();}

if(isset($_POST["Export"])){

  $filename = "UserData" . date('Y-m-d') . ".csv";
  $output = fopen("php://output", "w");

  //Set Headers of Columns
  fputcsv($output, array('Name', 'Email', 'Last-Sign-In', 'OAE', 'OS', 'OTT'));

  //Run Query
  $db = DB::getInstance();
  $query = $db->query("SELECT * FROM users WHERE id IN (SELECT user_id FROM user_permission_matches WHERE permission_id = 1)");
  $userData = $query->results();

  // Loop through query and to convert 0's and 1's into complete / incomplete statements for CSV
  foreach ($userData as $person) {

    if($person->complete_oae==0){
      $oae = "Incomplete";
    }else {
      $oae = "Complete";
    }

    if($person->complete_os==0){
      $os = "Incomplete";
    }else {
      $os = "Complete";
    }

    if($person->complete_ott==0){
      $ott = "Incomplete";
    }else {
      $ott = "Complete";
    }


    fputcsv($output, array($person->fname . " " . $person->lname, $person->email, $person->last_login, $oae, $os, $ott));
  }

  fclose($output);

  //Set Download Data
  header("Content-Description: File Transfer");
  header("Content-Disposition: attachment; filename=".$filename);
  header("Content-Type: application/csv; ");
}

?>
