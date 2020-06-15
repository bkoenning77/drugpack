<?php
	$fh = fopen("package.txt", 'r') or die('Error on file open');
	$str0 = fgets($fh);

	$keys = explode("\t", $str0);

	$final_string = "";



	while (! feof($fh)) {
		$items = explode("\t", fgets($fh));
		$item_array = array();

		$line_string = "";

		$count = 0;
		foreach ($keys as $value) {
			$item_array[$value] = trim($items[$count++]);
		}

		foreach ($item_array as $key => $value) {
			if ($value == "") {
				$item_array[$key] = "\\N";
			}
		}

		foreach ($item_array as $key => $value) {
			if ($key == "PRODUCTNDC" || $key == "NDCPACKAGECODE") {
				$ndc_components = explode("-", $value);
				if (count($ndc_components) == 2) {
					if (strlen($ndc_components[0]) == 4) {
						$ndc_components[0] = "0" . $ndc_components[0];
					}
					if (strlen($ndc_components[1]) == 3) {
						$ndc_components[1] = "0" . $ndc_components[1];
					}
					$item_array[$key] = $ndc_components[0] . "-" . $ndc_components[1];
				}

				elseif (count($ndc_components) == 3) {
					if (strlen($ndc_components[0]) == 4) {
						$ndc_components[0] = "0" . $ndc_components[0];
					}
					if (strlen($ndc_components[1]) == 3) {
						$ndc_components[1] = "0" . $ndc_components[1];
					}
					if (strlen($ndc_components[2]) == 1) {
						$ndc_components[2] = "0" . $ndc_components[2];
					}
					$item_array[$key] = $ndc_components[0] . "-" . $ndc_components[1] . "-" . $ndc_components[2];
				}
			}
			elseif (($key == "STARTMARKETINGDATE" || $key == "ENDMARKETINGDATE") && $value != "\\N") {
				$item_array[$key] = substr($value, 0, 4) . "-" . substr($value, 4, 2) . "-" . substr($value, 6, 2);
			}
			elseif ($value == "N") {
				$item_array[$key] = "No";
			}
			elseif ($value == "Y") {
				$item_array[$key] = "Yes";
			}
		}

		$item_array['FULLNDC'] = str_replace("-", "", $item_array['NDCPACKAGECODE']);

		$count = 0;
		foreach ($item_array as $key => $value) {
			$line_string .= $value;
			if ($count++ == count($item_array) - 1) {
				$line_string .= "\n";
			}
			else {
				$line_string .= "\t";
			}
		}
		$final_string .= $line_string;

	}

	$file_name = "finished.txt";
	file_put_contents($file_name, $final_string);
	fclose($fh);
?>