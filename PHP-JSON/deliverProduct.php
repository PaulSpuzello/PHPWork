<?php
	#class ProductContainer {
		$productObj = new stdClass;
		
		$productObj->productName = "PHP Textbook";
		$productObj->productPrice = "$129.95";
		$productObj->productPageCount = "327";
		$productObj->productISBN = "13-1234435690";
		
	#}
	
	$object = json_encode($productObj);	//create the JSON object
		
	echo $object;							//send results back to calling program
	
?>
