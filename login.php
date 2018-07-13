#!/usr/local/bin/php
<?php
//get data from form
$username = $_POST['username'];
$password = $_POST['password'];
$database = "ucCurrency.db";
$table = "bruins";

try {$db = new SQLite3($database);}
catch (Exception $exception) {
    echo '<p>There was an error connecting to the database!</p>';
    if ($db){echo $exception->getMessage();}
}

$sql = "SELECT * FROM $table";

$result = $db->query($sql);

$all_users = array(); //will hold key value pairs of usernames and passwords
while($record = $result->fetchArray()) {
  $all_users[$record["username"]] = $record["password"];
}

$matched = false;

$usernamenotpass = false; //set to true if the username exists but password is incorrect
//iterate through all users to check if the given username is taken
foreach($all_users as $key => $value){
  if($username == $key) {
    if ($password == $value) {
      //correct username and password
      $matched = true;
    }
    else {
      //username exists but password is wrong
      $usernamenotpass = true;
    }
  }
}
if ($matched) {
  setcookie("current_user", $username, time()+2419200); //cookie that keeps track of login
  header("Location: ucCurrency.php");
}
else {
  if ($usernamenotpass) {
  print "<script type=\"text/javascript\">"; 
  print "alert('Username or password aren't correct!')"; 
  print "</script>";  
  }
  else {
  print "<script type=\"text/javascript\">"; 
  print "alert('Username or password aren't correct!')"; 
  print "</script>";  
  }
}
?>
