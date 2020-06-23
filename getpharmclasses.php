<?php

		/*	the order of types in the file

	"PRODUCTNDC",	"PRODUCTTYPENAME", "PROPRIETARYNAME", "PROPRIETARYNAMESUFFIX", "NONPROPRIETARYNAME",	"DOSAGEFORMNAME", "ROUTENAME", "STARTMARKETINGDATE", "ENDMARKETINGDATE", 
		"MARKETINGCATEGORYNAME", "APPLICATIONNUMBER", "LABELERNAME", "SUBSTANCENAME", 
		"ACTIVE_NUMERATOR_STRENGTH", "ACTIVE_INGRED_UNIT", "PHARM_CLASSES",	"DEASCHEDULE",	
		"NDC_EXCLUDE_FLAG",	"LISTING_RECORD_CERTIFIED_THROUGH", "NDC9"

		*/

	$fh = fopen("drugfinal.txt", 'r');

	$minLength = 0;
	$nullCount = 0;
	$classes = array();

	while(! feof($fh)) {

		$c = trim(explode("\t", fgets($fh))[15]);

		if (strlen($c) > $minLength) {
			$minLength = strlen($c);
		} 

		if ($c == "\\N") {
			$nullCount++;
		}

		if (! isset($classes[$c])) {
			$classes[$c] = 1;
		}
		else {
			$classes[$c]++;
		}

	}

	fclose($fh);


	$outputString = "";
	$count = 0;
	foreach ($classes as $key => $value) {
		$outputString .= $key;
		if ($count++ < count($classes) - 1) {
			$outputString .= "\n";
		}
	}

	$file = "pharmclasses.txt";

	file_put_contents($file, $outputString);

	$count = 0;
	$outputString = "";

	foreach ($classes as $key => $value) {
		$outputString .= ("'". $key . "'");
		if ($count++ < count($classes) - 1) {
			$outputString .= ", ";
		}
	}

	$file = "pharmclassescsv.txt";
	file_put_contents($file, $outputString);
	print("\nMin length is ");
	print($minLength);
	print("\n");
	print($nullCount);
	print(" null values were found");
	print("\n");
?>