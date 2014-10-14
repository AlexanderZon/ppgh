<h1 class="icono_seguranca"><?php echo __($moduleParent['parent_name'])?> - <a href="<?php echo url_for('disciplina/index') ?>"><?php echo __('Disciplinas')  ?></a> - <?php echo __('Adicionar nova disciplina') ?> </h1>
<div id="title_module">    
    <?php include_partial('form', array('form' => $form)) ?>
</div>

