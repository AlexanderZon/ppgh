<?php use_helper('Date')?>

    <?php if($palabra):?>
    <div style="height: 40px; color: #333;">
        Pesquisa relacionada com "<b><?php echo $palabra ?></b>"
    </div>
    <?php endif; ?>
    <?php if($total):?>
        <?php foreach ($lista as $entrada):?>
            <div class="data"><?php echo ($entrada['fecha_inicio']) ? format_date($entrada['fecha_inicio'], 'p', $sf_user->getCulture()) : '--' ?></div>
            <div class="img-mini">
                <a href="<?php echo url_for('@permalink?secciones='.$seccion.'&subseccion=detalle&permalink='.$entrada['permalink']) ?>">
                     <?php if($entrada['image']): ?>
                        <?php echo image_tag('/uploads/eventos/min_'.$entrada['image'],'width="84" height="63"') ?>                                
                    <?php else: ?>
                        <?php echo image_tag('frontend/no_image','width="84" height="63"') ?>                                
                    <?php endif; ?>
                </a>
            </div>
            <div class="tit-noticia"><?php echo $entrada['titulo'] ?></div>
            <div class="space-content"></div>
            <div class="not-resumo"><?php echo substr(html_entity_decode($entrada['body']),0,250) ?> </div>
            <div class="clear"></div>
            <div style="border-bottom:1px solid #ccc; margin-bottom:5px; margin-top:5px;"></div>
        <?php endforeach; ?> 
    <?php else:?>
        <div style="height: 40px; color: #D51921; text-align: center;">
            <?php echo 'Não há conteúdo para esta seção neste momento';?>
        </div>
    <?php endif; ?>

<?php if($total > 1):?>
    <?php echo html_entity_decode($paginator ) ?>
<?php endif; ?>