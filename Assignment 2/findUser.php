<?php
session_start();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" />
<head>
	<title>The Practical Student</title>
	<meta charset="utf-8" />
	<link type="text/css" rel="stylesheet" href="style.css" />
	<script type="text/javascript" src="checkSearch.js"></script>
	<link rel="stylesheet" type="text/css" href="form-style.css">
</head>
<body>
	<header>
		<div id="Logo">
		</div>
		<nav>
			<div id="general-nav">
				<ul>
					<div id="float-left">
						<form action="search.php" method="get" onsubmit="return checkSearch(this)" name="search-box">
							<li><a href="index.php">Home</a></li>
							<div class="search-box">
								<input type="text" id="searchtext" name="searchtext" value="<?php echo $_SESSION['prevsearch'];?>" />
								<input type="submit" id="submit" value="Search" name="searchbutton" />
							</div>
						</form>
					</div>
					<div id="float-right">
						<li><a href="register.php">Register</a></li>
						<li id="sign-in"><a href="login.php">Sign In</a></li>
						<li><a href="cart.php">Cart</a></li>
						<li><a href="help.php">Help</a></li>
					</div>
				</ul>
			</div>
			<div id="product-nav">
				<ul>
					<li><a href="search.php?searchtext=&searchbutton=Search">All Products</a></li>
					<li><a href="search.php?searchtext=notelook">Notelooks</a></li>
					<li><a href="search.php?searchtext=writing">Writing</a></li>
					<li><a href="search.php?searchtext=bag">Backpacks</a></li>
					<li><a href="search.php?searchtext=organization">Organization</a></li>
					<li><a href="search.php?searchtext=planner">Planners</a></li>
				</ul>
			</div>
		</nav>
	</header>

	<div id="content">
		<?php 
			$username = $_GET['username'];

			$host = "localhost";
		    $user = "X32720502";
		    $password = "X32720502";
		    $dbc = mysql_pconnect($host, $user, $password);
		    $dbname = "X32720502";
		    mysql_select_db($dbname) or die("Cannot connect to database ".mysql_error());

		    //construct the query string
		    $query = "SELECT * FROM USERS WHERE Username='".$username."';";
		    $result = mysql_query($query);
			

			if (mysql_num_rows($result) == 0) {
		    	print "User does not exist in database.";
		    } else {
				print "<div class=\"form-box\">
					<h1>View User</h1>";
				while ($row = mysql_fetch_array($result)) {
					print "<form>
					First Name<input type=\"text\" value=\"".$row['FirstName']."\" name=\"firstname\" id=\"firstname\" readonly /><br />
					Last Name<input type=\"text\" value=\"".$row['LastName']."\" name=\"lastname\" id=\"lastname\" readonly /><br />
					Email <input type=\"email\" value=\"".$row['Email']."\" name=\"email\" id=\"email\" readonly /><br />
					Address Line 1 <input type=\"text\" value=\"".$row['AddressLine1']."\" name=\"addressline1\" id=\"addressline1\" readonly /><br />
					Address Line 2 <input type=\"text\" value=\"".$row['AddressLine2']."\" name=\"addressline2\" id=\"addressline2\" readonly /><br />
					City <input type=\"text\" value=\"".$row['City']."\" name=\"city\" id=\"city\" readonly /><br />
					State <input type=\"text\" value=\"".$row['State']."\" name=\"state\" id=\"state\" readonly /><br />
					Zipcode <input type=\"text\" value=\"".$row['Zip']."\" name=\"zip\" id=\"zip\" readonly /><br />
					Username <input type=\"text\" value=\"".$row['Username']."\" name=\"username\" id=\"username\" readonly /><br />
					Password <input type=\"text\" value=\"".$row['Password']."\" name=\"password\" id=\"password\" readonly /><br />
					</form>";
				}
				print "</form>";
			}
			mysql_close();
		?>
	</div>

	<footer>
		<ul>
			<li><a href="about.php">About</a></li>
			<li><a href="contact.php">Contact</a></li>
			<li><a href="http://practicalstudent.tumblr.com/">Follow</a></li>
		</ul>
	</footer>
</body>
</html>