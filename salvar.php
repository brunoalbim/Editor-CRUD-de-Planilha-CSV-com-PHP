<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $plano_id = $_POST['plano_id'];
    $intervalo_cobranca = $_POST['intervalo_cobranca'];
    $meios_de_pagamento = implode(',', $_POST['meios_de_pagamento']);
    $nome = $_POST['nome'];
    $file = fopen('planilha.csv', 'a');

    // obter o número total de linhas no arquivo CSV
    $id_da_linha = obterUltimoID();

    // verifica se o arquivo CSV está vazio
    if (filesize('planilha.csv') > 0) {
        fputcsv($file, [$id_da_linha, $plano_id, $intervalo_cobranca, $meios_de_pagamento, $nome]);
    } else {
        // o arquivo CSV está vazio, adiciona o valor na primeira linha
        fputcsv($file, ["id","plano_id","intervalo_cobranca","meios_de_pagamento","nome"]);
        fputcsv($file, [$id_da_linha, $plano_id, $intervalo_cobranca, $meios_de_pagamento, $nome]);
    }
    
    fclose($file);
    header('Location: index.php');
}



function obterUltimoID() {
    $arquivo = 'ultimo_id.txt';

    // Lê o último ID salvo no arquivo ou define o valor inicial como 0
    $ultimo_id = (int) file_get_contents($arquivo);

    // Incrementa o último ID em 1
    $novo_id = $ultimo_id + 1;

    // Salva o novo ID no arquivo de texto
    file_put_contents($arquivo, $novo_id);

    // Retorna o novo ID
    return $novo_id;
}