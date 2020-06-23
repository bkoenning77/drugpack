<?php


			/*	the order of types in the file

	"PRODUCTNDC",	"PRODUCTTYPENAME", "PROPRIETARYNAME", "PROPRIETARYNAMESUFFIX", "NONPROPRIETARYNAME",	"DOSAGEFORMNAME", "ROUTENAME", "STARTMARKETINGDATE", "ENDMARKETINGDATE", 
		"MARKETINGCATEGORYNAME", "APPLICATIONNUMBER", "LABELERNAME", "SUBSTANCENAME", 
		"ACTIVE_NUMERATOR_STRENGTH", "ACTIVE_INGRED_UNIT", "PHARM_CLASSES",	"DEASCHEDULE",	
		"NDC_EXCLUDE_FLAG",	"LISTING_RECORD_CERTIFIED_THROUGH", "NDC9"

		*/

	$fh = fopen("drugfinal.txt", 'r');
	$names = array();
	$minLength = 0;

	$count = 0;
	while (! feof($fh)) {
		$count++;
		$sub = trim(explode("\t", fgets($fh))[12]);

		if ($sub == "\\N") {
			print("Null value at line ");
			print($count);
			print("\n");
		}

		if (! isset($names[$sub])) {
			$names[$sub] = 1;
		}
		else {
			$names[$sub]++;
		}
	}
	fclose($fh);

	$outputString = "";
	$count = 0;
	foreach ($names as $key => $value) {
		$outputString .= $key;
		if ($count < count($names) - 1) {
			$outputString .= "\n";
		}
		if (strlen($key) > $minLength) {
			$minLength = strlen($key);
		}
	}

	$file = "substancenames.txt";
	file_put_contents($file, $outputString);

	print("Min length: ");
	print($minLength);
	print("\n");
?>