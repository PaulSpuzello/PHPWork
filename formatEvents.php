<?php
session_start();
	try {
		
		require 'dbConnect.php';

		$sql = "SELECT event_id, event_name, event_description, event_presenter, event_date, event_time FROM wdv341_event ORDER BY event_id DESC";
	
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
    <title>WDV341 Intro PHP  - Display Events Example</title>
    <style>
		.eventBlock{
			width:500px;
			margin-left:auto;
			margin-right:auto;
			background-color:#CCC;	
		}
		
		.displayEvent{
			text_align:left;
			font-size:18px;	
		}
		
		.displayDescription {
			margin-left:100px;
		}
	</style>
</head>

<body>
    <h1>WDV341 Intro PHP</h1>
    <h2>Example Code - Display Events as formatted output blocks</h2>   
    <h3>??? Events are available today.</h3>

<?php
	while( $row=$stmt->fetch(PDO::FETCH_ASSOC)) {
?>
	<p>
        <div class="eventBlock">	
            <div>
            	<span class="displayEvent">Event:</span>
					<th><?php echo $row['event_name']; ?></th>
                <span>Presenter:</span>
					<th><?php echo $row['event_presenter']; ?></th>
            </div>
            <div>
            	<span class="displayDescription">Description:</span>
					<th><?php echo $row['event_description']; ?></th>
            </div>
            <div>
            	<span class="displayTime">Time:</span>
					<th><?php echo $row['event_time']; ?></th>
            </div>
            <div>
            	<span class="displayDate">Date:</span>
					<th><?php echo $row['event_date']; ?></th>
					<script>this_month(event_date)</script>
            </div>
        </div>
    </p>

<?php
	}
?>
</div>	
</body>
</html>