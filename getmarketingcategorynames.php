<?php

		/*	the order of types in the file

	"PRODUCTNDC",	"PRODUCTTYPENAME", "PROPRIETARYNAME", "PROPRIETARYNAMESUFFIX", "NONPROPRIETARYNAME",	"DOSAGEFORMNAME", "ROUTENAME", "STARTMARKETINGDATE", "ENDMARKETINGDATE", 
		"MARKETINGCATEGORYNAME", "APPLICATIONNUMBER", "LABELERNAME", "SUBSTANCENAME", 
		"ACTIVE_NUMERATOR_STRENGTH", "ACTIVE_INGRED_UNIT", "PHARM_CLASSES",	"DEASCHEDULE",	
		"NDC_EXCLUDE_FLAG",	"LISTING_RECORD_CERTIFIED_THROUGH", "NDC9"

		*/

	$fh = fopen("drugfinal.txt", 'r');
	$names = array();
	$count = 0;


	while (! feof($fh)) {
		$count++;

		$n = trim(explode("\t", fgets($fh))[9]);
		if ($n == "\\N") {
			print("Null value found at ");
			print($count);
			print("\n");
		}
		if (! isset($names[$n])) {
			$names[$n] = 1;
		}
		else {
			$names[$n]++;
		}
	}

	fclose($fh);

	$minLength = 0;
	$outputString = "";
	$count = 0;
	foreach ($names as $key => $value) {
		$outputString .= $key;
		if ($count++ < count($names) - 1) {
			$outputString .= "\n";
		}

		//print($key);
		//print(" => ");
		//print($value);
		//print("\n");
		if (strlen($key) > $minLength) $minLength = strlen($key);
	}


	$file = "marketingcategorynames.txt";
	file_put_contents($file, $outputString);


	$count = 0;
	$outputString = "";
	foreach ($names as $key => $value) {
		$outputString .= ("'" . $key . "'");
		if ($count++ < count($names) - 1) {
			$outputString .= ", ";
		}
	}

	$file = "marketingcategorynamescsv.txt";
	file_put_contents($file, $outputString);


	print($minLength);


?>