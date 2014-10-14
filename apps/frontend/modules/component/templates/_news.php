<?php use_helper('Date') ?>
<script type="text/javascript">
    $(document).ready(function() {
        loadData(1);  // For first time page load default results
    });
</script>

<div class="column span-14 first" style="width: 475px;">
<?php if($sf_request->hasParameter('permalink')): ?>
    <?php use_stylesheet('/js/fancybox/jquery.fancybox.css') ?>
    <?php use_javascript('fancybox/jquery.fancybox.js') ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.fancybox').fancybox();
        });
    </script>
    <div class="data-cinza"><?php echo format_date($news['data'], 'D') ?></div>
    <div class="space-content"></div>
    <div style="position:absolute; top:0px; right:0px;">
        <a href="javascript:history.back()"><img src="/images/frontend/bt-voltar.jpg" width="62" height="19" border="0" /></a>
    </div>
    <div style="border-bottom:1px solid #ccc; margin-bottom:5px; margin-top:5px;"></div>
    <h4 style="text-transform: uppercase;"><?php echo $news['title'] ?></h4>
    <div>
        <?php if($news['image']):  ?>
            <a href="/uploads/news/big_<?php echo $news['image'] ?>" class="fancybox" >
                <?php echo image_tag('/uploads/news/medium_'.$news['image'], ' width="464"  ')?>
            </a>
        <?php endif;?>
    </div>
    <div class="texto" style="margin-top:20px;">
        <?php echo htmlspecialchars_decode($news['body']) ?>
    </div>
    <div class="space-content"></div>
    <div style="border-bottom:1px solid #ccc; margin-bottom:5px; margin-top:5px;"></div>
    <div>
    <?php include_partial('global/share'); ?>
    </div>
    <?php //echo link_to('Ver todas as notícias', '@menu?secciones='.$sf_params->get('secciones')) ?>
<?php else: ?>

    <h4><?php echo __('notícias') ?></h4>
    <div class="texto" style="margin-top:20px; width: 475px;">
        <div id="loading"></div>
        <div id="paginador">
            <div class="data"></div>
            <div class="pagination"></div>
        </div>    
    </div>
<?php endif; ?>
</div>