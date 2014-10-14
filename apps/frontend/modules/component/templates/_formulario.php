<?php use_javascript('jq/jquery.filter-list.js') ?>
<h4><?php echo __('Formularios') ?></h4>

    <?php if($formularios):?>
        <?php foreach($formularios as $form): ?>
            <div class="tit-noticia">
                <?php echo $form['nome'] ?>                
            </div>
            <div class="space-content"></div>
            <div class="not-resumo"><?php echo html_entity_decode($form['conteudo']) ?> </div>
            <?php if($form['arquivo']): ?>
            <div class="not-resumo">
                <a href="<?php echo '/uploads/formulario/'.$form['id_formulario'].'/'.$form['arquivo'] ?>" target="_blank" style="float: left; font-size: 12px; margin-top: 6px; color: #518dc2;">
                    <?php echo image_tag('file_extension_pdf','style="position: relative; top: 5px; width:22px; "') ?>     
                    <?php echo __('Baixar') ?>
                </a>                
            </div>
            <?php endif; ?>
            <div class="clear"></div>
            <div style="border-bottom:1px solid #ccc; margin-bottom:10px; margin-top:5px;"></div>
        <?php endforeach; ?>
    <?php else: ?>
            <div style="height: 40px; color: #D51921; text-align: center;">
                <?php echo 'Não há conteúdo para esta seção neste momento';?>
            </div>
    <?php endif;?>

<?php include_partial('global/share'); ?>