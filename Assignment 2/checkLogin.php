<?php
	//starting the session
	session_start();

	if (isset($_POST['submit'])) {
		//get the variables and clean them
		$username = $_POST['username'];
		$password = $_POST['password'];
		$username = stripslashes($username);
		$password = stripslashes($password);

		//connect to the database
		$host = "localhost";
	    $user = "X32720502";
	    $password = "X32720502";
	    $dbc = mysql_pconnect($host, $user, $password);
	    $dbname = "X32720502";
	    mysql_select_db($dbname) or die("Cannot connect to database ".mysql_error());

	    //construct a query where we look in USERS for a row that has the matching username and passowrd
	    $query = mysql_query("SELECT * FROM USERS WHERE Username='".$username."' AND Password='".$password."';");

	    //gather the number of rows in the result.
	    //if there is one and only one match, log the user in
	    $rows = mysql_num_rows($query);
	    if ($rows == 1) {
	    	//initialize session with the username
	    	$_SESSION['login-user'] = $username;
	    	header("location: profile.php");
	    } else if ($rows > 1) {
	    	$error = "More than one match in database; please contact admin.";
	    } else {
	    	$error = "Username or password is invalid";
	    }
	    mysql_close();
	}
?>