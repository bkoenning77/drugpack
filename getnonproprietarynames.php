<?php

		/*	the order of types in the file

	"PRODUCTNDC",	"PRODUCTTYPENAME", "PROPRIETARYNAME", "PROPRIETARYNAMESUFFIX", "NONPROPRIETARYNAME",	"DOSAGEFORMNAME", "ROUTENAME", "STARTMARKETINGDATE", "ENDMARKETINGDATE", 
		"MARKETINGCATEGORYNAME", "APPLICATIONNUMBER", "LABELERNAME", "SUBSTANCENAME", 
		"ACTIVE_NUMERATOR_STRENGTH", "ACTIVE_INGRED_UNIT", "PHARM_CLASSES",	"DEASCHEDULE",	
		"NDC_EXCLUDE_FLAG",	"LISTING_RECORD_CERTIFIED_THROUGH", "NDC9"

		*/

	$fh = fopen("drugfinal.txt", 'r');
	$nonprops = array();
	$count = 0;


	while (! feof($fh)) {
		$count++;

		$nonprop = trim(explode("\t", fgets($fh))[4]);
		if ($nonprop == "\\N") {
			print($count);
			print("\n");
		}


		if (! isset($nonprops[$nonprop])) {
			$nonprops[$nonprop] = 1;
		}
		else {
			$nonprops[$nonprop]++;
		}
	}

	fclose($fh);

	$minLength = 0;
	$outputString = "";
	$count = 0;
	foreach ($nonprops as $key => $value) {
		$outputString .= $key;
		if ($count++ < count($nonprops) - 1) {
			$outputString .= "\n";
		}

		//print($key);
		//print(" => ");
		//print($value);
		//print("\n");
		if (strlen($key) > $minLength) $minLength = strlen($key);
	}


	$file = "nonproprietarynames.txt";
	file_put_contents($file, $outputString);
	print($minLength);
?>