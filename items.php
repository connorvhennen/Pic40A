<?php
include 'datetime.php';
//connects to the database and prints all events in divs

$database = "postings.db";
try {$db = new SQLite3($database);}
catch (Exception $exception) {
    echo '<p>There was an error connecting to the database!</p>';
    if ($db){echo $exception->getMessage();}
  }

function getItems() {
  // $database = "postings.db";
  GLOBAL $db;
  $table = "posts";
  $field1 = "username";
  $field2 = "itemname";
  $field3 = "itemdescription";
  $field4 = "offer";
  $field5 = "notes";

  //$username = $_COOKIE["current_user"];
  // try {$db = new SQLite3($database);}
  // catch (Exception $exception) {
  //   echo '<p>There was an error connecting to the database!</p>';
  //   if ($db){echo $exception->getMessage();}
  // }
  $sql = "SELECT * FROM $table";
  $result = $db->query($sql);
  $posts = array(); //an array of timestamps, events, and ids that will be sorted and outputted
  while($record = $result->fetchArray()) {
    $username = $record[$field1];
    $itemname = $record[$field2];
    $itemdescription = $record[$field3];
    $OFFER = $record[$field4];
    $notes = $record[$field5];
    array_push($posts, array($username, $itemname, $itemdescription,$OFFER,$notes));
  }
  // function compare($a, $b) {
  //   if ($a[0] == $b[0]) {
  //       return 0;
  //   }
  //   else if ($a[0] < $b[0]) {
  //     return -1;
  //   }
  //   else {
  //     return 1;
  //   }
  // }
  // // usort($posts, "compare");
  $j = 0;
  foreach($posts as $i) {
    $j = $j + 1;
    print "<div class='item-post'>";
    print "<div class='item-user'>" . "User posting: " . $i[0] . "</div>";
    print "<div class='item-name'>" . "Item Name: " . $i[1] . "</div>";
    print "<div class='item-description'>" . "Item Description: " . $i[2] . "</div>";
    print "<div class='item-offer'>" . "Tokens Offered: " . $i[3] . "</div>";
    print "<div class='item-notes'>" . "Special Notes: " . $i[4] . "</div>";
    print "<a href = 'http://pic.ucla.edu/~connorvhennen/final_project/viewPost.php' id = 'itemLink'>" . "Click to begin fulfilling posts!" . "</a>";
    //print "<div class='event-delete'>x</div>";
    print "</div>";
  }

    // usort($posts, "compare");
  // foreach($posts as $i) {
  //   print "<div class='item-post'>";
  //   print "<div class='item-user'>" . $i[0] . "</div>";
  //   print "<div class='item-name'>" . $i[1] . "</div>";
  //   print "<div class='item-description'>" . $i[2] . "</div>";
  //   print "<div class='item-offer'>" . $i[3] . "</div>";
  //   print "<div class='item-notes'>" . $i[4] . "</div>";
  //   //print "<a href = #>" . "Click to fulfill" . "</a>";
  //   //print "<div class='event-delete'>x</div>";
  //   print "</div>";
  // }

}

// function onclick(){
// include 'items.php';
// $database = "postings.db";
// $table = "posts";

// $itemdescription = $_GET["id"];

// try {$db = new SQLite3($database);}
// catch (Exception $exception) {
//      echo '<p>There was an error connecting to the database!</p>';
//     if ($db){echo $exception->getMessage();}
// }
// $sql = "DELETE FROM $table WHERE itemdescription='$itemdescription'";
// $result = $db->query($sql);

// getItems();




// }
// $('.button').onclick(function() {
// include 'items.php';
// $database = "postings.db";
// $table = "posts";

// $itemdescription = $_GET["id"];

// try {$db = new SQLite3($database);}
// catch (Exception $exception) {
//     echo '<p>There was an error connecting to the database!</p>';
//     if ($db){echo $exception->getMessage();}
// }
// $sql = "DELETE FROM $table WHERE itemdescription='$itemdescription'";
// $result = $db->query($sql);

// getItems();

//}




?>