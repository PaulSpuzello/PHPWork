<?php 
	session_cache_limiter('none');			//This prevents a Chrome error when using the back button to return to this page.
	session_start();
	$_SESSION['validUser'] = "no";

	if ($_SESSION['validUser'] == "yes")				
	{
		$message = "Welcome Back! ";	
	}
	else
	{
		if (isset($_POST['submitLogin']) )
		{
			$inUsername = $_POST['loginUsername'];
			$inPassword = $_POST['loginPassword'];
			
			include 'dbConnect.php';			
			
			$sql = "SELECT event_user_name, event_user_password FROM event_user WHERE event_user_name = :userName AND event_user_password = :password";
			
			$stmt = $conn->prepare($sql);
			
			$stmt->bindParam(':userName', $inUsername);
			$stmt->bindParam(':password', $inPassword);
			
			$stmt->execute();
			
			$row = $stmt->rowCount();
			
			if ($row == 1)	
			{
				$_SESSION['validUser'] = "yes";				
				$message = "Welcome Back! $inUsername";
				echo($message);
			}
			else
			{
				$_SESSION['validUser'] = "no";					
				$message = "Sorry, there was a problem with your username or password. Please try again.";
				echo($message);
			}	 	
		}

	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="css/Adventure.css">

		<style type = "text/css">

		@media only screen and (max-width: 600px) {
		  body {
			height: 100%;
			width:100%
		  }
		}

		p::first-line{
			font-weight :bold;
		}
		.container{
			width:40%;
			border-width:1px;
			margin:20px auto;
			border-radius:5px;
		}
		.loginBackground {
			background-color: LimeGreen;
			text-align:center;
			border-bottom-left-radius: 5px;
			border-bottom-right-radius: 5px;
			padding: 20px;
		}
		h4 {
			font-family: 'Alfa Slab One';
		}
		h3 {
			font-family: 'Alfa Slab One';
		}
		p  {
			font-family: 'Aclonica';
		}
		</style>
	</head>
	<header>
		<img class="roundBorder" src="adventure_travel_project/images/banner.jpg" width="100%" height="400" alt="Company Banner"/>
		<h1>Adventure Travel Admin Login</h1>
	</header>
	<body>
		<h2>Login Page</h2>
		<?php
			if ($_SESSION['validUser'] == "yes")
			{
		?>
		<div class="container">
			<div class="color">
				<div class="loginBackground">
					<h3>Adventure Administrator Options</h3>
					<p><a href="DisplayAdventures.php">View Adventures</a></p>
					<p><a href="insertAdventures.php">Add Adventures</a></p>
					<p><a href="updateAdventures.php">Update Adventures</a></p>
					<p><a href="AdventureTravel.html">Main Website</a></p>
					<p><a href="logout.php">Logout</a></p>
				</div>
			</div>
		</div>
		<?php
			}
			else if ($_SESSION['validUser'] == "no")
			{
		?>
		<div class="container">
			<div class="color">
				<div class="loginBackground">
					<h2>Please login to the Administrator System</h2>
					<form method="post" name="loginForm" action="login.php" >
						<p>Username: <input name="loginUsername" type="text" required/></p>
						<p>Password: <input name="loginPassword" type="password" required/></p>
						<p><input name="submitLogin" value="Login" type="submit" /> 
					    <input name="" type="reset" />&nbsp;</p>
					</form>
						<a href="AdventureTravel.html">Back To Main Website</a>
				</div>
			</div>
		</div>
		<?php
			}	
		?>
	</body>
</html>