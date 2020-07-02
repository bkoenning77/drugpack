<?php
	$hn = 'localhost';
	$db = 'drugdb';
	$un = 'drugadm';
	$pw = 'Amlodipine2!';

	$conn = new mysqli($hn, $un, $pw, $db);

	if ($conn->connect_error) die('Fatal error');

	$query = "SELECT * FROM druglabelers WHERE labeler LIKE '%La%'";

	$result = $conn->query($query);

	$rows = $result->num_rows;

	print($rows);
	print("\n");

	for ($j = 0; $j < $rows; $j++) {
		$row = $result->fetch_array(MYSQLI_ASSOC);

		print($row['labeler_code']);
		print("\t");
		print($row['labeler']);
		print("\n");
	}

	$result->close();

	$conn->close();


?>