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
  fputcsv($output, array('Name', 'Email', 'Last-Sign-In', 'T2M1', 'T2M2', 'T2M3', 'T2M4', 'T2M5', 'T2Quiz', 'T3M1', 'T3M2', 'T3M3', 'T3Quiz'));

  //Run Query
  $db = DB::getInstance();
  $query = $db->query("SELECT * FROM users WHERE id IN (SELECT user_id FROM user_permission_matches WHERE permission_id = 1)");
  $userData = $query->results();

  // Loop through query and to convert 0's and 1's into complete / incomplete statements for CSV
  foreach ($userData as $person) {

    if($person->complete_t2m1==0){
      $t2m1 = "Incomplete";
    }else {
      $t2m1 = "Complete";
    }

    if($person->complete_t2m2==0){
      $t2m2 = "Incomplete";
    }else {
      $t2m2 = "Complete";
    }

    if($person->complete_t2m3==0){
      $t2m3 = "Incomplete";
    }else {
      $t2m3 = "Complete";
    }

    if($person->complete_t2m4==0){
      $t2m4 = "Incomplete";
    }else {
      $t2m4 = "Complete";
    }

    if($person->complete_t2m5==0){
      $t2m5 = "Incomplete";
    }else {
      $t2m5 = "Complete";
    }

    if($person->complete_t2quiz==0){
      $t2quiz = "Incomplete";
    }else {
      $t2quiz = "Complete";
    }

    if($person->complete_t3m1==0){
      $t3m1 = "Incomplete";
    }else {
      $t3m1 = "Complete";
    }

    if($person->complete_t3m2==0){
      $t3m2 = "Incomplete";
    }else {
      $t3m2 = "Complete";
    }

    if($person->complete_t3m3==0){
      $t3m3 = "Incomplete";
    }else {
      $t3m3 = "Complete";
    }

    if($person->complete_t3quiz==0){
      $t3quiz = "Incomplete";
    }else {
      $t3quiz = "Complete";
    }


    fputcsv($output, array($person->fname . " " . $person->lname, $person->email, $person->last_login, $t2m1, $t2m2, $t2m3, $t2m4, $t2m5, $t2quiz, $t3m1, $t3m2, $t3m3, $t3quiz));
  }

  fclose($output);

  //Set Download Data
  header("Content-Description: File Transfer");
  header("Content-Disposition: attachment; filename=".$filename);
  header("Content-Type: application/csv; ");
}

?>
