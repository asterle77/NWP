<!doctype html>
<html lang="hr">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<meta name="description" content="site">
		<meta name="keywords" content="site">
		<meta name="author" content="Ante Šterle">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Help for tourists</title>
		<link rel="shortcut icon" type="image/png" href="images/favico.png">
		<link href="style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
	<header>
		<div class="navigation">
		<a href="index.html"><img src="images/banner.png" alt="Banner"></a>
		<nav>
			<ul>
				<li><a href="index.html">Home</a></li>
				<li><a href="news.html">News</a></li>
				<li><a href="contact.html">Contact</a></li>
				<li><a href="tourism.html">Tourism</a></li>
				<li><a href="gallery.html">Gallery</a></li>
			</ul>
		</nav>
		</div>
	</header>
	<main>
		<div class="form">
		<form action="skripta.php" method="get">
		<span>Enter value in HRK :</span> <input type="text" name="input"/>
		<span>Select Currency :</span> 
		<select name="dropdown">
		<option value="usd">Us Dollar</option>
		<option value="ero">Euro</option>
		<option value="gbp">British Pound</option>
		</select>
		<input type="submit" name="sbmt" value="Convert" />
		</form>
		</div>
	</main>
	<div class="footer">
	<footer><p>Copyright &copy; 2019 Ante Šterle.</p> 
	</footer>
	</div>
	</body>
</html>