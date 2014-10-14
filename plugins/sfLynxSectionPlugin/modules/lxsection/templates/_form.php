<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<script type="text/javascript"> 
$(document).ready(function() {
    $("#lxsection").validationEngine();
    $("#delete-banner-selected").click(function () {
        if (confirm('Você deseja remover a seleção de imagem')) {
            $('#banner-selected').html("<img src='/images/no_banner_section.png'/>").fadeIn('fast');
            $("#sf_section_id_banner").val('0');
            $("#delete-banner-selected").hide();
        }
    });    
})
</script>

<form id="lxsection" action="<?php echo url_for('lxsection/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>

 <?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
<div class="frameForm" align="center">
  <table width="100%">
      <tr>
        <td>
            &nbsp;<?php echo __('Os campos marcados com ') ?> <span class="required">*</span> <?php echo __('são obrigatórios')?>
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
                            <?php if($sf_request->getParameter('back')):?>
                                <?php echo link_to(__('Voltar'), '@default?module=lxsection&action=editContent&id='.$sf_request->getParameter('id').'&language='.$sf_request->getParameter('language').'', array('class' => 'button')) ?>
                            <?php else:?>
                                <?php echo link_to(__('Voltar na lista'), '@default?module=lxsection&action=index&'.$sf_user->getAttribute('uri_lxsection'), array('class' => 'button')) ?>
                            <?php endif;?>
                        </div>
                    </td>
                    <?php if (!$form->getObject()->isNew() and $form->getObject()->getDelete()): ?>
                    <td>
                        <div class="button">
                                <?php echo link_to(__('Eliminar'), 'lxsection/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => __('Voc� tem certeza de que deseja excluir os dados selecionados?'), 'class' => 'button')) ?>
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
                           <?php if($sf_request->getParameter('back')):?>
                                <?php echo link_to(__('Voltar'), '@default?module=lxsection&action=editContenido&id='.$sf_request->getParameter('id').'&language='.$sf_request->getParameter('language').'', array('class' => 'button')) ?>
                            <?php else:?>
                                <?php echo link_to(__('Voltar na lista'), '@default?module=lxsection&action=index&'.$sf_user->getAttribute('uri_lxsection'), array('class' => 'button')) ?>
                            <?php endif;?>
                        </div>
                    </td>            
                    <?php if (!$form->getObject()->isNew() and $form->getObject()->getDelete()): ?>
                    <td>
                        <div class="button">
                                            <?php echo link_to(__('Eliminar'), 'lxsection/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => __('Voc� tem certeza de que deseja excluir os dados selecionados?'), 'class' => 'button')) ?>
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
            <td style=" border-right: 1px dotted #CCCCCC; width: 43%;">                
                <table cellpadding="0" cellspacing="2" border="0" width="100%">
                  <tr>
                      <td>
                        <label>Banner</label><br />
                        <div id="banner-selected">
                            <?php if($form->getObject()->getIdBanner()): ?>
                                <?php $banner_sel = BannerI18nPeer::retrieveByPK($form->getObject()->getIdBanner()); ?>
                                <?php $file_banner = sfConfig::get('sf_upload_dir').'/banner/pt-banner-'.$banner_sel->getPrefijoNomeBanner();  ?>
                                <?php if (file_exists($file_banner)):  ?>
                                    <img src="/uploads/banner/pt-banner-<?php echo $banner_sel->getPrefijoNomeBanner() ?>" width="300"  />
                                <?php endif;?>  
                            <?php else: ?>
                                <?php echo image_tag('no_banner_section') ?>
                            <?php endif; ?>
                        </div>
                        <?php $disDel = $form->getObject()->getIdBanner() ? 'inlinea' : 'none' ?>
                        <a style="display: <?php echo $disDel ?>;" id="delete-banner-selected">Excluir banner selecionado</a>                        
                    </td>
                  </tr>          
                  <?php if ((!sfContext::getInstance()->getUser()->hasCredential('admin_lynx') && !$form->getObject()->getHome()) || sfContext::getInstance()->getUser()->hasCredential('admin_lynx') ): ?>
                  <tr>
                      <td>
                        <?php echo $form['id_parent']->renderLabel() ?><br />
                        <?php echo $form['id_parent']->render(array('value' => 4)); ?>
                          
                        <?php echo $form['id_parent']->renderError() ?>
                    </td>
                  </tr>                  
                  <tr>
                      <td><?php echo $form['show_text']->renderLabel() ?><br />
                        <?php echo $form['show_text'] ?>
                        <?php echo $form['show_text']->renderError() ?>
                        <span class="msn_help"><?php echo $form['show_text']->renderHelp() ?></span>
                    </td>
                  </tr>                  
                  <tr>
                      <td><?php echo $form['control']->renderLabel() ?><br />
                        <?php echo $form['control'] ?>
                        <?php echo $form['control']->renderError() ?>
                    </td>
                  </tr>                  
                  <tr>
                      <td><?php echo $form['special_page']->renderLabel() ?><br />
                        <?php echo $form['special_page'] ?>
                        <?php echo $form['special_page']->renderError() ?>
                    </td>
                  </tr>                  
                  <tr>
                      <td><?php echo $form['url_externa']->renderLabel() ?><br />
                        <?php echo $form['url_externa'] ?>
                        <?php echo $form['url_externa']->renderError() ?>
                    </td>
                  </tr>                  
                  <tr>
                      <td><?php echo $form['sw_menu']->renderLabel() ?><br />
                        <?php echo $form['sw_menu'] ?>
                        <?php echo $form['sw_menu']->renderError() ?>
                        <span class="msn_help"><?php echo $form['sw_menu']->renderHelp() ?></span>
                    </td>
                  </tr>
                  <?php //if ($sf_user->hasCredential('admin_lynx')): ?>
                   <tr>
                      <td><?php echo $form['delete']->renderLabel() ?><br />
                        <?php echo $form['delete'] ?>
                        <?php echo $form['delete']->renderError() ?>
                    </td>
                  </tr>
                  <?php //endif;?>
                  <tr>
                      <td><?php echo $form['only_complement']->renderLabel() ?><br />
                        <?php echo $form['only_complement'] ?>
                        <?php echo $form['only_complement']->renderError() ?>
                    </td>
                  </tr>
                  <tr>
                      <td><?php echo $form['home']->renderLabel() ?><br />
                        <?php echo $form['home'] ?>
                        <?php echo $form['home']->renderError() ?>
                    </td>
                  </tr>
                  <tr>
                      <td>
                        <?php echo $form['status']->renderLabel() ?><br />                        
                        <?php echo $form['status'] ?>                        
                        <?php echo $form['status']->renderError() ?>
                    </td>
                  </tr>
                  <?php endif; ?>
                </table>
            </td>
            <td style="vertical-align: top; padding-left: 10px;">
                <label>Gerenciador do Banner para sessão</label><br />
                <div id="ad-tips">
                    <?php echo jq_link_to_remote('Selecione o banner para a seção  >>', array(
                        'update'  =>  'list-banners',
                        'url'     =>  'lxsection/listaBanners',
                        'script'  => true,
                        'before'  => "$('#list-banners').html('". image_tag('status.gif','title="" alt=""')."');"
                    ),array('id' => 'show-banners'));
                    ?>
                </div>
                <div id="list-banners">
                    
                </div>
            </td>
        </tr>
    </tbody>
  </table>
    </div>
</form>