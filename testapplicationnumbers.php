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

	while(! feof($fh)) {

		$appNumber = trim(explode("\t", fgets($fh))[10]);

		if (strlen($appNumber) > $minLength) {
			$minLength = strlen($appNumber);
		} 

		if ($appNumber == "\\N") {
			print("null value found in application numbers");
			$nullCount++;
		}

	}

	print("\nMin length is ");
	print($minLength);
	print("\n");
	print($nullCount);
	print(" null values were found");
	print("\n");



?>