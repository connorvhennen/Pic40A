<?php
include 'items.php';
// $database = "postings.db";

function listPosts(){
// include 'items.php';
//$database = "postings.db";
// try {$db = new SQLite3($database);}
// catch (Exception $exception) {
//     echo '<p>There was an error connecting to the database!</p>';
//     if ($db){echo $exception->getMessage();}
// }
//$db = "postings.db";
GLOBAL $db;
$table = "posts";
$sql = "SELECT * FROM posts";



$result = $db -> query($sql);
$itemList = $result -> fetchArray();
// $username = $record[$field1];
//     $itemname = $record[$field2];
//     $itemdescription = $record[$field3];
//     $OFFER = $record[$field4];
//     $notes
 if($itemList) {
    echo "<ol>\n";   
    do {
      $username = $itemList["username"];
      $itemname = $itemList["itemname"];
      $itemdescription = $itemList["itemdescription"];
      $OFFER = $itemList["offer"];
      $notes = $itemList["notes"];
      //$dateattime = $myposts["dateattime"];
	  
	  //$datetime_string=date("l F j Y at h:i", $dateattime);
	  
      echo "<li>";
      echo "Requested by: $username";
      echo "<form class='deletepost' onsubmit='return confirm(\"Are you sure you wish to make this transaction?\");' action='". $_SERVER['PHP_SELF'] . "' method='post'>";    
      echo "<p><input name='deleteMessage' type='submit' value='Fulfill Request' />";
	  //echo "<input type='hidden' name='username' value='$theusername' />";
      echo "<input name='postid' type='hidden' value='$itemdescription'/></p></form>";
      echo "<p>Item name: $itemname</p>";
      echo "<p>Item Description: $itemdescription</p>";
      echo "<p>Tokens offered: $OFFER</p>";
      echo "<p>Special notes: $notes</p>";
      echo "</li>\n";
    } while ($itemList = $result->fetchArray());
    echo "</ol>";
  }
  else{
  	echo "<p>Nothing for sale here.</p>";
  }
}

function deletePost($id){
// $database = "postings.db";


// try {$db = new SQLite3($database);}
// catch (Exception $exception) {
//     echo '<p>There was an error connecting to the database!</p>';
//     if ($db){echo $exception->getMessage();}


// }

GLOBAL $db;
$table = "posts";
//$sql = "SELECT * FROM posts";

$sql = "DELETE FROM posts where itemdescription='$id'";
$result = $db -> query($sql);

  if (!$result) {
    $message = "Failed to delete a post.";

  }
  else {
    $message = "Successfully deleted post $id.";
  }
  //header("location:ucCurrency.php");
}




?>