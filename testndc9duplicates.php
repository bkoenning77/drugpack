<?php
	
			/*	the order of types in the file

	"PRODUCTNDC",	"PRODUCTTYPENAME", "PROPRIETARYNAME", "PROPRIETARYNAMESUFFIX", "NONPROPRIETARYNAME",	"DOSAGEFORMNAME", "ROUTENAME", "STARTMARKETINGDATE", "ENDMARKETINGDATE", 
		"MARKETINGCATEGORYNAME", "APPLICATIONNUMBER", "LABELERNAME", "SUBSTANCENAME", 
		"ACTIVE_NUMERATOR_STRENGTH", "ACTIVE_INGRED_UNIT", "PHARM_CLASSES",	"DEASCHEDULE",	
		"NDC_EXCLUDE_FLAG",	"LISTING_RECORD_CERTIFIED_THROUGH", "NDC9"

		*/

	$fh = fopen("drugfinal.txt", 'r');
	$ndcs = array();
	$count = 0;
	$nullFound = false;
	while (! feof($fh)) {
		$count++;

		$ndc = trim(explode("\t", fgets($fh))[19]);
		if ($ndc == "\\N") {
			$nullFound = true;
		}

		if (! isset($ndcs[$ndc])) {
			$ndcs[$ndc] = 1;
		}
		else {
			$ndcs[$ndc]++;
			print("\nDuplicate NDC found at ");
			print($count);
			print("\n");
		}

	}

	fclose($fh);

	if ($nullFound) {
		print("Null NDC was found\n");
	}
?>