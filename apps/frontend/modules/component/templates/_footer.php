
<div class="column span-24 last" id="">
  <div class="column span-14 first" style="padding-left: 0px; padding-top: 0px; width: 620px;">    
    <?php //echo link_to('Home', '@homepage', array('alt'=>'', 'title'=>'')) ?>&nbsp;&nbsp;
    <?php //echo image_tag('frontend/footer.gif') ?>
    <ul>
        <li style="float: left; margin-right: 20px; font-size: 14px;">
            <?php echo link_to('Página Inicial', '@homepage', array('alt'=>'', 'title'=>'')) ?>
        </li>
        <?php if($sections): ?>
            <?php foreach ($sections as $val) :?>
                <li style="float: left; margin-right: 20px; font-size: 14px;">
                    <?php echo link_to($val['nameSection'],'@menu?nucleo='.$nucleo.'&secciones='.$val['sw_menu'],'') ?>
                    <?php $children = ExtendSfSection::searchChildrenSection($val['id'],'pt'); ?>
                    <?php if($children):?>
                        <ul>
                            <?php foreach ($children as $value): ?>
                            <li style="height: 25px; font-size: 12px;"><?php echo link_to($value['nameSection'],'@menu?nucleo='.$nucleo.'&secciones='.$value['sw_menu'],'style="font-weight: normal !important;"') ?></li>
                            <?php endforeach; ?>                    
                        </ul>
                    <?php endif; ?>            
                </li>
            <?php endforeach; ?>
       <?php endif; ?>
    </ul>
  </div>

  <div class="column span-10 last" align="left" style="color: #333; font-size: 14px; margin: 18px 0px; width: 345px; margin-left: 4px;">
    <?php include_component('component', 'homeRecibirNoticias') ?>  
  </div>
  <div style="float: right; font-size: 14px; font-weight: bold;">
    Visitante N° <?php echo $counter->getCount(); ?>
  </div>
  
</div>
