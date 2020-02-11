<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Email Tester</title>
</head>

<body>
	<h1>WDV341 Intro PHP</h1>
	<h2>Testing the Emailer Class</h2>
	<?php
		require 'Emailer.php';  //access the class file
		
		$emailTest = new Emailer();  //New emailer object
		
		$emailTest->set_senderEmail("paspuzello@dmacc.edu ");
		echo $emailTest->get_senderEmail();  //return email address
		
		$emailTest->set_recipientEmail("paul.spuz@gmail.com");
		echo $emailTest->get_recipientEmail();

		$emailTest->set_subject("subject");
		echo $emailTest->get_subject();
		
		$emailTest->set_message("here is a message");
		echo $emailTest->get_message();
		
		echo $emailTest->sendEmail();  //Send email to SMTP server
	?>
</body>
</html>