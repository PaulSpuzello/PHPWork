<?php
	class Emailer {
		//this class will process a PHP email and send it.
		
		
		//properties declaration
			private $senderEmail = "";
			private $recipientEmail = "";
			private $subject = "";	
			private $message = "";			
		
		//constructor method
			public function __construct() {
				
			}
				
		
		//methods
			//Setter methods  --Set property values
				public function set_senderEmail($inVal) {
					$this->senderEmail = $inVal;
				}
				
				public function set_recipientEmail($inVal) {
					$this->recipientEmail = $inVal;
				}
				
				public function set_subject($inVal) {
					$this->subject = $inVal;
				}
				
				public function set_message($inVal) {
					$this->message = $inVal;
				}
				
			//Getter methods  --Return property values
				public function get_senderEmail() {
					return $this->senderEmail;
				}
				
				public function get_recipientEmail() {
					return $this->recipientEmail;
				}
				
				public function get_subject() {
					return $this->subject;
				}
				
				public function get_message(){
					$this->senderEmail;
				}
			
			//Processing methods  --Everything else
				public function sendEmail() {
					//Format and send an email to the SMTP server
						$to = $this->get_recipientEmail();
						$subject = $this->get_subject();
						$message = $this->get_message();
						$headers = 'From: <paspuzello@dmacc.edu>';
						
						return mail($to,$subject,$message,$headers);
				}
	}
?>