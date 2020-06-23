<?php
	

	$fh = fopen("pharmclasses.txt", 'r');
	$epcs = array();
	$moas = array();
	$pes = array();
	$css = array();

	$epcMatch = '/\\[EPC\\]/';
	$moaMatch = '/\\[MoA\\]/';
	$peMatch = '/\\[PE\\]/';
	$csMatch = '/\\[CS\\]/';

	while (! feof($fh)) {

		$lineArray = explode(",", trim(fgets($fh)));



		foreach ($lineArray as $value) {
			if (preg_match($epcMatch, $value)) {
				if (! isset($epcs[$value])) {
					$epcs[$value] = 1;
				}
				else {
					$epcs[$value]++;
				}
			}
			elseif (preg_match($peMatch, $value)) {
				if (! isset($pes[$value])) {
					$pes[$value] = 1;
				}
				else {
					$pes[$value]++;
				}
				
			}
			elseif (preg_match($moaMatch, $value)) {
				if (! isset($moas[$value])) {
					$moas[$value] = 1;
				}
				else {
					$moas[$value]++;
				}
			}
			elseif (preg_match($csMatch, $value)) {
				if (! isset($css[$value])) {
					$css[$value] = 1;
				}
				else {
					$css[$value]++;
				}
				
			}

		}
	}

	fclose($fh);


	// begin put file for epcs


	$outputString = "";
	$count = 0;
	foreach ($epcs as $key => $value) {
		$s = str_replace("[EPC]", "", $key);
		$s = trim($s);
		$outputString .= $s;
		if ($count < count($epcs) - 1) $outputString .= "\n";
	}

	$file = "epcs.txt";
	file_put_contents($file, $outputString);

	$outputString = "";
	$count = 0;
	foreach ($epcs as $key => $value) {
		$s = str_replace("[EPC]", "", $key);
		$s = trim($s);
		$outputString .= ("'" . $s . "'");
		if ($count < count($epcs) - 1) $outputString .= ", ";
	}

	$file = "epcscsv.txt";
	file_put_contents($file, $outputString);

	// end put file for epcs


	// begin put file for moas

	$outputString = "";
	$count = 0;
	foreach ($moas as $key => $value) {
		$s = str_replace("[MoA]", "", $key);
		$s = trim($s);
		$outputString .= $s;
		if ($count < count($moas) - 1) $outputString .= "\n";
	}

	$file = "moas.txt";
	file_put_contents($file, $outputString);

	$outputString = "";
	$count = 0;
	foreach ($moas as $key => $value) {
		$s = str_replace("[MoA]", "", $key);
		$s = trim($s);
		$outputString .= ("'" . $s . "'");
		if ($count < count($moas) - 1) $outputString .= ", ";
	}

	$file = "moascsv.txt";
	file_put_contents($file, $outputString);

	// end put file for moas

	// begin put file for cs's

	$outputString = "";
	$count = 0;
	foreach ($css as $key => $value) {
		$s = str_replace("[CS]", "", $key);
		$s = trim($s);
		$outputString .= $s;
		if ($count < count($css) - 1) $outputString .= "\n";
	}

	$file = "css.txt";
	file_put_contents($file, $outputString);

	$outputString = "";
	$count = 0;
	foreach ($css as $key => $value) {
		$s = str_replace("[CS]", "", $key);
		$s = trim($s);
		$outputString .= ("'" . $s . "'");
		if ($count < count($css) - 1) $outputString .= ", ";
	}

	$file = "csscsv.txt";
	file_put_contents($file, $outputString);

	// end put file for cs's

	// begin put file for pe's

	$outputString = "";
	$count = 0;
	foreach ($pes as $key => $value) {
		$s = str_replace("[PE]", "", $key);
		$s = trim($s);
		$outputString .= $s;
		if ($count < count($pes) - 1) $outputString .= "\n";
	}

	$file = "pes.txt";
	file_put_contents($file, $outputString);

	$outputString = "";
	$count = 0;
	foreach ($pes as $key => $value) {
		$s = str_replace("[PE]", "", $key);
		$s = trim($s);
		$outputString .= ("'" . $s . "'");
		if ($count < count($pes) - 1) $outputString .= ", ";
	}

	$file = "pescsv.txt";
	file_put_contents($file, $outputString);

	// end put file for pe's



?>