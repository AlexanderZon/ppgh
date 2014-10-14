<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<?php $cultures = SfLanguagePeer::listTabLanguages(); ?>
<script src="/js/ckeditor/ckeditor.js"></script>
<script type="text/javascript"> 
    var url_fun = 'http://'+location.hostname+'/backend_dev.php';
    $(document).ready(function() {
        $("#tiposolicitud").validationEngine();
        var tabContainers = $('div.tabs > div');
        tabContainers.hide().filter(':first').show();
        $('div.tabs ul.tabNavigation a').click(function () {
                tabContainers.hide();
                tabContainers.filter(this.hash).show();
                $('div.tabs ul.tabNavigation a').removeClass('selected');
                $(this).addClass('selected');
                return false;
        }).filter(':first').click();
    })
</script>

<form id="tiposolicitud" action="<?php echo url_for('tiposolicitud/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id_solicitud_tipo='.$form->getObject()->getIdSolicitudTipo() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>

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
                            <?php echo link_to(__('Voltar à lista'), '@default?module=tiposolicitud&action=index&'.$sf_user->getAttribute('uri_tiposolicitud'), array('class' => 'button')) ?>
                         </div>
                    </td>            
                    <?php if (!$form->getObject()->isNew()): ?>
                    <td>
                        <div class="button">
                            <?php echo link_to(__('Eliminar'), 'tiposolicitud/delete?id_solicitud_tipo='.$form->getObject()->getIdSolicitudTipo(), array('method' => 'delete', 'confirm' => __('Você tem certeza que deseja excluir esta caracterísitica?'), 'class' => 'button')) ?>
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
                        <td>
                            <div class="tabs" style="margin-top: 10px;">
                                <ul class="tabNavigation">
                                  <?php foreach ($cultures as $culture): ?>  
                                  <li class='tab'><a href="#tab-<?php echo $culture->getLanguage() ?>"><?php echo strtoupper(sfI18N::getNativeName($culture->getLanguage())) ?></a></li>
                                  <?php endforeach; ?>
                                </ul>
                                <?php foreach ($cultures as $culture): ?>
                                    <?php $sol_select = SolicitudTipoI18nPeer::getNomeSolicitud($form->getObject()->getIdSolicitudTipo(), $culture->getLanguage()) ?>
                                    <div id="tab-<?php echo $culture->getLanguage() ?>">
                                        <label>Nome Solicitud</label><br />
                                        <input type="text"  name="nome_<?php echo $culture->getLanguage() ?>" id="nome_<?php echo $culture->getLanguage() ?>" value="<?php echo $sol_select['nome'] ?>" style="width: 450px;" /><br />
                                        <label>Descrição</label><br />
                                        <textarea cols="50" rows="6" class="descripcao_<?php echo $culture->getLanguage() ?>" name="descripcao_<?php echo $culture->getLanguage() ?>" id="descripcao_<?php echo $culture->getLanguage() ?>" ><?php echo $sol_select['des'] ?></textarea>
                                        <input type="hidden" name="language" id="language" value="<?php echo $culture->getLanguage() ?>" />
                                        <script type="text/javascript"> 
                                            $(document).ready(function() {                                            
                                                CKEDITOR.replace('descripcao_<?php echo $culture->getLanguage() ?>', {
                                                    toolbar: 'Basic',
                                                    uiColor: '#FFFFFF'
                                                });
                                                $('#nome_<?php echo $culture->getLanguage() ?>').blur(function() {
                                                    var descricao = CKEDITOR.instances['descripcao_<?php echo $culture->getLanguage() ?>'].getData()
                                                    $.post(url_fun + "/tiposolicitud/saveInfoI18n", { nome: $('#nome_<?php echo $culture->getLanguage() ?>').val(), descripcion : descricao, language : '<?php echo $culture->getLanguage() ?>', id : '<?php echo $form->getObject()->getIdSolicitudTipo() ?>'  })
                                                });
                                                $('#save-info-<?php echo $culture->getLanguage() ?>').click(function() {
                                                    var descricao = CKEDITOR.instances['descripcao_<?php echo $culture->getLanguage() ?>'].getData()
                                                    $.post(url_fun + "/tiposolicitud/saveInfoI18n", { nome: $('#nome_<?php echo $culture->getLanguage() ?>').val(), descripcion : descricao, language : '<?php echo $culture->getLanguage() ?>', id : '<?php echo $form->getObject()->getIdSolicitudTipo() ?>'  })
                                                });
                                            })
                                        </script>
                                        <div class="salve-info-i18n" id="save-info-<?php echo $culture->getLanguage() ?>">Salvar os Dados</div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
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
