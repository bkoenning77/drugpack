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
	$strengths = array();

	while(! feof($fh)) {

		$st = trim(explode("\t", fgets($fh))[13]);

		if (strlen($st) > $minLength) {
			$minLength = strlen($st);
		} 

		if ($st == "\\N") {
			$nullCount++;
		}

		if (! isset($strengths[$st])) {
			$strengths[$st] = 1;
		}
		else {
			$strengths[$st]++;
		}

	}

	fclose($fh);


	$outputString = "";
	$count = 0;
	foreach ($strengths as $key => $value) {
		$outputString .= $key;
		if ($count++ < count($strengths) - 1) {
			$outputString .= "\n";
		}
	}

	$file = "numeratorstrengths.txt";

	file_put_contents($file, $outputString);

	print("\nMin length is ");
	print($minLength);
	print("\n");
	print($nullCount);
	print(" null values were found");
	print("\n");



?>