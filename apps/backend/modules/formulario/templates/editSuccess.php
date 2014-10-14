<h1 class="icono_seguranca"><?php echo __($moduleParent['parent_name'])?> - <a href="<?php echo url_for('formulario/index') ?>" ><?php echo __('Formularios')  ?></a> - <?php echo __('Editar formulario') ?> </h1>
<div id="title_module">
    <?php include_partial('form', array('form' => $form)) ?>
</div>
