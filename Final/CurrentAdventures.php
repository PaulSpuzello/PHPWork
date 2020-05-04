<?php
	session_start();
	try {
		
		require 'dbConnect.php';

		$sql = "SELECT travel_id, travel_name, travel_desc, travel_date, travel_duration, travel_back_date, travel_arrival_time, travel_departure_time, travel_price FROM travel_adventures ORDER BY travel_duration DESC";
	
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
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
	<link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>
	<link href='https://fonts.googleapis.com/css?family=Alfa Slab One' rel='stylesheet'>
	<header>
		<img class="roundBorder" src="adventure_travel_project/images/banner.jpg" width="100%" height="400" alt="Company Banner"/>
		<h1>Our Currently Upcoming Adventures!</h1>
	</header>
	
	<nav>
		<ul>
			<li><a href="AdventureTravel.html">Home Page</a></li>
			<li><a href="AdventureQuestions.html">Questions</a></li>
			<li><a href="Adventures.html">Adventures</a></li>
			<li><a href="AdventureReviews.html">Reviews </a></li>
			<li><a href="CurrentAdventures.php">Back To Top </a></li>
			<li><a href="Final_Email.php">Support</a></li>
			<li><a href="login.php">Admin Login </a></li>
		</ul>
	</nav>
	
    <style>
		.eventBlock{
			width:500px;
			margin-left:auto;
			margin-right:auto;
			background: limegreen;
					
		}
		
		.color{
			background: green;
		}
	</style>
</head>

<body>
<div class="color">


<?php
	while( $row=$stmt->fetch(PDO::FETCH_ASSOC)) {
?>
	<p>
        	<div class="eventBlock">
            <div>
            	<span class="displayAdventure">Adventure:</span>
					<th><?php echo $row['travel_name']; ?></th>
            </div>
			<br>
            <div>
            	<span class="travelDescription">Description:</span>
					<th><?php echo $row['travel_desc']; ?></th>
            </div>
			<br>
			<div>
					<span class="travelPrice">Price Per Person:</span>
					$
					<th><?php echo $row['travel_price']; ?></th>
            </div>
			<br>
            <div>
            	<span class="travelDate">Starts/Ends:</span>
					<th><?php echo $row['travel_date']; ?></th>
					-
					<th><?php echo $row['travel_back_date']; ?></th>
            </div>
			<br>
			<div>
					<span class="travelDuration">Days:</span>
					<th><?php echo $row['travel_duration']; ?></th>
            </div>
			<br>
			<div>
					<span class="travelDeparture">Departure Time/Arrival Time:</span>
					<th><?php echo $row['travel_departure_time']; ?></th>
					-
					<th><?php echo $row['travel_arrival_time']; ?></th>
            </div>
			</div>
        
    </p>

<?php
	}
?>

</div>
</body>

	<footer>
		<br>
		<div class="footBack">
			<nav>
				<ul>
					<li><a href="AdventureTravel.html">Back to Top</a></li>
					<li><a href="AdventureQuestions.html">Questions</a></li>
					<li><a href="Adventures.html">Adventures</a></li>
					<li><a href="CurrentAdventures.php">Current Adventures </a></li>
					<li><a href="Final_Email.php">Support</a></li>
				</ul>
			</nav>

			<div class="container">
				<h3>The Story:</h3>
				<p>For over 35 years, family-owned and operated Adventure Travel has created exhilarating national park vacations, twice earning the distinction as the World’s Best Tour Operator by Travel + Leisure magazine. Our all-inclusive adventure vacations offer the most intimate, meaningful, and memorable adventure travel experience imaginable. Discover the wild west on horseback outside Yellowstone or the dramatic soaring peaks of Grand Teton National Park. Bring the kids along on our exciting Arizona adventure to the breathtaking Grand Canyon or head over to California’s Yosemite National Park and stand in awe below the famous granite cliffs of El Capitan and Half-dome. Our national park vacation packages include iconic sites and hidden gems to delight every traveler!</p>
				<p><strong>Call toll free!:</strong> 1-800-123-4567</p>
				<div class="wrapper">
					<div class="flex-container">
						<a href="AdventureForm.html">Help Form </a>
						<div class="flex-containeri">
							<div><img src="adventure_travel_project/images/AT_logo.gif" width="100%" height="200" alt="Company Banner"/></div>
							<div><img src="adventure_travel_project/images/shoes.jpg" width="100%" height="300" alt="Shoes"/></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
</html>