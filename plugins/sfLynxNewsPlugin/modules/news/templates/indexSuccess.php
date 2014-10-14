<?php use_helper('Date') ?>
<?php use_helper('Text') ?>
<h1 class="icono_news">Notícias</h1>
<a class="btn-adicionar" href="<?php echo url_for($this->getModuleName().'/new') ?>">Nova Noticia</a>
<div id="title_module">
<div class="msn_error" id="no_select_item" style="display: none;"><?php echo __("Nenhum item selecionado"); ?>.&nbsp;&nbsp;<a href="#" onclick="noSelectedItem();"><?php echo __('Ocultar'); ?></a> </div>
<?php if ($sf_user->hasFlash('listo')): ?>
    <div class="msn_ready"><?php echo $sf_user->getFlash('listo') ?></div>
<?php endif; ?>
<div class="frameForm" >
    <?php echo form_tag('news/deleteAll',array('name' => 'frmChk', 'id' => 'frmChk','style'=>'margin:0px')) ?>
    <table>
        <tr>
            <td>
                <table align="center">
                    <tr>
                        <td>
                            
                            <a name="commit" href="#" onclick="return existItems(this);"><?php echo __('Eliminar todos') ?></a>
                        </td>                        
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>
<table cellpadding="0" cellspacing="0" border="0"  id="resultsList">
  <thead>
    <tr>
        <th>
            &nbsp;<input type="checkbox" id="chkTodos" value="checkbox" onClick="checkTodos(this);" >&nbsp;
        </th>

        <th>
            <?php echo link_to(__('Título'),'@default?module=news&action=index&sort=title&by='.$by.'&page='.$SfNewss->getPage().'&buscador='.$buscador) ?>
        <?php if($sort == "title"){ echo image_tag($by_page,'align="top"'); }?>
        </th>

        <th>
            <?php echo link_to(__('Data'),'@default?module=news&action=index&sort=date&by='.$by.'&page='.$SfNewss->getPage().'&buscador='.$buscador) ?>
        <?php if($sort == "date"){ echo image_tag($by_page,'align="top"'); }?>
        </th>

        <?php if($sf_user->getAttribute('idProfile') == 1 || $sf_user->getAttribute('idProfile') == 2):?>
        <th>
            <?php //echo __('Visualizar') ?>
        </th>
        <?php endif;?>
    </tr>
  </thead>
  <tbody>
  <?php if ($SfNewss->getNbResults()): ?>
  	<?php $i=0; ?>
      <?php $valida = new lynxValida() ?>
        <?php foreach ($SfNewss as $SfNews): ?>
    <?php fmod($i,2)?$class = "grayBackground":$class=''; ?>
    <tr class="<?php echo $class;?>" valign="top" onmouseover="javascript:overRow(<?php echo $i; ?>);" onmouseout="javascript:outRow(<?php echo $i; ?>);">
        <td class="borderBottomDarkGray"  width="28" align="center">
            &nbsp;<input type="checkbox" id="chk_<?php echo $SfNews->getIdNews() ?>" name="chk[<?php echo $SfNews->getIdNews() ?>]" value="<?php echo $SfNews->getIdNews() ?>">&nbsp;</td>
        <td class="borderBottomDarkGray">
            <div class="displayTitle">
                <div id="title">                               
                    <a href="<?php echo url_for('news/edit?id_news='.$SfNews->getIdNews().'&language='.$language) ?>" class="titulo">
                        <?php $nome = SfNewsI18nPeer::getNomeNoticia($SfNews->getIdNews(),'pt'); ?>
                        <?php echo $nome['titulo'] ?  $nome['titulo']  : 'Noticia sem nome'  ?>
                    </a>
                </div>
                <div class="row-actions">
                    <div class="row-actions_<?php echo $i; ?>" style="display: none;">
                        <a href="<?php echo url_for('news/edit?id_news='.$SfNews->getIdNews().'&language='.$language, $SfNews) ?>" class="edit"><?php echo __('Editar') ?></a>&nbsp;|&nbsp;
                        <?php echo link_to(__('Excluir'),'news/delete?id_news='.$SfNews->getIdNews(), array('method' => 'delete', 'class' => 'delete' , 'confirm' => __('Tem certeza de que deseja excluir os dados selecionados?'))) ?>                        
                    </div>
                </div>
            </div>
        </td>
        <td class="borderBottomDarkGray">
            <?php echo $SfNews->getDate(); ?>
            <?php //echo format_date($valida->formatoFechaPT($SfNews->getDate()), 'D', 'pt') ; ?>
        </td>
            <?php $a = sfConfig::get('app_newsConfig_categories'); if(sfConfig::get('app_newsConfig_categories')): ?>
<!--        <td class="borderBottomDarkGray">
            <?php //echo $a[$SfNews->getCategory()]; ?>
        </td>-->
        <?php endif; ?>
        <?php //Valida que el usuario tenga la credencial para modificar el status
        if(!sfContext::getInstance()->getUser()->hasCredential('sf_news_update')):
        ?>
                <td class="borderBottomDarkGray" id="status_<?php echo $SfNews->getIdNews(); ?>">
                                <?php echo image_tag($SfNews->getStatus().'.png','alt="" title="" border=0') ?>
                </td>
                <td class="borderBottomDarkGray" id="home_<?php echo $SfNews->getIdNews(); ?>">
                                <?php echo image_tag($SfNews->getHome().'.png','alt="" title="" border=0') ?>
                </td>
                <td class="borderBottomDarkGray" id="sticky_<?php echo $SfNews->getIdNews(); ?>">
                                <?php echo image_tag($SfNews->getHome().'.png','alt="" title="" border=0') ?>
                </td>
        <?php else: ?>
        <td class="borderBottomDarkGray" id="status_<?php echo $SfNews->getIdNews(); ?>">
            
        </td>

<!--        <td class="borderBottomDarkGray" id="home_<?php echo $SfNews->getIdNews(); ?>">
                <?php echo jq_link_to_remote(image_tag($SfNews->getHome().'.png','alt="" title="" border=0'), array(
                    'update'  =>  'home_'.$SfNews->getIdNews(),
                    'url'     =>  'news/changeStatus?id_news='.$SfNews->getIdNews().'&home='.$SfNews->getHome().'&field=home',
                    'script'  => true,
                    'before'  => "$('#home_".$SfNews->getIdNews()."').html('". image_tag('preload.gif','title="" alt=""')."');"
                )); ?>
        </td>
        -->
        <?php endif; ?>
        <?php if($sf_user->getAttribute('idProfile') == 1 || $sf_user->getAttribute('idProfile') == 2):?>
            <td class="borderBottomDarkGray" id="status_<?php echo $SfNews->getIdNews(); ?>">
                <?php //echo link_to(image_tag('permission'),'@default?module=news&action=visualizacionNucleoCategoria&id_news='.$SfNews->getIdNews(),'class=login id=permission_news_'.$SfNews->getIdNews().'') ?>
                <script type="text/javascript">
                    /*$(document).ready(function() {
                        $("#permission_news_<?php echo $SfNews->getIdNews() ?>").fancybox({
                                'width'			: '55%',
                                'height'                : '75%',
                                'autoScale'		: false,
                                'transitionIn'		: 'none',
                                'transitionOut'		: 'none',
                                'type'                  : 'iframe'
                        });
                    });*/
                </script>
            </td>
        <?php endif; ?>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>
  </tbody>
</table>
    <?php else: ?>
    <table width="100%" align="center"  border="0" cellspacing="10">
        <tr>
            <td align="center"><strong><?php echo __('Sua busca não achou nenhum resultado') ?></strong></td>
        </tr>
    </table>
    <?php endif; ?>
  
</form>
<?php if ($SfNewss->haveToPaginate()): ?>
<table width="100%" align="center" id="paginationTop" border="0">
	<tr>
    	<td align="left" ><i><?php echo $SfNewss->getNbResults().' '.__('resultados') ?>  - <?php echo __('pagina').' '.$SfNewss->getPage().' '.__('for').' ' ?> <?php echo $SfNewss->getLastPage() ?></i> </td>
        <td align="right">	
        	<table>
                	<tr>
                		<?php if ($SfNewss->getFirstPage()!=$SfNewss->getPage()) :?>
                		<td><?php echo link_to(image_tag('icon_first_page.jpg','alt='.__('First').' title='.__('First').' border=0'), '@default?module=news&action=index&sort='.$sort.'&by='.$by_page.'&page='.$SfNewss->getFirstPage().$bus_pagi) ?></td>
                		<td><?php echo link_to(image_tag('icon_prew_page.jpg','alt='.__('Previous').' title='.__('Previous').' border=0'),'@default?module=news&action=index&sort='.$sort.'&by='.$by_page.'&page='.$SfNewss->getPreviousPage().$bus_pagi) ?></td>
                		<?php endif; ?>
                		<td >
                		<?php $links = $SfNewss->getLinks(); 
                        
	                        foreach ($links as $page): ?>
	                        <?php echo ($page == $SfNewss->getPage()) ? '<strong>'.$page.'</strong>' : link_to($page, '@default?module=news&action=index&sort='.$sort.'&by='.$by_page.'&page='.$page.$bus_pagi) ?>
		                        <?php if ($page != $SfNewss->getCurrentMaxLink()): ?>
		                        -
		                        <?php endif; ?>
	                        <?php endforeach; ?>
                		</td>
                		<?php if ($SfNewss->getLastPage()!=$SfNewss->getPage()) :?>
                		<td><?php echo link_to(image_tag('icon_next_page.jpg','alt='.__('Next').' title='.__('Next').' border=0'), '@default?module=news&action=index&page='.$SfNewss->getNextPage().$bus_pagi) ?></td>
                		<td><?php echo link_to(image_tag('icon_last_page.jpg','alt='.__('Last').' title='.__('Last').' border=0'), 'news/index?page='.$SfNewss->getLastPage().$bus_pagi) ?></td>
                		<?php endif; ?>
                	</tr>
            </table>
		</td>
	</tr>
</table>
<?php else: ?>
<div class="results">
      <i><?php echo $SfNewss->getNbResults().' '.__('resultados') ?></i>
</div>
<?php endif; ?>
</div>

