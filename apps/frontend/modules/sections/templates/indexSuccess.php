  <?php foreach ($infoSecciones as $infoSeccion): ?>
    <?php //if(!$infoSeccion['onlyComplement'] or $infoSeccion['showText']): ?>
        <?php if($infoSeccion['specialPage'] != 'home'): ?>
        <div class="data-cinza"><?php echo __('Home') ?> / <?php echo $infoSeccionPadre['nameSection']; ?></div>
        <div class="space-content"></div>
        <div style="position:absolute; top:0px; right:0px;">
            <a href="javascript:history.back()">
                <img src="/images/frontend/bt-voltar-<?php echo $sf_user->getCulture() ?>.jpg" width="62" height="19" border="0" />
            </a>
        </div>
        <div style="border-bottom:1px solid #ccc; margin-bottom:5px; margin-top:5px;"></div>
        <?php endif; ?>
      <?php if(!$infoSeccion['onlyComplement'] && $sf_request->getParameter('secciones', 'home') !== $prinSeccion): ?>
        <h4><?php echo $infoSeccionPadre['nameSection']; ?></h4>
      <?php endif; ?>

      <?php if($sf_request->getParameter('subseccion') and $infoSeccionPadre['nameSection']!=$infoSeccion['nameSection']): ?>
      <h2><?php echo strtoupper($infoSeccion['nameSection']) ?></h2>
      <?php endif; ?>

      <?php if($infoSeccion['showText']): ?>
      
      <?php echo html_entity_decode($infoSeccion['descripSection']); ?>
      <?php endif; ?>

      <?php if($infoSeccion['specialPage']): ?>
      <?php include_component('component', $infoSeccion['specialPage'],array('nameSection' => $infoSeccion['nameSection'], 'descripSection'=>$infoSeccion['descripSection'], 'infoSection' => $infoSeccion )) ?>
      <?php endif; ?>
      
    <?php //endif; ?>
  <?php endforeach; ?>
