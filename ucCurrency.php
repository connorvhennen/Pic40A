#!/usr/local/bin/php
<?php
print '<?xml version = "1.0" encoding="utf-8"?>'
// include 'register.php';
// 	     $database = "ucCurrency.db"; 
// 	     $table = "bruins";
// 	     $tokenCount = $_GET["username"];  
	      					// $db = new SQLite3($database);
	      					// $result = $db->query($sql);       				
	           //          	$sql = "SELECT * FROM $table";
	           //          	$result = $db->query($sql); 
		//print "<p>You have " . '$tokenCount' . " tokens</p>\n";;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
xmlns:v="urn:schemas-microsoft-com:vml">
<head>
	<title>ucCurrency</title>
	<link rel="stylesheet" type="text/css" href="ucCurrency.css" />

</head>
	<script type="text/javascript">


	function checkLogin() {
		

		var username = getCookieValueFor("current_user");
		if (username.length > 0) {
			//user is logged in
			document.getElementById("loggedUser").innerHTML = "Hi " + username + "!";
		}
		// else {
		// 	window.location = "http://pic.ucla.edu/~connorvhennen/final_project/welcome.html";
		// }

			//user is logged in
		// else {
		// 	//user is not logged in, redirect to home
		// 	window.location = "http://pic.ucla.edu/~connorvhennen/final_project/welcome.html";
		// }

	}



	function getCookieValueFor(key) {

		var keyvals = document.cookie.split(";");
		var keys = [];
		var vals = [];
		for (var i = 0; i < keyvals.length; i++) {
			var arr = keyvals[i].split("=");
			if (arr[0] == key) {
				return arr[1];
			}
		}
		return "";
	}
	function logout() {
		window.location = "http://pic.ucla.edu/~connorvhennen/final_project/welcome.html";
	}

	// function deleteItem(obj) {
	// 	var xhr = new XMLHttpRequest();
	// 	xhr.onreadystatechange = function () {
	// 	if (xhr.readyState == 4 && xhr.status == 200) {
	// 	 		var result = xhr.responseText;
	// 	// 		display_result(result);
	// 	 	}
	// 	 }
	// 	xhr.open("GET", "http://pic.ucla.edu/~connorvhennen/final_project/buyitem.php?id=" + ,true);
	// 	xhr.send(null);
	// }

	</script>
<body onload = "checkLogin()">

    <div id="userUI">
        <div id="userUIbar">
            <ul id="sidebarUnlist">
            	<li>
                    <ul class="userProfile" id = "loggedUser">
                        Profile
                    </ul>
                 </li>
<!--                 <li>
                    <ul id = "userCash">
                    	<?php
                    	//print "<p>You have " . "$tokenCount" . " tokens</p>\n";
                    	?>

                    </ul>
                </li> -->
                <li>
                    <a href="http://pic.ucla.edu/~connorvhennen/final_project/viewPost.php">View Postings</a>
                </li>
                <li>
                    <a href="http://pic.ucla.edu/~connorvhennen/final_project/addPost.html">Add Posting</a>
                </li>
                <li>
                    <a onclick = "logout()">Logout</a>
                </li>
            </ul>
        </div>
        
<!--         <div id = "pic2">
        </div> -->
        <div id = "itemlist">

        <?php
include 'items.php';

getItems();
?>
</div>
    </div>


</body>

</html>