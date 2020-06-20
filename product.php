<?php

	$fh = fopen("product.txt", 'r');
	$line0 = fgets($fh);
	$keys = explode("\t", $line0);

	for ($i = 0; $i < count($keys); $i++) {
		$keys[$i] = trim($keys[$i]);
	}

	

	while(! feof($fh)) {
		$line = fgets($fh);


	}


?>