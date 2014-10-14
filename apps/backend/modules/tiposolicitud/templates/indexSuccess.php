<h1 class="icono_seguranca"><?php echo __('Tipos de Aplicação') ?></h1>
<a class="btn-adicionar" href="<?php echo url_for($this->getModuleName().'/new') ?>">Novo Tipo</a>
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
          <?php echo link_to(__('Nome Solicitud'),'@default?module=tiposolicitud&action=index&sort=nome_solicitud&by='.$by.'&page='.$SolicitudTipos->getPage().'&buscador='.$buscador) ?>
        <?php if($sort == "nome_solicitud"){ echo image_tag($by_page); }?>
        </th>
        <th>
          <?php echo link_to(__('Status'),'@default?module=tiposolicitud&action=index&sort=status&by='.$by.'&page='.$SolicitudTipos->getPage().'&buscador='.$buscador) ?>
        <?php if($sort == "status"){ echo image_tag($by_page); }?>
        </th>
    </tr>
  </thead>
  <tbody>
  <?php if ($SolicitudTipos->getNbResults()): ?>
  	<?php $i=0; ?>
    <?php foreach ($SolicitudTipos as $SolicitudTipo): ?>
    <?php fmod($i,2)?$class = "grayBackground":$class=''; ?>
    <tr class="<?php echo $class;?>" valign="top" onmouseover="javascript:overRow(<?php echo $i; ?>);" onmouseout="javascript:outRow(<?php echo $i; ?>);">
        <td class="borderBottomDarkGray" width="28" align="center">&nbsp;&nbsp;</td>
        <td class="borderBottomDarkGray">
            <div class="displayTitle">
               <div id="title">                               
                    <a href="<?php echo url_for('tiposolicitud/edit?id_solicitud_tipo='.$SolicitudTipo->getIdSolicitudTipo()) ?>" class="titulo">
                        <?php $nome = SolicitudTipoI18nPeer::getNomeSolicitud($SolicitudTipo->getIdSolicitudTipo(),'pt'); ?>
                        <?php echo $nome['nome'] ?  $nome['nome']  : 'Sem nome'  ?>
                    </a>
               </div>
                <div class="row-actions">
                    <div class="row-actions_<?php echo $i; ?>" style="display: none;">
                        <a href="<?php echo url_for('tiposolicitud/edit?id_solicitud_tipo='.$SolicitudTipo->getIdSolicitudTipo(), $SolicitudTipo) ?>" class="edit"><?php echo __('Edit') ?></a>&nbsp;|&nbsp;
                        <?php echo link_to(__('Delete'),'tiposolicitud/delete?id_solicitud_tipo='.$SolicitudTipo->getIdSolicitudTipo(), array('method' => 'delete', 'class' => 'delete' , 'confirm' => __('Você tem certeza que deseja excluir esta caracterísitica?'))) ?>

                    </div>
                </div>
            </div>
        </td>
        <td class="borderBottomDarkGray" id="status_<?php echo $SolicitudTipo->getIdSolicitudTipo()?>">
                <?php echo jq_link_to_remote(image_tag($SolicitudTipo->getStatus().'.png','alt="" title="" border=0'), array(
                    'update'  =>  'status_'.$SolicitudTipo->getIdSolicitudTipo(),
                    'url'     =>  'tiposolicitud/changeStatus?id='.$SolicitudTipo->getIdSolicitudTipo().'&status='.$SolicitudTipo->getStatus(),
                    'script'  => true,
                    'before'  => "$('#status_".$SolicitudTipo->getIdSolicitudTipo()."').html('". image_tag('preload.gif','title="" alt=""')."');"
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
<?php if ($SolicitudTipos->haveToPaginate()): ?>
<table width="100%" align="center" id="paginationTop" border="0">
	<tr>
    	<td align="left" ><i><?php echo $SolicitudTipos->getNbResults().' '.__('resultados') ?>  - <?php echo __('page').' '.$SolicitudTipos->getPage().' '.__('for').' ' ?> <?php echo $SolicitudTipos->getLastPage() ?></i> </td>
        <td align="right">	
        	<table>
                	<tr>
                		<?php if ($SolicitudTipos->getFirstPage()!=$SolicitudTipos->getPage()) :?>
                		<td><?php echo link_to(image_tag('icon_first_page.jpg','alt='.__('First').' title='.__('First').' border=0'), '@default?module=tiposolicitud&action=index&sort='.$sort.'&by='.$by_page.'&page='.$SolicitudTipos->getFirstPage().$bus_pagi) ?></td>
                		<td><?php echo link_to(image_tag('icon_prew_page.jpg','alt='.__('Previous').' title='.__('Previous').' border=0'),'@default?module=tiposolicitud&action=index&sort='.$sort.'&by='.$by_page.'&page='.$SolicitudTipos->getPreviousPage().$bus_pagi) ?></td>
                		<?php endif; ?>
                		<td >
                		<?php $links = $SolicitudTipos->getLinks(); 
                        
	                        foreach ($links as $page): ?>
	                        <?php echo ($page == $SolicitudTipos->getPage()) ? '<strong>'.$page.'</strong>' : link_to($page, '@default?module=tiposolicitud&action=index&sort='.$sort.'&by='.$by_page.'&page='.$page.$bus_pagi) ?>
		                        <?php if ($page != $SolicitudTipos->getCurrentMaxLink()): ?>
		                        -
		                        <?php endif; ?>
	                        <?php endforeach; ?>
                		</td>
                		<?php if ($SolicitudTipos->getLastPage()!=$SolicitudTipos->getPage()) :?>
                		<td><?php echo link_to(image_tag('icon_next_page.jpg','alt='.__('Next').' title='.__('Next').' border=0'), '@default?module=tiposolicitud&action=index&page='.$SolicitudTipos->getNextPage().$bus_pagi) ?></td>
                		<td><?php echo link_to(image_tag('icon_last_page.jpg','alt='.__('Last').' title='.__('Last').' border=0'), 'tiposolicitud/index?page='.$SolicitudTipos->getLastPage().$bus_pagi) ?></td>
                		<?php endif; ?>
                	</tr>
            </table>
		</td>
	</tr>
</table>
<?php else: ?>
<div class="results">
    <i><?php echo $SolicitudTipos->getNbResults().' '.__('resultados') ?></i>
</div>
<?php endif; ?>
</div>

