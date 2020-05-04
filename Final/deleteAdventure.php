<?php
	session_start();
	try {
		
		require 'dbConnect.php';
		
		$validForm = true;
		
		$travelId = $_GET['id'];
		
		if($validForm) {
			$sql = "DELETE FROM travel_adventures WHERE travel_id = :travelId";
			
			$stmt = $conn->prepare($sql);
			
			$stmt->bindParam(':travelId', $travelId);

			$stmt->execute();
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
					<h2>Adventure Deleted</h2>

				</div>
			</div>
		</div>
	</body>
</html>