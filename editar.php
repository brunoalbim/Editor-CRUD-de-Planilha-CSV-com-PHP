<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$id = $_POST['id'];
	$plano_id = $_POST['plano_id'];
	$intervalo_cobranca = $_POST['intervalo_cobranca'];
	$meios_de_pagamento = implode(',', $_POST['meios_de_pagamento']);
	$nome = $_POST['nome'];
	$file = fopen('planilha.csv', 'r');
	$new_rows = [];
	while (($row = fgetcsv($file)) !== false) {
		if ($row[0] == $id) {
			$new_rows[] = [$id, $plano_id, $intervalo_cobranca, $meios_de_pagamento, $nome];
		} else {
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
} else {
  include 'head.php';
  
	$id = $_GET['id'];
	$file = fopen('planilha.csv', 'r');
	while (($row = fgetcsv($file)) !== false) {
		if ($row[0] == $id) {
			$plano_id = $row[1];
			$intervalo_cobranca = $row[2];
			$meios_de_pagamento = $row[3];
			$nome = $row[4];
			break;
		}
	}
	fclose($file);
}
?>


<div class="uk-container uk-container-xsmall">
<h2>Editar Linha</h2>
<form method="post" action="">
  <input type="hidden" name="id" value="<?php echo $id; ?>">
  <div>
    <label>ID do plano:</label>
    <input class="uk-input" type="text" name="plano_id" value="<?php echo $plano_id; ?>">
  </div>
  <div class="uk-margin">
    <label>Intervalo de Cobranca (meses):</label>
    <input class="uk-input" type="text" name="intervalo_cobranca" value="<?php echo $intervalo_cobranca; ?>">
  </div>
  <div class="uk-margin">
    <label>Meios de pagamento:</label><br>
    <input class="uk-checkbox" type="checkbox" name="meios_de_pagamento[]" value="bankslip" <?= strpos($meios_de_pagamento, "bankslip") !== false ?'checked':'' ?>> Boleto (bankslip)<br>
    <input class="uk-checkbox" type="checkbox" name="meios_de_pagamento[]" value="credit" <?= strpos($meios_de_pagamento, "credit") !== false ?'checked':'' ?>> Cartão de credito (credit)<br>
    <input class="uk-checkbox" type="checkbox" name="meios_de_pagamento[]" value="pix" <?= strpos($meios_de_pagamento, "pix") !== false ?'checked':'' ?>> PIX (pix)
  </div>
  <div class="uk-margin">
    <label>Nome do plano:</label>
    <input class="uk-input" type="text" name="nome" value="<?php echo $nome; ?>">
  </div>
  
  <div class="uk-margin">
    <input class="uk-button uk-button-primary" type="submit" value="Salvar">
  </div>
</form>
</div>