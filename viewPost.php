#!/usr/local/bin/php
<?php
include 'postFunctions.php';
//include 'items.php';
listPosts();



if(isset($_POST["deleteMessage"])){
  //echo "alert('Post called to delete')";
  
  // Extract form submission
  $post_id = (isset($_POST["postid"]))?$_POST["postid"]:"";


  // delete post from database
  deletePost($post_id);
  //header("location:ucCurrency.php");
  //listPosts();
  //echo "alert('Post deleted')";
  //echo "$message";
  //echo "$post_id";
  // include member page
}
  //header("Location: http://pic.ucla.edu/~connorvhennen/final_project/ucCurrency.php");



?>

