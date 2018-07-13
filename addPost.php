#!/usr/local/bin/php
<?php
include 'items.php';
#$database = "postings.db";
// try {
//   $db = new SQLite3($database);
// }
// catch (Exception $exception) {
//     echo '<p>There was an error connecting to the database!</p>';
//     if ($db){
//       echo $exception->getMessage();
//     }
// }
$username = $_POST['username'];
$itemname = $_POST['itemname'];
$itemdescription = $_POST['itemdescription'];
$OFFER = $_POST['OFFER'];
$notes = $_POST['notes'];

$database = "postings.db";

$table = "posts";

$field1 = "username";
$field2 = "itemname";
$field3 = "itemdescription";
$field4 = "offer";
$field5 = "notes";

try {
  $db = new SQLite3($database);
}
catch (Exception $exception) {
    echo '<p>There was an error connecting to the database!</p>';
    if ($db){
      echo $exception->getMessage();
    }
}

// $sql= "CREATE TABLE IF NOT EXISTS $table (
// $field1 varchar(100),
// $field2 varchar(100),
// $field3 varchar(500),
// $field4 int(9),
// $field5 varchar(500)
// )";

// CREATE TABLE IF NOT EXISTS posts (
// $field1 varchar(100),
// $field2 varchar(100),
// $field3 varchar(500),
// $field4 int(9),
// $field5 varchar(500)
// )";
// $result = $db->query($sql);



// $sql = "SELECT * FROM $table";
// $result = $db->query($sql);

//$users = array(); 

// while($record = $result->fetchArray()) {
//    $users[$record["username"]] = $record["itemname"];
// }

// $taken = false; 
// foreach($users as $key => $value){
//   if($SID == $key) {
//     $taken = true;
//   }
// }
// if ($taken == true) {
//   die("Must input unique student ID.");
// }

// else {
$sql = "INSERT INTO $table ($field1, $field2, $field3, $field4, $field5) VALUES ('$username', '$itemname', '$itemdescription', '$OFFER', '$notes')";
$result = $db->query($sql);
  
  //setcookie("current_user", $username, time()+31557600);
    /*;"tokens", $usertokens, time()+31557600);*/
  // setcookie("tokens", $usertokens, time()+31557600);
  //setcookie("current_user", $SID, time()+31557600);
  // header("Location: http://pic.ucla.edu/~connorvhennen/final_project/thanks.php");
//getItems();
header("Location: ucCurrency.php");


?>



