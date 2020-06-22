<?php
	$fh = fopen("product.txt", 'r');

	$keys = explode("\t", trim(fgets($fh)));

	$array = array();

	$fileString = "";

	utf8_encode(data)

	while(! feof($fh)) {

		$lineOutput = "";

		$elements = explode("\t", fgets($fh));

		$count = 0;

		foreach ($keys as $value) {
			$array[$value] = trim($elements[$count++]);
		}

		foreach ($array as $key => $value) {
			if ($key == 'PRODUCTNDC') {
				$ndcsplit = explode("-", $value);
				if (strlen($ndcsplit[0]) == 4) {
					$ndcsplit[0] = "0" . $ndcsplit[0];
				}
				if (strlen($ndcsplit[1]) == 3) {
					$ndcsplit[1] = "0" . $ndcsplit[1];
				}
				$array[$key] = $ndcsplit[0] . "-" . $ndcsplit[1];
			}

			if ($key == 'STARTMARKETINGDATE' || $key == 'ENDMARKETINGDATE' || 
				$key == 'LISTING_RECORD_CERTIFIED_THROUGH') {
				if ($array[$key] != "") {
					$array[$key] = substr($value, 0, 4) . "-" . substr($value, 4, 2) . "-" . substr($value, 6, 2);
				} 
			}
			if ($value == "N") {
				$array[$key] = "No";
			}
			elseif ($value == "Y") {
				$array[$key] = "Yes";
			}
			elseif ($value == "I") {
				$array[$key] = "Inactive";
			}
			elseif ($value == "E") {
				$array[$key] = "Expired";
			}

			if ($value == "") {
				$array[$key] = "\\N";
			}
		}
		$array['NDC9'] = str_replace("-", "", $array['PRODUCTNDC']);
		$array['LABELERNAME'] = utf8_encode($array['LABELERNAME']);
		

		$itemCount = 0;
		foreach ($array as $key => $value) {
			if ($key != 'PRODUCTID') {
				$lineOutput .= $value;
				if ($itemCount++ < count($array) - 2) {
					$lineOutput .= "\t";
				}
			}
		}

		$lineOutput .= "\n";
		$fileString .= $lineOutput;
	}

	fclose($fh);

	$finalOuputFile = "drugfinal.txt";

	/* will generate file as 
	PRODUCTNDC	PRODUCTTYPENAME	PROPRIETARYNAME	PROPRIETARYNAMESUFFIX	NONPROPRIETARYNAME	DOSAGEFORMNAME	ROUTENAME	STARTMARKETINGDATE	ENDMARKETINGDATE	MARKETINGCATEGORYNAME	APPLICATIONNUMBER	LABELERNAME	SUBSTANCENAME	ACTIVE_NUMERATOR_STRENGTH	ACTIVE_INGRED_UNIT	PHARM_CLASSES	DEASCHEDULE	NDC_EXCLUDE_FLAG	LISTING_RECORD_CERTIFIED_THROUGH NDC9 */

	file_put_contents($finalOuputFile, $fileString);
	/*foreach ($array as $key => $value) {
		if ($key == 'PRODUCTNDC') {
			$ndcsplit = explode("-", $value);
			if (strlen($ndcsplit[0]) == 4) {
				$ndcsplit[0] = "0" . $ndcsplit[0];
				$array[$key] = $ndcsplit[0] . "-" . $ndcsplit[1];
			}
		}


	}*/
?>