<?php
session_start();
	try {
		
		require 'dbConnect.php';
		
		$sql = "SELECT ";
		$sql .= "event_id, ";
		$sql .= "event_name, ";
		$sql .= "event_description, ";
		$sql .= "event_presenter, ";
		$sql .= "event_date, ";
		$sql .= "event_time ";
		
		$sql .= "FROM wdv341_event";
		$sql .= "WHERE event_id = 2";
		
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		
	}
	
	catch(PDOException $e) {
		$message = "There has been a problem, please try again later.";
	}
	
?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
<div id="container">
	<header>
		<h1>Events</h1>
	</header>
	<main>
		<?php
			while( $row=$stmt->fetch(PDO::FETCH_ASSOC)) {
		?>
			<div class="eventBlock">
				<div class="row">
					<span class="eventId"><?php echo $row['event_id']; ?></span>
				</div>
				<div class="row">
					<span class="eventName"><?php echo $row['event_name']; ?></span>
				</div>     
				<div class="row">
					<span class="eventDesc"><?php echo $row['event_description']; ?></span>
				</div>
				<div class="row">
					<span class="eventPresenter"><?php echo $row['event_presenter']; ?></span>
				</div>
				<div class="row">
					<span class="eventDate"><?php echo $row['event_date']; ?></span>
				</div>
				<div class="row">
					<span class="eventTime"><?php echo $row['event_time']; ?></span>
				</div>
			</div>
	<?php
		}
	?>
	</main>
</div>
</body>
</html>