<?php
	$fh = fopen("package.txt", 'r') or die('Error on file open');
	$str0 = fgets($fh);
	//print($str0);

	$keys = explode("\t", $str0);

	while (! feof($fh)) {
		$items = explode("\t", fgets($fh));

		foreach ($keys as $value) {
			
		}
	}
?>