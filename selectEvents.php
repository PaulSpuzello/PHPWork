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
		
		$sql .= "FROM wdv341_event ";
        
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
    

	}
	
	catch(PDOException $e) {
        $message = "There has been a problem, please try again later.";
        echo $message;
	}
	
?>

<!doctype html>
<html>
<head>
<style>
	table {
		border-collapse: collapse;
	}
	
	td, th {
		border: 1px solid #808080;
		text-align: left;
		padding: 8px;
	}
</style>
	<meta charset="utf-8">
</head>
<body>
<header>
	<h1>Events</h1>
</header>
<table>
	<tr>
		<th>Event ID</th>
		<th>Event Name</th>
		<th>Event Desc.</th>
		<th>Event Presenter</th>
		<th>Event Date</th>
		<th>Event Time</th>
	</tr>
	<?php
		while( $row=$stmt->fetch(PDO::FETCH_ASSOC)) {
	?>
	<tr>
		<th><?php echo $row['event_id']; ?></th>
		<th><?php echo $row['event_name']; ?></th>
		<th><?php echo $row['event_description']; ?></th>
		<th><?php echo $row['event_presenter']; ?></th>
		<th><?php echo $row['event_date']; ?></th>
		<th><?php echo $row['event_time']; ?></th>
	</tr>
	<?php
		}
	?>

</div>
</body>
</html>