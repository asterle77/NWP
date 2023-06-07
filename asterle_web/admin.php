<?php 
	if ($_SESSION['user']['valid'] == 'true') {
		if (!isset($action)) { $action = 1; }
		print '
		<h1 style="margin-left:50px">Administration</h1>
		<div id="admin">
			<ul>';
				if($_SESSION['user']['role'] == 1){
				print'
				<li><a href="index.php?menu=6&amp;action=1">Users</a></li>';
				}
			print'<li><a href="index.php?menu=6&amp;action=2">News</a></li>	
			</ul>';
			# Admin Users
			if ($action == 1) { include("admin_users.php"); }
			
			# Admin News
			else if ($action == 2) { include("admin_news.php"); }
		print '
		</div>';
	}
	else {
		$_SESSION['message'] = '<p>Not logged in.</p>';
		header("Location: index.php?menu=5");
	}
?>