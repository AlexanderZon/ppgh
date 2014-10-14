<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<?php $cultures = SfLanguagePeer::listTabLanguages(); ?>
<?php $val_date = new lynxValida(); ?>
<script src="/js/ckeditor/ckeditor.js"></script>
<script src="/js/jq/jquery-ui-1.8.16.custom/development-bundle/ui/i18n/jquery.ui.datepicker-br.js"></script>
<script type="text/javascript"> 
  var url_fun = 'http://'+location.hostname+'/backend_dev.php';
  $(document).ready(function() {
    $("#eventos").validationEngine();
    var tabContainers = $('div.tabs > div');
    tabContainers.hide().filter(':first').show();

    $('div.tabs ul.tabNavigation a').click(function () {
            tabContainers.hide();
            tabContainers.filter(this.hash).show();
            $('div.tabs ul.tabNavigation a').removeClass('selected');
            $(this).addClass('selected');
            return false;
    }).filter(':first').click();
    $("#eventos_fecha_inicio").datepicker({   
        defaultDate: "+1w",
        dateFormat: 'dd-mm-yy',        
        changeMonth: true,
        changeYear: true,
        onClose: function( selectedDate ) {
            $( "#eventos_fecha_fin" ).datepicker( "option", "minDate", selectedDate );
        }
    });    
    $("#eventos_fecha_fin").datepicker({
        defaultDate: "+1w",
        dateFormat: 'dd-mm-yy',          
        changeMonth: true,
        changeYear: true,
        onClose: function( selectedDate ) {
            $( "#eventos_fecha_inicio" ).datepicker( "option", "maxDate", selectedDate );
            if(!$("#eventos_fecha_inicio").val())
                {
                    $( "#eventos_fecha_inicio" ).val($("#eventos_fecha_fin").val());
                }
        }
    });  
    <?php if($form->getObject()->getFechaInicio()): ?>
        $("#eventos_fecha_inicio").val('<?php echo $val_date->formatoFechaMySQL($form->getObject()->getFechaInicio()) ?>');
    <?php endif; ?> 
    <?php if($form->getObject()->getFechaFin()): ?>
        $("#eventos_fecha_fin").val('<?php echo $val_date->formatoFechaMySQL($form->getObject()->getFechaFin()) ?>');
    <?php endif; ?> 
        
  })
</script>

<form id="eventos" action="<?php echo url_for('eventos/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id_evento='.$form->getObject()->getIdEvento() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>

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
                            <?php echo link_to(__('Voltar na lista'), '@default?module=eventos&action=index&'.$sf_user->getAttribute('uri_eventos'), array('class' => 'button')) ?>
                         </div>
                    </td>            
                    <?php if (!$form->getObject()->isNew()): ?>
                    <td>
                        <div class="button">
                            <?php echo link_to(__('Eliminar'), 'eventos/delete?id_evento='.$form->getObject()->getIdEvento(), array('method' => 'delete', 'confirm' => __('Are you sure you want to delete the selected data?'), 'class' => 'button')) ?>
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
                                <?php $event_select = EventosI18nPeer::getNomeEvento($form->getObject()->getIdEvento(), $culture->getLanguage()) ?>
                                <div id="tab-<?php echo $culture->getLanguage() ?>">
                                    <label>Título Evento</label><br />
                                    <input type="text"  name="nome_evento_<?php echo $culture->getLanguage() ?>" id="nome_evento_<?php echo $culture->getLanguage() ?>" value="<?php echo $event_select['titulo'] ?>" style="width: 250px;" /><br />
                                    <label>Sumário</label><br />
                                    <textarea cols="50" rows="6" name="resumen_<?php echo $culture->getLanguage() ?>" id="resumen_<?php echo $culture->getLanguage() ?>" ><?php echo $event_select['resumen'] ?></textarea><br />
                                    <label>Descrição</label><br />
                                    <textarea cols="50" rows="6" class="descripcao_<?php echo $culture->getLanguage() ?>" name="descripcao_<?php echo $culture->getLanguage() ?>" id="descripcao_<?php echo $culture->getLanguage() ?>" ><?php echo $event_select['descripcion'] ?></textarea>
                                    <input type="hidden" name="language" id="language" value="<?php echo $culture->getLanguage() ?>" />
                                    <script type="text/javascript"> 
                                        $(document).ready(function() {                                            
                                            CKEDITOR.replace('descripcao_<?php echo $culture->getLanguage() ?>', {
                                                toolbar: 'Basic',
                                                uiColor: '#FFFFFF'
                                            });
                                            $('#nome_evento_<?php echo $culture->getLanguage() ?> , #resumen_<?php echo $culture->getLanguage() ?>').blur(function() {
                                                var descricao = CKEDITOR.instances['descripcao_<?php echo $culture->getLanguage() ?>'].getData()
                                                $.post(url_fun + "/eventos/saveInfoI18n", { nome_evento: $('#nome_evento_<?php echo $culture->getLanguage() ?>').val(), resumen: $('#resumen_<?php echo $culture->getLanguage() ?>').val(), descripcion : descricao, language : '<?php echo $culture->getLanguage() ?>', id : '<?php echo $form->getObject()->getIdEvento() ?>'  })
                                            });
                                            $('#save-info-<?php echo $culture->getLanguage() ?>').click(function() {
                                                var descricao = CKEDITOR.instances['descripcao_<?php echo $culture->getLanguage() ?>'].getData()
                                                $.post(url_fun + "/eventos/saveInfoI18n", { nome_evento: $('#nome_evento_<?php echo $culture->getLanguage() ?>').val(), resumen: $('#resumen_<?php echo $culture->getLanguage() ?>').val(), descripcion : descricao, language : '<?php echo $culture->getLanguage() ?>', id : '<?php echo $form->getObject()->getIdEvento() ?>'  })
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
                    <td>
                      <?php $appYml = sfConfig::get('app_upload_images_eventos'); ?>
                      <?php $module = 'eventos'; ?>
                      <table cellpadding="0" cellspacing="0" border="0" width="80%" style="margin-top: 15px; margin-bottom: 15px;">
                        <tr>
                          <td width="3%" align="left" >
                            <div id="imageFIELD" style="min-height: 110px; min-width: 170px;">
                              <?php if($form->getObject()->getImagen()):  ?>
                              <?php echo image_tag('/uploads/'.$module.'/'.$appYml['size_1']['pref_1'].'_'.$form->getObject()->getImagen(), 'class="borderImage" width="150" height="110"')?>
                              <?php else:?>
                              <?php echo image_tag('no_image.jpg', 'border=0 width="150" height="110" class="borderImage"');?>
                              <?php endif;?>
                            </div>
                          </td>
                          <td width="67%" valign="bottom" style="padding-left:7px">
                            <?php echo $form['imagen']->renderLabel() ?><br />
                            <?php echo $form['imagen'] ?>
                            <?php echo $form['imagen']->renderError() ?>
                            <span class="msn_help"><?php echo $form['imagen']->renderHelp() ?></span>
                          </td>
                        </tr>
                        <tr>
                          <td>
                           <?php if($form->getObject()->getImagen()):?>
                             <div id="deleteImage" style="margin-left: 40px;" >
                               <?php echo jq_link_to_remote('Deletar Imagem', array(
                                 'update'  =>  'imageFIELD',
                                 'url'     =>  $module.'/deleteImage?id='.$form->getObject()->getIdEvento(),
                                 'script'  => true,
                                 'confirm' => __('Are you sure you want to delete the selected data?'),
                                 'before'  => "$('#imageFIELD').html('<div>". image_tag('preload.gif','title="" alt=""')."</div>');",
                                 'complete'=> "$('#deleteImage').html('');"
                                 ));
                               ?>
                             </div>
                           <?php endif;?>
                          </td>
                          <td>&nbsp;</td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <tr>
                      <td><?php echo $form['fecha_inicio']->renderLabel() ?><br />
                        <?php echo $form['fecha_inicio'] ?>
                        <?php echo $form['fecha_inicio']->renderError() ?>
                    </td>
                  </tr>
                  <tr>
                      <td><?php echo $form['fecha_fin']->renderLabel() ?><br />
                        <?php echo $form['fecha_fin'] ?>
                        <?php echo $form['fecha_fin']->renderError() ?>
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
