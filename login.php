<?php 
session_cache_limiter('none');			//This prevents a Chrome error when using the back button to return to this page.
session_start();
	if ($_SESSION['validUser'] == "yes")				//is this already a valid user?
	{
		//User is already signed on.  Skip the rest.
		$message = "Welcome Back! $username";	//Create greeting for VIEW area		
	}
	else
	{
		if (isset($_POST['submitLogin']) )			//Was this page called from a submitted form?
		{
			$inUsername = $_POST['loginUsername'];	//pull the username from the form
			$inPassword = $_POST['loginPassword'];	//pull the password from the form
			
			require 'dbConnect.php';				//Connect to the database

			$sql = "SELECT event_user_name,event_user_password FROM event_user WHERE event_user_name = ? AND event_user_password = ?";				
			
			$query = $connection->prepare($sql) or die("<p>SQL String: $sql</p>");	//prepare the query
			
			$query->bind_param("ss",$inUsername,$inPassword);	//bind parameters to prepared statement
			
			$query->execute() or die("<p>Execution </p>" );
			
			$query->bind_result($userName,$passWord);
			
			$query->store_result();
			
			$query->fetch();	
			
			echo "<h2>userName: $userName</h2>";
			echo "<h2>password: $passWord</h2>";
		
			//echo "<h2>Number of rows affected " . $connection->affected_rows . "</h2>";	//best for Update,Insert,Delete			
			//echo "<h2>Number of rows found " . $query->num_rows . "</h2>";				//best for SELECT
			
			if ($query->num_rows == 1 )		//If this is a valid user there should be ONE row only
			{
				$_SESSION['validUser'] = "yes";				//this is a valid user so set your SESSION variable
				$message = "Welcome Back! $userName";
				//Valid User can do the following things:
			}
			else
			{
				//error in processing login.  Logon Not Found...
				$_SESSION['validUser'] = "no";					
				$message = "Sorry, there was a problem with your username or password. Please try again.";
			}			
			
			$query->close();
			$connection->close();
			
		}//end if submitted
		else
		{
			//user needs to see form
		}//end else submitted
		
	}//end else valid user
	
//turn off PHP and turn on HTML
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WDV341 Intro PHP - Login and Control Page</title>
</head>

<body>

<h2>Login Page</h2>

<h2><?php echo $message?></h2>

<?php
	if ($_SESSION['validUser'] == "yes")	//This is a valid user.  Show them the Administrator Page
	{
		
//turn off PHP and turn on HTML
?>
		<h3>Event Administrator Options</h3>
        <p><a href="formatEvents.php">View Events</a></p>
        					
<?php
	}
	else									//The user needs to log in.  Display the Login Form
	{
?>
			<h2>Please login to the Administrator System</h2>
                <form method="post" name="loginForm" action="login.php" >
                  <p>Username: <input name="loginUsername" type="text" /></p>
                  <p>Password: <input name="loginPassword" type="password" /></p>
                  <p><input name="submitLogin" value="Login" type="submit" /> 
				  <input name="" type="reset" />&nbsp;</p>
                </form>
                
<?php //turn off HTML and turn on PHP
	}//end of checking for a valid user
			
//turn off PHP and begin HTML			
?>

<p>Return to <a href='#'>www.presentationstogo.com</a></p>

</body>
</html>