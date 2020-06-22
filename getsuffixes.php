<?php

		/*	the order of types in the file

	"PRODUCTNDC",	"PRODUCTTYPENAME", "PROPRIETARYNAME", "PROPRIETARYNAMESUFFIX", "NONPROPRIETARYNAME",	"DOSAGEFORMNAME", "ROUTENAME", "STARTMARKETINGDATE", "ENDMARKETINGDATE", 
		"MARKETINGCATEGORYNAME", "APPLICATIONNUMBER", "LABELERNAME", "SUBSTANCENAME", 
		"ACTIVE_NUMERATOR_STRENGTH", "ACTIVE_INGRED_UNIT", "PHARM_CLASSES",	"DEASCHEDULE",	
		"NDC_EXCLUDE_FLAG",	"LISTING_RECORD_CERTIFIED_THROUGH", "NDC9"

		*/

	$fh = fopen("drugfinal.txt", 'r');
	$suffixes = array();

	while (! feof($fh)) {

		$suffix = trim(explode("\t", fgets($fh))[3]);

		if (! isset($suffixes[$suffix])) {
			$suffixes[$suffix] = 1;
		}
		else {
			$suffixes[$suffix]++;
		}
	}

	fclose($fh);

	$minLength = 0;
	$outputString = "";
	$count = 0;
	foreach ($suffixes as $key => $value) {
		$outputString .= $key;
		if ($count++ < count($suffixes) - 1) {
			$outputString .= "\n";
		}

		//print($key);
		//print(" => ");
		//print($value);
		//print("\n");
		if (strlen($key) > $minLength) $minLength = strlen($key);
	}


	$file = "suffixes.txt";
	file_put_contents($file, $outputString);
	print($minLength);
?>