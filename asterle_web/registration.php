<?php
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE); 
	print '
	<h1>Registration Form</h1>
	<div id="registration">';
	
	if ($_POST['_action_'] == FALSE) {
		print '
		<form action="" class="registration_form" name="registration_form" method="POST">
			<input type="hidden" id="_action_" name="_action_" value="TRUE">
			
			<label for="fname">First Name </label>
			<input type="text" id="fname" name="firstname" placeholder=" First Name" required><br>
			<label for="lname">Last Name </label>
			<input type="text" id="lname" name="lastname" placeholder="Last Name" required><br>
				
			<label for="email">Your E-mail </label>
			<input type="email" id="email" name="email" placeholder="Email" required><br>
			
			<label for="username">Username: <small>(MIN 5 & MAX 10 characters)</small></label>
			<input type="text" id="username" name="username" pattern=".{5,10}" placeholder="Username" required><br>
			
									
			<label for="password">Password: <small>(MIN 4 char)</small></label>
			<input type="password" id="password" name="password" placeholder="Password" pattern=".{4,}" required><br>
			<label for="country">Country:</label>
			<select name="country" id="country">';				
				$query  = "SELECT * FROM countries";
				$result = @mysqli_query($MySQL, $query);
				while($row = @mysqli_fetch_array($result)) {
					print '<option value="' . $row['country_code'] . '">' . $row['country_name'] . '</option>';
				}
			print '
			</select><br>
			<input type="submit" value="Submit" class="reg_submit">
		</form>';
	}
	else if ($_POST['_action_'] == TRUE) {
		
		$query  = "SELECT * FROM users";
		$query .= " WHERE email='" .  $_POST['email'] . "'";
		$query .= " OR username='" .  $_POST['username'] . "'";
		$result = @mysqli_query($MySQL, $query);
		$row = @mysqli_fetch_array($result, MYSQLI_ASSOC);
		
		if ($row['email'] == '' || $row['username'] == '') {
			# password_hash https://secure.php.net/manual/en/function.password-hash.php
			# password_hash() creates a new password hash using a strong one-way hashing algorithm
			$pass_hash = password_hash($_POST['password'], PASSWORD_DEFAULT, ['cost' => 12]);
			
			$query  = "INSERT INTO users (firstname, lastname, email, username, password, country)";
			$query .= " VALUES ('" . $_POST['firstname'] . "', '" . $_POST['lastname'] . "', '" . $_POST['email'] . "', '" . $_POST['username'] . "', '" . $pass_hash . "', '" . $_POST['country'] . "')";
			$result = @mysqli_query($MySQL, $query);
			
			
			echo '<p> Registration complete. Sign in. </p>
			<hr>';
		}
		else {
			echo '<p>Username or email already in use! Try different one.</p>';
		}
	}
	print '
	</div>';
?>