<?php 
session_start();
include ('addUser.php');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" />
<head>
	<title>The Practical Student</title>
	<meta charset="utf-8" />
	<link type="text/css" rel="stylesheet" href="style.css" />
	<script type="text/javascript" src="checkSearch.js"></script>
	<script type="text/javascript" src="checkRegistration.js"></script>
	<link rel="stylesheet" type="text/css" href="form-style.css">
	<meta>
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
		<div class="form-box">
			<h1>Regsiter</h1>
			<form id="register" action="" method="post" onsubmit="return checkRegistration(this)">
				<input type="text" placeholder="First Name" name="firstname" id="firstname" maxlength="20" /><br />
				<input type="text" placeholder="Last Name" name="lastname" id="lastname" maxlength="30" /><br />
				<input type="email" placeholder="Email" name="email" id="email" maxlength="50" /><br />
				<input type="text" placeholder="Username" name="username" id="username" maxlength="25" /><br />
				<span><?php echo $error; ?></span>
				<input type="password" placeholder="Password" name="password" id="password" maxlength="100" /><br />
				<input type="password" placeholder="Confirm Password" name="confirmpassword" id="confirmpassword" /><br />
				<input type="submit" name="submit" value="Submit" />
			</form>
		</div>

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