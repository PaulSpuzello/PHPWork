<?php
	class Emailer {
			private $senderEmail = "";
			private $recipientEmail = "";
			private $subject = "";	
			private $message = "";			

			public function __construct() {
				
			}
			public function set_SenderEmail($inVal) {
				$this->senderEmail = $inVal;
			}
			
			public function setRecipientEmail($inVal) {
				$this->recipientEmail = $inVal;
			}
				
			public function setSubject($inVal) {
				$this->subject = $inVal;
			}
				
			public function setMessage($inVal) {
				$this->message = $inVal;
			}

			public function getSenderEmail() {
				return $this->senderEmail;
			}
				
			public function getRecipientEmail() {
				return $this->recipientEmail;
			}
				
			public function getSubject() {
				return $this->subject;
			}
				
			public function getMessage(){
				return $this->message;
			}

			public function sendEmail() {
				$to = $this->getRecipientEmail();
				$subject = $this->getSubject();
				$headers = "From:".$getSenderEmail . "rn";
				$message = $this->getMessage();
				
				mail($to,$subject,$message,$headers);
			}
	}
?>