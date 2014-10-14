<script type="text/javascript">
    $(document).ready(function() {
        $("#data_nacimento").datepicker({
          dateFormat: 'yy-mm-dd',  
          yearRange: '-93:-13',
          changeMonth: true,
          changeYear: true
        });
        
        $("#pais").click(function() {
            if( $("#pais").val() == "BR" )
            {
                $("#dados-uf-br").show();  
                $("#dados-mu-br").show();  
            }else{
                $("#dados-uf-br").hide();  
                $("#dados-mu-br").hide();  
            }
        });  
        $("#dados-uf-br").show();  
        $("#dados-mu-br").show();  
        
    });
</script>
<table cellpadding="0" cellspacing="2" border="0" width="100%" id="register_user">
    <tr>
        <td colspan="6">
            <h3><?php echo __('DADOS PESSOA FISICA') ?></h3>
            <br />
        </td>
    </tr>
    <tr>
        <td style="width: 17%;"><?php echo __('Nome') ?> <span class="required">*</span></td>
        <td colspan="5">
            <?php echo $form['nome'] ?>
            <?php echo $form['nome']->renderError() ?>                          
        </td>
    </tr>
    <tr>
        <td><?php echo $form['cpf']->renderLabel() ?></td>
        <td width="30%">                        
          <?php echo $form['cpf'] ?>
          <?php echo $form['cpf']->renderError() ?>
        </td>
    </tr>
    <tr>
        <td><?php echo $form['rg']->renderLabel() ?>&nbsp;</td>
        <td colspan="5">
          <?php echo $form['rg'] ?>
          <?php echo $form['rg']->renderError() ?>
        </td>
        
    </tr>
    <tr>
        <td><?php echo $form['sexo']->renderLabel() ?></td>
        <td  colspan="5">
          <?php echo $form['sexo'] ?>
          <?php echo $form['sexo']->renderError() ?>
        </td>
     </tr>
    <tr>
        <td><?php echo $form['data_nacimento']->renderLabel() ?></td>
        <td colspan="5">
          <?php echo $form['data_nacimento'] ?>
          <?php echo $form['data_nacimento']->renderError() ?>
        </td>
    </tr>
    <tr>
        <td><?php echo $form['telefone']->renderLabel() ?></td>
        <td colspan="5">                        
          <?php echo $form['ddi_telefone'] ?>&nbsp;<?php echo $form['ddd_telefone'] ?>&nbsp;<?php echo $form['telefone'] ?>
          <?php echo $form['telefone']->renderError() ?>
        </td>        
    </tr>
    <tr>
        <td><?php echo $form['celular']->renderLabel() ?></td>
        <td colspan="5">                        
          <?php echo $form['ddi_celular'] ?>&nbsp;<?php echo $form['ddd_celular'] ?>&nbsp;<?php echo $form['celular'] ?>
          <?php echo $form['celular']->renderError() ?>
        </td>        
    </tr>
    <tr>
        <td><?php echo $form['endereco']->renderLabel() ?></td>
        <td >                        
          <?php echo $form['endereco'] ?>
          <?php echo $form['endereco']->renderError() ?>
        </td>
    </tr>
    <tr>
        <td><?php echo $form['complemento']->renderLabel() ?>&nbsp;</td>
        <td>
          <?php echo $form['complemento'] ?>
          <?php echo $form['complemento']->renderError() ?>
        </td>
    </tr>
    <tr>
        <td><?php echo $form['numero']->renderLabel() ?></td>
        <td>                        
          <?php echo $form['numero'] ?>
          <?php echo $form['numero']->renderError() ?>
        </td>
    </tr>
    <tr>
        <td><?php echo $form['pais']->renderLabel() ?>&nbsp;</td>
        <td>
          <?php echo $form['pais'] ?>
          <?php echo $form['pais']->renderError() ?>
        </td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr id="dados-uf-br">
        <td><?php echo $form['id_uf']->renderLabel() ?></td>
        <td >                        
          <?php echo $form['id_uf']->render(array('id' => 'id_uf', 'onchange' =>
                  jq_remote_function(array(
                    'update' => 'id_municipio',
                    'before' => '$("#id_municipio> option").remove();$("#id_municipio").append("<option>Cargando...</option>"); ',
                    'url'    => 'lxuser/getMunicipios',
                    'with'   => " 'id=' + this.value ",
                  ))))
          ?>
          <?php echo $form['id_municipio']->renderError() ?>
        </td>
    </tr>
    <tr id="dados-mu-br">
        <td><?php echo $form['id_municipio']->renderLabel() ?>&nbsp;</td>
        <td colspan="5">
          <?php echo $form['id_municipio'] ?>
          <?php echo $form['id_municipio']->renderError() ?>
        </td>
    </tr>
    <tr>
        <td><?php echo $form['barrio']->renderLabel() ?></td>
        <td colspan="5" >                        
          <?php echo $form['barrio'] ?>
          <?php echo $form['barrio']->renderError() ?>
        </td>
    </tr>
    <tr>
        <td><?php echo $form['cep']->renderLabel() ?>&nbsp;</td>
        <td colspan="5">
          <?php echo $form['cep'] ?>
          <?php echo $form['cep']->renderError() ?>
        </td>
    </tr>
    <tr>
        <td><?php echo $form['observacoes']->renderLabel() ?></td>
        <td colspan="5">
            <?php echo $form['observacoes'] ?>
            <?php echo $form['observacoes']->renderError() ?>                          
        </td>
    </tr>
    
    <tr>
        <td colspan="6"><?php echo $form->renderHiddenFields(false) ?></td>
    </tr>
</table>