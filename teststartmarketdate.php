<?php

		/*	the order of types in the file

	"PRODUCTNDC",	"PRODUCTTYPENAME", "PROPRIETARYNAME", "PROPRIETARYNAMESUFFIX", "NONPROPRIETARYNAME",	"DOSAGEFORMNAME", "ROUTENAME", "STARTMARKETINGDATE", "ENDMARKETINGDATE", 
		"MARKETINGCATEGORYNAME", "APPLICATIONNUMBER", "LABELERNAME", "SUBSTANCENAME", 
		"ACTIVE_NUMERATOR_STRENGTH", "ACTIVE_INGRED_UNIT", "PHARM_CLASSES",	"DEASCHEDULE",	
		"NDC_EXCLUDE_FLAG",	"LISTING_RECORD_CERTIFIED_THROUGH", "NDC9"

		*/

	$fh = fopen("drugfinal.txt", 'r');

	while (! feof($fh)) {
		$match = '/\d{4}-\d{2}-\d{2}/';


		$startDate = trim(explode("\t", fgets($fh))[7]);
		//print($startDate);

		if ($startDate == "\\N" || !preg_match($match, $startDate)) {
			print("Null value found");
		}
	}


	fclose($fh);


?>