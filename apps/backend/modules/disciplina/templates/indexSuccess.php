<h1 class="icono_seguranca">Disciplinas</h1>
<a class="btn-adicionar" href="<?php echo url_for($this->getModuleName().'/new') ?>">Nova Disciplina</a>
<div id="title_module">
<div class="msn_error" id="no_select_item" style="display: none;"><?php echo __("Nenhum item selecionado"); ?>.&nbsp;&nbsp;<a href="#" onclick="noSelectedItem();"><?php echo __('Ocultar'); ?></a> </div>
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
            <?php echo link_to(__('Código'),'@default?module=disciplina&action=index&sort=codigo&by='.$by.'&page='.$Disciplinas->getPage().'&buscador='.$buscador) ?>
            <?php if($sort == "codigo"){ echo image_tag($by_page); }?>
        </th>
        <th>
            <?php echo link_to(__('Nome Disciplina'),'@default?module=disciplina&action=index&sort=nome_disciplina&by='.$by.'&page='.$Disciplinas->getPage().'&buscador='.$buscador) ?>
            <?php if($sort == "nome_disciplina"){ echo image_tag($by_page); }?>
        </th>
        <th>
            <?php echo link_to(__('Semestre'),'@default?module=disciplina&action=index&sort=id_sem&by='.$by.'&page='.$Disciplinas->getPage().'&buscador='.$buscador) ?>
            <?php if($sort == "id_sem"){ echo image_tag($by_page); }?>
        </th>
        <th>
            <?php echo link_to(__('Materia'),'@default?module=disciplina&action=index&sort=id_materia&by='.$by.'&page='.$Disciplinas->getPage().'&buscador='.$buscador) ?>
            <?php if($sort == "id_materia"){ echo image_tag($by_page); }?>
        </th>
        <th>
            <?php echo link_to(__('Professor'),'@default?module=disciplina&action=index&sort=profesor&by='.$by.'&page='.$Disciplinas->getPage().'&buscador='.$buscador) ?>
            <?php if($sort == "profesor"){ echo image_tag($by_page); }?>
        </th>
        <th>
            <?php echo link_to(__('Data'),'@default?module=disciplina&action=index&sort=fecha&by='.$by.'&page='.$Disciplinas->getPage().'&buscador='.$buscador) ?>
            <?php if($sort == "fecha"){ echo image_tag($by_page); }?>
        </th>
        <th>
            <?php echo link_to(__('Status'),'@default?module=disciplina&action=index&sort=status&by='.$by.'&page='.$Disciplinas->getPage().'&buscador='.$buscador) ?>
            <?php if($sort == "status"){ echo image_tag($by_page); }?>
        </th>
    </tr>
  </thead>
  <tbody>
  <?php if ($Disciplinas->getNbResults()): ?>
  	<?php $i=0; ?>
    <?php foreach ($Disciplinas as $Disciplina): ?>
    <?php fmod($i,2)?$class = "grayBackground":$class=''; ?>
    <tr class="<?php echo $class;?>" valign="top" onmouseover="javascript:overRow(<?php echo $i; ?>);" onmouseout="javascript:outRow(<?php echo $i; ?>);">
        <td class="borderBottomDarkGray" width="28" align="center">&nbsp;<input type="checkbox" id="chk_<?php echo $Disciplina->getIdDisciplina() ?>" name="chk[<?php echo $Disciplina->getIdDisciplina() ?>]" value="<?php echo $Disciplina->getIdDisciplina() ?>">&nbsp;</td>
        <td class="borderBottomDarkGray">
            <div class="displayTitle">
               <div id="title">                               
                    <a href="<?php echo url_for('disciplina/edit?id_disciplina='.$Disciplina->getIdDisciplina()) ?>" class="titulo"><?php echo $Disciplina->getCodigo() ?></a>
               </div>
                <div class="row-actions" style="width: 100px;">
                    <div class="row-actions_<?php echo $i; ?>" style="display: none;">
                        <a href="<?php echo url_for('disciplina/edit?id_disciplina='.$Disciplina->getIdDisciplina(), $Disciplina) ?>" class="edit"><?php echo __('Editar') ?></a>&nbsp;|&nbsp;
                        <?php echo link_to(__('Excluir'),'disciplina/delete?id_disciplina='.$Disciplina->getIdDisciplina(), array('method' => 'delete', 'class' => 'delete' , 'confirm' => __('Você tem certeza que deseja excluir esta caracterísitica?'))) ?>
                    </div>
                </div>
            </div>
        </td>
        <td class="borderBottomDarkGray"><?php echo $Disciplina->getNomeDisciplina() ?>&nbsp;</td>
        <td class="borderBottomDarkGray">
            <?php $sem = SemestresPeer::retrieveByPK($Disciplina->getIdSem())  ?>
            <?php echo $sem->getSemestre() ?><?php echo $sem->getSemestre() == '1' ? 'er' : 'do' ?>  <?php echo $sem->getAno() ?>&nbsp;
        </td>
        <td class="borderBottomDarkGray">
            <?php $mat = MateriaPeer::retrieveByPK($Disciplina->getIdMateria())  ?>
            <?php echo $mat->getMateria() ?>&nbsp;
        </td>
        <td class="borderBottomDarkGray"><?php echo $Disciplina->getProfesor() ?>&nbsp;</td>
        <td class="borderBottomDarkGray"><?php echo $Disciplina->getFecha() ?>&nbsp;</td>
        <td class="borderBottomDarkGray" id="status_<?php echo $Disciplina->getIdDisciplina()?>">
                <?php echo jq_link_to_remote(image_tag($Disciplina->getStatus().'.png','alt="" title="" border=0'), array(
                    'update'  =>  'status_'.$Disciplina->getIdDisciplina(),
                    'url'     =>  'disciplina/changeStatus?id_disciplina='.$Disciplina->getIdDisciplina().'&status='.$Disciplina->getStatus(),
                    'script'  => true,
                    'before'  => "$('#status_".$Disciplina->getIdDisciplina()."').html('". image_tag('preload.gif','title="" alt=""')."');"
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
<?php if ($Disciplinas->haveToPaginate()): ?>
<table width="100%" align="center" id="paginationTop" border="0">
	<tr>
    	<td align="left" ><i><?php echo $Disciplinas->getNbResults().' '.__('resultados') ?>  - <?php echo __('page').' '.$Disciplinas->getPage().' '.__('for').' ' ?> <?php echo $Disciplinas->getLastPage() ?></i> </td>
        <td align="right">	
        	<table>
                	<tr>
                		<?php if ($Disciplinas->getFirstPage()!=$Disciplinas->getPage()) :?>
                		<td><?php echo link_to(image_tag('icon_first_page.jpg','alt='.__('First').' title='.__('First').' border=0'), '@default?module=disciplina&action=index&sort='.$sort.'&by='.$by_page.'&page='.$Disciplinas->getFirstPage().$bus_pagi) ?></td>
                		<td><?php echo link_to(image_tag('icon_prew_page.jpg','alt='.__('Previous').' title='.__('Previous').' border=0'),'@default?module=disciplina&action=index&sort='.$sort.'&by='.$by_page.'&page='.$Disciplinas->getPreviousPage().$bus_pagi) ?></td>
                		<?php endif; ?>
                		<td >
                		<?php $links = $Disciplinas->getLinks(); 
                        
	                        foreach ($links as $page): ?>
	                        <?php echo ($page == $Disciplinas->getPage()) ? '<strong>'.$page.'</strong>' : link_to($page, '@default?module=disciplina&action=index&sort='.$sort.'&by='.$by_page.'&page='.$page.$bus_pagi) ?>
		                        <?php if ($page != $Disciplinas->getCurrentMaxLink()): ?>
		                        -
		                        <?php endif; ?>
	                        <?php endforeach; ?>
                		</td>
                		<?php if ($Disciplinas->getLastPage()!=$Disciplinas->getPage()) :?>
                		<td><?php echo link_to(image_tag('icon_next_page.jpg','alt='.__('Next').' title='.__('Next').' border=0'), '@default?module=disciplina&action=index&page='.$Disciplinas->getNextPage().$bus_pagi) ?></td>
                		<td><?php echo link_to(image_tag('icon_last_page.jpg','alt='.__('Last').' title='.__('Last').' border=0'), 'disciplina/index?page='.$Disciplinas->getLastPage().$bus_pagi) ?></td>
                		<?php endif; ?>
                	</tr>
            </table>
		</td>
	</tr>
</table>
<?php else: ?>
<div class="results">
    <i><?php echo $Disciplinas->getNbResults().' '.__('resultados') ?></i>
</div>
<?php endif; ?>
</div>

