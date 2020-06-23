<?php

	$match = '/\\[EPC\\]/';

	$string = "[EPCBrandon";

	if (preg_match($match, $string)) {
		print("pattern found");
	}
?>