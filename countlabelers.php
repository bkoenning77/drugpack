<?php

	$file = "finished.txt";

	$fh = fopen($file, 'r') or die('error on file open');

	$labelers = array();
	$ndcs = array();
	$max_description = 0;

	while(! feof($fh)) {
		$linelabeler = explode("\t", fgets($fh));
		if (strlen($linelabeler[2]) > $max_description) {
			$max_description = strlen($linelabeler[2]);
		}

		$stringlabeler= trim(end($linelabeler));
		$ndcstring = trim($linelabeler[count($linelabeler) - 2]);
		if (isset($labelers[$stringlabeler])) {
			$labelers[$stringlabeler]++;
		}
		else {
			$labelers[$stringlabeler] = 1;
		}

		if (isset($ndcs[$ndcstring])) {
			$ndcs[$ndcstring]++;
		}
		else {
			$ndcs[$ndcstring] = 1;
		}
	}

	fclose($fh);
	$sum = 0;

	foreach ($labelers as $key => $value) {
		print($key);
		print("\t");
		print($value);
		print("\t");
		$sum += $value;
	}
	print($sum);

	foreach ($ndcs as $key => $value) {
		if ($value > 1) {
			print('value greater than 1 found');
			print("\n");
			print($key);
		}
	}

	print("Max description: ");
	print($max_description);
	print("\n");


?>