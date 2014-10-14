<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<script type="text/javascript"> 
$(document).ready(function() {
      $("#docente").validationEngine()
})
</script>

<form id="docente" action="<?php echo url_for('docente/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id_docente='.$form->getObject()->getIdDocente() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>

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
                            <?php echo link_to(__('Voltar à lista'), '@default?module=docente&action=index&'.$sf_user->getAttribute('uri_docente'), array('class' => 'button')) ?>
                         </div>
                    </td>            
                    <?php if (!$form->getObject()->isNew()): ?>
                    <td>
                        <div class="button">
                            <?php echo link_to(__('Eliminar'), 'docente/delete?id_docente='.$form->getObject()->getIdDocente(), array('method' => 'delete', 'confirm' => __('Você tem certeza que deseja excluir este docente ?'), 'class' => 'button')) ?>
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
                          <?php $module = 'docente'; ?>
                          <table cellpadding="0" cellspacing="0" border="0" width="80%" style="margin-top: 15px; margin-bottom: 15px;">
                              <tr>
                                  <td width="3%" align="left" >
                                      <div id="imageFIELD" style="min-height: 110px; min-width: 170px;">
                                          <?php if($form->getObject()->getPhoto()):  ?>
                                          <?php echo image_tag('/uploads/'.$module.'/med_'.$form->getObject()->getPhoto(), 'class="borderImage" ')?>
                                          <?php else:?>
                                          <?php echo image_tag('no_image.jpg', 'border=0 width="150" height="110" class="borderImage"');?>
                                          <?php endif;?>
                                      </div>
                                  </td>
                                  <td width="67%" valign="bottom" style="padding-left:7px">
                                      <label>Poto Professor</label> <br />
                                      <?php echo $form['photo'] ?>
                                      <?php echo $form['photo']->renderError() ?>
                                      <span class="msn_help"><?php echo $form['photo']->renderHelp() ?></span>
                                  </td>
                              </tr>
                              <tr>
                                   <td>
                                       <?php if($form->getObject()->getPhoto()):?>
                                      <div id="deleteImage" style="margin-left: 40px;" >
                                          <?php echo jq_link_to_remote('Deletar Imagem', array(
                                                'update'  =>  'imageFIELD',
                                                'url'     =>  'docente/deleteImage?id='.$form->getObject()->getIdDocente(),
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
                      <td><?php echo $form['nome_docente']->renderLabel() ?><br />
                        <?php echo $form['nome_docente'] ?>
                        <?php echo $form['nome_docente']->renderError() ?>
                    </td>
                  </tr>
                              <tr>
                      <td><?php echo $form['ramal']->renderLabel() ?><br />
                        <?php echo $form['ramal'] ?>
                        <?php echo $form['ramal']->renderError() ?>
                    </td>
                  </tr>
                              <tr>
                      <td><?php echo $form['sala']->renderLabel() ?><br />
                        <?php echo $form['sala'] ?>
                        <?php echo $form['sala']->renderError() ?>
                    </td>
                  </tr>
                              <tr>
                      <td><?php echo $form['email']->renderLabel() ?><br />
                        <?php echo $form['email'] ?>
                        <?php echo $form['email']->renderError() ?>
                    </td>
                  </tr>
                              <tr>
                      <td><?php echo $form['site']->renderLabel() ?><br />
                        <?php echo $form['site'] ?>
                        <?php echo $form['site']->renderError() ?>
                    </td>
                  </tr>
                              <tr>
                      <td><?php echo $form['curriculo']->renderLabel() ?><br />
                        <?php echo $form['curriculo'] ?>
                        <?php echo $form['curriculo']->renderError() ?>
                    </td>
                  </tr>
                                        </table>                
            </td>
        </tr>
    </tbody>
  </table>
    </div>
</form>
