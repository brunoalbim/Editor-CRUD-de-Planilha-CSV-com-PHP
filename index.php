<?php include 'head.php'; ?>
<div class="uk-container uk-container-xsmall">
<h1>Editar Planilha CSV</h1>
<table class="uk-table uk-table-divider">
  <thead>
    <tr>
      <th>ID# tabela</th>
      <th>ID do plano</th>
      <th>Intervalo de Cobranca (meses)</th>
      <th>Meios de pagamento</th>
      <th>Nome do plano</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php include 'listar.php'; ?>
  </tbody>
</table>

<a class="uk-button uk-button-primary" href="#modal-example" uk-toggle>Adicionar linha</a> <br>
<a class="uk-button uk-button-default uk-margin-top" href="planilha.csv" uk-toggle>Baixar CSV</a>

<div id="modal-example" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <h2>Adicionar Nova Linha</h2>
        <form method="post" action="salvar.php">
          <div>
            <label>ID do plano:</label>
            <input class="uk-input" type="text" name="plano_id">
          </div>
          <div class="uk-margin">
            <label>Intervalo de Cobranca (meses):</label>
            <input class="uk-input" type="text" name="intervalo_cobranca">
          </div>
          <div class="uk-margin">
            <label>Meios de pagamento:</label><br>
            <input class="uk-checkbox" type="checkbox" name="meios_de_pagamento[]" value="bankslip"> Boleto (bankslip)<br>
            <input class="uk-checkbox" type="checkbox" name="meios_de_pagamento[]" value="credit"> Cartão de credito (credit)<br>
            <input class="uk-checkbox" type="checkbox" name="meios_de_pagamento[]" value="pix"> PIX (pix)
          </div>
          <div class="uk-margin">
            <label>Nome do plano:</label>
            <input class="uk-input" type="text" name="nome">
          </div>
          
          <div class="uk-margin">
            <input class="uk-button uk-button-primary" type="submit" value="Salvar">
          </div>
        </form>
    </div>
</div>
</div>

