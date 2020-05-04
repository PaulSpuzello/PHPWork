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
		<h1>Adventure Travel Admin Adventures</h1>
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
	<?php
		while( $row=$stmt->fetch(PDO::FETCH_ASSOC)) {
		$travelId = $row['travel_id'];
	?>
	<div class="container">
		<div class="color">
			<div class="loginBackground">
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
				
				
				
				<br>
				
				<a href="deleteAdventure.php?id=<?php echo $travelId; ?>">Delete</a>
			</div>
		</div>
	</div>

	<?php
		}
	?>
	</body>
</html>