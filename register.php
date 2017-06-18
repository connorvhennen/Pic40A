#!/usr/local/bin/php
<?php
//get data from form
$username = $_POST['username'];
$password = $_POST['password'];
$studentID = $_POST['studentID']



$database = "uc_currency.db";
$table = "users";

try {$db = new SQLite3($database);}
catch (Exception $exception) {
    echo '<p>There was an error connecting to the database!</p>';
    if ($db){echo $exception->getMessage();}
}

$sql = "SELECT * FROM $table";

$result = $db->query($sql);

$users = array(); 

while($record = $result->fetchArray()) {
  $all_users[$record["studentID"]] = $record["password"];
}
$taken = false; //will be set to true if the given username is taken
//iterate through all users to check if the given username is taken
foreach($users as $key => $value){
  if($studentID == $key) {
    $taken = true;
  }
}
if ($taken == true) {
  echo "Must input a unique student ID.";
}
else {
  $sql = "INSERT INTO $table (studentID, username, password) VALUES ('$studentID', $username', '$password')";
  $result = $db->query($sql);
  setcookie("current_user", $username, time()+31557600);
  header("Location: http://pic.ucla.edu/~connorvhennen/final_project/uc_currency.php");
}
?>