<script src="/js/ckeditor/ckeditor.js"></script>

<form id="lxsectioni18n" action="<?php echo url_for('lxsection/saveInfoI18n?id='.$form->getObject()->getId().'&language='.$form->getObject()->getLanguage()) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<table cellpadding="0" cellspacing="6" border="0" >
    <tr>
        <td style="vertical-align: top;">
            <table cellpadding="0" cellspacing="2" border="0" >              
              <tr>
                  <td style="vertical-align: top;">
                    <b><?php echo __('&Aacute;rea de conte&uacute;do') ?></b><br /><br />
                    <?php //$fck = new sfWidgetFormRichTextarea();?>
                    <?php $fck = new sfWidgetFormTextarea();?>
                    <?php //$fck->setOptions(array('tool'=>'Default','height' => '300','width' => '500','skin' => 'office2003')) ?>
                    <?php echo $fck->render('descrip_section_'.$form->getObject()->getLanguage(), $sf_section->getDescripSection()); ?>
                    <script type="text/javascript"> 
                        $(document).ready(function() {
                          CKEDITOR.replace('descrip_section_<?php echo $form->getObject()->getLanguage() ?>', {
                              toolbar: 'Basic',
                              uiColor: '#FFFFFF'
                          });
                        })
                     </script>
                  </td>
              </tr>              
           </table>
        </td>
        <td valign="top" align="left">
            <table cellpadding="0" cellspacing="6" border="0" width="100%" align="left">                
                <tr>
                    <td>
                        <?php echo $form['name_section']->renderLabel() ?><br />
                        <?php echo $form['name_section'] ?>
                        <?php echo $form['name_section']->renderError() ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <br /><b><?php echo __('HTML Meta')?></b><br />
                        <?php echo __('HTML Meta fornece informa&ccedil;&atilde;o sobre a p&aacute;gina  atual. Esta informa&ccedil;&atilde;o pode mudar de uma p&aacute;gina para outra porque n&atilde;o conte  nome o presets de etiquetas.')?>
                        <br />
                    </td>
                </tr>
                <tr>
                  <td><?php echo $form['meta_title']->renderLabel() ?><br />
                    <?php echo $form['meta_title'] ?>
                    <?php echo $form['meta_title']->renderError() ?>
                </td>
              </tr>
              <tr>
                  <td><?php echo $form['meta_description']->renderLabel() ?><br />
                    <?php echo $form['meta_description'] ?>
                    <?php echo $form['meta_description']->renderError() ?>
                      <span class="msn_help"><?php echo $form['meta_description']->renderHelp() ?></span>
                </td>
              </tr>
              <tr>
                  <td><?php echo $form['meta_keyword']->renderLabel() ?><br />
                    <?php echo $form['meta_keyword'] ?>
                    <?php echo $form['meta_keyword']->renderError() ?>
                      <span class="msn_help"><?php echo $form['meta_keyword']->renderHelp() ?></span>

                </td>
              </tr>
              <tr>
                    <td><?php echo $form->renderHiddenFields(false) ?>
                        <table cellspacing="4">
                            <tr>
                                <td>
                                    <div class="button">
                                       <?php echo link_to(__('Voltar na lista'), '@default?module=lxsection&action=index&'.$sf_user->getAttribute('uri_lxsection'), array('class' => 'button')) ?>
                                    </div>
                                </td>
                                <td>
                                <input type="submit" value="<?php echo __('Salvar') ?>" />
                                </td>
                            </tr>
                        </table>
                    </td>
                  </tr>
            </table>
        </td>
    </tr>    
</table>


</form>