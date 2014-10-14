<h1 class="icono_seguranca"><?php echo __($moduleParent['parent_name'])?> - <a href="<?php echo url_for('tiposolicitud/index') ?>" ><?php echo __('tiposolicitud')  ?></a> - <?php echo __('Editar tiposolicitud') ?> </h1>
<div id="title_module">
    <?php include_partial('form', array('form' => $form)) ?>
</div>
