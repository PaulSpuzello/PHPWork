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

			//echo "<h2>username: $inUsername</h2>";
			//echo "<h2>password: $inPassword</h2>";

			//echo "<h2>Number of rows affected " . $conn->affected_rows . "</h2>";		
			//echo "<h2>Number of rows found " . $row . "</h2>";				
			
			
			
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
<title>WDV341 Intro PHP - Login and Control Page</title>
</head>

<body>

<h2>Login Page</h2>



<?php
	if ($_SESSION['validUser'] == "yes")
	{
?>
				<h3>Event Administrator Options</h3>
				<p><a href="formatEvents.php">View Events</a></p>
				<p><a href="insertEvents.php">Add Events</a></p>
				<p><a href="logout.php">Logout</a></p>
<?php
	}
	else if ($_SESSION['validUser'] == "no")
	{
?>
			<h2>Please login to the Administrator System</h2>
                <form method="post" name="loginForm" action="login.php" >
                  <p>Username: <input name="loginUsername" type="text" /></p>
                  <p>Password: <input name="loginPassword" type="password" /></p>
                  <p><input name="submitLogin" value="Login" type="submit" /> 
				  <input name="" type="reset" />&nbsp;</p>
                </form>
                
<?php
	}	
?>
</body>
</html>