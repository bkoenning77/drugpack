<?php
	


				/*	the order of types in the file

	"PRODUCTNDC",	"PRODUCTTYPENAME", "PROPRIETARYNAME", "PROPRIETARYNAMESUFFIX", "NONPROPRIETARYNAME",	"DOSAGEFORMNAME", "ROUTENAME", "STARTMARKETINGDATE", "ENDMARKETINGDATE", 
		"MARKETINGCATEGORYNAME", "APPLICATIONNUMBER", "LABELERNAME", "SUBSTANCENAME", 
		"ACTIVE_NUMERATOR_STRENGTH", "ACTIVE_INGRED_UNIT", "PHARM_CLASSES",	"DEASCHEDULE",	
		"NDC_EXCLUDE_FLAG",	"LISTING_RECORD_CERTIFIED_THROUGH", "NDC9"

		*/
	$fh = fopen("drugfinal.txt", 'r');
	$deas = array();


	while (! feof($fh)) {

		$item = trim(explode("\t", fgets($fh))[16]);

		if (! isset($deas[$item])) {
			$deas[$item] = 1;
		}
		else {
			$deas[$item]++;
		}
	}

	fclose($fh);

	$file = "deaschedulescsv.txt";
	$outputString = "";
	$count = 0;
	foreach ($deas as $key => $value) {
		$outputString .= ("'" . $key . "'");
		if ($count++ < count($deas) - 1) $outputString .= ",";
	}

	file_put_contents($file, $outputString);

?>