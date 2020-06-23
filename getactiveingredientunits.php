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
	$units = array();

	while(! feof($fh)) {

		$u = trim(explode("\t", fgets($fh))[14]);

		if (strlen($u) > $minLength) {
			$minLength = strlen($u);
		} 

		if ($u == "\\N") {
			$nullCount++;
		}

		if (! isset($units[$u])) {
			$units[$u] = 1;
		}
		else {
			$units[$u]++;
		}

	}

	fclose($fh);


	$outputString = "";
	$count = 0;
	foreach ($units as $key => $value) {
		$outputString .= $key;
		if ($count++ < count($units) - 1) {
			$outputString .= "\n";
		}
	}

	$file = "unitvalues.txt";

	file_put_contents($file, $outputString);

	print("\nMin length is ");
	print($minLength);
	print("\n");
	print($nullCount);
	print(" null values were found");
	print("\n");
?>