<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<script type="text/javascript"> 
$(document).ready(function() {
      $("#lxuser").validationEngine()
})
</script>
<?php $module = 'lxuser'; ?>
<?php  $appYml = sfConfig::get('app_upload_images_lxuser'); ?>
<form id="lxuser" action="<?php echo url_for('lxuser/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id_user='.$form->getObject()->getIdUser() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>

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
              <table cellspacing="5">
                <tr>
                    <td>
                        <div class="button">
                                <?php echo link_to(__('Voltar na lista'), '@default?module=lxuser&action=index&'.$sf_user->getAttribute('uri_lxuser'), array('class' => 'button')) ?>
                        </div>
                    </td>

                    <?php 
                    //El administrador se puede editar pero no se puede borrar
                    if (!$form->getObject()->isNew() and $form->getObject()->getIdUser()!=2):
                    ?>
                    <td>
                        <div class="button">
                           <?php echo link_to(__('Eliminar'), 'lxuser/delete?id_user='.$form->getObject()->getIdUser(), array('method' => 'delete', 'confirm' => __('Você tem certeza que deseja excluir esta caracterísitica?'), 'class' => 'button')) ?>
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
    <tfoot>
      <tr>
        <td>
             <?php echo $form->renderHiddenFields(false) ?>
             <table cellspacing="4">
                <tr>
                    <td>
                        <div class="button">
                            <?php echo link_to(__('Voltar na lista'), '@default?module=lxuser&action=index&'.$sf_user->getAttribute('uri_lxuser'), array('class' => 'button')) ?>
                         </div>
                    </td>            
                    <?php
                    //El administrador se puede editar pero no se puede borrar
                    if (!$form->getObject()->isNew() and $form->getObject()->getIdUser()!=2):
                    ?>
                    <td>
                        <div class="button">
                           <?php echo link_to(__('Eliminar'), 'lxuser/delete?id_user='.$form->getObject()->getIdUser(), array('method' => 'delete', 'confirm' => __('Você tem certeza que deseja excluir esta caracterísitica?'), 'class' => 'button')) ?>
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
                
                <table cellpadding="5" cellspacing="12" border="0" width="100%">
                
                  <tr>
                        <td align="left" >
                            <table cellpadding="0" cellspacing="2" border="0" width="100%">
                                <tr>
                                    <td style="width: 5%;">
                                        <div class="userimage left pointer settings-thumb">
                                            <?php if($form->getObject()->getPhoto()):  ?>
                                                <?php echo image_tag('/uploads/users/'.$appYml['size_3']['pref_3'].'_'.$form->getObject()->getPhoto(), 'id="edit-profile-picture"')?>
                                            <?php else:?>
                                                <?php echo image_tag('no_image.jpg', 'border=0  class=""');?>
                                            <?php endif;?>

                                        </div>
                                    </td>
                                    <td width="67%" valign="top" style="padding-left:7px; vertical-align: top;">
                                        <?php echo $form['photo']->renderLabel() ?><br />
                                        <?php echo $form['photo'] ?>
                                        <?php echo $form['photo']->renderError() ?>
                                        <span class="msn_help"><?php echo $form['photo']->renderHelp() ?></span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        
                  </tr>
                  <tr>
                      <td><?php echo 'Perfil' ?> <span class="required">*</span><br />
                        <?php echo $form['id_profile'] ?>
                        <?php echo $form['id_profile']->renderError() ?>
                    </td>
                  </tr>
                  <tr>
                      <td><?php echo $form['name']->renderLabel() ?> <span class="required">*</span><br />
                        <?php echo $form['name'] ?>
                        <?php echo $form['name']->renderError() ?>
                    </td>
                  </tr>
                  
                  <tr>
                      <td><?php echo $form['login']->renderLabel() ?> <span class="required">*</span><br />
                        <?php echo $form['login'] ?>
                        <?php echo $form['login']->renderError() ?>
                    </td>
                  </tr>
                              <tr>
                      <td><?php echo 'Senha' ?> <span class="required">*</span><br />
                        <?php echo $form['password'] ?>

                        <?php echo $form['password']->renderError() ?>
                          <span class="msn_help"><?php echo $form['password']->renderHelp() ?></span>
                    </td>
                  </tr>
                  <tr>
                      <td><?php echo $form['email']->renderLabel() ?> <span class="required">*</span><br />
                        <?php echo $form['email'] ?>
                        <?php echo $form['email']->renderError() ?>
                    </td>
                  </tr>
                  <tr>
                      <td><?php echo $form['status']->renderLabel() ?> <br />
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
