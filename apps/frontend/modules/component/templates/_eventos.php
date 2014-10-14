<?php use_helper('Date') ?>
<script type="text/javascript">
    $(document).ready(function() {
        loadDataEventos(1,'<?php echo $sf_request->getParameter('subseccion') ?>');  // For first time page load default results
    });
</script>
<?php if($sf_request->hasParameter('permalink')): ?>
    <div class="data-cinza"><?php echo format_date($evento['fecha_inicio'], 'D') ?></div>
    <div class="space-content"></div>
    <div style="position:absolute; top:0px; right:0px;"><a href="javascript:history.back()"><img src="/images/frontend/bt-voltar.jpg" width="62" height="19" border="0" /></a></div>
    <div style="border-bottom:1px solid #ccc; margin-bottom:5px; margin-top:5px;"></div>
    <h4 style="text-transform: uppercase;"><?php echo $evento['titulo'] ?></h4>
    <div>
         <?php if($evento['image']):  ?>
            <?php echo image_tag('/uploads/eventos/medium_'.$evento['image'], ' width="464"  ')?>
        <?php endif;?>
    </div>
    <div class="texto" style="margin-top:20px;">
        <?php echo htmlspecialchars_decode($evento['descripcion']) ?>
    </div>
    <div class="space-content"></div>
    <div style="border-bottom:1px solid #ccc; margin-bottom:5px; margin-top:5px;"></div>
    <?php include_partial('global/share'); ?>
<?php else: ?>
    <h4><?php echo __('eventos') ?></h4>
    <div class="texto" style="margin-top:20px; width: 475px;">
        <div id="loading"></div>
        <div id="paginador">
            <div class="data"></div>
            <div class="pagination"></div>
        </div>    
    </div>
<?php endif; ?>