<?php
$db = DB::getInstance();
$query = $db->query("SELECT * FROM email");
$results = $query->first();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
</head>
<body>
  <p>Hello <?=$fname . " " . $lname?>,</p>
  <p>Welcome to CPPS University!</p>
  <p><?=lang("EML_AC_HAS")?></p>
  <p><label>Your username is:</label><?=$username?></p>
  <p><label>Your temporary password is:</label><?=$password?></p>
  <p><?=lang("EML_REC");?></p>
</p>

</body>
</html>
