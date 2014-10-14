<?php $cultures = SfLanguagePeer::listTabLanguages(); ?>
<h1 class="icono_seguranca">Banners</h1>
<a class="btn-adicionar" href="<?php echo url_for($this->getModuleName().'/new') ?>">Novo Banner</a>
<div id="title_module">
<div class="msn_error" id="no_select_item" style="display: none;"><?php echo __("Nenhum item selecionado"); ?>.&nbsp;&nbsp;<a href="#" onclick="noSelectedItem();"><?php echo __('Ocultar'); ?></a> </div>
<?php if ($sf_user->hasFlash('listo')): ?>
    <div class="msn_ready"><?php echo $sf_user->getFlash('listo') ?></div>
<?php endif; ?>
<table cellpadding="0" cellspacing="0" border="0"  id="resultsList">
  <thead>
    <tr>
    <th>
        &nbsp;
    </th>
    <th>
      <?php echo link_to(__('Banner'),'@default?module=banner&action=index&sort=prefijo_nome_banner&by='.$by.'&page='.$BannerI18ns->getPage().'&buscador='.$buscador) ?>
    <?php if($sort == "prefijo_nome_banner"){ echo image_tag($by_page); }?>
    </th>
    <th>
      <?php echo link_to(__('Status'),'@default?module=banner&action=index&sort=status&by='.$by.'&page='.$BannerI18ns->getPage().'&buscador='.$buscador) ?>
    <?php if($sort == "status"){ echo image_tag($by_page); }?>
    </th>
    </tr>
  </thead>
  <tbody>
  <?php if ($BannerI18ns->getNbResults()): ?>
  	<?php $i=0; ?>
    <?php foreach ($BannerI18ns as $BannerI18n): ?>
    <?php fmod($i,2)?$class = "grayBackground":$class=''; ?>
    <tr class="<?php echo $class;?>" valign="top" onmouseover="javascript:overRow(<?php echo $i; ?>);" onmouseout="javascript:outRow(<?php echo $i; ?>);">
        <td class="borderBottomDarkGray" width="28" align="center">&nbsp;</td>
        <td class="borderBottomDarkGray">
            <div class="displayTitle">
               <div id="title">                               
                    <a href="<?php echo url_for('banner/edit?id_banner='.$BannerI18n->getIdBanner()) ?>" class="titulo">
                        <?php if($BannerI18n->getPrefijoNomeBanner()): ?>
                            <?php foreach ($cultures as $culture): ?>
                                <?php $file_banner = sfConfig::get('sf_upload_dir').'/banner/'.$culture->getLanguage().'-banner-'.$BannerI18n->getPrefijoNomeBanner();  ?>
                                <?php if (file_exists($file_banner)):  ?>
                                    <?php echo image_tag('/uploads/banner/'.$culture->getLanguage().'-banner-'.$BannerI18n->getPrefijoNomeBanner(), 'class="borderImage" width="250"')?>
                                    <?php break; ?>
                                <?php else:?>
                                    <?php echo image_tag('no_banner', 'border=0 ');?>
                                    <?php break; ?>
                                <?php endif;?>
                            <?php endforeach; ?>
                        <?php else:?>
                            <?php echo image_tag('no_image.jpg', 'border=0 width="130" height="130" class="borderImage"');?>
                        <?php endif;?>
                    </a>
               </div>
                <div class="row-actions">
                    <div class="row-actions_<?php echo $i; ?>" style="display: none;">
                        <a href="<?php echo url_for('banner/edit?id_banner='.$BannerI18n->getIdBanner(), $BannerI18n) ?>" class="edit"><?php echo __('Edit') ?></a>&nbsp;|&nbsp;
                        <?php echo link_to(__('Excluir'),'banner/delete?id_banner='.$BannerI18n->getIdBanner(), array('method' => 'delete', 'class' => 'delete' , 'confirm' => __('Você tem certeza que deseja excluir esta caracterísitica?'))) ?>
                    </div>
                </div>
            </div>
        </td>
        <td class="borderBottomDarkGray" id="status_<?php echo $BannerI18n->getIdBanner()?>">
            <?php echo jq_link_to_remote(image_tag($BannerI18n->getStatus() ? $BannerI18n->getStatus() : '0'.'.png','alt="" title="" border=0'), array(
                'update'  =>  'status_'.$BannerI18n->getIdBanner(),
                'url'     =>  'banner/changeStatus?id_banner='.$BannerI18n->getIdBanner().'&status='.$BannerI18n->getStatus(),
                'script'  => true,
                'before'  => "$('#status_".$BannerI18n->getIdBanner()."').html('". image_tag('preload.gif','title="" alt=""')."');"
            ));
            ?>
        </td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>
  </tbody>
</table>
    <?php else: ?>
    <table width="100%" align="center"  border="0" cellspacing="10">
        <tr>
            <td align="center"><strong><?php echo __('Sua busca não gerou resultados') ?></strong></td>
        </tr>
    </table>
    <?php endif; ?>
<?php if ($BannerI18ns->haveToPaginate()): ?>
<table width="100%" align="center" id="paginationTop" border="0">
	<tr>
    	<td align="left" ><i><?php echo $BannerI18ns->getNbResults().' '.__('resultados') ?>  - <?php echo __('page').' '.$BannerI18ns->getPage().' '.__('for').' ' ?> <?php echo $BannerI18ns->getLastPage() ?></i> </td>
        <td align="right">	
        	<table>
                	<tr>
                		<?php if ($BannerI18ns->getFirstPage()!=$BannerI18ns->getPage()) :?>
                		<td><?php echo link_to(image_tag('icon_first_page.jpg','alt='.__('First').' title='.__('First').' border=0'), '@default?module=banner&action=index&sort='.$sort.'&by='.$by_page.'&page='.$BannerI18ns->getFirstPage().$bus_pagi) ?></td>
                		<td><?php echo link_to(image_tag('icon_prew_page.jpg','alt='.__('Previous').' title='.__('Previous').' border=0'),'@default?module=banner&action=index&sort='.$sort.'&by='.$by_page.'&page='.$BannerI18ns->getPreviousPage().$bus_pagi) ?></td>
                		<?php endif; ?>
                		<td >
                		<?php $links = $BannerI18ns->getLinks(); 
                        
	                        foreach ($links as $page): ?>
	                        <?php echo ($page == $BannerI18ns->getPage()) ? '<strong>'.$page.'</strong>' : link_to($page, '@default?module=banner&action=index&sort='.$sort.'&by='.$by_page.'&page='.$page.$bus_pagi) ?>
		                        <?php if ($page != $BannerI18ns->getCurrentMaxLink()): ?>
		                        -
		                        <?php endif; ?>
	                        <?php endforeach; ?>
                		</td>
                		<?php if ($BannerI18ns->getLastPage()!=$BannerI18ns->getPage()) :?>
                		<td><?php echo link_to(image_tag('icon_next_page.jpg','alt='.__('Next').' title='.__('Next').' border=0'), '@default?module=banner&action=index&page='.$BannerI18ns->getNextPage().$bus_pagi) ?></td>
                		<td><?php echo link_to(image_tag('icon_last_page.jpg','alt='.__('Last').' title='.__('Last').' border=0'), 'banner/index?page='.$BannerI18ns->getLastPage().$bus_pagi) ?></td>
                		<?php endif; ?>
                	</tr>
            </table>
		</td>
	</tr>
</table>
<?php else: ?>
<div class="results">
    <i><?php echo $BannerI18ns->getNbResults().' '.__('resultados') ?></i>
</div>
<?php endif; ?>
</div>

