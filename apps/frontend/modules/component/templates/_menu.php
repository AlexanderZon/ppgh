<!--menu-->
<script type="text/javascript">
    function toogleSMenu(id)
        {
            $("#smenu_" + id).toggle('slow');
        }
    
</script>
<div class="aba-azul"><?php echo __('acesso rápido')?></div>
<div class="menu-body">
    <?php foreach ($sections as $section): ?>
        <h3>
            <?php if($section['url_externa']): ?>
                <?php echo link_to($section['nameSection'],''.$section['url_externa'].'','target="_blank"');?>
            <?php else: ?>
                <?php echo ($section['control']) ? link_to($section['nameSection'], '@menu?secciones='.$section['sw_menu']) : "<a style='cursor:default'>{$section['nameSection']}</a>" ?>
            <?php endif; ?>
            
            
            <?php $children = ExtendSfSection::searchChildrenSection($section['id'],  sfContext::getInstance()->getUser()->getCulture()); ?>
            <?php if($children): ?>
                <a href="javascript:void(0);" onclick="toogleSMenu(<?php echo $section['id'] ?>);" >
                    <?php echo image_tag('icons/arrow_right','style="position: relative;top: 0px;"') ?>
                </a>
            <ul class="sub-menu" id="smenu_<?php echo $section['id'] ?>" style="display: none">
                    <?php foreach ($children as $subTmp): ?>
                        <?php if($subTmp['url_externa']): ?>
                            <li><?php echo link_to($subTmp['nameSection'],''.$subTmp['url_externa'].'','target="_blank"');?></li>
                        <?php else: ?>
                            <?php if($subTmp['control']): ?>
                                <li><?php echo link_to($subTmp['nameSection'],'@menu?secciones='.$subTmp['sw_menu']);?></li>
                            <?php else: ?>
                                <li><?php echo $subTmp['nameSection'];?> </li>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    
                </ul>
            <?php endif; ?>
        </h3>
    <?php endforeach; ?>
<!--    <h3><a href="#">O Programa</a></h3>
    <ul class="sub-menu">
        <li><a href="apresentacao.html">Apresentação/Proposta</a></li>
        <li>Coordenação</li>
        <li>Memória Institucional</li>
    </ul>-->
    

</div>
