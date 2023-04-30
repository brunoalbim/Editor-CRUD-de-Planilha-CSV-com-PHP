<?php
$id = $_GET['id'];
$file = fopen('planilha.csv', 'r');
$new_rows = [];
while (($row = fgetcsv($file)) !== false) {
	if ($row[0] != $id) {
		$new_rows[] = $row;
	}
}
fclose($file);
$file = fopen('planilha.csv', 'w');
foreach ($new_rows as $row) {
	fputcsv($file, $row);
}
fclose($file);
header('Location: index.php');
?>
