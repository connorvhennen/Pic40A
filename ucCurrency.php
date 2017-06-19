#!/usr/local/bin/php
<?php
print '<?xml version = "1.0" encoding="utf-8"?>';
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
			document.getElementById("userProfile").innerHTML = "Hi " + username + "!";
		}
		// else {
		// 	//user is not logged in, redirect to home
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

	</script>
<body onload = "checkLogin()">

    <div id="userUI">
        <div id="userUIbar">
            <ul id="sidebarUnlist">
            	<li>
                    <ul id="userProfile">
                        Profile
                    </ul>
                 </li>
                <li>
                    <ul id = "userCash">
                    	Token
                    </ul>
                </li>
                <li>
                    <a href="#">View Postings</a>
                </li>
                <li>
                    <a href="#">Add Posting</a>
                </li>
                <li>
                    <a href="#">Build your Portfolio</a>
                </li>
            </ul>
        </div>

    </div>

</body>

</html>