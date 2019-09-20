<?php
/*
Retrieve bookmark time
*/

//it grabs the init file, wherever it is located relative to the parser file itself
require_once '../users/init.php';
//it instantiates the DB
$db = DB::getInstance();
$user_id = $user->data()->id;


//get bookmark
$myvalue = $user->data()->t2m1_bookmark;
return $myvalue;

//save bookmark
//$myvalue = Input::get('mybookmark');
//$db->update('users',$user_id,['bookmark'=>$myvalue]);

//a response is sent
//$response = ['success'=>true];
//echo json_encode($response);
//die;

?>
