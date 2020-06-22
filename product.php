<?php

	$fh = fopen("product.txt", 'r');
	$line0 = fgets($fh);
	$keys = explode("\t", $line0);

	for ($i = 0; $i < count($keys); $i++) {
		$keys[$i] = trim($keys[$i]);
	}
/* keys to check for PRODUCTTYPENAME PROPRIETARYNAME PROPRIETARYNAMESUFFIX NONPROPRIETARYNAME
	DOSAGEFORMNAME ROUTENAME MARKETINGCATEGORYNAME  LABELERNAME PRODUCTNDC */

	$labelers = array();
	$longestlabeler = 0;
	
	while(! feof($fh)) {
		$line = fgets($fh);
		$line_contents = explode("\t", $line);
		$count = 0;
		$array = array();

		foreach ($keys as $value) {
			$array[$value] = trim($line_contents[$count++]);
		}

		$labelercode = explode("-", $array['PRODUCTNDC'])[0];
		if (strlen($labelercode) == 4) {
			$labelercode = "0" . $labelercode;
		}

		if (! isset($labelers[$labelercode])) {
			$labelers[$labelercode] = utf8_encode($array['LABELERNAME']);
			if (strlen($labelers[$labelercode]) > $longestlabeler) $longestlabeler = strlen($labelers[$labelercode]);
		}
	}
	
	fclose($fh);


	$finalstring = "";
	foreach ($labelers as $key => $value) {
		$finalstring .= $key;
		$finalstring .= "\t";
		$finalstring .= $value;
		$finalstring .= "\n";
	}

	//print($longestlabeler);

	$labelfile = "labelers.txt";
	file_put_contents($labelfile, $finalstring);
	//print($minLength);
?>