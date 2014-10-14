<?php use_helper('I18N') ?>
<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<?php use_stylesheet('validationEngine.jquery.css')?>
<?php use_javascript('jq/jquery.validationEngine.js')?>
<?php use_javascript('jq/jquery.validationEngine-pt_BR.js')?>
<script type="text/javascript"> 
    $(document).ready(function() {
        $("#solicitud").validationEngine()
    })
</script>
<?php if ($sf_user->hasFlash('listo')): ?>
    <div class="msn_ready"><?php echo $sf_user->getFlash('listo') ?></div>
<?php elseif($sf_user->hasFlash('error')):?>
    <div class="msn_error"><?php echo $sf_user->getFlash('error') ?></div>
<?php endif; ?>
<h4><?php echo $dataTipo->getNomeSolicitud() ?></h4>
<div style="font-size: 12px;">
    <?php echo html_entity_decode($dataTipo->getDescricao()) ?>
</div>
<?php if($status_tipo->getStatus()): ?>
<div class="texto" style="margin-top:20px;">    
    <form id="solicitud" action="" method="post"  method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
        <table cellpadding="0" cellspacing="0" border="0" style="margin-top: 15px;" id="table-form">
            <tr>
                <td id="errorGlobal">
                    <?php echo $form->renderGlobalErrors() ?>
                </td>
            </tr>
            <tr style="display: none;">
                <td>
                    <?php echo $form['programa']->renderLabel() ?><br />
                    <?php echo $form['programa'] ?>
                    <?php echo $form['programa']->renderError() ?>
                    <span class="msn_help"><?php echo $form['programa']->renderHelp() ?></span>
                </td>           
            </tr>
            <?php if($status_tipo->getTipoForm() >= 4): ?>
            <tr>
                <td>
                    <?php echo $form['curso']->renderLabel() ?><br />
                    <?php echo $form['curso'] ?>
                    <?php echo $form['curso']->renderError() ?>
                </td>           
            </tr>
            <?php endif; ?>
            <tr>
                <td>
                    <?php echo $form['nome_completo']->renderLabel() ?><br />
                    <?php echo $form['nome_completo'] ?>
                    <?php echo $form['nome_completo']->renderError() ?>
                </td>           
            </tr>
            <tr>
                <td>
                    <?php echo $form['numero_uso']->renderLabel() ?><br />
                    <?php echo $form['numero_uso'] ?>
                    <?php echo $form['numero_uso']->renderError() ?>
                </td>           
            </tr>
            <?php if($status_tipo->getTipoForm() == 5): ?>
            <tr>
                <td>
                    <?php echo $form['cpf_do_aluno']->renderLabel() ?><br />
                    <?php echo $form['cpf_do_aluno'] ?>
                    <?php echo $form['cpf_do_aluno']->renderError() ?>
                </td>           
            </tr>
            <?php endif; ?>
            <?php if($status_tipo->getTipoForm() == 6 || $status_tipo->getTipoForm() == 7 || $status_tipo->getTipoForm() == 9 ): ?>
            <tr>
                <td>
                    <?php echo $form['orientador']->renderLabel() ?><br />
                    <?php echo $form['orientador'] ?>
                    <?php echo $form['orientador']->renderError() ?>
                    <span class="msn_help"><?php echo $form['orientador']->renderHelp() ?></span>
                </td>           
            </tr>
            <?php endif; ?>
            <?php if($status_tipo->getTipoForm() == 8): ?>
            <tr>
                <td>
                    <?php echo $form['motivo_trancamento']->renderLabel() ?><br />
                    <?php echo $form['motivo_trancamento'] ?>
                    <?php echo $form['motivo_trancamento']->renderError() ?>
                    <span class="msn_help"><?php echo $form['motivo_trancamento']->renderHelp() ?></span>
                </td>           
            </tr>
            <?php endif; ?>
            <?php if($status_tipo->getTipoForm() == 50): ?>
            <link rel="stylesheet" href="/css/cupertino/jquery-ui-1.8.1.custom.css" />
            <script src="/js/jq/jquery-ui-1.8.16.custom/js/jquery-1.6.2.min.js" type="text/javascript"></script>
            <script src="/js/jq/jquery-ui-1.8.16.custom/js/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
            <script src="/js/jq/jquery-ui-1.8.16.custom/development-bundle/ui/jquery.ui.core.js"></script>
            <script src="/js/jq/jquery-ui-1.8.16.custom/development-bundle/ui/jquery.ui.widget.js"></script>
            <script src="/js/jq/jquery-ui-1.8.16.custom/development-bundle/ui/jquery.ui.datepicker.js"></script>
            <script type="text/javascript">
                $(document).ready(function() {
                    $("#solicitud_data_realizacao").datepicker({   
                        defaultDate: "+1w",
                        dateFormat: 'dd-mm-yy',        
                        changeMonth: true,
                        changeYear: true
                      }); 
                })
            </script>
            <tr>
                <td>
                    <?php echo $form['data_realizacao']->renderLabel() ?><br />
                    <?php echo $form['data_realizacao'] ?>
                    <?php echo $form['data_realizacao']->renderError() ?>
                    <span class="msn_help"><?php echo $form['data_realizacao']->renderHelp() ?></span>
                </td>           
            </tr>
            <?php endif; ?>
            <?php if($status_tipo->getTipoForm() == 4): ?>
            <tr>
                <td>
                    <?php echo $form['sugestao_banca']->renderLabel() ?><br />
                    <?php echo $form['sugestao_banca'] ?>
                    <?php echo $form['sugestao_banca']->renderError() ?>
                    <span class="msn_help"><?php echo $form['sugestao_banca']->renderHelp() ?></span>
                </td>           
            </tr>
            <?php endif; ?>
            <?php if($status_tipo->getTipoForm() == 4): ?>
            <tr>
                <td>
                    <?php echo $form['arq_cadastro_docente_externo']->renderLabel() ?><br />
                    <?php echo $form['arq_cadastro_docente_externo'] ?>
                    <?php echo $form['arq_cadastro_docente_externo']->renderError() ?>
                    <span class="msn_help"><?php echo $form['arq_cadastro_docente_externo']->renderHelp() ?></span>
                </td>           
            </tr>
            <?php endif; ?>
            <?php if($status_tipo->getTipoForm() == 3): ?>
            <tr>
                <td>
                    <?php echo $form['ministrante']->renderLabel() ?><br />
                    <?php echo $form['ministrante'] ?>
                    <?php echo $form['ministrante']->renderError() ?>
                    <span class="msn_help"><?php echo $form['ministrante']->renderHelp() ?></span>
                </td>           
            </tr>
            <?php endif; ?>
            <?php if($status_tipo->getTipoForm() == 2 || $status_tipo->getTipoForm() == 7 || $status_tipo->getTipoForm() == 8): ?>
            <!-- Arquivo Justificativa -->
            <tr><td><div style="border-bottom: 1px solid #ccc;">&nbsp;</div></td></tr>
            <tr>
                <td>
                    <?php echo $form['arq_justificativa']->renderLabel() ?><br />
                    <?php echo $form['arq_justificativa'] ?>
                    <?php echo $form['arq_justificativa']->renderError() ?>
                    <span class="msn_help"><?php echo $form['arq_justificativa']->renderHelp() ?></span>
                </td>           
            </tr>
            <?php endif; ?>
            <?php if($status_tipo->getTipoForm() == 2): ?>
            <!-- Arquivo Plano de Trabajo -->
            <tr><td><div style="border-bottom: 1px solid #ccc;">&nbsp;</div></td></tr>
            <tr>
                <td>
                    <?php echo $form['arq_plano_trabalho']->renderLabel() ?><br />
                    <?php echo $form['arq_plano_trabalho'] ?>
                    <?php echo $form['arq_plano_trabalho']->renderError() ?>
                    <span class="msn_help"><?php echo $form['arq_plano_trabalho']->renderHelp() ?></span>
                </td>           
            </tr>
            
            <!-- Arquivo Orcamento -->
            <tr><td><div style="border-bottom: 1px solid #ccc;">&nbsp;</div></td></tr>
            <tr>
                <td>
                    <?php echo $form['arq_orcamento']->renderLabel() ?><br />
                    <?php echo $form['arq_orcamento'] ?>
                    <?php echo $form['arq_orcamento']->renderError() ?>
                    <span class="msn_help"><?php echo $form['arq_orcamento']->renderHelp() ?></span>
                </td>           
            </tr>
            <?php endif; ?>
            <?php if($status_tipo->getTipoForm() == 3): ?>
            <!-- Arquivo Crednciamento -->
            <tr><td><div style="border-bottom: 1px solid #ccc;">&nbsp;</div></td></tr>
            <tr>
                <td>
                    <?php echo $form['arq_credenciamento']->renderLabel() ?><br />
                    <?php echo $form['arq_credenciamento'] ?>
                    <?php echo $form['arq_credenciamento']->renderError() ?>
                    <span class="msn_help"><?php echo $form['arq_credenciamento']->renderHelp() ?></span>
                </td>           
            </tr>
            <!-- Arquivo Profesor Externo -->
            <tr><td><div style="border-bottom: 1px solid #ccc;">&nbsp;</div></td></tr>
            <tr>
                <td>
                    <?php echo $form['arq_prof_externo']->renderLabel() ?><br />
                    <?php echo $form['arq_prof_externo'] ?>
                    <?php echo $form['arq_prof_externo']->renderError() ?>
                    <span class="msn_help"><?php echo $form['arq_prof_externo']->renderHelp() ?></span>
                </td>           
            </tr>
            <?php endif; ?>
            <?php if($status_tipo->getTipoForm() <= 3 || $status_tipo->getTipoForm() == 5): ?>
            <!-- Arquivo CV -->
            <tr><td><div style="border-bottom: 1px solid #ccc;">&nbsp;</div></td></tr>
            <tr>
                <td>
                    <?php echo $form['arq_curriculo_Latted']->renderLabel() ?><br />
                    <?php echo $form['arq_curriculo_Latted'] ?>
                    <?php echo $form['arq_curriculo_Latted']->renderError() ?>
                    <span class="msn_help"><?php echo $form['arq_curriculo_Latted']->renderHelp() ?></span>
                </td>           
            </tr>
            <?php endif; ?>
            <?php if($status_tipo->getTipoForm() == 1): ?>
            <!-- Arquivo arq_pedido_do_interessado -->
            <tr><td><div style="border-bottom: 1px solid #ccc;">&nbsp;</div></td></tr>
            <tr>
                <td>
                    <?php echo $form['arq_pedido_do_interessado']->renderLabel() ?><br />
                    <?php echo $form['arq_pedido_do_interessado'] ?>
                    <?php echo $form['arq_pedido_do_interessado']->renderError() ?>
                    <span class="msn_help"><?php echo $form['arq_pedido_do_interessado']->renderHelp() ?></span>
                </td>           
            </tr>
            <?php endif; ?>
            <?php if($status_tipo->getTipoForm() == 6): ?>
            <!-- Arquivo Carta do Aluno -->
            <tr><td><div style="border-bottom: 1px solid #ccc;">&nbsp;</div></td></tr>
            <tr>
                <td>
                    <?php echo $form['arq_carta_aluno']->renderLabel() ?><br />
                    <?php echo $form['arq_carta_aluno'] ?>
                    <?php echo $form['arq_carta_aluno']->renderError() ?>
                    <span class="msn_help"><?php echo $form['arq_carta_aluno']->renderHelp() ?></span>
                </td>           
            </tr>
            <?php endif; ?>
            <?php if($status_tipo->getTipoForm() == 6 || $status_tipo->getTipoForm() == 7): ?>
            <!-- Arquivo arq_manifestacao_orientador -->
            <tr><td><div style="border-bottom: 1px solid #ccc;">&nbsp;</div></td></tr>
            <tr>
                <td>
                    <?php echo $form['arq_manifestacao_orientador']->renderLabel() ?><br />
                    <?php echo $form['arq_manifestacao_orientador'] ?>
                    <?php echo $form['arq_manifestacao_orientador']->renderError() ?>
                    <span class="msn_help"><?php echo $form['arq_manifestacao_orientador']->renderHelp() ?></span>
                </td>           
            </tr>
            <?php endif; ?>
            <?php if($status_tipo->getTipoForm() == 6 || $status_tipo->getTipoForm() == 8): ?>
            <!-- Arquivo Cronograma de Actividades -->
            <tr><td><div style="border-bottom: 1px solid #ccc;">&nbsp;</div></td></tr>
            <tr>
                <td>
                    <?php echo $form['arq_cronograma_actividades']->renderLabel() ?><br />
                    <?php echo $form['arq_cronograma_actividades'] ?>
                    <?php echo $form['arq_cronograma_actividades']->renderError() ?>
                    <span class="msn_help"><?php echo $form['arq_cronograma_actividades']->renderHelp() ?></span>
                </td>           
            </tr>
            <!-- Arquivo Copia de Trabajo -->
            <tr><td><div style="border-bottom: 1px solid #ccc;">&nbsp;</div></td></tr>
            <tr>
                <td>
                    <?php echo $form['arq_copia_trabalho']->renderLabel() ?><br />
                    <?php echo $form['arq_copia_trabalho'] ?>
                    <?php echo $form['arq_copia_trabalho']->renderError() ?>
                    <span class="msn_help"><?php echo $form['arq_copia_trabalho']->renderHelp() ?></span>
                </td>           
            </tr>            
            <?php endif; ?>
            <?php if($status_tipo->getTipoForm() == 8): ?>
            <!-- Arquivo Formulário de termo do orientador:  -->
            <tr><td><div style="border-bottom: 1px solid #ccc;">&nbsp;</div></td></tr>
            <tr>
                <td>
                    <?php echo $form['arq_termo_orientador']->renderLabel() ?><br />
                    <?php echo $form['arq_termo_orientador'] ?>
                    <?php echo $form['arq_termo_orientador']->renderError() ?>
                    <span class="msn_help"><?php echo $form['arq_termo_orientador']->renderHelp() ?></span>
                </td>           
            </tr>
            <!-- Arquivo Comprobante:  -->
            <tr><td><div style="border-bottom: 1px solid #ccc;">&nbsp;</div></td></tr>
            <tr>
                <td>
                    <?php echo $form['arq_comprobante']->renderLabel() ?><br />
                    <?php echo $form['arq_comprobante'] ?>
                    <?php echo $form['arq_comprobante']->renderError() ?>
                    <span class="msn_help"><?php echo $form['arq_comprobante']->renderHelp() ?></span>
                </td>           
            </tr>
            <?php endif; ?>
            <?php if($status_tipo->getTipoForm() == 9): ?>
            <!-- Arquivo Formulário de Transferência de Orientação:  -->
            <tr><td><div style="border-bottom: 1px solid #ccc;">&nbsp;</div></td></tr>
            <tr>
                <td>
                    <?php echo $form['arq_transferenca_orientacao']->renderLabel() ?><br />
                    <?php echo $form['arq_transferenca_orientacao'] ?>
                    <?php echo $form['arq_transferenca_orientacao']->renderError() ?>
                    <span class="msn_help"><?php echo $form['arq_transferenca_orientacao']->renderHelp() ?></span>
                </td>           
            </tr>
            <?php endif; ?>
            <?php if($status_tipo->getTipoForm() == 4): ?>
            <!-- Arquivo arq_relatorio_qualificacao:  -->
            <tr><td><div style="border-bottom: 1px solid #ccc;">&nbsp;</div></td></tr>
            <tr>
                <td>
                    <?php echo $form['arq_relatorio_qualificacao']->renderLabel() ?><br />
                    <?php echo $form['arq_relatorio_qualificacao'] ?>
                    <?php echo $form['arq_relatorio_qualificacao']->renderError() ?>
                    <span class="msn_help"><?php echo $form['arq_relatorio_qualificacao']->renderHelp() ?></span>
                </td>           
            </tr>
            <?php endif; ?>
            <?php if($status_tipo->getTipoForm() == 5): ?>
            <!-- Arquivo arq_projeto_pesquisa:  -->
            <tr><td><div style="border-bottom: 1px solid #ccc;">&nbsp;</div></td></tr>
            <tr>
                <td>
                    <?php echo $form['arq_projeto_pesquisa']->renderLabel() ?><br />
                    <?php echo $form['arq_projeto_pesquisa'] ?>
                    <?php echo $form['arq_projeto_pesquisa']->renderError() ?>
                    <span class="msn_help"><?php echo $form['arq_projeto_pesquisa']->renderHelp() ?></span>
                </td>           
            </tr>
            <!-- Arquivo arq_solicitacao_bolsa:  -->
            <tr><td><div style="border-bottom: 1px solid #ccc;">&nbsp;</div></td></tr>
            <tr>
                <td>
                    <?php echo $form['arq_solicitacao_bolsa']->renderLabel() ?><br />
                    <?php echo $form['arq_solicitacao_bolsa'] ?>
                    <?php echo $form['arq_solicitacao_bolsa']->renderError() ?>
                    <span class="msn_help"><?php echo $form['arq_solicitacao_bolsa']->renderHelp() ?></span>
                </td>           
            </tr>
            <?php endif; ?>
            <tr><td><div style="border-bottom: 1px solid #ccc;">&nbsp;</div></td></tr>
            <tr>
                <td>
                    <?php echo $form['email']->renderLabel() ?><br />
                    <?php echo $form['email'] ?>
                    <?php echo $form['email']->renderError() ?>
                    <span class="msn_help"><?php echo $form['email']->renderHelp() ?></span>
                </td>            
            </tr>
            <tr>
                <td>
                    <?php echo $form->renderHiddenFields(false) ?>
                    <input type="submit" name="send" value="Enviar" />
                </td>
            </tr>
        </table>
    </form>
</div>
<?php else: ?>
<div style="text-align: center;">
    Formulário em Desenvolvimento
</div>
<?php endif; ?>
