<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<script src="/js/jq/jquery-ui-1.8.16.custom/development-bundle/ui/i18n/jquery.ui.datepicker-br.js"></script>
<script type="text/javascript"> 
$(document).ready(function() {
      $("#disciplina").validationEngine();
      $("#disciplina_fecha").datepicker({   
            defaultDate: "+1w",
            dateFormat: 'dd-mm-yy',        
            changeMonth: true,
            changeYear: true
          }); 
})
</script>

<form id="disciplina" action="<?php echo url_for('disciplina/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id_disciplina='.$form->getObject()->getIdDisciplina() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>

 <?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
<div class="frameForm" align="left">
  <table width="100%">
      <tr>
        <td>
            &nbsp;<?php echo __('Os campos marcados com') ?> <span class="required">*</span> <?php echo __('são requeridos')?>
        </td>
      </tr>
      <tr>
        <td id="errorGlobal">
            <?php echo $form->renderGlobalErrors() ?>
        </td>
      </tr>
    <tfoot>
      <tr>
        <td>
                                  <?php echo $form->renderHiddenFields(false) ?>
                        <table cellspacing="4">
                <tr>
                    <td>
                        <div class="button">
                                               <?php echo link_to(__('Voltar à lista'), '@default?module=disciplina&action=index&'.$sf_user->getAttribute('uri_disciplina'), array('class' => 'button')) ?>
                                            </div>
                    </td>            
                    <?php if (!$form->getObject()->isNew()): ?>
                    <td>
                        <div class="button">
                                            <?php echo link_to(__('Eliminar'), 'disciplina/delete?id_disciplina='.$form->getObject()->getIdDisciplina(), array('method' => 'delete', 'confirm' => __('Você tem certeza que deseja excluir esta caracterísitica?'), 'class' => 'button')) ?>
                                        </div>
                    </td>
                    <?php endif; ?>
                    <td>
                    <input type="submit" value="<?php echo __('Salvar') ?>" />
                    </td>
                </tr>
            </table>
        </td>
      </tr>
    </tfoot>
    <tbody>
        <tr>
            <td>                
                <table cellpadding="0" cellspacing="2" border="0" width="100%">
                                          <tr>
                      <td><?php echo $form['id_sem']->renderLabel() ?><br />
                        <?php echo $form['id_sem'] ?>
                        <?php echo $form['id_sem']->renderError() ?>
                    </td>
                  </tr>
                              <tr>
                      <td><?php echo $form['id_materia']->renderLabel() ?><br />
                        <?php echo $form['id_materia'] ?>
                        <?php echo $form['id_materia']->renderError() ?>
                    </td>
                  </tr>
                              <tr>
                      <td><?php echo $form['codigo']->renderLabel() ?><br />
                        <?php echo $form['codigo'] ?>
                        <?php echo $form['codigo']->renderError() ?>
                    </td>
                  </tr>
                              <tr>
                      <td><?php echo $form['nome_disciplina']->renderLabel() ?><br />
                        <?php echo $form['nome_disciplina'] ?>
                        <?php echo $form['nome_disciplina']->renderError() ?>
                    </td>
                  </tr>
                              <tr>
                      <td><?php echo $form['profesor']->renderLabel() ?><br />
                        <?php echo $form['profesor'] ?>
                        <?php echo $form['profesor']->renderError() ?>
                    </td>
                  </tr>
                              <tr>
                      <td><?php echo $form['numero_credito']->renderLabel() ?><br />
                        <?php echo $form['numero_credito'] ?>
                        <?php echo $form['numero_credito']->renderError() ?>
                    </td>
                  </tr>
                              <tr>
                      <td><?php echo $form['fecha']->renderLabel() ?><br />
                        <?php echo $form['fecha'] ?>
                        <?php echo $form['fecha']->renderError() ?>
                    </td>
                  </tr>
                  <tr>
                      <td><?php echo $form['hora_inicio']->renderLabel() ?><br />
                        <?php echo $form['hora_inicio'] ?>
                        <?php echo $form['hora_inicio']->renderError() ?>
                    </td>
                  </tr>
                              <tr>
                      <td><?php echo $form['hora_fim']->renderLabel() ?><br />
                        <?php echo $form['hora_fim'] ?>
                        <?php echo $form['hora_fim']->renderError() ?>
                    </td>
                  </tr>
                              <tr>
                      <td><?php echo $form['especiais']->renderLabel() ?><br />
                        <?php echo $form['especiais'] ?>
                        <?php echo $form['especiais']->renderError() ?>
                    </td>
                  </tr>
                              <tr>
                      <td><?php echo $form['unesp_unicamp']->renderLabel() ?><br />
                        <?php echo $form['unesp_unicamp'] ?>
                        <?php echo $form['unesp_unicamp']->renderError() ?>
                    </td>
                  </tr>
                              <tr>
                      <td><?php echo $form['regulares_usp']->renderLabel() ?><br />
                        <?php echo $form['regulares_usp'] ?>
                        <?php echo $form['regulares_usp']->renderError() ?>
                    </td>
                  </tr>
                              <tr>
                      <td><?php echo $form['local_curso']->renderLabel() ?><br />
                        <?php echo $form['local_curso'] ?>
                        <?php echo $form['local_curso']->renderError() ?>
                    </td>
                  </tr>
                              <tr>
                      <td><?php echo $form['status']->renderLabel() ?><br />
                        <?php echo $form['status'] ?>
                        <?php echo $form['status']->renderError() ?>
                    </td>
                  </tr>
                                        </table>                
            </td>
        </tr>
    </tbody>
  </table>
    </div>
</form>
