<html>
	<head>
		<title>New User</title>	
	
		<link href="css/mystyle.css" rel="stylesheet" />
		<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	</head>
	<style>
		.header-container {
			width: 100%;
			height: 100px;
			background-color: #351212;
			border-bottom:3px solid #ffffff;
		}
		#welcome {
			background-color: #ffffff;
			padding: 25px;
			display: inline-block;
			border-radius: 4px;
			font-family:Krungthep;
			position: absolute;
			top: 30px;
			left: 50px;	
		}
		.setup-container {
			width: 100%;
			height: 100%;
			background-image: linear-gradient(#351212, #512424, #512424)
		}
		#user-image {
			color: #ffffff;
			font-size: 200px;
			position: absolute;
			top: 50%;
			left: 15%;
			border: 1px solid #ffffff;
			padding: 20px;
			border-radius: 100px;
		}
		
	</style>
	
	
	<body>
		<div class="layout-container">
			<div class="header-container">
				<h1 id="welcome" >Welcome to Sonet</h1>
			</div>
			<div class="setup-container">
				<i id="user-image" class="fa fa-user"></i>
				
			</div>
		</div>
	</body>
</html>