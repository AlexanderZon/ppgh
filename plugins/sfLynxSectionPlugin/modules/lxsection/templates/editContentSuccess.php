<?php $cultures = SfLanguagePeer::listTabLanguages(); ?>
<script src="/js/ckeditor/ckeditor.js"></script>
<script type="text/javascript"> 
  var url_fun = 'http://'+location.hostname+'/backend_dev.php';
  $(document).ready(function() {
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
<h1 class="icono_seguranca"><?php echo $nombreNucleo->getNameProfile() ?> - <?php echo __('Editar o conteúdo da seção') ?> - <?php echo $sf_section_select['name_section'] ?></h1>
<div id="title_module">

<div class="frameForm" >
    <table width="100%">
        <tr>
            <td>&nbsp;&nbsp;
                <?php echo link_to(__('Voltar na lista'), '@default?module=lxsection&action=index&'.$sf_user->getAttribute('uri_lxsection'), array('class' => '')) ?>
                &nbsp;&nbsp;|&nbsp;&nbsp;
                <a href="#" id="viewInfoSection" onclick="viewInfoSection();"><?php echo __('Ver informação da seção')?> </a>
                <a href="#" id="noViewInfoSection" style="display: none;" onclick="noViewInfoSection()"><?php echo __('No ver informação da seção')?> </a>
            </td>
        </tr>
        <tr>
            <td>                
                <div class="informationSection" style="display: none;  ">
                    <table width="95%" cellpadding="0" cellspacing="5" border="0">
                        <tr>
                            <td width="322" valign="top">
                                <label ><b><?php echo __('sess&atilde;o Pais').':' ?></b></label>
                                <?php if($sf_section->getIdParent()): ?>
                                <?php echo $sf_section_parent['name_section'] ?>
                                <?php else: ?>
                                <?php echo __('None') ?>
                                <?php endif; ?>
                            </td>
                            <td>
                                <label ><b><?php echo __('Inicio').':' ?></b></label>
                                <?php echo __(sfConfig::get('mod_lxsection_home_'.$sf_section->getHome().'')) ?>
                            </td>
                            <td>
                                <label ><b><?php echo __('Status').':' ?></b></label>
                                <?php echo __(sfConfig::get('mod_lxsection_status_'.$sf_section->getStatus().'')) ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label><b><?php echo __('Tem link?').':' ?></b></label>
                                <?php echo __(sfConfig::get('mod_lxsection_control_'.$sf_section->getControl().'')) ?>
                            </td>
                            <td>
                                <label ><b><?php echo __('Ocultar título'.':') ?></b></label>
                                <?php echo __(sfConfig::get('mod_lxsection_cabecera_'.$sf_section->getOnlyComplement().'')) ?>
                            </td>
                            <td>
                                <label ><b><?php echo __('sess&atilde;o url').':' ?></b></label>
                                <?php if($sf_section->getSwMenu()): ?>
                                <?php echo $sf_section->getSwMenu() ?>
                                <?php else: ?>
                                <?php echo __('None') ?>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php if ($sf_user->hasCredential('admin_lynx')): ?>
                                <label ><b><?php echo __('Página especial').':' ?></b></label>
                                <?php if($sf_section->getSpecialPage()):?>
                                <?php echo $sf_section->getSpecialPage(); ?>
                                <?php else:?>
                                <?php echo __('None') ?>
                                <?php endif;?>
                                <?php endif;?>
                            </td>
                            <td>
                                <?php if ($sf_user->hasCredential('admin_lynx')): ?>
                                <label><b><?php echo __('Mostrar a descrição na pagina'.':') ?></b></label>
                                <?php echo sfConfig::get('mod_lxsection_muestra_descripcion_'.$sf_section->getShowText().'') ?>
                                <?php endif;?>
                            </td>
                            <td>
                                <table>
                                    <tr>
                                        <td><?php echo link_to(image_tag(sfConfig::get('sf_admin_web_dir').'/images/edit.png','border=0 alt='.__('Editar informações').' title='.__('Editar informações').''), 'lxsection/edit?id='.$sf_section->getId().'&language='. $sf_request->getParameter('language').'&paso=1&back=1') ?></td>
                                        <td><?php echo link_to(__('Editar informações'), 'lxsection/edit?id='.$sf_section->getId().'&language='. $sf_request->getParameter('language').'&paso=1&back=1') ?></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>                    
                    </table>
                </div>
            </td>
        </tr>
    </table>
</div>
<table width="100%">
    <?php if($sf_user->hasFlash('listo')): ?>
        <tr>
            <td><div class="msn_ready"><?php echo $sf_user->getFlash('listo') ?></div></td>
        </tr>
    <?php endif; ?>
    <tr>
        <td>
            <div class="tabs" style="margin-top: 10px;">
                <ul class="tabNavigation">
                    <?php foreach ($cultures as $culture): ?>  
                        <li class='tab'><a href="#tab-<?php echo $culture->getLanguage() ?>"><?php echo strtoupper(sfI18N::getNativeName($culture->getLanguage())) ?></a></li>
                    <?php endforeach; ?>
                </ul>
                <?php foreach ($cultures as $culture): ?>
                    <div id="tab-<?php echo $culture->getLanguage() ?>">
                        <?php $sf_section = SfSectionI18nPeer::retrieveByPK($sf_request->getParameter('id'), $culture->getLanguage()) ?>
                        <table cellpadding="0" cellspacing="6" border="0" style="width: 100%" >
                            <tr>
                                <td style="vertical-align: top; width: 58%;">
                                    <table cellpadding="0" cellspacing="2" border="0" style="width: 100%" >              
                                      <tr>
                                          <td style="vertical-align: top;">
                                            <b><?php echo __('&Aacute;rea de conte&uacute;do') ?></b><br /><br />
                                            <?php $fck = new sfWidgetFormTextarea();?>
                                            <?php echo $fck->render('descrip_section_'.$culture->getLanguage(), $sf_section ? $sf_section->getDescripSection() : ''); ?>
                                            
                                          </td>
                                      </tr>              
                                   </table>
                                </td>
                                <td valign="top" align="left">
                                    <table cellpadding="0" cellspacing="6" border="0" width="100%" align="left">                
                                        <tr>
                                            <td>
                                                <label>Nome Sessão * (<?php echo $culture->getLanguage() ?>)</label><br />
                                                <input type="text"  name="nome_seccao_<?php echo $culture->getLanguage() ?>" id="nome_seccao_<?php echo $culture->getLanguage() ?>" value="<?php echo $sf_section ? $sf_section->getNameSection() : '' ?>" style="width: 250px;" /><br />
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
                                            <td><label>Meta Title</label><br />
                                                <input type="text"  name="meta_title_<?php echo $culture->getLanguage() ?>" id="meta_title_<?php echo $culture->getLanguage() ?>" value="<?php echo $sf_section ? $sf_section->getMetaTitle() : '' ?>" style="width: 250px;" /><br />
                                        </td>
                                      </tr>
                                      <tr>
                                          <td><label>Meta Description</label><br />
                                              <input type="text"  name="meta_des_<?php echo $culture->getLanguage() ?>" id="meta_des_<?php echo $culture->getLanguage() ?>" value="<?php echo $sf_section ? $sf_section->getMetaDescription(): '' ?>" style="width: 250px;" /><br />
                                            <span class="msn_help">Example. Producto is a software package developed by Company, designed specifically to manage the contents of a website.</span>
                                        </td>
                                      </tr>
                                      <tr>
                                          <td><label>Meta Keyword</label><br />
                                              <input type="text"  name="meta_key_<?php echo $culture->getLanguage() ?>" id="meta_key_<?php echo $culture->getLanguage() ?>" value="<?php echo $sf_section ? $sf_section->getMetaKeyword() : '' ?>" style="width: 250px;" /><br />
                                            <span class="msn_help">Example. company name, companys main activity, resources, tools</span>
                                        </td>
                                      </tr>
                                      <tr>
                                            <td>
                                                <div class="salve-info-i18n" id="save-info-<?php echo $culture->getLanguage() ?>">Salvar os Dados</div>
                                            </td>
                                          </tr>
                                    </table>
                                    <script type="text/javascript"> 
                                    $(document).ready(function() {
                                      CKEDITOR.replace('descrip_section_<?php echo $culture->getLanguage() ?>', {
                                          toolbar: 'Basic',
                                          uiColor: '#FFFFFF',
                                          height:"291", 
                                          width:"540"
                                      });
                                      $('#save-info-<?php echo $culture->getLanguage() ?>').click(function() {
                                            var descricao = CKEDITOR.instances['descrip_section_<?php echo $culture->getLanguage() ?>'].getData()
                                            $.post(url_fun + "/lxsection/saveInfoI18n", 
                                            { 
                                                nome_seccao: $('#nome_seccao_<?php echo $culture->getLanguage() ?>').val(), 
                                                meta_title: $('#meta_title_<?php echo $culture->getLanguage() ?>').val(), 
                                                meta_des: $('#meta_des_<?php echo $culture->getLanguage() ?>').val(), 
                                                meta_key: $('#meta_key_<?php echo $culture->getLanguage() ?>').val(), 
                                                descripcion : descricao, 
                                                language : '<?php echo $culture->getLanguage() ?>', 
                                                id : '<?php echo $sf_request->getParameter('id') ?>'  
                                            })                                            
                                      });
                                    })
                                 </script>
                                </td>
                            </tr>    
                        </table>
                    </div>
                <?php endforeach; ?>
            </div>
        </td>
    </tr>
</table>
</div>