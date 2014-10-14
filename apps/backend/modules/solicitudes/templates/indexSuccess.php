<h1 class="icono_seguranca"><?php echo __('Solicitações On-line') ?></h1>
<div id="title_module">
<div class="msn_error" id="no_select_item" style="display: none;"><?php echo __("Nenhum item selecionado"); ?>.&nbsp;&nbsp;<a href="#" onclick="noSelectedItem();"><?php echo __('Ocultar'); ?></a> </div>
<?php if ($sf_user->hasFlash('listo')): ?>
    <div class="msn_ready"><?php echo $sf_user->getFlash('listo') ?></div>
<?php endif; ?>
<div class="frameForm">
    <?php echo form_tag('solicitudes/index',array('name' => 'frmChk', 'id' => 'frmChk','style'=>'margin:0px')) ?>
    <table border="0" style="width: 100%">
        <tr>
            <td>
                &nbsp;
            </td>
            <td style="float: right;">
                Filtro: 
                <select name="tipo_solicitud" id="tipo_solicitud"  onchange="this.form.submit()" >
                    <option value="">Todos</option>
                <?php foreach ($tipos as $val): ?>
                    <?php $select = $sf_request->getParameter('tipo_solicitud') == $val['id'] ? 'selected="selected"' : '' ?>
                    <option <?php echo $select ?> value="<?php echo $val['id']?>"><?php echo $val['nome']?></option>
                <?php endforeach; ?>
                </select>
            </td>
        </tr>
    </table>
</div>
<table cellpadding="0" cellspacing="0" border="0"  id="resultsList">
  <thead>
    <tr>
    <th>
            &nbsp;
    </th>
   <th>
    <?php echo link_to(__('Nome'),'@default?module=solicitudes&action=index&sort=nome_completo&by='.$by.'&page='.$Solicituds->getPage().'&buscador='.$buscador) ?>
    <?php if($sort == "nome_completo"){ echo image_tag($by_page); }?>
  </th>
  <th>
    <?php echo link_to(__('Tipo de Solicitud'),'@default?module=solicitudes&action=index&sort=id_solicitud&by='.$by.'&page='.$Solicituds->getPage().'&buscador='.$buscador) ?>
    <?php if($sort == "id_solicitud"){ echo image_tag($by_page); }?>
  </th>
  <th>
    <?php echo link_to(__('Número USP'),'@default?module=solicitudes&action=index&sort=numero_uso&by='.$by.'&page='.$Solicituds->getPage().'&buscador='.$buscador) ?>
    <?php if($sort == "numero_uso"){ echo image_tag($by_page); }?>
  </th>  
  <th>
    <?php echo link_to(__('Status'),'@default?module=solicitudes&action=index&sort=status&by='.$by.'&page='.$Solicituds->getPage().'&buscador='.$buscador) ?>
  <?php if($sort == "status"){ echo image_tag($by_page); }?>
  </th>
    </tr>
  </thead>
  <tbody>
  <?php if ($Solicituds->getNbResults()): ?>
  	<?php $i=0; ?>
    <?php foreach ($Solicituds as $SolicitudTipo): ?>
    <?php fmod($i,2)?$class = "grayBackground":$class=''; ?>
    <tr class="<?php echo $class;?>" valign="top" onmouseover="javascript:overRow(<?php echo $i; ?>);" onmouseout="javascript:outRow(<?php echo $i; ?>);">
        <td class="borderBottomDarkGray" width="28" align="center">&nbsp;&nbsp;</td>
        <td class="borderBottomDarkGray">
            <div class="displayTitle">
               <div id="title">                               
                    <a href="<?php echo url_for('solicitudes/edit?id_solicitud='.$SolicitudTipo->getIdSolicitud()) ?>" class="titulo">
                        <?php echo $SolicitudTipo->getNomeCompleto() ?>&nbsp;
                    </a>
               </div>
                <div class="row-actions" style="width: 85px;">
                    <div class="row-actions_<?php echo $i; ?>" style="display: none;">
                        <a href="<?php echo url_for('solicitudes/edit?id_solicitud='.$SolicitudTipo->getIdSolicitud(), $SolicitudTipo) ?>" class="edit"><?php echo __('Editar') ?></a>&nbsp;|&nbsp;
                        <?php echo link_to(__('Excluir'),'solicitudes/delete?id_solicitud='.$SolicitudTipo->getIdSolicitud(), array('method' => 'delete', 'class' => 'delete' , 'confirm' => __('Você tem certeza que deseja excluir esta caracterísitica?'))) ?>

                    </div>
                </div>
            </div>
        </td>
        <td class="borderBottomDarkGray">
            <?php $tipoSolicitud = SolicitudTipoI18nPeer::retrieveByPK($SolicitudTipo->getIdSolicitudTipo(),'pt')  ?>
            <?php echo $tipoSolicitud->getNomeSolicitud() ?>            
        </td>
        <td class="borderBottomDarkGray"><?php echo $SolicitudTipo->getNumeroUso() ?>&nbsp;</td>
        <td class="borderBottomDarkGray" id="status_<?php echo $SolicitudTipo->getIdSolicitud()?>">
                <?php echo jq_link_to_remote(image_tag($SolicitudTipo->getStatus() ? $SolicitudTipo->getStatus() : '0'.'.png','alt="" title="" border=0'), array(
                    'update'  =>  'status_'.$SolicitudTipo->getIdSolicitud(),
                    'url'     =>  'solicitudes/changeStatus?id_solicitud='.$SolicitudTipo->getIdSolicitud().'&status='.$SolicitudTipo->getStatus(),
                    'script'  => true,
                    'before'  => "$('#status_".$SolicitudTipo->getIdSolicitud()."').html('". image_tag('preload.gif','title="" alt=""')."');"
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
  
</form>
<?php if ($Solicituds->haveToPaginate()): ?>
<table width="100%" align="center" id="paginationTop" border="0">
	<tr>
    	<td align="left" ><i><?php echo $Solicituds->getNbResults().' '.__('resultados') ?>  - <?php echo __('page').' '.$Solicituds->getPage().' '.__('for').' ' ?> <?php echo $Solicituds->getLastPage() ?></i> </td>
        <td align="right">	
        	<table>
                	<tr>
                		<?php if ($Solicituds->getFirstPage()!=$Solicituds->getPage()) :?>
                		<td><?php echo link_to(image_tag('icon_first_page.jpg','alt='.__('First').' title='.__('First').' border=0'), '@default?module=solicitudes&action=index&sort='.$sort.'&by='.$by_page.'&page='.$Solicituds->getFirstPage().$bus_pagi) ?></td>
                		<td><?php echo link_to(image_tag('icon_prew_page.jpg','alt='.__('Previous').' title='.__('Previous').' border=0'),'@default?module=solicitudes&action=index&sort='.$sort.'&by='.$by_page.'&page='.$Solicituds->getPreviousPage().$bus_pagi) ?></td>
                		<?php endif; ?>
                		<td >
                		<?php $links = $Solicituds->getLinks(); 
                        
	                        foreach ($links as $page): ?>
	                        <?php echo ($page == $Solicituds->getPage()) ? '<strong>'.$page.'</strong>' : link_to($page, '@default?module=solicitudes&action=index&sort='.$sort.'&by='.$by_page.'&page='.$page.$bus_pagi) ?>
		                        <?php if ($page != $Solicituds->getCurrentMaxLink()): ?>
		                        -
		                        <?php endif; ?>
	                        <?php endforeach; ?>
                		</td>
                		<?php if ($Solicituds->getLastPage()!=$Solicituds->getPage()) :?>
                		<td><?php echo link_to(image_tag('icon_next_page.jpg','alt='.__('Next').' title='.__('Next').' border=0'), '@default?module=solicitudes&action=index&page='.$Solicituds->getNextPage().$bus_pagi) ?></td>
                		<td><?php echo link_to(image_tag('icon_last_page.jpg','alt='.__('Last').' title='.__('Last').' border=0'), 'solicitudes/index?page='.$Solicituds->getLastPage().$bus_pagi) ?></td>
                		<?php endif; ?>
                	</tr>
            </table>
		</td>
	</tr>
</table>
<?php else: ?>
<div class="results">
    <i><?php echo $Solicituds->getNbResults().' '.__('resultados') ?></i>
</div>
<?php endif; ?>
</div>

