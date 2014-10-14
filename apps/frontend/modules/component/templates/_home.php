<script type="text/javascript">
     $(window).load(function() {
         $('#featured').orbit();
     });
</script>
<?php $valida = new lynxValida() ?>

<div class="tit-destaque">DESTAQUE</div>
<div class="destque-body">

<div id="featured"> 
    <?php if($noticiasPPal):?>
    <?php foreach($noticiasPPal as $noticia): ?>
        <a style="text-decoration: none;" href="<?php echo url_for('@permalink?secciones=noticias&subseccion=detalle&permalink='.$noticia['permalink']); ?>">
            <?php echo image_tag('/uploads/news/medium_'.$noticia['image'], array('title' => $noticia['title'], 'alt' => $noticia['title'], 'border' => '0')) ?>
            <div style="padding-left: 40px; font-size: 13px; padding-top: 20px; height: 30px; background-color: #A6A6A6; color: #FFF ; text-transform: uppercase; ">
                 <br /><?php echo $noticia['title'] ?>
            </div>
        </a>
    <?php endforeach; ?>
  <?php endif;?>
</div>
<?php if($noticias):?>
    <div style="margin-top:10px; width:100%">
        <?php $i = 0; ?>
        <?php foreach($noticias as $noti): ?>
        <div style="width:215px; float:left;">
            <div class="data">
                <?php echo format_date($noti['data'], 'D', $sf_user->getCulture()) ; ?>    
            </div>
            <div class="tit-noticia preto" style="width: 222px;">
                <a href="<?php echo url_for('@permalink?secciones=noticias&subseccion=detalle&permalink='.$noti['permalink']); ?>">
                    <?php echo $noti['title'] ?>
                </a>
            </div>
            <div class="space-content"></div>
            <div class="not-resumo cinza" style="width: 222px;">
                <a href="<?php echo url_for('@permalink?secciones=noticias&subseccion=detalle&permalink='.$noti['permalink']); ?>">
                    <?php echo  globalFunctions::trunkTextByword($noti['sumario'],120); ?>
                </a>
            </div>
        </div>
        <?php if(!$i): ?>
            <div style="float:left; width:1px; height:113px; margin-right:10px; margin-left:10px; border-left:1px solid #ccc;"></div>
        <?php endif; ?>
        <?php $i++ ?>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

</div>
<?php if($ultimasNoticias):?>

<div class="aba-laranja"><?php echo __('últimas notícias') ?></div>
<div class="calendario">
<!--col1-->
    <?php $i = 0; ?>
    <?php foreach($ultimasNoticias as $noticia): ?>
        <div style="float:left; margin-bottom:20px; width:215px; position:relative;">
            <div class="data"><?php echo format_date($noticia['data'], 'D', $sf_user->getCulture()) ; ?>    </div>
            <div class="img-mini2">
                <a href="<?php echo url_for('@permalink?secciones=noticias&subseccion=detalle&permalink='.$noticia['permalink']); ?>">    
                    <?php if($noticia['image']): ?>
                        <?php echo image_tag('/uploads/news/min_'.$noticia['image'], array('style' => 'width:66px; height:49px; ', 'title' => $noticia['title'], 'alt' => $noticia['title'])) ?>
                    <?php else: ?>
                        <?php echo image_tag('frontend/no_image','width="66" height="50"') ?>
                    <?php endif; ?>
                    
                </a>
            </div>
            <div class="tit-noticia preto" style="width: 222px;">
                <a href="<?php echo url_for('@permalink?secciones=noticias&subseccion=detalle&permalink='.$noticia['permalink']); ?>">
                        <?php echo globalFunctions::trunkTextByword($noticia['title'],80); ?>
                </a>
                <div class="space-content"></div>            
            </div>
            <div class="not-resumo cinza" style="width: 222px;">
                <a href="<?php echo url_for('@permalink?secciones=noticias&subseccion=detalle&permalink='.$noticia['permalink']); ?>">
                        <?php echo  globalFunctions::trunkTextByword($noticia['sumario'],80); ?>
                </a>
            </div>
        </div>
        <?php if(!$i): ?>
            <!--col1 end-->
            <div style="float:left; width:1px; height:110px; margin-right:10px; margin-left:10px; border-left:1px solid #ccc;"></div>
        <?php endif; ?>
        <?php $i++ ?>
    <?php endforeach; ?>
<div class="clear"></div>
<div style="border-bottom:1px solid #ccc; margin-bottom:5px; margin-top:5px;"></div>

<div class="link-laranja" style="position:absolute; bottom:5px; right:4px;">
    <?php echo link_to('Veja todas as notícias', '@menu?secciones=noticias', array('class' => '')) ?>
</div>

</div>
<?php endif; ?>