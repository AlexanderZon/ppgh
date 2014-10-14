<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<?php $tipo_solicitud = SolicitudTipoI18nPeer::retrieveByPK($form->getObject()->getIdSolicitudTipo(),'pt') ?>
<script type="text/javascript"> 
$(document).ready(function() {
      $("#solicitudes").validationEngine()
})
</script>

<form id="solicitudes" action="<?php echo url_for('solicitudes/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id_solicitud='.$form->getObject()->getIdSolicitud() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>

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
                                               <?php echo link_to(__('Voltar à lista'), '@default?module=solicitudes&action=index&'.$sf_user->getAttribute('uri_solicitudes'), array('class' => 'button')) ?>
                                            </div>
                    </td>            
                    <?php if (!$form->getObject()->isNew()): ?>
                    <td>
                        <div class="button">
                                            <?php echo link_to(__('Eliminar'), 'solicitudes/delete?id_solicitud='.$form->getObject()->getIdSolicitudTipo(), array('method' => 'delete', 'confirm' => __('Você tem certeza que deseja excluir esta caracterísitica?'), 'class' => 'button')) ?>
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
            <td style="vertical-align: top; width: 49%;">                
                <table cellpadding="0" cellspacing="2" border="0" width="100%">
                  <tr>
                      <td><label>Tipo de Solicitud</label>: 
                      <span style="color: #006699; font-size: 14px; font-weight: bold;">
                          <?php echo $tipo_solicitud->getNomeSolicitud() ?>
                      </span>
                    </td>
                  </tr>
                  <tr>
                      <td><?php echo $form['curso']->renderLabel() ?><br />
                        <?php echo $form['curso'] ?>
                        <?php echo $form['curso']->renderError() ?>
                    </td>
                  </tr>
                              <tr>
                      <td><?php echo $form['nome_completo']->renderLabel() ?><br />
                        <?php echo $form['nome_completo'] ?>
                        <?php echo $form['nome_completo']->renderError() ?>
                    </td>
                  </tr>
                              <tr>
                      <td><?php echo $form['numero_uso']->renderLabel() ?><br />
                        <?php echo $form['numero_uso'] ?>
                        <?php echo $form['numero_uso']->renderError() ?>
                    </td>
                  </tr>
                  <tr>
                      <td><?php echo $form['ministrante']->renderLabel() ?><br />
                        <?php echo $form['ministrante'] ?>
                        <?php echo $form['ministrante']->renderError() ?>
                    </td>
                  </tr>
                  <tr>
                      <td><?php echo $form['orientador']->renderLabel() ?><br />
                        <?php echo $form['orientador'] ?>
                        <?php echo $form['orientador']->renderError() ?>
                    </td>
                  </tr>
                  <tr>
                      <td><?php echo $form['email']->renderLabel() ?><br />
                        <?php echo $form['email'] ?>
                        <?php echo $form['email']->renderError() ?>
                    </td>
                  </tr>
                  <tr>
                      <td><?php echo $form['motivo_trancamento']->renderLabel() ?><br />
                        <?php echo $form['motivo_trancamento'] ?>
                        <?php echo $form['motivo_trancamento']->renderError() ?>
                    </td>
                  </tr>
                  <tr>
                      <td><?php echo $form['nivel']->renderLabel() ?><br />
                        <?php echo $form['nivel'] ?>
                        <?php echo $form['nivel']->renderError() ?>
                    </td>
                  </tr>
                  <tr>
                      <td><?php echo $form['cpf_do_aluno']->renderLabel() ?><br />
                        <?php echo $form['cpf_do_aluno'] ?>
                        <?php echo $form['cpf_do_aluno']->renderError() ?>
                    </td>
                  </tr>
                </table>                
            </td>
            <td style="vertical-align: top;">                
                <label>Arquivos</label><br />
                <?php if($arquivos['sugestao_banca']): ?>
                    <a href="<?php echo '/uploads/solicitudes/'.$arquivos['sugestao_banca'] ?>" target="_blank">
                        <?php echo image_tag('file_extension_pdf','style="position: relative; top: 4px; width:18px; "') ?>                                            
                        Sugestão de Banca
                    </a><br />
                <?php endif; ?>
                
                <?php if($arquivos['arq_plano_trabalho']): ?>
                    <a href="<?php echo '/uploads/solicitudes/'.$arquivos['arq_plano_trabalho'] ?>" target="_blank">
                        <?php echo image_tag('file_extension_pdf','style="position: relative; top: 4px; width:18px; "') ?>                                            
                        Plano de Trabalho
                    </a><br />
                <?php endif; ?>
                
                <?php if($arquivos['arq_justificativa']): ?>
                    <a href="<?php echo '/uploads/solicitudes/'.$arquivos['arq_justificativa'] ?>" target="_blank">
                        <?php echo image_tag('file_extension_pdf','style="position: relative; top: 4px; width:18px; "') ?>                                            
                        Justificativa
                    </a><br />
                <?php endif; ?>
                <?php if($arquivos['arq_orcamento']): ?>
                    <a href="<?php echo '/uploads/solicitudes/'.$arquivos['arq_orcamento'] ?>" target="_blank">
                        <?php echo image_tag('file_extension_pdf','style="position: relative; top: 4px; width:18px; "') ?>                                            
                        Orçamento
                    </a><br />
                <?php endif; ?>
                <?php if($arquivos['arq_curriculo_Latted']): ?>
                    <a href="<?php echo '/uploads/solicitudes/'.$arquivos['arq_curriculo_Latted'] ?>" target="_blank">
                        <?php echo image_tag('file_extension_pdf','style="position: relative; top: 4px; width:18px; "') ?>                                            
                        Currículo Lattes
                    </a><br />
                <?php endif; ?>
                <?php if($arquivos['arq_pedido_do_interessado']): ?>
                    <a href="<?php echo '/uploads/solicitudes/'.$arquivos['arq_pedido_do_interessado'] ?>" target="_blank">
                        <?php echo image_tag('file_extension_pdf','style="position: relative; top: 4px; width:18px; "') ?>                                            
                        Pedido do Interessado
                    </a><br />
                <?php endif; ?>
                <?php if($arquivos['arq_credenciamento']): ?>
                    <a href="<?php echo '/uploads/solicitudes/'.$arquivos['arq_credenciamento'] ?>" target="_blank">
                        <?php echo image_tag('file_extension_pdf','style="position: relative; top: 4px; width:18px; "') ?>                                            
                        Formulário de Credenciamento
                    </a><br />
                <?php endif; ?>
                <?php if($arquivos['arq_prof_externo']): ?>
                    <a href="<?php echo '/uploads/solicitudes/'.$arquivos['arq_prof_externo'] ?>" target="_blank">
                        <?php echo image_tag('file_extension_pdf','style="position: relative; top: 4px; width:18px; "') ?>                                            
                        Formulário de Professor Externo
                    </a><br />
                <?php endif; ?>
                <?php if($arquivos['arq_cadastro_docente_externo']): ?>
                    <a href="<?php echo '/uploads/solicitudes/'.$arquivos['arq_cadastro_docente_externo'] ?>" target="_blank">
                        <?php echo image_tag('file_extension_pdf','style="position: relative; top: 4px; width:18px; "') ?>                                            
                        Cadastro de Docente Externo
                    </a><br />
                <?php endif; ?>
                <?php if($arquivos['arq_carta_aluno']): ?>
                    <a href="<?php echo '/uploads/solicitudes/'.$arquivos['arq_carta_aluno'] ?>" target="_blank">
                        <?php echo image_tag('file_extension_pdf','style="position: relative; top: 4px; width:18px; "') ?>                                            
                        Carta do Aluno
                    </a><br />
                <?php endif; ?>
                <?php if($arquivos['arq_manifestacao_orientador']): ?>
                    <a href="<?php echo '/uploads/solicitudes/'.$arquivos['arq_manifestacao_orientador'] ?>" target="_blank">
                        <?php echo image_tag('file_extension_pdf','style="position: relative; top: 4px; width:18px; "') ?>                                            
                        Manifestação do Orientador(a)
                    </a><br />
                <?php endif; ?>
                <?php if($arquivos['arq_cronograma_actividades']): ?>
                    <a href="<?php echo '/uploads/solicitudes/'.$arquivos['arq_cronograma_actividades'] ?>" target="_blank">
                        <?php echo image_tag('file_extension_pdf','style="position: relative; top: 4px; width:18px; "') ?>                                            
                        Cronograma de Atividades
                    </a><br />
                <?php endif; ?>
                <?php if($arquivos['arq_copia_trabalho']): ?>
                    <a href="<?php echo '/uploads/solicitudes/'.$arquivos['arq_copia_trabalho'] ?>" target="_blank">
                        <?php echo image_tag('file_extension_pdf','style="position: relative; top: 4px; width:18px; "') ?>                                            
                        Cópia do Trabalho:
                    </a><br />
                <?php endif; ?>
                <?php if($arquivos['arq_comprobante']): ?>
                    <a href="<?php echo '/uploads/solicitudes/'.$arquivos['arq_comprobante'] ?>" target="_blank">
                        <?php echo image_tag('file_extension_pdf','style="position: relative; top: 4px; width:18px; "') ?>                                            
                        Comprobante
                    </a><br />
                <?php endif; ?>
                <?php if($arquivos['arq_transferenca_orientacao']): ?>
                    <a href="<?php echo '/uploads/solicitudes/'.$arquivos['arq_transferenca_orientacao'] ?>" target="_blank">
                        <?php echo image_tag('file_extension_pdf','style="position: relative; top: 4px; width:18px; "') ?>                                            
                        Formulário de Transferência de Orientação
                    </a><br />
                <?php endif; ?>
                <?php if($arquivos['arq_termo_orientador']): ?>
                    <a href="<?php echo '/uploads/solicitudes/'.$arquivos['arq_termo_orientador'] ?>" target="_blank">
                        <?php echo image_tag('file_extension_pdf','style="position: relative; top: 4px; width:18px; "') ?>                                            
                        Termo do Orientador
                    </a><br />
                <?php endif; ?>                
                <?php if($arquivos['arq_relatorio_qualificacao']): ?>
                    <a href="<?php echo '/uploads/solicitudes/'.$arquivos['arq_relatorio_qualificacao'] ?>" target="_blank">
                        <?php echo image_tag('file_extension_pdf','style="position: relative; top: 4px; width:18px; "') ?>                                            
                        Relatório de qualificação
                    </a><br />
                <?php endif; ?>                
                <?php if($arquivos['arq_projeto_pesquisa']): ?>
                    <a href="<?php echo '/uploads/solicitudes/'.$arquivos['arq_projeto_pesquisa'] ?>" target="_blank">
                        <?php echo image_tag('file_extension_pdf','style="position: relative; top: 4px; width:18px; "') ?>                                            
                        Projeto de Pesquisa
                    </a><br />
                <?php endif; ?>                
                <?php if($arquivos['arq_solicitacao_bolsa']): ?>
                    <a href="<?php echo '/uploads/solicitudes/'.$arquivos['arq_solicitacao_bolsa'] ?>" target="_blank">
                        <?php echo image_tag('file_extension_pdf','style="position: relative; top: 4px; width:18px; "') ?>                                            
                       Formulário de Solicitação de Bolsa
                    </a><br />
                <?php endif; ?>                
            </td>
        </tr>
    </tbody>
  </table>
    </div>
</form>
