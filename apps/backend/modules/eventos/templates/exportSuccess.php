<?php use_helper('Date') ?>
<table cellpadding="0" cellspacing="0" border="0"  id="resultsList">
      <tr>
          <td colspan="5" style="color: #333;">
              <b><?php echo __('ABGE - EVENTO') ?><?php echo utf8_decode($evento->getTitulo()) ?></b>
          </td>
      </tr>
      
      <tr>
          <td colspan="5"><b>Participantes</b></td>
      </tr>
</table>
<table cellpadding="0" cellspacing="0" border="0"  id="resultsList">
    <thead>
      <tr>
          <th>
            Nome
          </th>
          <th>
            Email
          </th>
          <th>
            Rg
          </th>
          <th>
            Cpf
          </th>
          <th>
              Endere&ccedil;o
          </th>
          <th>
            N&uacute;mero
          </th>
          <th>
            Complemento
          </th>
          <th>
            CEP
          </th>
          <th>
            Cidade
          </th>
          <th>
            Estado
          </th>
          <th>
            Empresa
          </th>
          <th>
            CNPJ
          </th>
          <th>
              Endere&ccedil;o Empresa
          </th>
          <th>
            Número Empresa
          </th>
          <th>
            Complemento empresa
          </th>
          <th>
            Cep empresa
          </th>
          <th>
            Cidade empresa
          </th>
          <th>
            Estado empresa
          </th>
          <th>
            Telefone
          </th>
          <th>
            Celular
          </th>
          <th>
            Pagamento
          </th>
          <th>
            Es Associado
          </th>
          <th>
            Monto pago
          </th>
          <th>
            Fecha pago
          </th>
      </tr>
    </thead>
    <tbody id="fill">
        <?php if (count($participantes) > 0): ?>        
            <?php foreach ($participantes as $contato): ?>
                <tr>
                    <td><?php echo utf8_decode($contato->getNome()) ?>&nbsp;</td>
                    <td><?php echo $contato->getEmail() ?>&nbsp;</td>
                    <td><?php echo $contato->getRg() ?>&nbsp;</td>
                    <td><?php echo $contato->getCpf() ?>&nbsp;</td>
                    <td><?php echo utf8_decode($contato->getEndereco()) ?>&nbsp;</td>
                    <td><?php echo $contato->getNumero() ?>&nbsp;</td>
                    <td><?php echo $contato->getComplemento() ?>&nbsp;</td>
                    <td><?php echo $contato->getCep() ?>&nbsp;</td>
                    <td><?php echo utf8_decode($contato->getCidade()) ?>&nbsp;</td>
                    <td><?php echo utf8_decode($contato->getEstado()) ?>&nbsp;</td>
                    <td><?php echo utf8_decode($contato->getEmpresa()) ?>&nbsp;</td>
                    <td><?php echo $contato->getCnpj() ?>&nbsp;</td>
                    <td><?php echo utf8_decode($contato->getEnderecoEmpresa()) ?>&nbsp;</td>
                    <td><?php echo $contato->getNumeroEmpresa() ?>&nbsp;</td>
                    <td><?php echo $contato->getComplementoEmpresa() ?>&nbsp;</td>
                    <td><?php echo $contato->getCepEmpresa() ?>&nbsp;</td>
                    <td><?php echo utf8_decode($contato->getCidadeEmpresa()) ?>&nbsp;</td>
                    <td><?php echo utf8_decode($contato->getEstadoEmpresa()) ?>&nbsp;</td>
                    <td><?php echo $contato->getTelefone() ?>&nbsp;</td>
                    <td><?php echo $contato->getCelular() ?>&nbsp;</td>                    
                    <td><?php echo $contato->getPagamento() ?>&nbsp;</td>
                    <td><?php echo $contato->getEsAssociado() ?>&nbsp;</td>
                    <td><?php echo $contato->getMontoPago() ?>&nbsp;</td>
                    <td><?php echo $contato->getFechaPago() ?>&nbsp;</td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>    
  


