<div id="title_module">
        <div class="frameForm" >
        <h1><?php echo __($moduleParent['parent_name'])?> - <a href="<?php echo url_for('solicitudes/index') ?>" ><?php echo __('solicitudes')  ?></a> - <?php echo __('Editar solicitudes') ?> </h1>
        
        </div>
<?php include_partial('form', array('form' => $form,'arquivos' => $arquivos)) ?>
</div>
