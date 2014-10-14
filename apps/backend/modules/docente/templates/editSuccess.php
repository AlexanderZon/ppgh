<h1 class="icono_seguranca"><?php echo __($moduleParent['parent_name'])?> - <a href="<?php echo url_for('docente/index') ?>" ><?php echo __('Docentes')  ?></a> - <?php echo __('Editar docente') ?> </h1>
<div id="title_module">
    <?php include_partial('form', array('form' => $form)) ?>
</div>
