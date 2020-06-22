<?php

	$fh = fopen("drugfinal.txt", 'r');

	$keys = array("PRODUCTNDC",	"PRODUCTTYPENAME", "PROPRIETARYNAME", "PROPRIETARYNAMESUFFIX", "NONPROPRIETARYNAME",	"DOSAGEFORMNAME", "ROUTENAME", "STARTMARKETINGDATE", "ENDMARKETINGDATE", 
		"MARKETINGCATEGORYNAME", "APPLICATIONNUMBER", "LABELERNAME", "SUBSTANCENAME", 
		"ACTIVE_NUMERATOR_STRENGTH", "ACTIVE_INGRED_UNIT", "PHARM_CLASSES",	"DEASCHEDULE",	
		"NDC_EXCLUDE_FLAG",	"LISTING_RECORD_CERTIFIED_THROUGH", "NDC9");

	$routes = array();

	while(! feof($fh)) {
		$elements = explode("\t", trim(fgets($fh)));
		//$count = 0;
		$route = $elements[6];
		//foreach ($keys as $value) {
		if (! isset($routes[$route])) {
			$routes[$route] = 1; 
		}
		else {
			$routes[$route]++;
		}
		//}
	}

	fclose($fh);


	$routeString = "";
	foreach ($routes as $key => $value) {
		$routeString .= $key;
		$routeString .= "\n";
		//print($key);
		//print(" => ");
		//print($value);
		//print("\n");
	}

	$route_csv_string = "";
	$count = 0;
	foreach ($routes as $key => $value) {
		$route_csv_string .= ("'" . $key . "'");
		if ($count++ < count($routes) - 1) {
			$route_csv_string .= ", ";
		}
	}

	$file = "routes.txt";
	$file2 = "routescsv.txt";





	file_put_contents($file, $routeString);
	file_put_contents($file2, $route_csv_string);
?>