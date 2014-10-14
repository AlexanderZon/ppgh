<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<?php $cultures     = SfLanguagePeer::listTabLanguages(); ?>
<script type="text/javascript"> 
$(document).ready(function() {
      $("#banner").validationEngine();
})
</script>

<form id="banner" action="<?php echo url_for('banner/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id_banner='.$form->getObject()->getIdBanner() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>

 <?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
<div class="frameForm" align="left">
  <table width="100%">
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
                            <?php echo link_to(__('Voltar à lista'), '@default?module=banner&action=index&'.$sf_user->getAttribute('uri_banner'), array('class' => 'button')) ?>
                         </div>
                    </td>            
                    <?php if (!$form->getObject()->isNew()): ?>
                    <td>
                        <div class="button">
                            <?php echo link_to(__('Eliminar'), 'banner/delete?id_banner='.$form->getObject()->getIdBanner(), array('method' => 'delete', 'confirm' => __('Você tem certeza que deseja excluir esta caracterísitica?'), 'class' => 'button')) ?>
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
                  <?php foreach ($cultures as $culture): ?>
                    
                    <tr>
                        <td colspan="2">                          
                            <table cellpadding="0" cellspacing="0" border="0" width="80%" style="margin-top: 15px; margin-bottom: 15px;">
                                <tr>
                                    <td width="3%" align="left" >
                                        <div id="image-<?php echo $culture->getLanguage() ?>" style="min-height: 110px; min-width: 170px;">
                                            <?php $file_banner = sfConfig::get('sf_upload_dir').'/banner/'.$culture->getLanguage().'-banner-'.$form->getObject()->getPrefijoNomeBanner();  ?>
                                            <?php if (file_exists($file_banner)):  ?>
                                              <?php echo image_tag('/uploads/banner/'.$culture->getLanguage().'-banner-'.$form->getObject()->getPrefijoNomeBanner(), 'class="borderImage" width="250" ')?>
                                            <?php else:?>
                                              <?php echo image_tag('no_banner', 'border=0 class="borderImage"');?>
                                            <?php endif;?>
                                        </div>
                                    </td>
                                    <td width="67%" valign="bottom" style="padding-left:7px;vertical-align: top;">
                                        <label>Arquivo de Idioma <?php echo ucfirst(sfI18N::getNativeName($culture->getLanguage())) ?></label>
                                        <br />
                                        <?php echo $form['arquivo_'.$culture->getLanguage()] ?>
                                        <?php echo $form['arquivo_'.$culture->getLanguage()]->renderError() ?>
                                        <span class="msn_help">
                                            A imagem deve ser JPEG, JPG, PNG ou GIF<br />As dimensões da imagem devem ser <?php echo sfConfig::get('app_image_min_width') ?>px x <?php echo sfConfig::get('app_image_min_height') ?>px
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                  <td>
                                        <?php if (file_exists($file_banner)):  ?>
                                        <div id="deleteImage-<?php echo $culture->getLanguage() ?>" style="margin-left: 84px;margin-top: 5px;" >
                                            <?php echo image_tag('delete','style="position: relative;top: 3px"'); ?>
                                            <?php echo jq_link_to_remote('Deletar Imagem', array(
                                                  'update'  =>  'image-'.$culture->getLanguage(),
                                                  'url'     =>  'banner/deleteImage?id='.$form->getObject()->getIdBanner().'&lang='.$culture->getLanguage(),
                                                  'script'  => true,
                                                  'confirm' => __('Tem certeza de que deseja excluir a imagem selecionada?'),
                                                  'before'  => "$('#image-".$culture->getLanguage()."').html('<div>". image_tag('preload.gif','title="" alt=""')."</div>');",
                                                  'complete'=> "$('#deleteImage-".$culture->getLanguage()."').html('');"
                                              ),array('style' => 'color: #FF0000;'));
                                              ?>
                                        </div>
                                        <?php endif;?>
                                  </td>
                                  <td>&nbsp;</td>
                                </tr>
                            </table>
                      </td>
                    </tr>
                  <?php endforeach; ?>                  
                  
                </table>                
            </td>
        </tr>
    </tbody>
  </table>
    </div>
</form>
