<?php
	


				/*	the order of types in the file

	"PRODUCTNDC",	"PRODUCTTYPENAME", "PROPRIETARYNAME", "PROPRIETARYNAMESUFFIX", "NONPROPRIETARYNAME",	"DOSAGEFORMNAME", "ROUTENAME", "STARTMARKETINGDATE", "ENDMARKETINGDATE", 
		"MARKETINGCATEGORYNAME", "APPLICATIONNUMBER", "LABELERNAME", "SUBSTANCENAME", 
		"ACTIVE_NUMERATOR_STRENGTH", "ACTIVE_INGRED_UNIT", "PHARM_CLASSES",	"DEASCHEDULE",	
		"NDC_EXCLUDE_FLAG",	"LISTING_RECORD_CERTIFIED_THROUGH", "NDC9"

		*/
	$fh = fopen("drugfinal.txt", 'r');
	$flags = array();


	while (! feof($fh)) {

		$item = trim(explode("\t", fgets($fh))[17]);

		if (! isset($flags[$item])) {
			$flags[$item] = 1;
		}
		else {
			$flags[$item]++;
		}
	}

	fclose($fh);

	$file = "excludeflagscsv.txt";
	$outputString = "";
	$count = 0;
	foreach ($flags as $key => $value) {
		$outputString .= ("'" . $key . "'");
		if ($count++ < count($flags) - 1) $outputString .= ",";
	}

	file_put_contents($file, $outputString);

?>