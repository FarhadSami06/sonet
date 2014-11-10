	<?php
	
	require_once 'backend/user_functions.php';
	
	$login_fail = '';
	if (isset($_POST['log_username']) AND isset($_POST['log_password'])) {
		$result = login_user($_POST['log_username'], $_POST['log_password']);
		if (is_array($result)) {
			header('Location: home.php');
		}else {
			$login_fail = 'Invalid username or password';
		}
	}
	
	
	?>
	
<!DOCTYPE html>
<html>
	<head><title>SoneT</title>	
	<link href="css/mystyle.css" rel="stylesheet" />
	<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
	</head>
	<body>
		<div class="layout-container">
			
			<div class="main-container">
				<h1 id="logo">s<span class="logo-style">one</span>t</h1>
				<h2 id="slogan">Get in touch</h2>
				<div class="login-form">
					
					<form method="post" id="log-form">
						<input type="text" name="log_username" placeholder="Username" />
						<input type="password" name="log_password" placeholder="Password" />
						<button type="submit">Log in</button>
					</form>
				
				</div>
			
				<?php echo $login_fail; ?>
				<div class="reg-form">
					<h2>Sign Up</h2>
					<form method="post" id="reg_form">
						
						<input type="text" name="userName" id="user_Name" placeholder="Username"  />
						
						<input type="password" name="password" id="pass_word" placeholder="Password" />
					
						<input type="text" name="email" id="e_mail" placeholder="Email" />
						<button class="btn btn-default" type="submit">
							Submit
						</button>
				</div>
			</div>
			<div class="content">
				<h1>Get in touch with all your friends through any Social Network</h1>
			</div>
			<div class="footer-container">
				<p>SoMe &copy; 2014</p>
				<ul class="footer-list">
					<li><a href="aboutus.php">About Us</a></li>
					<li><a href="contactus.php">Contact Us</a></li>
					<li><a href="blog.php">Blog</a></li>
				</ul>
			</div>
		</div>
		<script>
			$(function() {
				// Handle the submit event by validating our fields first
				$('#reg_form').submit(function() {
					var nameValidate = /^[A-Za-z0-9]{6,20}$/;
					var mailValidate = /^[A-Za-z0-9_\.]+@[A-Za-z0-9]+\.[a-z]{2,4}$/;
					var passValidate = /^[A-Za-z0-9]{6,12}$/;
					var caps = /[A-Z]+/;
					var nums = /[0-9]+/;
					var username = $('#user_Name').val();
					var email = $('#e_mail').val();
					var password = $('#pass_word').val();

					if (!nameValidate.test(username)) {
						alert('Username is invalid. Username must contain a minimum of 6 characters');
						return false;
					}
					if (!caps.test(password)) {
						alert('Password must contain one capitalized letter.');
						return false;
					}
					if (!nums.test(password)) {
						alert('Password must contain one number');
					}
					if (!passValidate.test(password)) {
						alert('Password must contain a minimum of 6 characters and a maximum of 12 characters');
						return false;
					}
					if (!mailValidate.test(email)) {
						alert('Email provided is not a valid email');
						return false;
					}
					// AJAX call
					var data = {
						'userName' : username,
						'password' : password,
						'email' : email
					}
					$.post('/ajax/registration.php', data, 
					function(response) {
						if (response == 1){
						window.location = "new_user_setup.php";
						
						//var div = $('<div>')
						//.html ('Account registration successful');
					}else {
						var div = $('<div>')
						.html(response);
					}
						$('.main-container').html(div);					
					}
					
					);
					return false;
				});
			});

		</script>
	</body>
</html>