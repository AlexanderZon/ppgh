<h1 class="icono_seguranca"><?php echo __($moduleParent['parent_name'])?> - <a href="<?php echo url_for('lxsection/index') ?>"><?php echo __('Se&ccedil;&otilde;es')  ?> do <?php echo $nombreNucleo->getNameProfile() ?></a> - <?php echo __('Adicionar novo sess&atilde;o') ?> </h1>
<div id="title_module">
    <?php include_partial('form', array('form' => $form)) ?>
</div>

