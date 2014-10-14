<?php use_helper('Date') ?>
<h1 class="icono_seguranca"><?php echo __('Eventos') ?></h1>
<a class="btn-adicionar" href="<?php echo url_for($this->getModuleName().'/new') ?>">Novo Evento</a>
<div id="title_module">
<div class="msn_error" id="no_select_item" style="display: none;"><?php echo __("There aren't items selected"); ?>.&nbsp;&nbsp;<a href="#" onclick="noSelectedItem();"><?php echo __('Hidden'); ?></a> </div>
  <?php if ($sf_user->hasFlash('listo')): ?>
    <div class="msn_ready"><?php echo $sf_user->getFlash('listo') ?></div>
  <?php endif; ?>
<table cellpadding="0" cellspacing="0" border="0"  id="resultsList">
  <thead>
    <tr>
    <th>
		&nbsp;<input type="checkbox" id="chkTodos" value="checkbox" onClick="checkTodos(this);" >&nbsp;
	</th>
  
    <th>
      <?php echo link_to(__('Título'),'@default?module=eventos&action=index&sort=titulo&by='.$by.'&page='.$eventoss->getPage().'&buscador='.$buscador) ?>
      <?php if($sort == "titulo"){ echo image_tag($by_page); }?>
    </th>

    <th>
      <?php echo link_to(__('Data de início'),'@default?module=eventos&action=index&sort=fecha_inicio&by='.$by.'&page='.$eventoss->getPage().'&buscador='.$buscador) ?>
    <?php if($sort == "fecha_inicio"){ echo image_tag($by_page); }?>
    </th>

    <th>
      <?php echo link_to(__('Data de conclusão'),'@default?module=eventos&action=index&sort=fecha_fin&by='.$by.'&page='.$eventoss->getPage().'&buscador='.$buscador) ?>
    <?php if($sort == "fecha_fin"){ echo image_tag($by_page); }?>
    </th>
    <th>
      <?php echo link_to(__('Status'),'@default?module=eventos&action=index&sort=status&by='.$by.'&page='.$eventoss->getPage().'&buscador='.$buscador) ?>
    <?php if($sort == "status"){ echo image_tag($by_page); }?>
    </th>
  
  </tr>
  </thead>
  <tbody>
  <?php if ($eventoss->getNbResults()): ?>
  	<?php $i=0; ?>
    <?php foreach ($eventoss as $eventos): ?>
      <?php fmod($i,2)?$class = "grayBackground":$class=''; ?>
      <tr class="<?php echo $class;?>" valign="top" onmouseover="javascript:overRow(<?php echo $i; ?>);" onmouseout="javascript:outRow(<?php echo $i; ?>);">
        <td class="borderBottomDarkGray" width="28" align="center">&nbsp;<input type="checkbox" id="chk_<?php echo $eventos->getIdEvento() ?>" name="chk[<?php echo $eventos->getIdEvento() ?>]" value="<?php echo $eventos->getIdEvento() ?>">&nbsp;</td>
        <td class="borderBottomDarkGray">
          <div class="displayTitle">
            <div id="title">                               
              <a href="<?php echo url_for('eventos/edit?id_evento='.$eventos->getIdEvento().'&language='.$language) ?>" class="titulo">
                  <?php $nome = EventosI18nPeer::getNomeEvento($eventos->getIdEvento(),'pt'); ?>
                  <?php echo $nome['titulo'] ?  $nome['titulo']  : 'Evento sem nome'  ?>
              </a>
            </div>
            <div class="row-actions">
              <div class="row-actions_<?php echo $i; ?>" style="display: none;">
                <a href="<?php echo url_for('eventos/edit?id_evento='.$eventos->getIdEvento().'&language='.$language, $eventos) ?>" class="edit"><?php echo __('Editar') ?></a>&nbsp;|&nbsp;
                <?php echo link_to(__('Eliminar'),'eventos/delete?id_evento='.$eventos->getIdEvento(), array('method' => 'delete', 'class' => 'delete' , 'confirm' => __('Tem certeza de que deseja excluir os dados selecionados?'))) ?>
                
              </div>
            </div>
          </div>
        </td>
        <td class="borderBottomDarkGray"><?php echo format_date($eventos->getFechaInicio(),'D',$sf_user->getCulture()); ?>
          &nbsp;</td>
        <td class="borderBottomDarkGray"><?php echo format_date($eventos->getFechaFin(),'D',$sf_user->getCulture()); ?>&nbsp;</td>
        <td class="borderBottomDarkGray"><?php echo image_tag($eventos->getStatus().'.png','alt="" title="" border=0') ?>&nbsp;&nbsp;</td>
      </tr>
    <?php $i++; ?>
    <?php endforeach; ?>
  </tbody>
</table>
    <?php else: ?>
    <table width="100%" align="center"  border="0" cellspacing="10">
        <tr>
            <td align="center"><strong><?php echo __('Your search did not match any result') ?></strong></td>
        </tr>
    </table>
    <?php endif; ?>
  
</form>
<?php if ($eventoss->haveToPaginate()): ?>
<table width="100%" align="center" id="paginationTop" border="0">
	<tr>
    	<td align="left" ><i><?php echo $eventoss->getNbResults().' '.__('results') ?>  - <?php echo __('page').' '.$eventoss->getPage().' '.__('for').' ' ?> <?php echo $eventoss->getLastPage() ?></i> </td>
        <td align="right">	
        	<table>
                	<tr>
                		<?php if ($eventoss->getFirstPage()!=$eventoss->getPage()) :?>
                		<td><?php echo link_to(image_tag('icon_first_page.jpg','alt='.__('First').' title='.__('First').' border=0'), '@default?module=eventos&action=index&sort='.$sort.'&by='.$by_page.'&page='.$eventoss->getFirstPage().$bus_pagi) ?></td>
                		<td><?php echo link_to(image_tag('icon_prew_page.jpg','alt='.__('Previous').' title='.__('Previous').' border=0'),'@default?module=eventos&action=index&sort='.$sort.'&by='.$by_page.'&page='.$eventoss->getPreviousPage().$bus_pagi) ?></td>
                		<?php endif; ?>
                		<td >
                		<?php $links = $eventoss->getLinks(); 
                        
	                        foreach ($links as $page): ?>
	                        <?php echo ($page == $eventoss->getPage()) ? '<strong>'.$page.'</strong>' : link_to($page, '@default?module=eventos&action=index&sort='.$sort.'&by='.$by_page.'&page='.$page.$bus_pagi) ?>
		                        <?php if ($page != $eventoss->getCurrentMaxLink()): ?>
		                        -
		                        <?php endif; ?>
	                        <?php endforeach; ?>
              
    		</td>
                		<?php if ($eventoss->getLastPage()!=$eventoss->getPage()) :?>
                		<td><?php echo link_to(image_tag('icon_next_page.jpg','alt='.__('Next').' title='.__('Next').' border=0'), '@default?module=eventos&action=index&page='.$eventoss->getNextPage().$bus_pagi) ?></td>
                		<td><?php echo link_to(image_tag('icon_last_page.jpg','alt='.__('Last').' title='.__('Last').' border=0'), 'eventos/index?page='.$eventoss->getLastPage().$bus_pagi) ?></td>
                		<?php endif; ?>
                	</tr>
            </table>
		</td>
	</tr>
</table>
<?php else: ?>
<div class="results">
            <i><?php echo $eventoss->getNbResults().' '.__('results') ?></i>
</div>
<?php endif; ?>
</div>

