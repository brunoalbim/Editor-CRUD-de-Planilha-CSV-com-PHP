<?php
$file = fopen('planilha.csv', 'r');
fgetcsv($file);
while (($row = fgetcsv($file)) !== false) {
	echo "<tr>";
	echo "<td>{$row[0]}</td>";
	echo "<td>{$row[1]}</td>";
	echo "<td>{$row[2]}</td>";
	echo "<td>{$row[3]}</td>";
	echo "<td>{$row[4]}</td>";
	echo "<td><a class='uk-button uk-button-default' href='editar.php?id={$row[0]}'>Editar</a> <br> <a class='uk-button uk-button-danger uk-margin-small-top' href='excluir.php?id={$row[0]}'>Excluir</a></td>";
	echo "</tr>";
}
fclose($file);
?>
