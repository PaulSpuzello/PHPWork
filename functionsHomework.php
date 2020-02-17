<?php
	function monthDayYear($inDate) {
		echo date_format($inDate,"m/d/Y");
	}
	
	function dayMonthYear($inDate) {
		echo date_format($inDate,"d/m/Y");
	}
	
	function inputString($inInput) {
		echo strlen($inInput);
		
		echo "<br><br>";
		
		echo "Without trim:";
		echo $inInput;
		echo "<br>";
		echo "With Trim:";
		echo trim($inInput);
		
		echo "<br><br>";
		echo "Made lowercase:";
		echo strtolower($inInput);
		
		echo "<br><br>";
		echo "Is DMACC in it? <br>";
		echo stripos($inInput, "dmacc");
	}
	
	function formatNum($inNum) {
		echo number_format($inNum);
	}
	
	function formatNumCurrency($inCurrenNum) {
		echo sprintf('$%01.2f', $inCurrenNum);
	}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Functions Homework</title>
</head>
<body>
	<p>Date:</p>
	<?php
		$date=date_create("12-05-1997");
		monthDayYear($date);
	?>
	<?php
		$date = date_create("12-05-1997");
		dayMonthYear($date);
	?>
	<p>Number of characters in string is:</p>
	<?php
		$input = " THEDMACC ";
		inputString($input);
	?>
	<br>
	<p>Formatted Number:<p>
	<?php
		$number = 1234567890;
		formatNum($number);
	?>
	<br>
	<?php
		$number = 123456;
		formatNumCurrency($number);
	?>
</body>
</html>