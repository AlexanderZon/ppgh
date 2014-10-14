<?php use_helper('Date') ?>
<div id="title_module">
  <div class="frameForm" >
      <h1><?php echo __('Participantes do Eventos') ?>: <?php echo $evento->getTitulo() ?></h1>
  </div>  
<div class="msn_error" id="no_select_item" style="display: none;"><?php echo __("There aren't items selected"); ?>.&nbsp;&nbsp;<a href="#" onclick="noSelectedItem();"><?php echo __('Hidden'); ?></a> </div>
  <?php if ($sf_user->hasFlash('listo')): ?>
    <div class="msn_ready"><?php echo $sf_user->getFlash('listo') ?></div>
  <?php endif; ?>
<div class="frameForm" >
    <a href="<?php echo url_for('eventos/index') ?>"><?php echo __('Voltar do Eventos')?></a>
    <?php if (count($participantes) > 0): ?>
        &nbsp;|&nbsp;
        <a id="export_excel" target="_blank" name="export_excel" href="<?php echo url_for('eventos/export?id_evento='.$sf_request->getParameter('id_evento'))?>"><?php echo image_tag('excel','width="24" height="24" style="position: relative; top: 7px;" ') ?></a>
    <?php endif; ?>
</div>
<table cellpadding="0" cellspacing="0" border="0"  id="resultsList">
  <thead>
    <tr>
    <th>
        &nbsp;&nbsp;
    </th>  
    <th style="width: 70px;">
      <?php echo link_to(__('Núm'),'@default?module=eventos&action=participantes&sort=id_participante&by='.$by.'&id_evento='.$sf_request->getParameter('id_evento')) ?>
      <?php if($sort == "id_participante"){ echo image_tag($by_page); }?>
    </th>
    <th>
        <?php echo link_to(__('Nome Participante'),'@default?module=eventos&action=participantes&sort=nome&by='.$by.'&id_evento='.$sf_request->getParameter('id_evento')) ?>
        <?php if($sort == "nome"){ echo image_tag($by_page); }?>
    </th>
    <th>
      CPF
    </th>
    <th>
      Email
    </th>
    
    <th>Data Pagamento</th>
    
    <th>Monto Pagamento</th>
    <th>Opções</th>  
  </tr>
  </thead>
  <tbody>
  <?php if ($participantes): ?>
  	<?php $i=0; ?>
    <?php foreach ($participantes as $participante): ?>
      <?php fmod($i,2)?$class = "grayBackground":$class=''; ?>
      <tr class="<?php echo $class;?>" valign="top" onmouseover="javascript:overRow(<?php echo $i; ?>);" onmouseout="javascript:outRow(<?php echo $i; ?>);">
        <td class="borderBottomDarkGray" width="28" align="center">&nbsp;&nbsp;</td>
        <td class="borderBottomDarkGray" width="28" align="center" style="text-align: left; padding-left: 10px; font-weight: bold;">
            <?php echo $order[$participante->getIdParticipante()] + 1 ?>
        </td>
        <td class="borderBottomDarkGray">
          <div class="displayTitle">
            <div id="title">                               
              <a href="<?php echo url_for('participante_evento/edit?id_participante='.$participante->getIdParticipante().'&id_evento='.$participante->getIdEvento()) ?>" class="titulo"><?php echo $participante->getNome(); ?></a>
            </div>
            <div class="row-actions">
              <div class="row-actions_<?php echo $i; ?>" style="display: none;">
                <a href="<?php echo url_for('participante_evento/edit?id_participante='.$participante->getIdParticipante().'&id_evento='.$participante->getIdEvento()) ?>" class="edit"><?php echo __('Editar') ?></a>&nbsp;|&nbsp;
                <?php echo link_to(__('Eliminar'),'participante_evento/delete?id_participante='.$participante->getIdParticipante().'&id_evento='.$participante->getIdEvento(), array('method' => 'delete', 'class' => 'delete' , 'confirm' => __('Are you sure you want to delete the selected data?'))) ?>
              </div>
            </div>
          </div>
        </td>
        <td class="borderBottomDarkGray"><?php echo $participante->getCpf(); ?>&nbsp;</td>
        <td class="borderBottomDarkGray"><?php echo $participante->getEmail(); ?>&nbsp;</td>
        
        <td class="borderBottomDarkGray">
            
            <?php echo format_date($participante->getFechaPago(),'D',$sf_user->getCulture()); ?>&nbsp;
        </td>        
        
        <td class="borderBottomDarkGray">
            <?php if($evento->getEsPago()):?>
                R$ <?php echo number_format($participante->getMontoPago(), 2, ',', ' ');; ?>&nbsp;
            <?php else: ?>
                Gratuito
            <?php endif; ?>
        </td>
        <td class="borderBottomDarkGray" id="participante-<?php echo $participante->getIdParticipante() ?>">
            <?php if(!$participante->getMontoPago() && $evento->getEsPago()):?>
                <?php echo jq_link_to_remote(image_tag('mail','alt="" title="" border=0'), array(
                    'update'  =>  'participante-'.$participante->getIdParticipante(),
                    'url'     =>  'eventos/recordatorio?id_participante='.$participante->getIdParticipante().'&id_evento='.$participante->getIdEvento(),
                    'script'  => true,
                    'before'  => "$('#participante-".$participante->getIdParticipante()."').html('". image_tag('preload.gif','title="" alt=""')."');"
                ));
                ?>
            <?php endif; ?>
        </td>
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
</div>

