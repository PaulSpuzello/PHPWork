<!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8">
			<meta name="Description" Content="Adventure Travel Support">
			<meta name="Keywords" Content="Adventure, Travel, AdventureTravel Support">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<title>Adventure Travel Site Support</title>
			<link rel="stylesheet" type="text/css" href="css/Adventure.css">
			<link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>
			<link href='https://fonts.googleapis.com/css?family=Alfa Slab One' rel='stylesheet'>
			<style type = "text/css">
				@media only screen and (max-width: 600px) {
				  body {
					height: 100%
					width:100%
				  }
				}

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
		</header>
	<body>
		<nav>
			<ul>
				<li><a href="AdventureTravel.html">Home</a></li>
				<li><a href="AdventureQuestions.html">Questions</a></li>
				<li><a href="Adventures.html">Adventures</a></li>
				<li><a href="AdventureReviews.html">Reviews </a></li>
				<li><a href="CurrentAdventures.php">Current Adventures </a></li>
				<li><a href="Final_Email.php">Back To Top </a></li>
				<li><a href="login.php">Admin Login </a></li>
			</ul>
		</nav>
<div class="container">
	<div class="color">
		<div class="loginBackground">
			<header>
				<h1>Adventure Travel Support</h1>
			</header>
			<form id="contact" method="post" >
					
				<p>Your Email:
				<input type="email" name="senderEmail" id="senderEmail" placeholder="email@gmail.com" size="50" required>
				
				<br></p>
				
				<p>
				Subject:
				<input type="text" name="subject" id="subject" size="40" required>
				</p>
					
				<p>
				Message:
				<input type="text" name="message" id="message" size="50" required>
				</p>
				<br>
					
				<button type="submit" value="Submit">Submit Ticket</button>
					
				<button type="reset" value="Reset">Reset</button>

				<?php 
					require 'Emailer.php';
					
					$senderEmail = $_POST['senderEmail'];
					$subject = $_POST['subject'];
					$message = $_POST['message'];
					
					$email = new Emailer();	
	
					$email->set_SenderEmail($senderEmail);
					
					$email->setRecipientEmail("webform@paulspuz.com");
					
					$email->setSubject($subject);
					
					$email->setMessage($message);
					
					echo $email->sendEmail();
				?>

			</form>
		</div>
	</div>
</div>
</body>
</html>