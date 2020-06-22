<?php

		/*	the order of types in the file

	"PRODUCTNDC",	"PRODUCTTYPENAME", "PROPRIETARYNAME", "PROPRIETARYNAMESUFFIX", "NONPROPRIETARYNAME",	"DOSAGEFORMNAME", "ROUTENAME", "STARTMARKETINGDATE", "ENDMARKETINGDATE", 
		"MARKETINGCATEGORYNAME", "APPLICATIONNUMBER", "LABELERNAME", "SUBSTANCENAME", 
		"ACTIVE_NUMERATOR_STRENGTH", "ACTIVE_INGRED_UNIT", "PHARM_CLASSES",	"DEASCHEDULE",	
		"NDC_EXCLUDE_FLAG",	"LISTING_RECORD_CERTIFIED_THROUGH", "NDC9"

		*/

	$fh = fopen("drugfinal.txt", 'r');
	$propNames = array();
	//$lineCount = 0;

	while (! feof($fh)) {
		$lineCount++;

		$proprietaryName = trim(explode("\t", fgets($fh))[2]);
		//if ($proprietaryName == "\\N") {
		//	print($lineCount);
		//}

		if (! isset($propNames[$proprietaryName])) {
			$propNames[$proprietaryName] = 1;
		}
		else {
			$propNames[$proprietaryName]++;
		}
	}

	fclose($fh);

	$minLength = 0;
	$outputString = "";
	$count = 0;
	foreach ($propNames as $key => $value) {
		$outputString .= $key;
		if ($count++ < count($propNames) - 1) {
			$outputString .= "\n";
		}

		//print($key);
		//print(" => ");
		//print($value);
		//print("\n");
		if (strlen($key) > $minLength) $minLength = strlen($key);
	}


	$file = "proprietarynames.txt";
	file_put_contents($file, $outputString);
	print($minLength);


?>