<?php
	session_start();
	try {
		$inTravelName = "";
		$inTravelDesc = "";
		$inTravelDate = "";
		$inTravelDuration = "";
		$inTravelBack = "";
		$inTravelArrival = "";
		$inTravelDeparture = "";
		$inTravelPrice = "";
		
		
		$nameErrMsg = "";
		$descErrMsg = "";
		$dateErrMsg = "";
		$durationErrMsg = "";
		$backErrMsg = "";
		$arrivalErrMsg = "";
		$departureErrMsg = "";
		$priceErrMsg = "";
		
		require 'dbConnect.php';
		
		function validateName($inTravelName) {
				global $validForm, $nameErrMsg;
				$nameErrMsg = "";
				$inTravelName = trim($inTravelName);
				if($inTravelName == "") {
					$validForm = false;
					$nameErrMsg = "Name cannot be blank";
				}
				elseif (!preg_Match("/^[a-zA-Z0-0 ]*$/", $inTravelName)) {
					$validForm = false;
					$nameErrMsg = "No special characters";
				}
			}
			
		function validateDesc($inTravelDesc) {
				global $validForm, $descErrMsg;
				$descErrMsg = "";
				$inTravelDesc = trim($inTravelDesc);
				if($inTravelDesc == "") {
					$validForm = false;
					$descErrMsg = "Description cannot be blank";
				}
				elseif (!preg_Match("/^[a-zA-Z0-0 ]*$/", $inTravelDesc)) {
					$validForm = false;
					$descErrMsg = "No special characters";
				}
			}
			
		function validateDate($inTravelDate) {
				global $validForm, $dateErrMsg;
				$dateErrMsg = "";
				
				if($inTravelDate == "") {
					$validForm = false;
					$dateErrMsg = "Travel Date cannot be default";
				}
			}
			
		function validateDuration($inTravelDuration) {
				global $validForm, $durationErrMsg;
				$durationErrMsg = "";
				$inTravelDuration = trim($inTravelDuration);
				if($inTravelDuration == "") {
					$validForm = false;
					$durationErrMsg = "Duration cannot be blank";
				}
				elseif (!is_numeric($inTravelDuration)) {
					$validForm = false;
					$durationErrMsg = "Duration can only be numeric";
				}
			}
			
		function validateBackDate($inTravelBack) {
				global $validForm, $backErrMsg;
				$backErrMsg = "";
				
				if($inTravelBack == "") {
					$validForm = false;
					$backErrMsg = "Travel Back Date cannot be default";
				}
			}
			
		function validateArrivalTime($inTravelArrival) {
				global $validForm, $arrivalErrMsg;
				$arrivalErrMsg = "";
				
				if($inTravelArrival == "") {
					$validForm = false;
					$arrivalErrMsg = "Arrival time cannot be default";
				}
			}
			
		function validateDepartureTime($inTravelDeparture) {
				global $validForm, $departureErrMsg;
				$departureErrMsg = "";
				
				if($inTravelDeparture == "") {
					$validForm = false;
					$departureErrMsg = "Departure time cannot be default";
				}
			}
			
		function validatePrice($inTravelPrice) {
				global $validForm, $priceErrMsg;
				$priceErrMsg = "";
				$inTravelPrice = trim($inTravelPrice);
				if($inTravelPrice == "") {
					$validForm = false;
					$priceErrMsg = "Price cannot be blank";
				}
				elseif (!is_numeric($inTravelPrice)) {
					$validForm = false;
					$priceErrMsg = "Price can only be numeric";
				}
			}
		if ( isset($_POST['submit']) ) {
	
	
			$inTravelName = $_POST['travelName'];
			$inTravelDesc = $_POST['travelDesc'];
			$inTravelDate = $_POST['travelDate'];
			$inTravelDuration = $_POST['travelDuration'];
			$inTravelBack = $_POST['travelBack'];
			$inTravelArrival = $_POST['travelArrival'];
			$inTravelDeparture = $_POST['travelDeparture'];
			$inTravelPrice = $_POST['travelPrice'];

			$validForm = true;
			
			validateName($inTravelName);
			validateDesc($inTravelDesc);
			validateDate($inTravelDate);
			validateDuration($inTravelDuration);
			validateBackDate($inTravelBack);
			validateArrivalTime($inTravelArrival);
			validateDepartureTime($inTravelDeparture);
			validatePrice($inTravelPrice);
			
			if($validForm) {
				$sql = "INSERT INTO travel_adventures (travel_name, travel_desc, travel_date, travel_duration, travel_back_date, travel_arrival_time, travel_departure_time, travel_price)
				VALUES (:travelName, :travelDesc, :travelDate, :travelDuration, :travelBack, :travelArrival, :travelDeparture, :travelPrice)";
				
				$stmt = $conn->prepare($sql);
				
				$stmt->bindParam(':travelName', $inTravelName);
				$stmt->bindParam(':travelDesc', $inTravelDesc);
				$stmt->bindParam(':travelDate', $inTravelDate);
				$stmt->bindParam(':travelDuration', $inTravelDuration);
				$stmt->bindParam(':travelBack', $inTravelBack);
				$stmt->bindParam(':travelArrival', $inTravelArrival);
				$stmt->bindParam(':travelDeparture', $inTravelDeparture);
				$stmt->bindParam(':travelPrice', $inTravelPrice);
					
				$stmt->execute();
			}
		}
	}
	catch(PDOException $e) {
        $message = "There has been a problem, please try again later.";
        echo $message;
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
		<h1>Adventure Travel Admin Add Adventures</h1>
	</header>
	
	<nav>
		<ul>
			<li><a href="DisplayAdventures.php">View Adventures</a></li>
			<li><a href="insertAdventures.php">Add Adventures</a></li>
			<li><a href="updateAdventures.php">Update Adventures</a></li>
			<li><a href="logout.php">Logout</a></p>
		</ul>
	</nav>
	
	<body>

	
	<div class="container">
			<div class="color">
				<div class="loginBackground">
					<h2>Enter the Adventure</h2>
					<form method="post" name="addForm">
					
						<p>Adventure Name: <input name="travelName" type="text" value="<?php if (isset($inTravelName)) echo $inTravelName; ?>"</p> <br> <?php echo("$nameErrMsg");?>
						<p>Description: <input name="travelDesc" type="text" value="<?php if (isset($inTravelDesc)) echo $inTravelDesc; ?>"/></p> <?php echo("$descErrMsg");?>
						<p>Date: <input name="travelDate" type="date" /></p> <?php echo("$dateErrMsg");?>
						<p>Duration: <input name="travelDuration" type="int" value="<?php if (isset($inTravelDuration)) echo $inTravelDuration; ?>"/></p> <?php echo("$durationErrMsg");?>
						<p>Return Date: <input name="travelBack" type="date" /></p> <?php echo("$backErrMsg");?>
						<p>Arrival Time: <input name="travelArrival" type="time" /></p> <?php echo("$arrivalErrMsg");?>
						<p>Departure: <input name="travelDeparture" type="time" /></p> <?php echo("$departureErrMsg");?>
						<p>Adventure Price: <input name="travelPrice" type="int" value="<?php if (isset($inTravelPrice)) echo $inTravelPrice; ?>"/></p> <?php echo("$priceErrMsg");?>
						
						<p><input name="submit" value="Add Adventure" type="submit" /> 
					    <input name="" type="reset"/>&nbsp;</p>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>