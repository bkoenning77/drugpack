<?php 

	$fh = fopen("drugfinal.txt", 'r');

	/*	the order of types in the file

	"PRODUCTNDC",	"PRODUCTTYPENAME", "PROPRIETARYNAME", "PROPRIETARYNAMESUFFIX", "NONPROPRIETARYNAME",	"DOSAGEFORMNAME", "ROUTENAME", "STARTMARKETINGDATE", "ENDMARKETINGDATE", 
		"MARKETINGCATEGORYNAME", "APPLICATIONNUMBER", "LABELERNAME", "SUBSTANCENAME", 
		"ACTIVE_NUMERATOR_STRENGTH", "ACTIVE_INGRED_UNIT", "PHARM_CLASSES",	"DEASCHEDULE",	
		"NDC_EXCLUDE_FLAG",	"LISTING_RECORD_CERTIFIED_THROUGH", "NDC9"

		*/

	$prodTypes = array();

	while(! feof($fh)) {

		$prodType = trim(explode("\t", fgets($fh))[1]);

		if (! isset($prodTypes[$prodType])) {
			$prodTypes[$prodType] = 1;
		}
		else {
			$prodTypes[$prodType]++;
		}
	}

	fclose($fh);

/*
	foreach ($prodTypes as $key => $value) {
		print($key);
		print(" => ");
		print($value);
		print("\n");

	}
	*/
	$outputString = "";

	$count = 0;
	foreach ($prodTypes as $key => $value) {
		$outputString .= ("'" . $key . "'");
		if ($count++ < count($prodTypes) - 1) {
			$outputString .= ", ";
		}
	}

	$file = "producttypescsv.txt";
	file_put_contents($file, $outputString);
?>