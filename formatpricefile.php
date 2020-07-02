<?php
	$fh = fopen("nadac.csv", 'r');
	$keys = explode(",", trim(fgets($fh)));
	$lineCount = 0;
	$dateMatch = '/\d{2}\/\d{2}\/\d{4}/';
	$commentMatch = '/\"[0-9 ,]+\"/';
	while (! feof($fh)) {
		//$lineCount++;
		$line = trim(fgets($fh));

		if (preg_match($commentMatch, $line)) {
			preg_match_all($commentMatch, $line, $commentMatches);
			$comment = $commentMatches[0][0];
			$commentReplacement = str_replace(",", "?", $comment);
			$line = str_replace($comment, $commentReplacement, $line);
			$line = str_replace('"', "", $line);
		}

		if (preg_match($dateMatch, $line)) {
			preg_match_all($dateMatch, $line, $dateMatches);
			$dates = $dateMatches[0];
			$dateReplacements = array();
			for ($i = 0; $i < count($dates); $i++) {
				$d = explode("/", $dates[$i]);
				$dateReplacements[$i] = $d[2] . "-" . $d[0] . "-" . $d[1];
			}
			for($i = 0; $i < count($dates); $i++) {
				$line = str_replace($dates[$i], $dateReplacements[$i], $line);
			}
		}

		$line = str_replace(",", "\t", $line);
		$line = str_replace("?", ",", $line);
		$lineContents = explode("\t", $line);
		for ($i = 0; $i < count($lineContents); $i++) {
			if ($lineContents[$i] == "") $lineContents[$i] = "\\N";
		}
		$newLine = "";
		for ($i = 0; $i < count($lineContents); $i++) {
			$newLine .= $lineContents[$i];
			if ($i < count($lineContents) - 1) {
				$newLine .= "\t";
			}
			else if ($i == count($lineContents) - 1) {
				$newLine .= "\n";
			}
		}

		file_put_contents("cleanpricefile.txt", $newLine, FILE_APPEND);

		//print($newLine);
		//$line = "";
	}

	fclose($fh);

?>