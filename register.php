#!/usr/local/bin/php
<?php
$database = "ucCurrency.db";
try {
  $db = new SQLite3($database);
}
catch (Exception $exception) {
    echo '<p>There was an error connecting to the database!</p>';
    if ($db){echo $exception->getMessage();}
}

$table = "bruins";
$field1 = "sid";
$field2 = "username";
$field3 = "password";

$sql= "CREATE TABLE IF NOT EXISTS $table (
$field1 int(9),
$field2 varchar(100),
$field3 varchar(100)
)";
$result = $db->query($sql);

$SID = $_POST['SID'];
$username = $_POST['username'];
$password = $_POST['password'];


$sql = "SELECT * FROM $table";
$result = $db->query($sql);

$users = array(); 

while($record = $result->fetchArray()) {
  $users[$record["sid"]] = $record["password"];
}

$taken = false; 
foreach($users as $key => $value){
  if($SID == $key) {
    $taken = true;
  }
}
if ($taken == true) {
  die("Nope.");
}

else {
  $sql = "INSERT INTO $table ($field1, $field2, $field3) VALUES ($SID, '$username', '$password')";
  $result = $db->query($sql);
  
  setcookie("current_user", $username, time()+31557600);
  setcookie("userID", $SID, time()+31557600);

  header("Location: http://pic.ucla.edu/~connorvhennen/final_project/uc_currency.php");
}
?>