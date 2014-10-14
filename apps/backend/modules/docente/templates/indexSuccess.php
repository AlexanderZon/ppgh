<h1 class="icono_seguranca"><?php echo __('Docente') ?></h1>
<a class="btn-adicionar" href="<?php echo url_for($this->getModuleName().'/new') ?>">Novo Docente</a>
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
      <?php echo link_to(__('Nome Docente'),'@default?module=docente&action=index&sort=nome_docente&by='.$by.'&page='.$CorpoDocentes->getPage().'&buscador='.$buscador) ?>
    <?php if($sort == "nome_docente"){ echo image_tag($by_page); }?>
    </th>
    <th>
      <?php echo link_to(__('Email'),'@default?module=docente&action=index&sort=email&by='.$by.'&page='.$CorpoDocentes->getPage().'&buscador='.$buscador) ?>
    <?php if($sort == "email"){ echo image_tag($by_page); }?>
    </th>
    </tr>
  </thead>
  <tbody>
  <?php if ($CorpoDocentes->getNbResults()): ?>
  	<?php $i=0; ?>
    <?php foreach ($CorpoDocentes as $CorpoDocente): ?>
    <?php fmod($i,2)?$class = "grayBackground":$class=''; ?>
    <tr class="<?php echo $class;?>" valign="top" onmouseover="javascript:overRow(<?php echo $i; ?>);" onmouseout="javascript:outRow(<?php echo $i; ?>);">
        <td class="borderBottomDarkGray" width="28" align="center">&nbsp;<input type="checkbox" id="chk_<?php echo $CorpoDocente->getIdDocente() ?>" name="chk[<?php echo $CorpoDocente->getIdDocente() ?>]" value="<?php echo $CorpoDocente->getIdDocente() ?>">&nbsp;</td>
        <td class="borderBottomDarkGray">
            <div class="displayTitle">
               <div id="title">        
                    <?php if($CorpoDocente->getPhoto()):  ?>
                        <?php echo image_tag('/uploads/docente/med_'.$CorpoDocente->getPhoto(), 'class="borderImage" width="50" align="left" style="margin-right:5px;" ')?>
                    <?php else:?>
                        <?php echo image_tag('user', 'border=0 width="50" class="borderImage" align="left" style="margin-right:5px;"  ');?>
                    <?php endif;?>
                    <a href="<?php echo url_for('docente/edit?id_docente='.$CorpoDocente->getIdDocente()) ?>" class="titulo"><?php echo $CorpoDocente->getNomeDocente() ?></a>
               </div>
                <div class="row-actions">
                    <div class="row-actions_<?php echo $i; ?>" style="display: none;">
                        <a href="<?php echo url_for('docente/edit?id_docente='.$CorpoDocente->getIdDocente(), $CorpoDocente) ?>" class="edit"><?php echo __('Editar') ?></a>&nbsp;|&nbsp;
                        <?php echo link_to(__('Excluir'),'docente/delete?id_docente='.$CorpoDocente->getIdDocente(), array('method' => 'delete', 'class' => 'delete' , 'confirm' => __('Você tem certeza que deseja excluir este docente?'))) ?>

                    </div>
                </div>
            </div>
        </td>
        <td class="borderBottomDarkGray"><?php echo $CorpoDocente->getEmail() ?>&nbsp;</td>
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
<?php if ($CorpoDocentes->haveToPaginate()): ?>
<table width="100%" align="center" id="paginationTop" border="0">
	<tr>
    	<td align="left" ><i><?php echo $CorpoDocentes->getNbResults().' '.__('resultados') ?>  - <?php echo __('page').' '.$CorpoDocentes->getPage().' '.__('for').' ' ?> <?php echo $CorpoDocentes->getLastPage() ?></i> </td>
        <td align="right">	
        	<table>
                	<tr>
                		<?php if ($CorpoDocentes->getFirstPage()!=$CorpoDocentes->getPage()) :?>
                		<td><?php echo link_to(image_tag('icon_first_page.jpg','alt='.__('First').' title='.__('First').' border=0'), '@default?module=docente&action=index&sort='.$sort.'&by='.$by_page.'&page='.$CorpoDocentes->getFirstPage().$bus_pagi) ?></td>
                		<td><?php echo link_to(image_tag('icon_prew_page.jpg','alt='.__('Previous').' title='.__('Previous').' border=0'),'@default?module=docente&action=index&sort='.$sort.'&by='.$by_page.'&page='.$CorpoDocentes->getPreviousPage().$bus_pagi) ?></td>
                		<?php endif; ?>
                		<td >
                		<?php $links = $CorpoDocentes->getLinks(); 
                        
	                        foreach ($links as $page): ?>
	                        <?php echo ($page == $CorpoDocentes->getPage()) ? '<strong>'.$page.'</strong>' : link_to($page, '@default?module=docente&action=index&sort='.$sort.'&by='.$by_page.'&page='.$page.$bus_pagi) ?>
		                        <?php if ($page != $CorpoDocentes->getCurrentMaxLink()): ?>
		                        -
		                        <?php endif; ?>
	                        <?php endforeach; ?>
                		</td>
                		<?php if ($CorpoDocentes->getLastPage()!=$CorpoDocentes->getPage()) :?>
                		<td><?php echo link_to(image_tag('icon_next_page.jpg','alt='.__('Next').' title='.__('Next').' border=0'), '@default?module=docente&action=index&page='.$CorpoDocentes->getNextPage().$bus_pagi) ?></td>
                		<td><?php echo link_to(image_tag('icon_last_page.jpg','alt='.__('Last').' title='.__('Last').' border=0'), 'docente/index?page='.$CorpoDocentes->getLastPage().$bus_pagi) ?></td>
                		<?php endif; ?>
                	</tr>
            </table>
		</td>
	</tr>
</table>
<?php else: ?>
<div class="results">
    <i><?php echo $CorpoDocentes->getNbResults().' '.__('resultados') ?></i>
</div>
<?php endif; ?>
</div>

