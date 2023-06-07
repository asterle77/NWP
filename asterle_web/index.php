<?php
session_start();

include ("dbconnection.php");
if(isset($_GET['menu'])) { $menu   = (int)$_GET['menu']; }
if(isset($_GET['action'])) { $action   = (int)$_GET['action']; }
if(!isset($_POST['_action_']))  { $_POST['_action_'] = FALSE;  }

if (!isset($menu)) { $menu=1; }

include_once("function.php");
error_reporting(E_ALL ^ E_WARNING);





print'
<!doctype html>
<html lang="hr">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<meta name="description" content="site">
		<meta name="keywords" content="site">
		<meta name="author" content="Ante Šterle">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>SK Portal</title>
		<link rel="shortcut icon" type="image/png" href="images/favico.png">
		<link rel="stylesheet" href="style.css" type="text/css">
	</head>
	<body>	
	<header>
		<div class="navigation">
		'; if ($_GET['menu'] > 1) { print '<img src="images/banner_2.png" width="100%" alt="Banner">'; } else { print '<img src="images/banner.png" width="100%" alt="Banner">'; }  print '
		<nav>
			<ul>
				<li><a href="index.php?menu=1">Home</a></li>
				<li><a href="index.php?menu=2">News</a></li>
				<li><a href="index.php?menu=3">Contact</a></li>
				<li><a href="index.php?menu=8">Gallery</a></li>
				<li><a href="index.php?menu=7">Weather</a></li>';
				if (!isset($_SESSION['user']['valid']) || $_SESSION['user']['valid'] == 'false') {
					print '
					<li><a href="index.php?menu=4">Register</a></li>
					<li><a href="index.php?menu=5">Sign In</a></li>';
				}
				else if ($_SESSION['user']['valid'] == 'true') {
					print '
					<li><a href="index.php?menu=6">Admin</a></li>
					<li><a href="sign_out.php">Sign Out</a></li>';
				} print'
					
			</ul>
		</nav>
		</div>
	</header>	
	<main>';
	print '<div>';
		if (isset($_SESSION['message'])) {
			print $_SESSION['message'];
			unset($_SESSION['message']);
		}
		# home
		if (!isset($_GET['menu']) || $_GET['menu'] == 1) { include("home.php"); }
		
		# news
		else if ($_GET['menu'] == 2) { include("news.php"); }
		
		# contact
		else if ($_GET['menu'] == 3) { include("contact.php"); }
		
		# registration
		else if ($_GET['menu'] == 4) {print '<div class="form">'; include("registration.php"); print'</div>';}

		# sign in
		else if ($_GET['menu'] == 5) { include("sign_in.php"); }

		# admin		
		else if ($_GET['menu'] == 6) { print '<div class="admin">'; include("admin.php"); print'</div>'; }
		
		#weather
		else if ($_GET['menu'] == 7) { include("weather.php");}
		
		#gallery
		else if ($_GET['menu'] == 8) { include("gallery.php");} print'
	
	</main>
	<div class="footer">
	<footer><p>Copyright &copy; 2023 Ante Šterle</p>
	</footer>
	</div>
	</body>
</html>';