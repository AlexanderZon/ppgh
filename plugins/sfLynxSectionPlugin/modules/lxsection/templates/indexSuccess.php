<?php use_javascript('/sfLynxSectionPlugin/js/reorder.js'); ?>
<?php use_javascript('jq/jquery.filter-list.js') ?>
<script type="text/javascript"> 
    $(document).ready(function() {
                
    })
</script>
<h1 class="icono_seguranca"><?php echo __('Se&ccedil;&otilde;es') ?> do <?php echo $nombreNucleo->getNameProfile() ?></h1>
<a class="btn-adicionar" href="<?php echo url_for($this->getModuleName().'/new') ?>">Nova Seção</a>
<div id="title_module" style="top: -48px; position: relative; margin-top: 0px;">
<div class="msn_error" id="no_select_item" style="display: none;"><?php echo __("Nenhum item selecionado"); ?>.&nbsp;&nbsp;<a href="#" onclick="noSelectedItem();"><?php echo __('Ocultar'); ?></a> </div>
<?php if ($sf_user->hasFlash('listo')): ?>
    <div class="msn_ready"><?php echo $sf_user->getFlash('listo') ?></div>
<?php endif; ?>
<?php if ($sf_user->hasFlash('error')): ?>
    <div class="msn_error"><?php echo $sf_user->getFlash('error') ?></div>
<?php endif; ?><br />
<div class="frameForm" >
    <table style="width: 100%; border: 0px solid #000; ">
        <tr>
            <td style="text-align: right;">
                <span style="text-align: right;font-style: italic; float: right; font-weight: bold;">Pesquisa rápida de seções</span><br />
                <input type="text" size="40" name="filter" id="filter" /> 
                
            </td>
        </tr>
    </table>
</div>
<table width="100%" cellpadding="0" cellspacing="0" border="0">
    <tr>
        <td width="260" valign="top">
                <!-- TreeView Secciones -->
                <table cellpadding="0" cellspacing="0" border="0" width="100%" align="left">
                        <tr>
                                <td align="left">
                                <div id="tree-div" style="overflow:hidden; height:auto;width:250px;border:0px solid #c3daf9;  "></div>
                                <div id="resultados" style="overflow:auto; padding-bottom:50px; height:120px;width:500px;border:2px solid #c3daf9; display: none; padding-bottom:35px;"></div>
                                </td>
                        </tr>
                </table>
        </td>
        <td valign="top">
            <div id="info" style="display: none;">Waiting for update</div>
            <table cellpadding="0" cellspacing="0" border="0"  id="resultsList">
                <thead>
                <tr>
                    <th>
                        &nbsp;
                    </th>
                    <th>
                        <?php echo link_to(__('Nome da Seção'),'@default?module=lxsection&action=index&sort=name_section&by='.$by.'&page='.$SfSections->getPage().'&buscador='.$buscador) ?>
                        <?php if($sort == "id"){ echo image_tag($by_page,'align="top"'); }?>
                    </th>
                    <th style="display: none;">
                        <?php echo link_to(__('Home'),'@default?module=lxsection&action=index&sort=home&by='.$by.'&page='.$SfSections->getPage().'&buscador='.$buscador) ?>
                        <?php if($sort == "home"){ echo image_tag($by_page,'align="top"'); }?>
                    </th>
                    <th style="display: none;">
                        <?php echo link_to(__('Ativo'),'@default?module=lxsection&action=index&sort=status&by='.$by.'&page='.$SfSections->getPage().'&buscador='.$buscador) ?>
                        <?php if($sort == "status"){ echo image_tag($by_page,'align="top"'); }?>
                    </th>
                    <th>
                        <?php echo link_to(__('Ativo no menu'),'@default?module=lxsection&action=index&sort=status&by='.$by.'&page='.$SfSections->getPage().'&buscador='.$buscador) ?>
                        <?php if($sort == "status"){ echo image_tag($by_page,'align="top"'); }?>
                    </th>
                </tr>
              </thead>
                <tbody id="fill">
                    <?php if ($SfSections->getNbResults()): ?>
                    <?php $i=0; ?>
                <?php foreach ($SfSections as $SfSection): ?>
                <?php fmod($i,2)?$class = "grayBackground":$class=''; ?>
                <tr class="<?php echo $class;?>" height="35" valign="top" onmouseover="javascript:overRow(<?php echo $i; ?>);" onmouseout="javascript:outRow(<?php echo $i; ?>);">
                    <td class="borderBottomDarkGray" width="10">
                        &nbsp;
                    </td>
                    <td class="borderBottomDarkGray">
                        <div class="displayTitle">
                            <div id="title">
                               <a href="<?php echo url_for('lxsection/edit?id='.$SfSection->getId()) ?>" class="titulo">
                                   <?php $nameSection = SfSectionI18nPeer::getNameSection($SfSection->getId()) ?>
                                   <?php echo $nameSection['name_section'] ?>
                               </a>
                            </div>
                            
                            <div class="row-actions">
                                <div class="row-actions_<?php echo $i; ?>" style="display: none;">
                                    <a href="<?php echo url_for('lxsection/edit?id='.$SfSection->getId(), $SfSection) ?>" class="edit"><?php echo __('Editar') ?></a>
                                    <?php if(!$SfSection->getHome()): ?>
                                    <?php if($SfSection->getDelete()==1): ?>
                                    &nbsp;|&nbsp;
                                    <?php echo link_to(__('Deleitar'),'lxsection/delete?id='.$SfSection->getId(), array('method' => 'delete', 'class' => 'delete' , 'confirm' => __('Tem certeza de que deseja excluir os dados selecionados?'))) ?>
                                    <?php endif;?>&nbsp;|&nbsp;
                                    <a href="<?php echo url_for('lxsection/editContent?id='.$SfSection->getId().'&language='.$language, $SfSection) ?>" class=""><?php echo __('Editar Conteudo') ?></a>
                                    <?php endif; ?>
                                </div>
                            </div>                            
                        </div>
                    </td>
                    <td class="borderBottomDarkGray" style="display: none;" ><?php echo image_tag($SfSection->getHome().'.png','alt="" title=""');?></td>
                    <?php if($SfSection->getStatus()==2):?>
                    <td class="borderBottomDarkGray" style="display: none;"><?php echo image_tag('1.png','alt="" title=""'); ?></td>
                    <?php else: ?>
                    <td class="borderBottomDarkGray" style="display: none;"><?php echo image_tag('0.png','alt="" title=""'); ?></td>
                    <?php endif;  ?>
                    <td class="borderBottomDarkGray">
                        <?php if($SfSection->getStatus()==1): ?>
                        <?php echo image_tag('1.png','alt="" title=""'); ?>
                        <?php else: ?>
                        <?php echo image_tag('0.png','alt="" title=""'); ?>
                        <?php endif;?>
                    </td>                                        
                </tr>
                <?php $i++; ?>
                <?php endforeach; ?>


                </tbody>
            </table>
            <?php else: ?>
            <table width="100%" align="center"  border="0" cellspacing="10">
                <tr>
                    <td align="center"><strong><?php echo __('Sua busca no gerou resultados') ?></strong></td>
                </tr>
            </table>
            <?php endif; ?>

                      
            <table width="100%" align="center" id="paginationTop" border="0">
                    <tr>
                    <td align="left" ><i><?php echo $SfSections->getNbResults().' '.__('resultados') ?>  </td>                    
                    </tr>
            </table>
            
        </td>
    </tr>
</table>
</div>


