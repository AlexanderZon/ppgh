<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<?php $cultures = SfLanguagePeer::listTabLanguages(); ?>
<script src="/js/ckeditor/ckeditor.js"></script>
<script src="/js/jq/jquery-ui-1.8.16.custom/development-bundle/ui/i18n/jquery.ui.datepicker-br.js"></script>
<?php  $appYml = sfConfig::get('app_upload_images_news'); ?>
<script type="text/javascript"> 
    var url_fun = 'http://'+location.hostname+'/backend_dev.php';
    $(document).ready(function() {
        $("#news").validationEngine();
        var tabContainers = $('div.tabs > div');
        tabContainers.hide().filter(':first').show();

        $('div.tabs ul.tabNavigation a').click(function () {
                tabContainers.hide();
                tabContainers.filter(this.hash).show();
                $('div.tabs ul.tabNavigation a').removeClass('selected');
                $(this).addClass('selected');
                return false;
        }).filter(':first').click();
        $("#sf_news_date").datepicker({   
          defaultDate: "+1w",
          dateFormat: 'dd-mm-yy',        
          changeMonth: true,
          changeYear: true
        }); 
    })
</script>
<form id="news" action="<?php echo url_for('news/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id_news='.$form->getObject()->getIdNews() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>

 <?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
<div class="frameForm" align="center">
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
      <tr>
          <td>
              <table cellspacing="4">
                <tr>
                    <td>
                        <div class="button">
                                <?php echo link_to(__('Voltar na lista'), '@default?module=news&action=index&'.$sf_user->getAttribute('uri_news'), array('class' => 'button')) ?>
                        </div>
                    </td>
                    <?php if (!$form->getObject()->isNew()): ?>
                    <td>
                        <div class="button">
                                <?php echo link_to(__('Eliminar'), 'news/delete?id_news='.$form->getObject()->getIdNews(), array('method' => 'delete', 'confirm' => __('Você tem certeza que deseja excluir esta noticia?'), 'class' => 'button')) ?>
                        </div>
                    </td>
                    <?php endif; ?>
                    <td>
                      <input type="submit" value="<?php echo __('Salvar') ?>" />
                    </td>
                    <!--
                    <td>
                      <input type="submit" name="back" value="<?php echo __('Save and continue editing') ?>" />
                    </td>-->
                </tr>
            </table>
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
                           <?php echo link_to(__('Voltar na lista'), '@default?module=news&action=index&'.$sf_user->getAttribute('uri_news'), array('class' => 'button')) ?>
                        </div>
                    </td>            
                    <?php if (!$form->getObject()->isNew()): ?>
                    <td>
                        <div class="button">
                            <?php echo link_to(__('Eliminar'), 'news/delete?id_news='.$form->getObject()->getIdNews(), array('method' => 'delete', 'confirm' => __('Você tem certeza que deseja excluir esta noticia?'), 'class' => 'button')) ?>
                        </div>
                    </td>
                    <?php endif; ?>
                    <td>
                    <input type="submit" value="<?php echo __('Salvar') ?>" />
                    </td>
                    <!--
                    <td>
                      <input type="submit" name="back" value="<?php echo __('Save and continue editing') ?>" />
                    </td>
                    -->
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
                        <td><?php echo $form['category']->renderLabel() ?><br />
                                <?php echo $form['category'] ?>
                                <?php echo $form['category']->renderError() ?>
                        </td>
                    </tr>                  
                    <tr>
                      <td><?php echo $form['date']->renderLabel() ?><br />
                        <?php echo $form['date']->render() ?>
                        <?php echo $form['date']->renderError(); ?>
                    </td>
                  </tr>
                    <tr>
                      <td>
                          <?php $module = 'news'; ?>
                          <table cellpadding="0" cellspacing="0" border="0" width="80%" style="margin-top: 15px; margin-bottom: 15px;">
                              <tr>
                                  <td width="3%" align="left" >
                                      <div id="imageFIELD" style="min-height: 110px; min-width: 170px;">
                                          <?php if($form->getObject()->getImage()):  ?>
                                          <?php echo image_tag('/uploads/'.$module.'/'.$appYml['size_1']['pref_1'].'_'.$form->getObject()->getImage(), 'class="borderImage" width="150" height="110"')?>
                                          <?php else:?>
                                          <?php echo image_tag('no_image.jpg', 'border=0 width="150" height="110" class="borderImage"');?>
                                          <?php endif;?>
                                      </div>
                                  </td>
                                  <td width="67%" valign="bottom" style="padding-left:7px">
                                      <?php echo $form['image']->renderLabel() ?><br />
                                      <?php echo $form['image'] ?>
                                      <?php echo $form['image']->renderError() ?>
                                      <span class="msn_help"><?php echo $form['image']->renderHelp() ?></span>
                                  </td>
                              </tr>
                              <tr>
                                   <td>
                                       <?php if($form->getObject()->getImage()):?>
                                      <div id="deleteImage" style="margin-left: 40px;" >
                                          <?php echo jq_link_to_remote('Deletar Imagem', array(
                                                'update'  =>  'imageFIELD',
                                                'url'     =>  $module.'/deleteImage?id='.$form->getObject()->getIdNews(),
                                                'script'  => true,
                                                'confirm' => __('Você tem certeza que deseja excluir esta caracterísitica?'),
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
                      <td>
                          <div class="tabs" style="margin-top: 10px;">
                                <ul class="tabNavigation">
                                  <?php foreach ($cultures as $culture): ?>  
                                  <li class='tab'><a href="#tab-<?php echo $culture->getLanguage() ?>"><?php echo strtoupper(sfI18N::getNativeName($culture->getLanguage())) ?></a></li>
                                  <?php endforeach; ?>
                                </ul>
                                <?php foreach ($cultures as $culture): ?>
                                <?php $not_select = SfNewsI18nPeer::getNomeNoticia($form->getObject()->getIdNews(), $culture->getLanguage()) ?>
                                <div id="tab-<?php echo $culture->getLanguage() ?>">
                                    <label>Título Noticia</label><br />
                                    <input type="text"  name="titulo_<?php echo $culture->getLanguage() ?>" id="titulo_<?php echo $culture->getLanguage() ?>" value="<?php echo $not_select['titulo'] ?>" style="width: 250px;" /><br />
                                    <label>Sumário</label><br />
                                    <textarea cols="50" rows="6" name="resumen_<?php echo $culture->getLanguage() ?>" id="resumen_<?php echo $culture->getLanguage() ?>" ><?php echo $not_select['resumen'] ?></textarea><br />
                                    <label>Descrição</label><br />
                                    <textarea cols="50" rows="6" name="descripcao_<?php echo $culture->getLanguage() ?>" id="descripcao_<?php echo $culture->getLanguage() ?>" ><?php echo $not_select['descripcion'] ?></textarea>
                                    <input type="hidden" name="language" id="language" value="<?php echo $culture->getLanguage() ?>" />
                                    <script type="text/javascript"> 
                                        $(document).ready(function() {
                                            CKEDITOR.replace('descripcao_<?php echo $culture->getLanguage() ?>', {
                                                toolbar: 'Basic',
                                                uiColor: '#CCCCCC'
                                            });
                                            $('#titulo_<?php echo $culture->getLanguage() ?> , #resumen_<?php echo $culture->getLanguage() ?>').blur(function() {
                                                var descricao = CKEDITOR.instances['descripcao_<?php echo $culture->getLanguage() ?>'].getData()
                                                $.post(url_fun + "/news/saveInfoI18n", { titulo: $('#titulo_<?php echo $culture->getLanguage() ?>').val(), resumen: $('#resumen_<?php echo $culture->getLanguage() ?>').val(), descripcion : descricao, language : '<?php echo $culture->getLanguage() ?>', id : '<?php echo $form->getObject()->getIdNews() ?>'  })
                                            });
                                            $('#save-info-<?php echo $culture->getLanguage() ?>').click(function() {
                                                var descricao = CKEDITOR.instances['descripcao_<?php echo $culture->getLanguage() ?>'].getData()
                                                $.post(url_fun + "/news/saveInfoI18n", { titulo: $('#titulo_<?php echo $culture->getLanguage() ?>').val(), resumen: $('#resumen_<?php echo $culture->getLanguage() ?>').val(), descripcion : descricao, language : '<?php echo $culture->getLanguage() ?>', id : '<?php echo $form->getObject()->getIdNews() ?>'  })
                                            });
                                        })
                                    </script>
                                    <div class="salve-info-i18n" id="save-info-<?php echo $culture->getLanguage() ?>">Salvar os Dados</div>
                                </div>
                                <?php endforeach; ?>
                      </td>
                  </tr>
                  <?php if($sf_user->getAttribute('idProfile') == 1 || $sf_user->getAttribute('idProfile') == 2):?>
                  <tr style="display: none;">
                      <td><?php echo $form['status']->renderLabel() ?><br />
                        <?php echo $form['status'] ?>
                        <?php echo $form['status']->renderError() ?>
                    </td>
                  </tr>
                  <?php endif; ?>
                  <tr style="display: none;">
                      <td><?php echo $form['home']->renderLabel() ?><br />
                        <?php echo $form['home'] ?>
                        <?php echo $form['home']->renderError() ?>
                    </td>
                  </tr>
            </table>
            </td>
        </tr>
    </tbody>
  </table>
    </div>
</form>
